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
        /* Hero Section Styles */
        .hero-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 6rem;
            padding-top: 3rem;
        }
        .hero-title {
            font-size: 3.75rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 2rem;
            text-align: left;
            width: 100%;
            max-width: 56rem;
            line-height: 1.2;
        }
        @media (min-width: 1024px) {
            .hero-title {
                font-size: 4.5rem;
            }
        }
        .hero-subtitle {
            font-size: 1.125rem;
            color: #a855f7;
            margin-bottom: 4rem;
            text-align: right;
            width: 100%;
            max-width: 56rem;
            line-height: 1.625;
        }
        @media (min-width: 1024px) {
            .hero-subtitle {
                font-size: 1.25rem;
            }
        }
        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            margin-bottom: 6rem;
        }
        .hero-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            background-color: white;
            border: 2px solid black;
            color: black;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 200ms ease;
            text-decoration: none;
            font-size: 1rem;
        }
        .hero-button:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
            background-color: #f8f8f8;
        }
        .hero-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 5rem;
        }
        @media (max-width: 768px) {
            .stats-container {
                grid-template-columns: 1fr;
            }
        }
        .stat-card {
            background-color: white;
            border-radius: 0.75rem;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            transition: all 200ms ease;
        }
        .stat-card:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
        }
        .stat-card-title {
            color: #000000;
            font-weight: 700;
            font-size: 1.125rem;
            margin-bottom: 0.75rem;
        }
        .stat-card-number {
            font-size: 2.25rem;
            font-weight: 700;
            color: #a855f7;
            margin-bottom: 0.5rem;
        }
        .stat-card-subtitle {
            color: #4b5563;
            font-size: 0.875rem;
        }
        /* Features Section */
        .features-section {
            margin-bottom: 5rem;
        }
        .features-header {
            margin-bottom: 3rem;
        }
        .features-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 0.75rem;
        }
        .features-subtitle {
            font-size: 1.125rem;
            color: #4b5563;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        @media (max-width: 768px) {
            .features-grid {
                grid-template-columns: 1fr;
            }
        }
        .feature-card {
            background-color: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            transition: all 200ms ease;
            display: flex;
            gap: 1rem;
        }
        .feature-card:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }
        .feature-icon {
            width: 2.5rem;
            height: 2.5rem;
            background: linear-gradient(135deg, #ede9fe 0%, #f3e8ff 100%);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #a855f7;
            margin-top: 0.25rem;
        }
        .feature-icon svg {
            width: 1.5rem;
            height: 1.5rem;
            stroke-width: 2;
        }
        .feature-content {
            flex: 1;
        }
        .feature-title {
            font-size: 1rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 0.5rem;
        }
        .feature-description {
            font-size: 0.875rem;
            color: #4b5563;
            line-height: 1.625;
        }
        /* Service Coverage Section */
        .coverage-section {
            margin-bottom: 5rem;
        }
        .coverage-header {
            margin-bottom: 3rem;
        }
        .coverage-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 0.75rem;
        }
        .coverage-subtitle {
            font-size: 1.125rem;
            color: #4b5563;
        }
        .barangays-container {
            background-color: white;
            border-radius: 0.75rem;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }
        .barangays-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
        }
        @media (max-width: 768px) {
            .barangays-grid {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            }
        }
        .barangay-badge {
            background: linear-gradient(135deg, #ede9fe 0%, #f3e8ff 100%);
            border: 1px solid #ddd6fe;
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            text-align: center;
            color: #7c3aed;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 200ms ease;
        }
        .barangay-badge:hover {
            box-shadow: 0 4px 8px rgba(124, 58, 237, 0.2);
            transform: translateY(-2px);
        }
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
            border-radius: 1rem;
            padding: 3rem 2rem;
            text-align: center;
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.3);
        }
        .cta-title {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
        }
        @media (max-width: 768px) {
            .cta-title {
                font-size: 1.5rem;
            }
        }
        .cta-subtitle {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            max-width: 42rem;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.625;
        }
        .cta-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }
        .cta-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.875rem 2rem;
            border-radius: 0.5rem;
            background-color: white;
            border: 2px solid white;
            color: #7c3aed;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 200ms ease;
            text-decoration: none;
        }
        .cta-button:hover {
            background-color: transparent;
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .cta-button:active {
            transform: translateY(0);
        }
        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, #6d28d9 0%, #7c3aed 100%);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 5rem;
            padding: 3rem 0;
        }
        .footer-content {
            max-width: 80rem;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        @media (max-width: 768px) {
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
        .footer-section {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .footer-brand {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .footer-brand-title {
            font-size: 1rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
        }
        .footer-brand-description {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.8);
        }
        .footer-section-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.75rem;
        }
        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-link {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 200ms ease;
        }
        .footer-link:hover {
            color: white;
            padding-left: 0.25rem;
        }
        .footer-divider {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            height: 1px;
            margin: 2rem 0;
        }
        .footer-copyright {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.7);
            text-align: center;
        }
    </style>
</head>
<body class="min-h-screen text-slate-900 antialiased">
    <!-- Professional Header with Gradient -->
    <header class="sticky top-0 z-50 backdrop-blur-xl bg-white border-b border-purple-200/30 shadow-sm">
        <div class="mx-auto max-w-7xl px-6 py-4">
            <!-- Header Navigation -->
            <div class="flex items-center justify-between">
                <!-- Logo Section (Left) -->
                <div class="flex flex-row items-center gap-4">
                    <a href="{{ route('home') }}" class="inline-block">
                        <h1 class="text-2xl font-bold gradient-text leading-none">DARTS</h1>
                    </a>
                    <p class="text-xs text-slate-500 font-medium tracking-wide logo-subtitle">Digital Access & Request Tracking Service</p>
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
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3 class="footer-brand-title">DARTS</h3>
                    <p class="footer-brand-description">Digital Access & Request Tracking Service</p>
                </div>
                <div class="footer-section">
                    <h4 class="footer-section-title">Product</h4>
                    <ul class="footer-links">
                        <li><a href="#" class="footer-link">Features</a></li>
                        <li><a href="#" class="footer-link">Services</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4 class="footer-section-title">Company</h4>
                    <ul class="footer-links">
                        <li><a href="#" class="footer-link">About</a></li>
                        <li><a href="#" class="footer-link">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4 class="footer-section-title">Legal</h4>
                    <ul class="footer-links">
                        <li><a href="#" class="footer-link">Privacy</a></li>
                        <li><a href="#" class="footer-link">Terms</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-divider"></div>
            <p class="footer-copyright">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>
