@extends('layouts.layout')

@section('title', 'Welkom bij MEA Detailing - Premium Car Wash & Detailing')

@section('content')

    @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Hero Section with Background Video -->
    <section class="hero-section">
        <!-- Background Video -->
        <video autoplay muted loop playsinline id="backgroundVideo" class="hero-video">
            <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        
        <!-- Dark Overlay for better text readability -->
        <div class="hero-overlay"></div>
        
        <!-- Hero Content -->
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <span class="hero-title-main">MEA Detailing</span>
                    <span class="hero-title-sub">Premium Car Wash & Detailing</span>
                </h1>
                <p class="hero-description">
                    Geef uw voertuig de luxe behandeling die het verdient. 
                    Professionele auto detailing met aandacht voor elk detail.
                </p>
                <div class="hero-buttons">
                    <a href="{{ route('book') }}" class="btn btn-primary">
                        <i class="fas fa-calendar-alt"></i> Boek Nu
                    </a>
                    <a href="{{ route('services') }}" class="btn btn-secondary">
                        <i class="fas fa-car"></i> Onze Diensten
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Waarom Kiezen voor MEA Detailing?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Premium Kwaliteit</h3>
                    <p>Alleen de beste producten en technieken voor uw voertuig</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Flexibele Planning</h3>
                    <p>Boek uw afspraak wanneer het u uitkomt, van 16:00 tot 21:00</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Gegarandeerd Resultaat</h3>
                    <p>100% tevredenheid of uw geld terug</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>Professioneel Team</h3>
                    <p>Ervaren specialisten met jarenlange expertise</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview Section -->
    <section class="services-preview-section">
        <div class="container">
            <h2 class="section-title">Onze Diensten</h2>
            <div class="services-preview-grid">
                @php
                    $previewServices = isset($services) ? $services->take(3) : collect([]);
                @endphp
                @forelse($previewServices as $service)
                    <div class="service-preview-card">
                        <div class="service-preview-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <h3>{{ $service->name }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit($service->description ?? 'Premium service', 100) }}</p>
                        <div class="service-price">€{{ number_format($service->price ?? 0, 2, ',', '.') }}</div>
                        <a href="{{ route('book') }}" class="btn btn-outline">Boek Nu</a>
                    </div>
                @empty
                    <div class="service-preview-card">
                        <div class="service-preview-icon">
                            <i class="fas fa-spray-can"></i>
                        </div>
                        <h3>Basis Wash</h3>
                        <p>Een grondige wasbeurt voor uw voertuig</p>
                        <div class="service-price">€25.00</div>
                        <a href="{{ route('book') }}" class="btn btn-outline">Boek Nu</a>
                    </div>
                    <div class="service-preview-card">
                        <div class="service-preview-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h3>Premium Detailing</h3>
                        <p>Complete detailing behandeling met wax en polish</p>
                        <div class="service-price">€75.00</div>
                        <a href="{{ route('book') }}" class="btn btn-outline">Boek Nu</a>
                    </div>
                    <div class="service-preview-card">
                        <div class="service-preview-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <h3>VIP Treatment</h3>
                        <p>Ultieme luxe behandeling voor de perfecte glans</p>
                        <div class="service-price">€150.00</div>
                        <a href="{{ route('book') }}" class="btn btn-outline">Boek Nu</a>
                    </div>
                @endforelse
            </div>
            <div class="text-center" style="margin-top: 40px;">
                <a href="{{ route('services') }}" class="btn btn-primary">
                    Bekijk Alle Diensten <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Klaar om uw Auto te Laten Glanzen?</h2>
                <p>Boek vandaag nog uw afspraak en ervaar het verschil</p>
                <a href="{{ route('book') }}" class="btn btn-primary btn-large">
                    <i class="fas fa-calendar-check"></i> Reserveer Nu
                </a>
            </div>
        </div>
    </section>

@endsection

@section('styles')
<style>
    /* Hero Section Styles */
    .hero-section {
        position: relative;
        width: 100%;
        height: 100vh;
        min-height: 600px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .hero-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        z-index: 1;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            135deg,
            rgba(0, 0, 0, 0.7) 0%,
            rgba(0, 0, 0, 0.5) 50%,
            rgba(0, 0, 0, 0.7) 100%
        );
        z-index: 2;
    }

    .hero-content {
        position: relative;
        z-index: 3;
        text-align: center;
        padding: 40px 20px;
        max-width: 900px;
        margin: 0 auto;
        animation: fadeInUp 1s ease-out;
    }

    .hero-title {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom: 30px;
    }

    .hero-title-main {
        font-size: 4.5rem;
        font-weight: 700;
        color: #E8D5B7;
        text-shadow: 0 0 30px rgba(232, 213, 183, 0.5),
                     0 0 60px rgba(232, 213, 183, 0.3),
                     2px 2px 4px rgba(0, 0, 0, 0.8);
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .hero-title-sub {
        font-size: 1.8rem;
        font-weight: 400;
        color: #E8D5B7;
        text-shadow: 0 0 20px rgba(232, 213, 183, 0.4),
                     1px 1px 3px rgba(0, 0, 0, 0.8);
        letter-spacing: 2px;
    }

    .hero-description {
        font-size: 1.3rem;
        color: #e8e8e8;
        line-height: 1.8;
        margin-bottom: 40px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
    }

    .hero-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        padding: 15px 35px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        border: 2px solid transparent;
        cursor: pointer;
    }

    .btn-primary {
        background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%);
        color: #000000;
        border-color: #E8D5B7;
        box-shadow: 0 4px 15px rgba(232, 213, 183, 0.4);
        font-weight: 700;
        text-shadow: none;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(232, 213, 183, 0.6);
        background: linear-gradient(135deg, #F5E6D3 0%, #E8D5B7 100%);
        color: #000000;
    }

    .btn-secondary {
        background-color: rgba(0, 0, 0, 0.6);
        color: #E8D5B7;
        border: 2px solid #E8D5B7;
        box-shadow: 0 4px 15px rgba(232, 213, 183, 0.2);
        font-weight: 600;
        backdrop-filter: blur(10px);
    }

    .btn-secondary:hover {
        background-color: rgba(232, 213, 183, 0.15);
        color: #F5E6D3;
        border-color: #F5E6D3;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(232, 213, 183, 0.4);
    }

    .btn-large {
        padding: 18px 45px;
        font-size: 1.2rem;
    }

    .btn-outline {
        background-color: rgba(0, 0, 0, 0.5);
        color: #E8D5B7;
        border: 2px solid #E8D5B7;
        padding: 10px 25px;
        font-size: 0.95rem;
        font-weight: 600;
        backdrop-filter: blur(10px);
    }

    .btn-outline:hover {
        background-color: rgba(232, 213, 183, 0.15);
        color: #F5E6D3;
        border-color: #F5E6D3;
        transform: translateY(-2px);
    }

    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 3;
        color: #E8D5B7;
        font-size: 2rem;
        animation: bounce 2s infinite;
        cursor: pointer;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateX(-50%) translateY(0);
        }
        40% {
            transform: translateX(-50%) translateY(-10px);
        }
        60% {
            transform: translateX(-50%) translateY(-5px);
        }
    }

    /* Features Section */
    .features-section {
        padding: 80px 20px;
        background-color: #000000;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        color: #E8D5B7;
        margin-bottom: 50px;
        font-weight: 700;
        text-shadow: 0 0 20px rgba(232, 213, 183, 0.3);
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .feature-card {
        background-color: #111111;
        padding: 40px 30px;
        border-radius: 12px;
        border: 1px solid rgba(232, 213, 183, 0.3);
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(232, 213, 183, 0.1);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        border-color: #E8D5B7;
        box-shadow: 0 8px 20px rgba(232, 213, 183, 0.3);
    }

    .feature-icon {
        font-size: 3rem;
        color: #E8D5B7;
        margin-bottom: 20px;
    }

    .feature-card h3 {
        color: #E8D5B7;
        font-size: 1.5rem;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .feature-card p {
        color: #e8e8e8;
        line-height: 1.6;
        font-size: 1rem;
    }

    /* Services Preview Section */
    .services-preview-section {
        padding: 80px 20px;
        background: linear-gradient(180deg, #000000 0%, #111111 100%);
    }

    .services-preview-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .service-preview-card {
        background-color: #111111;
        padding: 40px 30px;
        border-radius: 12px;
        border: 1px solid rgba(232, 213, 183, 0.3);
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(232, 213, 183, 0.1);
    }

    .service-preview-card:hover {
        transform: translateY(-10px);
        border-color: #E8D5B7;
        box-shadow: 0 8px 20px rgba(232, 213, 183, 0.3);
    }

    .service-preview-icon {
        font-size: 3.5rem;
        color: #E8D5B7;
        margin-bottom: 20px;
    }

    .service-preview-card h3 {
        color: #E8D5B7;
        font-size: 1.6rem;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .service-preview-card p {
        color: #e8e8e8;
        line-height: 1.6;
        margin-bottom: 20px;
        font-size: 1rem;
    }

    .service-price {
        font-size: 2rem;
        color: #E8D5B7;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 0 0 15px rgba(232, 213, 183, 0.3);
    }

    /* CTA Section */
    .cta-section {
        padding: 80px 20px;
        background: linear-gradient(135deg, rgba(232, 213, 183, 0.1) 0%, rgba(0, 0, 0, 0.9) 100%);
        border-top: 2px solid rgba(232, 213, 183, 0.3);
    }

    .cta-content {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .cta-content h2 {
        font-size: 2.5rem;
        color: #E8D5B7;
        margin-bottom: 20px;
        font-weight: 700;
        text-shadow: 0 0 20px rgba(232, 213, 183, 0.3);
    }

    .cta-content p {
        font-size: 1.3rem;
        color: #e8e8e8;
        margin-bottom: 40px;
        line-height: 1.8;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .hero-title-main {
            font-size: 3.5rem;
        }

        .hero-title-sub {
            font-size: 1.5rem;
        }

        .hero-description {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            min-height: 500px;
        }

        .hero-title-main {
            font-size: 2.5rem;
            letter-spacing: 2px;
        }

        .hero-title-sub {
            font-size: 1.2rem;
        }

        .hero-description {
            font-size: 1rem;
            margin-bottom: 30px;
        }

        .hero-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }

        .section-title {
            font-size: 2rem;
        }

        .features-grid,
        .services-preview-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .feature-card,
        .service-preview-card {
            padding: 30px 20px;
        }

        .cta-content h2 {
            font-size: 2rem;
        }

        .cta-content p {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 480px) {
        .hero-section {
            min-height: 400px;
        }

        .hero-title-main {
            font-size: 2rem;
        }

        .hero-title-sub {
            font-size: 1rem;
        }

        .hero-description {
            font-size: 0.9rem;
        }

        .btn {
            padding: 12px 25px;
            font-size: 1rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .feature-card,
        .service-preview-card {
            padding: 25px 15px;
        }

        .feature-icon,
        .service-preview-icon {
            font-size: 2.5rem;
        }

        .service-price {
            font-size: 1.5rem;
        }
    }

    /* Video Loading State */
    .hero-video.loading {
        opacity: 0;
    }

    .hero-video.loaded {
        opacity: 1;
        transition: opacity 0.5s ease;
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.getElementById('backgroundVideo');
        
        // Ensure video plays
        if (video) {
            video.addEventListener('loadeddata', function() {
                video.classList.add('loaded');
                video.classList.remove('loading');
                video.play().catch(function(error) {
                    console.log('Video autoplay prevented:', error);
                });
            });
            
            video.classList.add('loading');
            
            // Fallback: try to play after a short delay
            setTimeout(function() {
                video.play().catch(function(error) {
                    console.log('Video play attempt:', error);
                });
            }, 100);
        }
        
        // Smooth scroll for scroll indicator
        const scrollIndicator = document.querySelector('.scroll-indicator');
        if (scrollIndicator) {
            scrollIndicator.addEventListener('click', function() {
                window.scrollTo({
                    top: window.innerHeight,
                    behavior: 'smooth'
                });
            });
        }
    });
</script>
@endsection
