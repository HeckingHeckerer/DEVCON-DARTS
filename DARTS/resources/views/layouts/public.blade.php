<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - DARTS</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=sora:400,500,600,700|dm-sans:400,500,600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        * { font-family: 'Sora', 'DM Sans', sans-serif; }
        body { 
            background: linear-gradient(135deg, #f5f1ff 0%, #ede9fe 50%, #faf5ff 100%);
            min-height: 100vh;
        }
        .gradient-text { 
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
            background-clip: text; 
        }
        .header-divider {
            background: linear-gradient(90deg, transparent, rgba(168, 85, 247, 0.2), transparent);
            height: 1px;
        }
        .logo-subtitle {
            margin-left: 1rem;
        }
        .nav-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1.5rem;
            margin-right: 2rem;
            border-radius: 0.5rem;
            background-color: white;
            border: 2px solid black;
            color: black;
            font-weight: 500;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 200ms ease;
            text-decoration: none;
            font-size: 1rem;
        }
        .nav-button:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
            background-color: #f8f8f8;
        }
        .nav-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .auth-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1.5rem;
            margin-right: 2rem;
            border-radius: 0.5rem;
            background-color: white;
            border: 2px solid black;
            color: black;
            font-weight: 500;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 200ms ease;
            text-decoration: none;
            font-size: 1rem;
        }
        .auth-button:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
            background-color: #f8f8f8;
        }
        .auth-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="min-h-screen text-slate-900 antialiased">
    <!-- Professional Header with Gradient -->
    <header class="sticky top-0 z-50 backdrop-blur-xl bg-gradient-to-r from-purple-100 via-white to-purple-50 border-b border-purple-200/30 shadow-sm">
        <div class="mx-auto max-w-7xl px-6 py-4">
            <!-- Header Navigation -->
            <div class="flex items-center justify-between">
                <!-- Logo Section (Left) -->
                <div class="flex flex-row items-center gap-4">
                    <a href="{{ route('home') }}" class="inline-block">
                        <h1 class="text-2xl font-bold gradient-text leading-none">DARTS</h1>
                    </a>
                    <p class="text-xs text-slate-500 font-medium tracking-wide logo-subtitle">Digital Access & Tracking Service</p>
                </div>

                <!-- Navigation Links (Middle) -->
                <nav class="flex items-center gap-10">
                    <a href="{{ route('home') }}" class="nav-button">
                        Home
                    </a>
                    <a href="{{ route('services.index') }}" class="nav-button">
                        Services
                    </a>
                </nav>

                <!-- Auth Buttons (Right) -->
                <div class="flex items-center gap-10">
                    @auth
                        <a href="{{ route('resident.dashboard') }}" class="auth-button">
                            Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="auth-button">
                                Sign Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="auth-button">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}" class="auth-button">
                            Get Started
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="mx-auto max-w-7xl px-6 py-16">
        @yield('content')
    </main>

    <!-- Professional Footer -->
    <footer class="border-t border-purple-200/30 bg-white/50 backdrop-blur mt-20">
        <div class="mx-auto max-w-7xl px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-sm font-bold text-purple-900 mb-4">DARTS</h3>
                    <p class="text-xs text-slate-600">Digital Access & Request Tracking Service</p>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wide mb-3">Product</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li><a href="#" class="hover:text-purple-600 transition">Features</a></li>
                        <li><a href="#" class="hover:text-purple-600 transition">Services</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wide mb-3">Company</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li><a href="#" class="hover:text-purple-600 transition">About</a></li>
                        <li><a href="#" class="hover:text-purple-600 transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wide mb-3">Legal</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li><a href="#" class="hover:text-purple-600 transition">Privacy</a></li>
                        <li><a href="#" class="hover:text-purple-600 transition">Terms</a></li>
                    </ul>
                </div>
            </div>
            <div class="header-divider"></div>
            <p class="text-center text-xs text-slate-600 mt-8">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>
