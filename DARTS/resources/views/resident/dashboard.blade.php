@extends('layouts.resident')

@section('content')
    <div class="space-y-8">
        <section class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                <div class="space-y-3">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">
                        Resident Portal
                    </p>

                    <h1 class="text-3xl font-bold tracking-tight text-slate-950">
                        Welcome, {{ $user->name }}
                    </h1>

                    <p class="max-w-3xl text-sm leading-7 text-slate-600">
                        Resident shell pages are active. Role enforcement and onboarding flow will be refined in later parts.
                    </p>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4">
                        <p class="text-xs font-medium uppercase tracking-wide text-slate-500">Account Status</p>
                        <div class="mt-2">
                            <x-status-badge :status="$user->account_status" />
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4">
                        <p class="text-xs font-medium uppercase tracking-wide text-slate-500">Verification</p>
                        <div class="mt-2">
                            <x-status-badge :status="$verification?->status ?? 'pending_verification'" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Total Requests</p>
                <p class="mt-3 text-3xl font-bold text-slate-950">{{ $requestStats['total'] }}</p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Document Requests</p>
                <p class="mt-3 text-3xl font-bold text-slate-950">{{ $requestStats['documents'] }}</p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Assistance Requests</p>
                <p class="mt-3 text-3xl font-bold text-slate-950">{{ $requestStats['assistance'] }}</p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Completed</p>
                <p class="mt-3 text-3xl font-bold text-slate-950">{{ $requestStats['completed'] }}</p>
            </div>
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-bold tracking-tight text-slate-900">Quick Access</h2>
                        <p class="mt-2 text-sm text-slate-500">
                            Resident shell links for the next workflow slices.
                        </p>
                    </div>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <a href="{{ route('resident.profile.show') }}" class="rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-0.5 hover:bg-white">
                        <h3 class="text-lg font-semibold text-slate-900">Profile</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">View resident profile shell and verification details.</p>
                    </a>

                    <a href="{{ route('resident.requests.index') }}" class="rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-0.5 hover:bg-white">
                        <h3 class="text-lg font-semibold text-slate-900">Request History</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Open the resident request history and detail shells.</p>
                    </a>

                    <a href="{{ route('resident.notifications.index') }}" class="rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-0.5 hover:bg-white">
                        <h3 class="text-lg font-semibold text-slate-900">Notifications</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Open resident-facing notices and portal updates.</p>
                    </a>

                    <a href="{{ route('services.index') }}" class="rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-0.5 hover:bg-white">
                        <h3 class="text-lg font-semibold text-slate-900">Services</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Browse supported document and assistance services.</p>
                    </a>
                </div>
            </div>

            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-slate-900">Resident Summary</h2>
                    <p class="mt-2 text-sm text-slate-500">
                        Current authenticated resident shell context.
                    </p>
                </div>

                <div class="mt-6 space-y-4 text-sm">
                    <div class="flex items-center justify-between gap-4">
                        <span class="text-slate-500">Email</span>
                        <span class="font-medium text-slate-900">{{ $user->email }}</span>
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <span class="text-slate-500">Role</span>
                        <span class="font-medium text-slate-900">{{ $user->role }}</span>
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <span class="text-slate-500">Barangay</span>
                        <span class="font-medium text-slate-900">{{ $residentProfile?->barangay?->name ?? 'Not yet set' }}</span>
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <span class="text-slate-500">Profile Record</span>
                        <span class="font-medium text-slate-900">{{ $residentProfile ? 'Available' : 'Not yet created' }}</span>
                    </div>
                </div>

                <div class="mt-8 border-t border-slate-200 pt-6">
                    <h3 class="text-lg font-semibold text-slate-900">Recent Requests</h3>

                    <div class="mt-4 space-y-3">
                        @forelse ($recentRequests as $recentRequest)
                            <a href="{{ route('resident.requests.show', $recentRequest->reference_number) }}"
                               class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 hover:bg-white">
                                <div>
                                    <p class="text-sm font-semibold text-slate-900">{{ $recentRequest->serviceType?->name }}</p>
                                    <p class="text-xs text-slate-500">{{ $recentRequest->reference_number }}</p>
                                </div>

                                <x-status-badge :status="$recentRequest->current_status" />
                            </a>
                        @empty
                            <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-5 text-sm text-slate-500">
                                No requests yet.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
