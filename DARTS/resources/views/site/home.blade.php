@extends('layouts.public')

@section('content')
    <!-- Hero Section -->
    <section class="hero-container">
        <!-- Title (Black, Big, Slightly Left) -->
        <h1 class="hero-title">
            Welcome to DARTS
        </h1>
        
        <!-- Subtitle (Dark Purple, Smaller, Slightly Right) -->
        <p class="hero-subtitle">
            Digital Access and Request Tracking Service - Simplifying barangay service requests for residents across pilot municipalities.
        </p>
        
        <!-- Buttons (Centered, Row) -->
        <div class="hero-buttons">
            <a href="{{ route('services.index') }}" class="hero-button">
                Explore Services
            </a>
            @auth
                <a href="{{ route('resident.dashboard') }}" class="hero-button">
                    Dashboard
                </a>
            @else
                <a href="{{ route('register') }}" class="hero-button">
                    Register Now
                </a>
            @endauth
        </div>
    </section>

    <!-- Stats Cards Section -->
    <section class="stats-container">
        <!-- Card 1: Pilot Barangays -->
        <div class="stat-card">
            <h3 class="stat-card-title">Pilot Barangays</h3>
            <p class="stat-card-number">10</p>
            <p class="stat-card-subtitle">Active service coverage</p>
        </div>
        
        <!-- Card 2: Services -->
        <div class="stat-card">
            <h3 class="stat-card-title">Services</h3>
            <p class="stat-card-number">6</p>
            <p class="stat-card-subtitle">Available services</p>
        </div>
        
        <!-- Card 3: Portal Spaces -->
        <div class="stat-card">
            <h3 class="stat-card-title">Portal Spaces</h3>
            <p class="stat-card-number">3</p>
            <p class="stat-card-subtitle">Public • Resident • Admin</p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="features-header">
            <h2 class="features-title">Key Features</h2>
            <p class="features-subtitle">Comprehensive tools for resident service requests</p>
        </div>

        <div class="features-grid">
            <!-- Feature 1 -->
            <div class="feature-card">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">Resident Access</h3>
                    <p class="feature-description">
                        Complete profiles with dashboard, notifications, and request history tracking.
                    </p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="feature-card">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">Document Services</h3>
                    <p class="feature-description">
                        Streamlined processing for clearance, residency, indigency certificates.
                    </p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="feature-card">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">Assistance Services</h3>
                    <p class="feature-description">
                        Medical and educational assistance programs aligned with government support.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Coverage Section -->
    <section class="coverage-section">
        <div class="coverage-header">
            <h2 class="coverage-title">Service Coverage</h2>
            <p class="coverage-subtitle">Our pilot barangays across the municipality</p>
        </div>

        <div class="barangays-container">
            <div class="barangays-grid">
                <div class="barangay-badge">Poblacion</div>
                <div class="barangay-badge">Lumbo</div>
                <div class="barangay-badge">Batangan</div>
                <div class="barangay-badge">Bagontaas</div>
                <div class="barangay-badge">Banlag</div>
                <div class="barangay-badge">Lurogan</div>
                <div class="barangay-badge">Tongantongan</div>
                <div class="barangay-badge">Guinoyuran</div>
                <div class="barangay-badge">Lilingayon</div>
                <div class="barangay-badge">Sinayawan</div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2 class="cta-title">Ready to Get Started?</h2>
        <p class="cta-subtitle">
            Join thousands of residents already using DARTS to request and track barangay services effortlessly.
        </p>
        <div class="cta-buttons">
            @auth
                <a href="{{ route('resident.dashboard') }}" class="cta-button">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('register') }}" class="cta-button">
                    Create Account
                </a>
                <a href="{{ route('login') }}" class="cta-button">
                    Sign In
                </a>
            @endauth
        </div>
    </section>
@endsection
