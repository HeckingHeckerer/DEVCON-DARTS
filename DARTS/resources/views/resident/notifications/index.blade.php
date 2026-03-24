@extends('layouts.resident')

@section('content')
    <div class="space-y-8">
        <section class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Notifications</p>
            <h1 class="mt-3 text-3xl font-bold tracking-tight text-slate-950">Resident Notifications</h1>
            <p class="mt-3 text-sm leading-7 text-slate-600">
                Notification shell page for resident-facing updates.
            </p>
        </section>

        <section class="space-y-4">
            @forelse ($notifications as $notification)
                <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">{{ $notification['title'] }}</h2>
                            <p class="mt-2 text-sm leading-7 text-slate-600">{{ $notification['message'] }}</p>
                        </div>

                        <x-status-badge :status="$notification['type']" />
                    </div>

                    <p class="mt-4 text-xs text-slate-500">
                        {{ $notification['created_at']->format('F d, Y h:i A') }}
                    </p>
                </article>
            @empty
                <div class="rounded-3xl border border-dashed border-slate-300 bg-white p-8 text-sm text-slate-500">
                    No notifications available.
                </div>
            @endforelse
        </section>
    </div>
@endsection
