<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barangay Portal - {{ config('app.name') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    <div class="min-h-screen">
        <header class="border-b border-slate-800 bg-slate-900 text-white">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
                <div>
                    <a href="{{ route('barangay.dashboard') }}" class="text-lg font-semibold tracking-tight">
                        Barangay Portal
                    </a>
                    <p class="text-xs text-slate-300">
                        Operational workspace for verification, requests, and release
                    </p>
                </div>

                <nav class="flex items-center gap-4 text-sm">
                    <a href="{{ route('home') }}" class="text-slate-200 hover:text-white">Public Home</a>
                    <a href="{{ route('dashboard') }}" class="text-slate-200 hover:text-white">Portal Entry</a>
                    <a href="{{ route('barangay.dashboard') }}" class="text-slate-200 hover:text-white">Dashboard</a>
                </nav>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-6 py-10">
            @yield('content')
        </main>
    </div>
</body>
</html>
