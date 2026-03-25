@extends('layouts.resident')

@section('content')
    <div class="space-y-8">
        <section class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">
                        Request Details
                    </p>

                    <h1 class="mt-3 text-3xl font-bold tracking-tight text-slate-950">
                        {{ $serviceRequest->serviceType?->name }}
                    </h1>

                    <p class="mt-2 text-sm text-slate-500">
                        Reference: {{ $serviceRequest->reference_number }}
                    </p>
                </div>

                <div>
                    <x-status-badge :status="$serviceRequest->current_status" />
                </div>
            </div>
        </section>

        <section class="grid gap-6 xl:grid-cols-[0.95fr_1.05fr]">
            <div class="space-y-6">
                <section class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-2xl font-bold tracking-tight text-slate-900">Request Summary</h2>

                    <div class="mt-6 grid gap-4 text-sm">
                        <div class="flex items-center justify-between gap-4">
                            <span class="text-slate-500">Category</span>
                            <span class="font-medium text-slate-900">{{ ucfirst($serviceRequest->request_category) }}</span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-slate-500">Barangay</span>
                            <span class="font-medium text-slate-900">{{ $serviceRequest->barangay?->name }}</span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-slate-500">Submitted</span>
                            <span class="font-medium text-slate-900">
                                {{ $serviceRequest->submitted_at?->format('F d, Y h:i A') ?? '—' }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-slate-500">Latest Status At</span>
                            <span class="font-medium text-slate-900">
                                {{ $serviceRequest->latest_status_at?->format('F d, Y h:i A') ?? '—' }}
                            </span>
                        </div>

                        @if ($serviceRequest->request_category === 'document')
                            <div class="flex items-start justify-between gap-4">
                                <span class="text-slate-500">Purpose</span>
                                <span class="max-w-[70%] text-right font-medium text-slate-900">{{ $serviceRequest->documentDetail?->purpose ?? '—' }}</span>
                            </div>

                            <div class="flex items-center justify-between gap-4">
                                <span class="text-slate-500">Payment Amount</span>
                                <span class="font-medium text-slate-900">
                                    {{ $serviceRequest->documentDetail?->payment_amount !== null ? number_format($serviceRequest->documentDetail->payment_amount, 2) : '—' }}
                                </span>
                            </div>
                        @endif

                        @if ($serviceRequest->request_category === 'assistance')
                            <div class="flex items-start justify-between gap-4">
                                <span class="text-slate-500">Case Summary</span>
                                <span class="max-w-[70%] text-right font-medium text-slate-900">
                                    {{ $serviceRequest->assistanceDetail?->case_summary ?? '—' }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between gap-4">
                                <span class="text-slate-500">Requested Amount</span>
                                <span class="font-medium text-slate-900">
                                    {{ $serviceRequest->assistanceDetail?->requested_amount !== null ? number_format($serviceRequest->assistanceDetail->requested_amount, 2) : '—' }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between gap-4">
                                <span class="text-slate-500">Referral Destination</span>
                                <span class="font-medium text-slate-900">
                                    {{ $serviceRequest->assistanceDetail?->referral_destination ?? '—' }}
                                </span>
                            </div>
                        @endif
                    </div>
                </section>

                <section class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-2xl font-bold tracking-tight text-slate-900">Supporting Attachments</h2>

                    <div class="mt-6 space-y-3">
                        @forelse ($serviceRequest->attachments as $attachment)
                            <div class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <div>
                                    <p class="text-sm font-semibold text-slate-900">{{ $attachment->attachment_type }}</p>
                                    <p class="text-xs text-slate-500">{{ $attachment->original_name ?? basename($attachment->file_path) }}</p>
                                </div>

                                <x-status-badge :status="$attachment->review_status" />
                            </div>
                        @empty
                            <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-5 text-sm text-slate-500">
                                No supporting attachments uploaded.
                            </div>
                        @endforelse
                    </div>
                </section>

                <section class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-2xl font-bold tracking-tight text-slate-900">Operational Records</h2>

                    <div class="mt-6 space-y-4 text-sm">
                        <div class="flex items-center justify-between gap-4">
                            <span class="text-slate-500">Payments</span>
                            <span class="font-medium text-slate-900">{{ $serviceRequest->paymentRecords->count() }}</span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-slate-500">Generated Document</span>
                            <span class="font-medium text-slate-900">{{ $serviceRequest->generatedDocument ? 'Yes' : 'No' }}</span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-slate-500">Release Record</span>
                            <span class="font-medium text-slate-900">{{ $serviceRequest->releaseRecord ? 'Yes' : 'No' }}</span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-slate-500">Referral Records</span>
                            <span class="font-medium text-slate-900">{{ $serviceRequest->referralRecords->count() }}</span>
                        </div>
                    </div>
                </section>
            </div>

            <section class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-bold tracking-tight text-slate-900">Status Timeline</h2>
                        <p class="mt-2 text-sm text-slate-500">Resident-facing timeline.</p>
                    </div>

                    <a href="{{ route('resident.requests.index') }}" class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                        Back to Requests
                    </a>
                </div>

                <div class="mt-6">
                    <x-request-timeline :logs="$serviceRequest->statusLogs" :currentStatus="$serviceRequest->current_status" />
                </div>
            </section>
        </section>
    </div>
@endsection
