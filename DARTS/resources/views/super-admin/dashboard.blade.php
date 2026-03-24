@extends('layouts.super-admin')

@section('content')
    <div class="space-y-6">
        <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                City Super Admin Dashboard Placeholder
            </h1>
            <p class="mt-2 text-slate-600">
                This shell is ready. Later parts will add official account creation,
                barangay assignment, account status control, system oversight, and reports.
            </p>
        </section>

        <div class="grid gap-6 lg:grid-cols-2">
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Portal Paths</h2>

                <div class="mt-4 space-y-2">
                    @foreach (config('portal.portal_paths') as $portal => $path)
                        <div class="flex items-center justify-between rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-700">
                            <span class="font-medium">{{ strtoupper(str_replace('_', ' ', $portal)) }}</span>
                            <span>{{ $path }}</span>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-900">Pilot Barangay Coverage</h2>

                <div class="mt-4 grid gap-2 sm:grid-cols-2">
                    @foreach (config('portal.pilot_barangays') as $barangay)
                        <div class="rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-700">
                            {{ $barangay }}
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
