@extends('layouts.resident')

@section('content')
    <div class="space-y-8">
        @if (! $serviceType)
            <section class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Request Center</p>
                <h1 class="mt-3 text-3xl font-bold tracking-tight text-slate-950">Choose a Service</h1>
                <p class="mt-3 max-w-3xl text-sm leading-7 text-slate-600">
                    Select one service to start a resident request.
                </p>
            </section>

            @foreach (['document' => 'Document Services', 'assistance' => 'Assistance Services'] as $groupKey => $groupTitle)
                <section class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-2xl font-bold tracking-tight text-slate-900">{{ $groupTitle }}</h2>

                    <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                        @foreach (($services[$groupKey] ?? collect()) as $service)
                            <a href="{{ route('resident.requests.create.service', $service) }}"
                               class="rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-0.5 hover:bg-white">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <h3 class="text-lg font-semibold text-slate-900">{{ $service->name }}</h3>
                                        <p class="mt-2 text-sm text-slate-500">{{ ucfirst($service->category) }}</p>
                                    </div>

                                    <x-status-badge :status="$service->requires_payment ? 'for_payment' : 'active'" />
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endforeach
        @else
            <section class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Request Center</p>
                        <h1 class="mt-3 text-3xl font-bold tracking-tight text-slate-950">{{ $serviceType->name }}</h1>
                        <p class="mt-3 max-w-3xl text-sm leading-7 text-slate-600">
                            Complete the request form and upload supporting attachments if available.
                        </p>
                    </div>

                    <x-status-badge :status="$serviceType->category" />
                </div>
            </section>

            @if ($errors->any())
                <section class="rounded-3xl border border-rose-200 bg-rose-50 p-6">
                    <h2 class="text-lg font-semibold text-rose-700">Please fix the highlighted fields.</h2>
                    <ul class="mt-3 space-y-1 text-sm text-rose-600">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </section>
            @endif

            <form method="POST" action="{{ route('resident.requests.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf
                <input type="hidden" name="service_type_code" value="{{ $serviceType->code }}">

                <section class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-2xl font-bold tracking-tight text-slate-900">Service-Specific Data</h2>

                    <div class="mt-6 grid gap-5">
                        @if ($serviceType->code === 'barangay_clearance')
                            <div>
                                <label for="purpose" class="text-sm font-medium text-slate-700">Purpose</label>
                                <textarea id="purpose" name="purpose" rows="5"
                                          class="mt-2 w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900">{{ old('purpose') }}</textarea>
                            </div>

                            <div class="grid gap-5 md:grid-cols-3">
                                <div>
                                    <label for="cedula_number" class="text-sm font-medium text-slate-700">Cedula Number</label>
                                    <input id="cedula_number" name="cedula_number" type="text"
                                           value="{{ old('cedula_number') }}"
                                           class="mt-2 w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900">
                                </div>

                                <div>
                                    <label for="cedula_date" class="text-sm font-medium text-slate-700">Cedula Date</label>
                                    <input id="cedula_date" name="cedula_date" type="date"
                                           value="{{ old('cedula_date') }}"
                                           class="mt-2 w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900">
                                </div>

                                <div>
                                    <label for="cedula_place" class="text-sm font-medium text-slate-700">Cedula Place</label>
                                    <input id="cedula_place" name="cedula_place" type="text"
                                           value="{{ old('cedula_place') }}"
                                           class="mt-2 w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900">
                                </div>
                            </div>
                        @elseif ($serviceType->code === 'certificate_of_residency')
                            <div>
                                <label for="purpose" class="text-sm font-medium text-slate-700">Purpose</label>
                                <textarea id="purpose" name="purpose" rows="5"
                                          class="mt-2 w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900">{{ old('purpose') }}</textarea>
                            </div>

                            <div class="grid gap-5 md:grid-cols-2">
                                <div>
                                    <label for="years_of_residency" class="text-sm font-medium text-slate-700">Years of Residency</label>
                                    <input id="years_of_residency" name="years_of_residency" type="number" min="0"
                                           value="{{ old('years_of_residency') }}"
                                           class="mt-2 w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900">
                                </div>

                                <div>
                                    <label for="months_of_residency" class="text-sm font-medium text-slate-700">Months of Residency</label>
                                    <input id="months_of_residency" name="months_of_residency" type="number" min="0" max="11"
                                           value="{{ old('months_of_residency') }}"
                                           class="mt-2 w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900">
                                </div>
                            </div>
                        @elseif ($serviceType->code === 'certificate_of_indigency')
                            <div>
                                <label for="purpose" class="text-sm font-medium text-slate-700">Purpose</label>
                                <textarea id="purpose" name="purpose" rows="5"
                                          class="mt-2 w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900">{{ old('purpose') }}</textarea>
                            </div>
                        @elseif ($serviceType->code === 'first_time_jobseeker_certification')
                            <div>
                                <label for="purpose" class="text-sm font-medium text-slate-700">Purpose</label>
                                <textarea id="purpose" name="purpose" rows="5"
                                          class="mt-2 w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900">{{ old('purpose', 'First-time job application') }}</textarea>
                            </div>

                            <label class="inline-flex items-center gap-3 text-sm text-slate-700">
                                <input type="checkbox"
                                       name="oath_required"
                                       value="1"
                                       @checked(old('oath_required', true))
                                       class="rounded border-slate-300 text-slate-900 focus:ring-slate-900">
                                <span>Include oath requirement for First-Time Jobseeker Certification</span>
                            </label>

                            <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5 text-sm text-amber-700">
                                This request is treated as a one-time active availment.
                            </div>
                        @elseif ($serviceType->category === 'assistance')
                            <div>
                                <label for="case_summary" class="text-sm font-medium text-slate-700">Case Summary</label>
                                <textarea id="case_summary"
                                          name="case_summary"
                                          rows="6"
                                          class="mt-2 w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900">{{ old('case_summary') }}</textarea>
                            </div>

                            <div>
                                <label for="requested_amount" class="text-sm font-medium text-slate-700">Requested Amount (Optional)</label>
                                <input id="requested_amount"
                                       name="requested_amount"
                                       type="number"
                                       min="0"
                                       step="0.01"
                                       value="{{ old('requested_amount') }}"
                                       class="mt-2 w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900">
                            </div>
                        @endif
                    </div>
                </section>

                <section class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h2 class="text-2xl font-bold tracking-tight text-slate-900">Supporting Attachments</h2>

                    <div class="mt-6">
                        <label for="supporting_files" class="text-sm font-medium text-slate-700">Upload Supporting Files</label>
                        <input id="supporting_files"
                               name="supporting_files[]"
                               type="file"
                               multiple
                               class="mt-2 block w-full rounded-xl border border-slate-300 bg-white p-3 text-sm text-slate-700">
                        <p class="mt-2 text-xs text-slate-500">Accepted: JPG, JPEG, PNG, WEBP, PDF. Max 5MB per file.</p>
                    </div>
                </section>

                <section class="flex flex-wrap items-center justify-between gap-3">
                    <a href="{{ route('resident.requests.create') }}"
                       class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">
                        Back to Service Chooser
                    </a>

                    <button type="submit"
                            class="rounded-xl bg-slate-900 px-6 py-3 text-sm font-medium text-white hover:bg-slate-800">
                        Submit Request
                    </button>
                </section>
            </form>
        @endif
    </div>
@endsection
