<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\AssistanceRequestDetail;
use App\Models\DocumentRequestDetail;
use App\Models\RequestAttachment;
use App\Models\RequestStatusLog;
use App\Models\ServiceRequest;
use App\Models\ServiceType;
use App\Support\RequestReferenceNumber;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RequestController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user()->load('residentProfile');

        $requests = $this->getResidentRequests($user->residentProfile?->id);

        return view('resident.requests.index', [
            'residentProfile' => $user->residentProfile,
            'requests' => $requests,
        ]);
    }

    public function create(): View
    {
        $services = ServiceType::query()
            ->where('is_active', true)
            ->orderBy('category')
            ->orderBy('name')
            ->get()
            ->groupBy('category');

        return view('resident.requests.create', [
            'services' => $services,
            'serviceType' => null,
        ]);
    }

    public function createForService(ServiceType $serviceType): View
    {
        abort_unless($serviceType->is_active, 404);

        $services = ServiceType::query()
            ->where('is_active', true)
            ->orderBy('category')
            ->orderBy('name')
            ->get()
            ->groupBy('category');

        return view('resident.requests.create', [
            'services' => $services,
            'serviceType' => $serviceType,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $user = $request->user()->load([
            'residentProfile.barangay',
            'residentProfile.verification',
        ]);

        abort_unless($user->residentProfile && $user->residentProfile->verification, 403);
        abort_unless($user->residentProfile->verification->status === 'verified', 403);

        $validated = $request->validate([
            'service_type_code' => ['required', 'exists:service_types,code'],

            'purpose' => ['nullable', 'string', 'max:2000'],
            'cedula_number' => ['nullable', 'string', 'max:255'],
            'cedula_date' => ['nullable', 'date'],
            'cedula_place' => ['nullable', 'string', 'max:255'],
            'years_of_residency' => ['nullable', 'integer', 'min:0', 'max:150'],
            'months_of_residency' => ['nullable', 'integer', 'min:0', 'max:11'],
            'oath_required' => ['nullable', 'boolean'],

            'case_summary' => ['nullable', 'string', 'max:5000'],
            'requested_amount' => ['nullable', 'numeric', 'min:0'],

            'supporting_files' => ['nullable', 'array'],
            'supporting_files.*' => ['file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:5120'],
        ]);

        $serviceType = ServiceType::query()
            ->where('code', $validated['service_type_code'])
            ->where('is_active', true)
            ->firstOrFail();

        $this->validateServiceSpecificRequestData($request, $serviceType, $user->residentProfile->id);

        $residentProfile = $user->residentProfile;

        $serviceRequest = DB::transaction(function () use ($request, $user, $residentProfile, $serviceType): ServiceRequest {
            $serviceRequest = ServiceRequest::create([
                'reference_number' => RequestReferenceNumber::generate($serviceType, $residentProfile->barangay_id),
                'resident_profile_id' => $residentProfile->id,
                'service_type_id' => $serviceType->id,
                'barangay_id' => $residentProfile->barangay_id,
                'request_category' => $serviceType->category,
                'current_status' => 'submitted',
                'submitted_at' => now(),
                'latest_status_at' => now(),
            ]);

            if ($serviceType->category === 'document') {
                DocumentRequestDetail::create([
                    'request_id' => $serviceRequest->id,
                    'purpose' => $request->string('purpose')->toString(),
                    'cedula_number' => $request->input('cedula_number'),
                    'cedula_date' => $request->input('cedula_date'),
                    'cedula_place' => $request->input('cedula_place'),
                    'years_of_residency' => $request->filled('years_of_residency') ? (int) $request->input('years_of_residency') : null,
                    'months_of_residency' => $request->filled('months_of_residency') ? (int) $request->input('months_of_residency') : null,
                    'jobseeker_availment_count' => $serviceType->code === 'first_time_jobseeker_certification' ? 1 : 0,
                    'oath_required' => $serviceType->code === 'first_time_jobseeker_certification'
                        ? $request->boolean('oath_required')
                        : false,
                ]);
            }

            if ($serviceType->category === 'assistance') {
                AssistanceRequestDetail::create([
                    'request_id' => $serviceRequest->id,
                    'case_summary' => $request->string('case_summary')->toString(),
                    'requested_amount' => $request->filled('requested_amount')
                        ? $request->input('requested_amount')
                        : null,
                ]);
            }

            foreach ($request->file('supporting_files', []) as $uploadedFile) {
                $path = $uploadedFile->store("requests/{$serviceRequest->id}/attachments", 'public');

                RequestAttachment::create([
                    'request_id' => $serviceRequest->id,
                    'attachment_type' => 'supporting_document',
                    'file_path' => $path,
                    'original_name' => $uploadedFile->getClientOriginalName(),
                    'mime_type' => $uploadedFile->getClientMimeType(),
                    'file_size' => $uploadedFile->getSize(),
                    'uploaded_by_user_id' => $user->id,
                    'is_required' => false,
                    'review_status' => 'pending',
                ]);
            }

            RequestStatusLog::create([
                'request_id' => $serviceRequest->id,
                'from_status' => null,
                'to_status' => 'submitted',
                'remarks' => 'Request submitted by resident.',
                'acted_by_user_id' => $user->id,
                'acted_at' => now(),
            ]);

            return $serviceRequest;
        });

        return redirect()
            ->route('resident.requests.show', $serviceRequest->reference_number)
            ->with('success', 'Request submitted successfully.');
    }

    public function show(Request $request, string $referenceNumber): View
    {
        $user = $request->user()->load('residentProfile');

        abort_if(! $user->residentProfile, 404);

        $serviceRequest = ServiceRequest::query()
            ->with([
                'serviceType',
                'barangay',
                'documentDetail',
                'assistanceDetail',
                'attachments.uploadedBy',
                'generatedDocument',
                'releaseRecord',
                'paymentRecords.receivedBy',
                'statusLogs.actedBy',
                'referralRecords.referredBy',
            ])
            ->where('resident_profile_id', $user->residentProfile->id)
            ->where('reference_number', $referenceNumber)
            ->firstOrFail();

        return view('resident.requests.show', [
            'serviceRequest' => $serviceRequest,
        ]);
    }

    private function getResidentRequests(?int $residentProfileId): LengthAwarePaginator|Collection
    {
        if (! $residentProfileId) {
            return collect();
        }

        return ServiceRequest::query()
            ->with(['serviceType', 'barangay'])
            ->where('resident_profile_id', $residentProfileId)
            ->latest('created_at')
            ->paginate(10);
    }

    private function validateServiceSpecificRequestData(Request $request, ServiceType $serviceType, int $residentProfileId): void
    {
        if ($serviceType->category === 'document') {
            $request->validate([
                'purpose' => ['required', 'string', 'max:2000'],
            ]);
        }

        if ($serviceType->category === 'assistance') {
            $request->validate([
                'case_summary' => ['required', 'string', 'max:5000'],
            ]);
        }

        if ($serviceType->code === 'barangay_clearance') {
            $request->validate([
                'cedula_number' => ['required', 'string', 'max:255'],
                'cedula_date' => ['required', 'date'],
                'cedula_place' => ['required', 'string', 'max:255'],
            ]);
        }

        if ($serviceType->code === 'certificate_of_residency') {
            $request->validate([
                'years_of_residency' => ['required', 'integer', 'min:0', 'max:150'],
                'months_of_residency' => ['required', 'integer', 'min:0', 'max:11'],
            ]);
        }

        if ($serviceType->code === 'first_time_jobseeker_certification') {
            $existingJobseekerRequest = ServiceRequest::query()
                ->where('resident_profile_id', $residentProfileId)
                ->whereHas('serviceType', fn ($query) => $query->where('code', 'first_time_jobseeker_certification'))
                ->whereNotIn('current_status', ['rejected', 'cancelled'])
                ->exists();

            if ($existingJobseekerRequest) {
                throw ValidationException::withMessages([
                    'service_type_code' => 'A First-Time Jobseeker Certification request already exists for this resident.',
                ]);
            }
        }
    }
}
