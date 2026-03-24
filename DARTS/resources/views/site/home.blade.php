@extends('layouts.public')

@section('content')
    <!-- Hero Section -->
    <section class="mb-20">
        <div class="rounded-2xl bg-gradient-to-r from-purple-600 via-purple-500 to-blue-500 p-px">
            <div class="rounded-2xl bg-white/95 backdrop-blur p-12 lg:p-16">
                <div class="max-w-3xl">
                    <div class="inline-flex items-center gap-2 rounded-full bg-purple-50 px-4 py-2 mb-6">
                        <span class="flex h-2 w-2 rounded-full bg-purple-600 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-600 opacity-75"></span>
                        </span>
                        <span class="text-sm font-semibold text-purple-900">Live System</span>
                    </div>
                    
                    <h1 class="text-5xl lg:text-6xl font-bold text-slate-900 mb-6 leading-tight">
                        Welcome to <span class="gradient-text">DARTS</span>
                    </h1>
                    
                    <p class="text-xl text-slate-600 mb-8 leading-relaxed">
                        Digital Access and Request Tracking Service - Simplifying barangay service requests for residents across pilot municipalities.
                    </p>
                    
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('services.index') }}" class="px-8 py-4 rounded-lg bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold hover:shadow-lg hover:shadow-purple-300 transition">
                            Explore Services
                        </a>
                        @auth
                            <a href="{{ route('resident.dashboard') }}" class="px-8 py-4 rounded-lg border-2 border-purple-200 text-purple-900 font-semibold hover:bg-purple-50 transition">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="px-8 py-4 rounded-lg border-2 border-purple-200 text-purple-900 font-semibold hover:bg-purple-50 transition">
                                Register Now
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="mb-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Stat Card 1 -->
            <div class="group relative rounded-xl bg-white/80 backdrop-blur p-8 hover:shadow-lg transition">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-50 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-slate-600 uppercase tracking-wide">Pilot Barangays</h3>
                        <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-purple-100 to-purple-50 flex items-center justify-center">
                            <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.5 1.5H5.75A2.25 2.25 0 003.5 3.75v12.5A2.25 2.25 0 005.75 18.5h8.5a2.25 2.25 0 002.25-2.25V9M18 1.5l-4 4M18 1.5h-4m4 0v4"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-4xl font-bold text-purple-900 mb-2">
                        {{ count(config('portal.pilot_barangays')) }}
                    </p>
                    <p class="text-sm text-slate-500">Active service coverage</p>
                </div>
            </div>

            <!-- Stat Card 2 -->
            <div class="group relative rounded-xl bg-white/80 backdrop-blur p-8 hover:shadow-lg transition">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-50 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-slate-600 uppercase tracking-wide">Services</h3>
                        <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-purple-100 to-purple-50 flex items-center justify-center">
                            <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-4xl font-bold text-purple-900 mb-2">
                        {{ count(config('portal.supported_services')) }}
                    </p>
                    <p class="text-sm text-slate-500">Available services</p>
                </div>
            </div>

            <!-- Stat Card 3 -->
            <div class="group relative rounded-xl bg-white/80 backdrop-blur p-8 hover:shadow-lg transition">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-50 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-slate-600 uppercase tracking-wide">Portal Spaces</h3>
                        <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-purple-100 to-purple-50 flex items-center justify-center">
                            <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h12a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-4xl font-bold text-purple-900 mb-2">3</p>
                    <p class="text-sm text-slate-500">Public • Resident • Admin</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="mb-20">
        <div class="mb-12">
            <h2 class="text-4xl font-bold text-slate-900 mb-3">Key Features</h2>
            <p class="text-lg text-slate-600">Comprehensive tools for resident service requests</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Feature 1 -->
            <div class="group rounded-xl bg-white/80 backdrop-blur p-6 hover:shadow-lg transition">
                <div class="flex items-start gap-4">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-100 to-purple-50 flex items-center justify-center flex-shrink-0 mt-1">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-purple-900 mb-1">Resident Access</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Complete profiles with dashboard, notifications, and request history tracking.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="group rounded-xl bg-white/80 backdrop-blur p-6 hover:shadow-lg transition">
                <div class="flex items-start gap-4">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-100 to-purple-50 flex items-center justify-center flex-shrink-0 mt-1">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-purple-900 mb-1">Document Services</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Streamlined processing for clearance, residency, indigency certificates.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="group rounded-xl bg-white/80 backdrop-blur p-6 hover:shadow-lg transition">
                <div class="flex items-start gap-4">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-100 to-purple-50 flex items-center justify-center flex-shrink-0 mt-1">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-purple-900 mb-1">Assistance Services</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Medical and educational assistance programs aligned with government support.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Coverage Section -->
    <section class="mb-20">
        <div class="mb-12">
            <h2 class="text-4xl font-bold text-slate-900 mb-3">Service Coverage</h2>
            <p class="text-lg text-slate-600">Our pilot barangays across the municipality</p>
        </div>

        <div class="rounded-2xl bg-white/80 backdrop-blur p-10">
            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-5">
                @forelse (config('portal.pilot_barangays') as $barangay)
                    <div class="group rounded-lg bg-gradient-to-br from-purple-50 to-white px-4 py-3 text-center font-medium text-purple-900 hover:shadow-md hover:scale-105 transition cursor-default">
                        {{ $barangay }}
                    </div>
                @empty
                    <p class="col-span-full text-center text-slate-500">No barangays configured</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="mb-0">
        <div class="rounded-2xl bg-gradient-to-r from-purple-600 via-purple-500 to-blue-500 p-px">
            <div class="rounded-2xl bg-white/95 backdrop-blur p-12 lg:p-16 text-center">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4">Ready to Get Started?</h2>
                <p class="text-lg text-slate-600 mb-8 max-w-2xl mx-auto">
                    Join thousands of residents already using DARTS to request and track barangay services effortlessly.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @auth
                        <a href="{{ route('resident.dashboard') }}" class="px-8 py-4 rounded-lg bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold hover:shadow-lg hover:shadow-purple-300 transition">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="px-8 py-4 rounded-lg bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold hover:shadow-lg hover:shadow-purple-300 transition">
                            Create Account
                        </a>
                        <a href="{{ route('login') }}" class="px-8 py-4 rounded-lg border-2 border-purple-200 text-purple-900 font-semibold hover:bg-purple-50 transition">
                            Sign In
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection
