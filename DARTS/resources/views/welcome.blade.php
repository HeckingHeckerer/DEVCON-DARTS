<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/landing.css', 'resources/js/app.js'])
        @else
            <!-- Landing page CSS will be loaded from resources/css/landing.css -->
        @endif

        <style>
            /* Landing Page Stylesheet - Embedded Fallback */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Poppins', sans-serif;
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            /* ===== HEADER STYLES ===== */
            .header-container {
                background-color: #ffffff;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                position: sticky;
                top: 0;
                z-index: 1000;
            }

            .header-content {
                display: flex;
                align-items: center;
                justify-content: space-between;
                max-width: 1400px;
                margin: 0 auto;
                padding: 1rem 2rem;
                gap: 2rem;
            }

            /* Logo Section (Left) */
            .logo-section {
                display: flex;
                gap: 1rem;
                flex: 0 0 auto;
                align-items: center;
                min-width: 200px;
            }

            .logo-1 {
                width: 80px;
                height: 80px;
                flex-shrink: 0;
                object-fit: contain;
            }

            .logo-2 {
                max-width: 150px;
                height: 80px;
                flex-shrink: 0;
                object-fit: contain;
            }

            /* Navigation Links (Middle) */
            .nav-links {
                display: flex;
                gap: 2rem;
                flex: 1;
                justify-content: center;
            }

            .nav-link {
                text-decoration: none;
                color: #333333;
                font-weight: 500;
                font-size: 1rem;
                transition: color 0.3s ease;
                position: relative;
            }

            .nav-link::after {
                content: '';
                position: absolute;
                bottom: -5px;
                left: 0;
                width: 0;
                height: 2px;
                background: #667eea;
                transition: width 0.3s ease;
            }

            .nav-link:hover {
                color: #667eea;
            }

            .nav-link:hover::after {
                width: 100%;
            }

            .login-section {
                flex: 0 0 auto;
                display: flex;
                gap: 1rem;
                align-items: center;
            }

            .login-btn {
                background: #ffffff;
                color: #000000;
                padding: 0.75rem 1.5rem;
                border: 2px solid #000000;
                border-radius: 6px;
                text-decoration: none;
                font-weight: 600;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: inline-block;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            }

            .login-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            }

            .register-btn {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: #ffffff;
                padding: 0.75rem 1.5rem;
                border-radius: 6px;
                text-decoration: none;
                font-weight: 600;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: inline-block;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            }

            .register-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            }

            /* ===== MAIN BODY STYLES ===== */
            .main-body {
                flex: 1;
                background: linear-gradient(180deg, #4C1CD2 0%, #ffffff 20%);
                padding: 3rem 2rem;
                min-height: 100vh;
            }

            .body-content {
                max-width: 1000px;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                gap: 2rem;
            }

            /* Hero Section */
            .hero-section {
                text-align: center;
                color: white;
                padding: 4rem 2rem; /* EDIT THIS TO ADJUST VERTICAL HEIGHT */
            }

            .hero-title {
                font-size: 4rem; /* INCREASED SIZE - EDIT TO ADJUST TITLE SIZE */
                font-weight: 700;
                margin-bottom: 2rem;
                line-height: 1.2;
            }

            .hero-title.left-aligned {
                text-align: left;
                margin-left: 2rem; /* EDIT TO MOVE LEFT/RIGHT */
                text-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            }

            .serving-text {
                color: #ffffff;
            }

            .city-text {
                color: #f4d789;
            }

            .hero-subtitle {
                font-size: 4rem; /* SAME SIZE AS TITLE - EDIT TO ADJUST */
                color: #5a3a7a;
                font-weight: 600;
                margin-bottom: 3rem;
                text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            }

            .hero-subtitle.right-aligned {
                text-align: right;
                margin-right: 4rem; /* EDIT TO MOVE LEFT/RIGHT */
            }

            .action-buttons {
                display: flex;
                gap: 1.5rem; /* EDIT TO ADJUST BUTTON GAP */
                justify-content: center;
                align-items: center;
                margin-top: 2rem; /* EDIT TO MOVE BUTTONS UP/DOWN */
            }

            .btn-primary {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: #ffffff;
                padding: 1rem 2rem; /* EDIT TO ADJUST BUTTON PADDING */
                border-radius: 6px;
                text-decoration: none;
                font-weight: 600;
                font-size: 1rem;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: inline-block;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            }

            .btn-primary:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            }

            .btn-secondary {
                background: #ffffff;
                color: #000000;
                padding: 1rem 2rem; /* EDIT TO ADJUST BUTTON PADDING */
                border: 2px solid #000000;
                border-radius: 6px;
                text-decoration: none;
                font-weight: 600;
                font-size: 1rem;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: inline-block;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            }

            .btn-secondary:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            }

            /* What We Offer Section */
            .what-we-offer {
                margin-top: 6rem; /* BIG SPACE BELOW BUTTONS */
                padding: 2rem 0;
            }

            .what-we-offer-heading {
                color: #000000;
                font-size: 0.9rem;
                font-weight: 500;
                margin-bottom: 1rem;
                text-align: left;
            }

            .available-services-heading {
                color: #000000;
                font-size: 2.2rem;
                font-weight: 700;
                margin-left: 1.5rem; /* INDENT - EDIT TO ADJUST */
                margin-bottom: 1rem;
                text-align: left;
            }

            .service-description {
                color: #000000;
                font-size: 0.85rem;
                margin-left: 1.5rem; /* INDENT - EDIT TO ADJUST */
                margin-bottom: 3rem;
                text-align: left;
            }

            /* Certificate Services */
            .services-category {
                margin-bottom: 4rem;
            }

            .services-category-title {
                color: #000000;
                font-size: 1.15rem;
                font-weight: 600;
                text-align: center;
                margin-bottom: 2.5rem;
            }

            .cards-container {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 1.5rem;
                margin-bottom: 3rem;
            }

            .services-category:nth-child(3) .cards-container {
                grid-template-columns: repeat(2, 1fr);
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
                justify-items: center;
            }

            .service-card {
                background: #D8CDF6; /* MAGENTA COLOR - EDIT TO CHANGE */
                border-radius: 12px;
                padding: 1.8rem;
                text-align: center;
                box-shadow: 0 8px 20px rgba(233, 30, 140, 0.2);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .service-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 30px rgba(233, 30, 140, 0.3);
            }

            .card-image-placeholder {
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0.1) 100%);
                border-radius: 8px;
                margin: 0 auto 1rem;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2.5rem;
            }

            .card-title {
                color: #000000;
                font-size: 1.3rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
            }

            .card-subtitle {
                color: #000000;
                font-size: 0.9rem;
                margin-bottom: 1.5rem;
                line-height: 1.5;
            }

            .card-button {
                
                color: #000000;
                padding: 0.7rem 1.5rem;
                border: none;
                border-radius: 6px;
                font-weight: 600;
                font-size: 0.9rem;
                cursor: pointer;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-block;
            }

            .card-button:hover {
                background: #f0f0f0;
                transform: scale(1.05);
            }

            /* How It Works Section */
            .how-it-works {
                margin-top: 6rem;
                padding: 3rem 0;
            }

            .how-it-works-title {
                font-size: 2.5rem;
                font-weight: 700;
                color: #000000;
                text-align: center;
                margin-bottom: 1rem;
            }

            .how-it-works-subtitle {
                font-size: 1rem;
                color: #666666;
                text-align: center;
                margin-bottom: 3.5rem;
            }

            .steps-container {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 2rem;
                margin-bottom: 4rem;
            }

            .step-item {
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .step-icon {
                width: 70px;
                height: 70px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2rem;
                margin-bottom: 1rem;
            }

            .step-number {
                font-size: 1.2rem;
                font-weight: 700;
                color: #667eea;
                margin-bottom: 0.5rem;
            }

            .step-title {
                font-size: 1.2rem;
                font-weight: 700;
                color: #000000;
                margin-bottom: 0.8rem;
            }

            .step-description {
                font-size: 0.9rem;
                color: #666666;
                line-height: 1.5;
            }

            /* Barangays Served Section */
            .barangays-served {
                margin-top: 4rem;
                padding: 3rem 0;
                text-align: center;
            }

            .barangays-title {
                font-size: 2.2rem;
                font-weight: 700;
                color: #000000;
                margin-bottom: 1rem;
            }

            .barangays-subtitle {
                font-size: 0.95rem;
                color: #000000;
                margin-bottom: 2rem;
            }

            .barangays-list {
                display: flex;
                flex-wrap: wrap;
                gap: 0.8rem;
                justify-content: center;
                margin-top: 2rem;
            }

            .barangay-capsule {
                background: #ffffff;
                color: #000000;
                border: 2px solid #000000;
                padding: 0.7rem 1.4rem;
                border-radius: 25px;
                font-size: 0.85rem;
                font-weight: 500;
                display: inline-block;
                white-space: nowrap;
            }

            /* Content Sections */
            .content-section {
                background: white;
                padding: 2.5rem;
                border-radius: 12px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
                line-height: 1.8;
            }

            .content-section h2 {
                font-size: 1.8rem;
                color: #333333;
                margin-bottom: 1rem;
                font-weight: 600;
            }

            .content-section p {
                color: #666666;
                font-size: 1rem;
                line-height: 1.8;
            }

            /* ===== FOOTER STYLES ===== */
            .footer-container {
                background-color: #1a1a2e;
                color: #ffffff;
                padding: 3rem 2rem 1rem;
            }

            .footer-content {
                max-width: 1400px;
                margin: 0 auto;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 2rem;
                margin-bottom: 2rem;
            }

            .footer-section h4 {
                font-size: 1.1rem;
                margin-bottom: 1rem;
                color: #ffffff;
                font-weight: 600;
            }

            .footer-section ul {
                list-style: none;
            }

            .footer-section ul li {
                margin-bottom: 0.75rem;
            }

            .footer-section a {
                color: #cccccc;
                text-decoration: none;
                transition: color 0.3s ease;
                font-size: 0.9rem;
            }

            .footer-section a:hover {
                color: #667eea;
            }

            .footer-bottom {
                text-align: center;
                padding-top: 2rem;
                border-top: 1px solid #444444;
                color: #aaaaaa;
                font-size: 0.9rem;
            }

            /* ===== RESPONSIVE DESIGN ===== */
            @media (max-width: 768px) {
                .header-content {
                    flex-wrap: wrap;
                    padding: 1rem;
                    gap: 1rem;
                }

                .logo-section {
                    width: 100%;
                    order: 1;
                    justify-content: center;
                }

                .logo-1 {
                    width: 70px;
                    height: 70px;
                }

                .logo-2 {
                    max-width: 130px;
                    height: 70px;
                }

                .nav-links {
                    width: 100%;
                    order: 3;
                    gap: 1rem;
                    flex-wrap: wrap;
                    padding-top: 1rem;
                    border-top: 1px solid #eeeeee;
                }

                .login-section {
                    width: 100%;
                    order: 2;
                    text-align: center;
                }

                .hero-title {
                    font-size: 2.8rem;
                    margin-left: 1.5rem;
                }

                .hero-subtitle {
                    font-size: 2.8rem;
                    margin-right: 2rem;
                }

                .action-buttons {
                    flex-wrap: wrap;
                    gap: 1rem;
                }

                .btn-primary,
                .btn-secondary {
                    padding: 0.9rem 1.8rem;
                    font-size: 0.9rem;
                }

                .content-section {
                    padding: 1.5rem;
                }

                .content-section h2 {
                    font-size: 1.4rem;
                }

                .cards-container {
                    grid-template-columns: repeat(2, 1fr);
                }

                .services-category:nth-child(3) .cards-container {
                    grid-template-columns: repeat(2, 1fr);
                }

                .steps-container {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 1.5rem;
                }

                .how-it-works-title {
                    font-size: 2rem;
                }

                .barangays-title {
                    font-size: 1.8rem;
                }

                .barangay-capsule {
                    font-size: 0.8rem;
                    padding: 0.6rem 1.2rem;
                    gap: 0.6rem;
                }

                .footer-content {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 480px) {
                .header-content {
                    padding: 0.75rem;
                }

                .logo-1 {
                    width: 60px;
                    height: 60px;
                }

                .logo-2 {
                    max-width: 115px;
                    height: 60px;
                }

                .nav-links {
                    gap: 0.75rem;
                }

                .nav-link {
                    font-size: 0.9rem;
                }

                .hero-title {
                    font-size: 2rem;
                    margin-left: 1rem;
                }

                .hero-subtitle {
                    font-size: 2rem;
                    margin-right: 1rem;
                }

                .action-buttons {
                    flex-direction: column;
                    gap: 0.75rem;
                }

                .btn-primary,
                .btn-secondary {
                    padding: 0.8rem 1.5rem;
                    font-size: 0.85rem;
                    width: 100%;
                }

                .content-section {
                    padding: 1rem;
                }

                .cards-container {
                    grid-template-columns: 1fr;
                }

                .services-category:nth-child(3) .cards-container {
                    grid-template-columns: 1fr;
                    max-width: 100%;
                }

                .steps-container {
                    grid-template-columns: 1fr;
                    gap: 1.5rem;
                }

                .how-it-works-title {
                    font-size: 1.6rem;
                    margin-top: 3rem;
                }

                .how-it-works-subtitle {
                    font-size: 0.85rem;
                    margin-bottom: 2rem;
                }

                .step-item {
                    padding: 1rem;
                }

                .step-icon {
                    width: 60px;
                    height: 60px;
                    font-size: 1.8rem;
                }

                .barangays-title {
                    font-size: 1.4rem;
                }

                .barangays-subtitle {
                    font-size: 0.85rem;
                }

                .barangay-capsule {
                    font-size: 0.75rem;
                    padding: 0.5rem 1rem;
                    gap: 0.4rem;
                }

                .footer-content {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body style="margin: 0; padding: 0; font-family: 'Poppins', sans-serif;">
        <!-- ===== HEADER ===== -->
        <header class="header-container">
            <div class="header-content">
                <!-- Logo Area (Left) -->
                <div class="logo-section">
                    <img src="{{ asset('images/dart icon.png') }}" alt="Dart Icon" class="logo-1">
                    <img src="{{ asset('images/DARTS LOGO.png') }}" alt="DARTS Logo" class="logo-2">
                </div>

                <!-- Navigation (Middle) -->
                <nav class="nav-links">
                    <a href="#home" class="nav-link">Home</a>
                    <a href="#services" class="nav-link">Services</a>
                    <a href="#request" class="nav-link">Request</a>
                    <a href="#track" class="nav-link">Track</a>
                </nav>

                <!-- Login & Register Buttons (Right) -->
                <div class="login-section">
                    <a href="{{ route('login') }}" class="login-btn">Login</a>
                    <a href="{{ route('register') }}" class="register-btn">Register</a>
                </div>
            </div>
        </header>

        <!-- ===== BODY/MAIN CONTENT ===== -->
        <main class="main-body">
            <div class="body-content">
                <!-- Hero Section -->
                <section class="hero-section">
                    <h1 class="hero-title left-aligned"><span class="serving-text">Serving</span> <span class="city-text">Valencia City,</span></h1>
                    <p class="hero-subtitle right-aligned">One Request at a time.</p>
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="#" class="btn-primary">Get Started Free</a>
                        <a href="#" class="btn-secondary">See how it works</a>
                    </div>
                </section>

                <!-- What We Offer Section -->
                <section class="what-we-offer">
                    <p class="what-we-offer-heading">What we offer</p>
                    <h2 class="available-services-heading">Available Barangay Services</h2>
                    <p class="service-description">Select a service to get started. All requests are processed within 1-3 business days.</p>

                    <!-- Certificate Services -->
                    <div class="services-category">
                        <h3 class="services-category-title">Certificate Services</h3>
                        <div class="cards-container">
                            <!-- Card 1: Barangay Certificate -->
                            <div class="service-card">
                                <div class="card-image-placeholder">📄</div>
                                <h4 class="card-title">Barangay Certificate</h4>
                                <p class="card-subtitle">Official certificate of good standing from your barangay.</p>
                                <a href="#" class="card-button">Request Now</a>
                            </div>

                            <!-- Card 2: Certificate of Indigency -->
                            <div class="service-card">
                                <div class="card-image-placeholder">📋</div>
                                <h4 class="card-title">Certificate of Indigency</h4>
                                <p class="card-subtitle">Proof of eligibility for assistance programs.</p>
                                <a href="#" class="card-button">Request Now</a>
                            </div>

                            <!-- Card 3: Certificate of Residency -->
                            <div class="service-card">
                                <div class="card-image-placeholder">🏠</div>
                                <h4 class="card-title">Certificate of Residency</h4>
                                <p class="card-subtitle">Confirms your address within the barangay.</p>
                                <a href="#" class="card-button">Request Now</a>
                            </div>

                            <!-- Card 4: First-Time Job Seeker -->
                            <div class="service-card">
                                <div class="card-image-placeholder">💼</div>
                                <h4 class="card-title">First-Time Job Seeker</h4>
                                <p class="card-subtitle">For residents applying for their first job.</p>
                                <a href="#" class="card-button">Request Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- Assistance Services -->
                    <div class="services-category">
                        <h3 class="services-category-title">Assistance Services</h3>
                        <div class="cards-container">
                            <!-- Card 5: Educational Assistance -->
                            <div class="service-card">
                                <div class="card-image-placeholder">🎓</div>
                                <h4 class="card-title">Educational Assistance</h4>
                                <p class="card-subtitle">Financial support for your education needs.</p>
                                <a href="#" class="card-button">Request Now</a>
                            </div>

                            <!-- Card 6: Medical Assistance -->
                            <div class="service-card">
                                <div class="card-image-placeholder">⚕️</div>
                                <h4 class="card-title">Medical Assistance</h4>
                                <p class="card-subtitle">Financial aid for medical and hospital expenses.</p>
                                <a href="#" class="card-button">Request Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- How It Works Section -->
                    <div class="how-it-works">
                        <h2 class="how-it-works-title">How it works</h2>
                        <p class="how-it-works-subtitle">four simple steps to get your barangay documents</p>

                        <div class="steps-container">
                            <!-- Step 1 -->
                            <div class="step-item">
                                <div class="step-icon">📝</div>
                                <div class="step-number">Step 1</div>
                                <h3 class="step-title">Submit Online</h3>
                                <p class="step-description">Fill out the form and upload your documents from any device.</p>
                            </div>

                            <!-- Step 2 -->
                            <div class="step-item">
                                <div class="step-icon">👁️</div>
                                <div class="step-number">Step 2</div>
                                <h3 class="step-title">Track in Real-Time</h3>
                                <p class="step-description">Monitor your request status with real-time notifications</p>
                            </div>

                            <!-- Step 3 -->
                            <div class="step-item">
                                <div class="step-icon">🔔</div>
                                <div class="step-number">Step 3</div>
                                <h3 class="step-title">Get notified</h3>
                                <p class="step-description">Recieve updates via email and in-web notifications</p>
                            </div>

                            <!-- Step 4 -->
                            <div class="step-item">
                                <div class="step-icon">✅</div>
                                <div class="step-number">Step 4</div>
                                <h3 class="step-title">Claim your document</h3>
                                <p class="step-description">Pick up your signed document at the barangay hall.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Barangays Served Section -->
                    <div class="barangays-served">
                        <h2 class="barangays-title">31 Barangays Served</h2>
                        <p class="barangays-subtitle">Covering all barangays of Valencia City, Bukidnon.</p>
                        
                        <div class="barangays-list">
                            <span class="barangay-capsule">Bagontaas</span>
                            <span class="barangay-capsule">Banlag</span>
                            <span class="barangay-capsule">Barobo</span>
                            <span class="barangay-capsule">Batangan</span>
                            <span class="barangay-capsule">Catumbalon</span>
                            <span class="barangay-capsule">Colonia</span>
                            <span class="barangay-capsule">Concepcion</span>
                            <span class="barangay-capsule">Dagatkidavao</span>
                            <span class="barangay-capsule">Guinuyoran</span>
                            <span class="barangay-capsule">Kahapon</span>
                            <span class="barangay-capsule">Laligan</span>
                            <span class="barangay-capsule">Lilingayon</span>
                            <span class="barangay-capsule">Lourdes</span>
                            <span class="barangay-capsule">Lumbayao</span>
                            <span class="barangay-capsule">Lumbo</span>
                            <span class="barangay-capsule">Lurugan</span>
                            <span class="barangay-capsule">Maapag</span>
                            <span class="barangay-capsule">Mabuhay</span>
                            <span class="barangay-capsule">Mailag</span>
                            <span class="barangay-capsule">Mt. Nebo</span>
                            <span class="barangay-capsule">Nabag-o</span>
                            <span class="barangay-capsule">Pinatilaan</span>
                            <span class="barangay-capsule">Poblacion</span>
                            <span class="barangay-capsule">San Carlos</span>
                            <span class="barangay-capsule">San Isidro</span>
                            <span class="barangay-capsule">Sinabuagan</span>
                            <span class="barangay-capsule">Sinayawan</span>
                            <span class="barangay-capsule">Sugod</span>
                            <span class="barangay-capsule">Tongan-Tongan</span>
                            <span class="barangay-capsule">Tugaya</span>
                            <span class="barangay-capsule">Vintar</span>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <!-- ===== FOOTER ===== -->
        <footer class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>About</h4>
                    <ul>
                        <li><a href="#">Company Info</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Follow Us</h4>
                    <ul>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">LinkedIn</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
            </div>
        </footer>
    </body>
</html>
