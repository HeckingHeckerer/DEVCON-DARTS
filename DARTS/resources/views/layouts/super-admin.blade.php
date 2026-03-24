<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Admin Portal - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    <div class="min-h-screen">
        <header class="border-b border-slate-800 bg-black text-white">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
                <div>
                    <a href="{{ route('super_admin.dashboard') }}" class="text-lg font-semibold tracking-tight">
                        City Super Admin Portal
                    </a>
                    <p class="text-xs text-slate-300">
                        Governance, account control, and oversight
                    </p>
                </div>

                <nav class="flex items-center gap-4 text-sm">
                    <a href="{{ route('home') }}" class="text-slate-200 hover:text-white">Public Home</a>
                    <a href="{{ route('dashboard') }}" class="text-slate-200 hover:text-white">Portal Entry</a>
                    <a href="{{ route('super_admin.dashboard') }}" class="text-slate-200 hover:text-white">Dashboard</a>
                </nav>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-6 py-10">
            @yield('content')
        </main>
    </div>
</body>
</html>
