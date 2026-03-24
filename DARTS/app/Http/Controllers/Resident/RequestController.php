<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RequestController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user()->load('residentProfile');

        $requests = collect();

        if ($user->residentProfile) {
            $requests = ServiceRequest::query()
                ->with(['serviceType', 'barangay'])
                ->where('resident_profile_id', $user->residentProfile->id)
                ->latest('created_at')
                ->paginate(10);
        }

        return view('resident.requests.index', [
            'residentProfile' => $user->residentProfile,
            'requests' => $requests,
        ]);
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
}
