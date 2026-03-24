<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    <div class="min-h-screen">
        <header class="border-b border-slate-200 bg-white">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
                <div>
                    <a href="{{ route('home') }}" class="text-lg font-semibold tracking-tight">
                        {{ config('app.name') }}
                    </a>
                    <p class="text-xs text-slate-500">
                        Valencia Multi-Barangay Service Portal
                    </p>
                </div>

                <nav class="flex items-center gap-4 text-sm">
                    <a href="{{ route('home') }}" class="text-slate-700 hover:text-slate-900">Home</a>
                    <a href="{{ route('services.index') }}" class="text-slate-700 hover:text-slate-900">Services</a>

                    @auth
                        <a href="{{ route('dashboard') }}" class="text-slate-700 hover:text-slate-900">Portal Entry</a>
                        <a href="{{ route('resident.dashboard') }}" class="text-slate-700 hover:text-slate-900">Resident</a>
                    @else
                        <a href="{{ route('login') }}" class="text-slate-700 hover:text-slate-900">Log in</a>
                        <a href="{{ route('register') }}" class="rounded-lg bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Register</a>
                    @endauth
                </nav>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-6 py-10">
            @yield('content')
        </main>
    </div>
</body>
</html>
