@extends('layouts.barangay')

@section('content')
    <div class="space-y-6">
        <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                Barangay Dashboard Placeholder
            </h1>
            <p class="mt-2 text-slate-600">
                This shell is ready. Later parts will add resident verification queues,
                document processing queues, assistance processing queues, payment updates,
                printing and release operations, and notifications.
            </p>
        </section>

        <div class="grid gap-6 lg:grid-cols-2">
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Document Workflow States</h2>

                <div class="mt-4 space-y-2">
                    @foreach (config('portal.document_request_statuses') as $status)
                        <div class="rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-700">
                            {{ $status }}
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Assistance Workflow States</h2>

                <div class="mt-4 space-y-2">
                    @foreach (config('portal.assistance_request_statuses') as $status)
                        <div class="rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-700">
                            {{ $status }}
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
