<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>@yield('title', 'MEA Detailing')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js'></script>
    @yield('styles')
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>

    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Modern Navbar -->
    <nav class="modern-navbar" id="mainNav">
        <div class="navbar-container">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="navbar-logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="MEA Detailing Logo">
                <span class="logo-text">MEA Detailing</span>
            </a>

            <!-- Desktop Navigation -->
            <div class="navbar-menu">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <a href="{{ route('services') }}" class="nav-link">
                    <i class="fas fa-car"></i>
                    <span>Services</span>
                </a>
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="fas fa-info-circle"></i>
                    <span>Over Ons</span>
                </a>
                <a href="{{ route('contact') }}" class="nav-link">
                    <i class="fas fa-envelope"></i>
                    <span>Contact</span>
                </a>
                <a href="{{ route('book') }}" class="nav-link nav-cta">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Boek Nu</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Mobile Nav Overlay -->
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>

    <div class="container">
        @yield('content')
    </div>

    <footer class="footer">
        <div class="footer-content">
            <p>© 2024 Car Wash Detailing. Alle rechten voorbehouden.</p>
            <p>MEA Detailing</p>
            <p>Telefoon: +32 487 905 165</p>
            <p>E-mail: <a href="mailto:clean.your.carr2023@gmail.com">clean.your.carr2023@gmail.com</a></p>
            <p>BTW: BE 0805.672.003</p>
        </div>
    </footer>

    <style>
        /* Modern Navbar */
        .modern-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.98) 0%, rgba(0, 0, 0, 0.95) 100%);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(232, 213, 183, 0.2);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
        }

        /* Logo */
        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .navbar-logo:hover {
            transform: translateY(-2px);
        }

        .navbar-logo img {
            height: 50px;
            width: auto;
            object-fit: contain;
        }

        .logo-text {
            color: #E8D5B7;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-shadow: 0 0 15px rgba(232, 213, 183, 0.3);
        }

        /* Navigation Menu */
        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            color: #E8D5B7;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(232, 213, 183, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link i {
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .nav-link:hover {
            color: #F5E6D3;
            background-color: rgba(232, 213, 183, 0.08);
            transform: translateY(-2px);
        }

        .nav-link:hover i {
            transform: scale(1.1);
        }

        .nav-link span {
            position: relative;
            z-index: 1;
        }

        /* CTA Button */
        .nav-cta {
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.2) 0%, rgba(212, 197, 169, 0.2) 100%);
            border: 1px solid rgba(232, 213, 183, 0.4);
            margin-left: 10px;
            font-weight: 600;
        }

        .nav-cta::before {
            display: none;
        }

        .nav-cta:hover {
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.3) 0%, rgba(212, 197, 169, 0.3) 100%);
            border-color: #E8D5B7;
            box-shadow: 0 4px 15px rgba(232, 213, 183, 0.3);
            transform: translateY(-3px);
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1002;
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.1) 0%, rgba(212, 197, 169, 0.1) 100%);
            border: 1px solid rgba(232, 213, 183, 0.3);
            color: #E8D5B7;
            width: 50px;
            height: 50px;
            border-radius: 10px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: all 0.3s ease;
            touch-action: manipulation;
            backdrop-filter: blur(10px);
        }

        .mobile-menu-toggle:hover,
        .mobile-menu-toggle:active {
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.2) 0%, rgba(212, 197, 169, 0.2) 100%);
            border-color: #E8D5B7;
            transform: scale(1.05);
        }

        .mobile-menu-toggle.active {
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.3) 0%, rgba(212, 197, 169, 0.3) 100%);
        }

        /* Mobile Nav Overlay */
        .mobile-nav-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .mobile-nav-overlay.active {
            opacity: 1;
        }

        /* Footer */
        .footer {
            background-color: #000000;
            color: #E8D5B7;
            padding: 20px;
            text-align: center;
            font-size: 0.9rem;
            border-top: 1px solid #E8D5B7;
        }

        .footer-content a {
            color: #E8D5B7;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-content a:hover {
            color: #F5E6D3;
            text-shadow: 0 0 10px rgba(232, 213, 183, 0.5);
        }

        /* Add padding to body to account for fixed navbar */
        body {
            padding-top: 80px;
        }

        /* Tablet Styles (768px - 1024px) */
        @media (max-width: 1024px) {
            .navbar-container {
                padding: 0 30px;
            }

            .logo-text {
                font-size: 1.3rem;
            }

            .nav-link {
                padding: 10px 15px;
                font-size: 0.9rem;
            }

            .nav-link span {
                display: none;
            }

            .nav-link i {
                font-size: 1.1rem;
            }
        }

        /* Mobile Styles (max-width: 768px) */
        @media (max-width: 768px) {
            body {
                padding-top: 70px;
            }

            .mobile-menu-toggle {
                display: flex;
            }

            .navbar-container {
                padding: 0 20px;
                height: 70px;
            }

            .navbar-logo img {
                height: 40px;
            }

            .logo-text {
                font-size: 1.2rem;
            }

            .navbar-menu {
                position: fixed;
                top: 70px;
                left: -100%;
                width: 300px;
                height: calc(100vh - 70px);
                background: linear-gradient(180deg, rgba(0, 0, 0, 0.98) 0%, rgba(0, 0, 0, 0.95) 100%);
                backdrop-filter: blur(10px);
                flex-direction: column;
                align-items: flex-start;
                padding: 30px 0;
                border-right: 1px solid rgba(232, 213, 183, 0.2);
                box-shadow: 4px 0 20px rgba(0, 0, 0, 0.5);
                transition: left 0.3s ease;
                z-index: 1001;
                overflow-y: auto;
            }

            .navbar-menu.active {
                left: 0;
            }

            .nav-link {
                width: 100%;
                padding: 18px 30px;
                border-radius: 0;
                border-bottom: 1px solid rgba(232, 213, 183, 0.1);
                justify-content: flex-start;
            }

            .nav-link span {
                display: inline;
            }

            .nav-link:hover {
                background-color: rgba(232, 213, 183, 0.1);
                transform: translateX(5px);
            }

            .nav-cta {
                margin-left: 0;
                margin-top: 10px;
                border-radius: 8px;
                margin-left: 30px;
                margin-right: 30px;
                width: calc(100% - 60px);
            }

            .mobile-nav-overlay {
                display: block;
            }
        }

        /* Small Mobile Styles (max-width: 480px) */
        @media (max-width: 480px) {
            body {
                padding-top: 65px;
            }

            .mobile-menu-toggle {
                width: 45px;
                height: 45px;
                font-size: 1.3rem;
                top: 12px;
                right: 12px;
            }

            .navbar-container {
                padding: 0 15px;
                height: 65px;
            }

            .navbar-logo img {
                height: 35px;
            }

            .logo-text {
                font-size: 1rem;
            }

            .navbar-menu {
                width: 100%;
                max-width: 320px;
                top: 65px;
                height: calc(100vh - 65px);
            }

            .nav-link {
                padding: 15px 20px;
                font-size: 0.9rem;
            }
        }

        /* Extra Small Mobile (max-width: 360px) */
        @media (max-width: 360px) {
            .logo-text {
                font-size: 0.9rem;
            }

            .nav-link {
                padding: 12px 15px;
                font-size: 0.85rem;
            }
        }
    </style>

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const navbarMenu = document.querySelector('.navbar-menu');
            const mobileNavOverlay = document.getElementById('mobileNavOverlay');

            function toggleMobileMenu() {
                navbarMenu.classList.toggle('active');
                mobileNavOverlay.classList.toggle('active');
                mobileMenuToggle.classList.toggle('active');

                const icon = mobileMenuToggle.querySelector('i');
                if (navbarMenu.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            }

            if (mobileMenuToggle) {
                mobileMenuToggle.addEventListener('click', toggleMobileMenu);
            }

            if (mobileNavOverlay) {
                mobileNavOverlay.addEventListener('click', toggleMobileMenu);
            }

            // Close menu when clicking a link on mobile
            if (window.innerWidth <= 768) {
                const navLinks = document.querySelectorAll('.navbar-menu .nav-link');
                navLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        setTimeout(() => {
                            if (navbarMenu.classList.contains('active')) {
                                toggleMobileMenu();
                            }
                        }, 100);
                    });
                });
            }

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    navbarMenu.classList.remove('active');
                    mobileNavOverlay.classList.remove('active');
                    mobileMenuToggle.classList.remove('active');
                    const icon = mobileMenuToggle.querySelector('i');
                    if (icon) {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                }
            });

            // Navbar scroll effect
            let lastScroll = 0;
            const navbar = document.querySelector('.modern-navbar');
            
            window.addEventListener('scroll', function() {
                const currentScroll = window.pageYOffset;
                
                if (currentScroll <= 0) {
                    navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.5)';
                } else {
                    navbar.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.7)';
                }
                
                lastScroll = currentScroll;
            });
        });
    </script>

    @yield('scripts')
</body>
</html>
