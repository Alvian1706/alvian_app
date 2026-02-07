@extends('layout.app')

@section('title', 'Home - Portfolio Alvian')

@section('styles')
<style>
    .hero-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 2rem 0;
        position: relative;
        overflow: hidden;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .hero-subtitle {
        color: var(--accent-primary);
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1rem;
        opacity: 0;
        animation: slideInLeft 0.8s ease forwards 0.3s;
    }
    
    .hero-title {
        font-size: 5rem;
        font-weight: 900;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, var(--text-dark) 0%, var(--accent-primary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        opacity: 0;
        animation: slideInLeft 0.8s ease forwards 0.5s;
    }
    
    .hero-description {
        font-size: 1.3rem;
        color: var(--text-secondary);
        margin-bottom: 2.5rem;
        max-width: 600px;
        line-height: 1.8;
        opacity: 0;
        animation: slideInLeft 0.8s ease forwards 0.7s;
    }
    
    .btn-custom {
        padding: 1rem 2.5rem;
        font-weight: 600;
        border-radius: 50px;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-right: 1rem;
        margin-bottom: 1rem;
    }
    
    .btn-primary-custom {
        background: var(--accent-primary);
        color: white;
        opacity: 0;
        animation: slideInLeft 0.8s ease forwards 0.9s;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
    }
    
    .btn-primary-custom:hover {
        background: var(--accent-secondary);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(236, 72, 153, 0.4);
        color: white;
    }
    
    .btn-outline-custom {
        background: transparent;
        color: var(--accent-primary);
        border: 2px solid var(--accent-primary);
        opacity: 0;
        animation: slideInLeft 0.8s ease forwards 1s;
    }
    
    .btn-outline-custom:hover {
        background: var(--accent-primary);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
        color: white;
        border-color: var(--accent-primary);
    }
    
    .hero-image {
        position: relative;
        opacity: 0;
        animation: fadeInRight 1s ease forwards 0.5s;
    }
    
    .floating-shape {
        position: absolute;
        animation: float 6s ease-in-out infinite;
    }
    
    .shape-1 {
        top: 10%;
        right: 20%;
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        animation-delay: 0s;
        opacity: 0.15;
    }
    
    .shape-2 {
        bottom: 20%;
        right: 10%;
        width: 150px;
        height: 150px;
        background: linear-gradient(135deg, #ec4899 0%, #f97316 100%);
        border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%;
        animation-delay: 1s;
        opacity: 0.15;
    }
    
    .shape-3 {
        top: 40%;
        right: 5%;
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #f59e0b 0%, #eab308 100%);
        border-radius: 50%;
        animation-delay: 2s;
        opacity: 0.15;
    }
    
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0) rotate(0deg);
        }
        50% {
            transform: translateY(-30px) rotate(10deg);
        }
    }
    
    /* Features Section */
    .features-section {
        padding: 5rem 0;
    }
    
    .section-title {
        font-size: 3rem;
        font-weight: 900;
        text-align: center;
        margin-bottom: 1rem;
        color: var(--text-dark);
    }
    
    .section-subtitle {
        text-align: center;
        color: var(--text-secondary);
        font-size: 1.2rem;
        margin-bottom: 4rem;
    }
    
    .feature-card {
        background: white;
        border: 2px solid var(--border-color);
        border-radius: 20px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(99, 102, 241, 0.15);
        border-color: var(--accent-primary);
    }
    
    .feature-card:hover::before {
        opacity: 1;
    }
    
    .feature-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .feature-icon {
        transform: scale(1.1) rotate(5deg);
    }
    
    .feature-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--text-dark);
    }
    
    .feature-description {
        color: var(--text-secondary);
        line-height: 1.8;
    }
    
    /* Stats Section */
    .stats-section {
        padding: 4rem 0;
        background: white;
        margin: 3rem 0;
        border-top: 2px solid var(--border-color);
        border-bottom: 2px solid var(--border-color);
    }
    
    .stat-item {
        text-align: center;
        padding: 2rem;
    }
    
    .stat-number {
        font-size: 3.5rem;
        font-weight: 900;
        background: var(--gradient-1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-family: 'Playfair Display', serif;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        color: var(--text-secondary);
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 600;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 3rem;
        }
        
        .hero-description {
            font-size: 1.1rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .btn-custom {
            padding: 0.8rem 2rem;
            font-size: 0.9rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-content">
                    <div class="hero-subtitle">👋 Halo, Selamat Datang</div>
                    <h1 class="hero-title">Saya Alvian<br>Seorang Creative Developer</h1>
                    <p class="hero-description">
                        Mengubah ide menjadi pengalaman digital yang indah dan fungsional. 
                        Spesialisasi dalam pengembangan web modern dengan fokus pada desain yang user-friendly.
                    </p>
                    <div>
                        <a href="{{ url('/projects') }}" class="btn-custom btn-primary-custom">Lihat Proyek</a>
                        <a href="{{ url('/contact') }}" class="btn-custom btn-outline-custom">Hubungi Saya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-image">
                    <!-- Decorative shapes -->
                    <div class="floating-shape shape-1"></div>
                    <div class="floating-shape shape-2"></div>
                    <div class="floating-shape shape-3"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6">
                <div class="stat-item fade-in">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Projects</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item fade-in">
                    <div class="stat-number">30+</div>
                    <div class="stat-label">Clients</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item fade-in">
                    <div class="stat-number">2+</div>
                    <div class="stat-label">Years</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item fade-in">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Satisfaction</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <h2 class="section-title fade-in">Apa yang Saya Tawarkan</h2>
        <p class="section-subtitle fade-in">Layanan profesional untuk kebutuhan digital Anda</p>
        
        <div class="row">
            <div class="col-md-4">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="feature-title">Web Development</h3>
                    <p class="feature-description">
                        Membangun website modern dan responsif menggunakan teknologi terkini 
                        seperti Laravel, React, dan Vue.js untuk memberikan pengalaman terbaik.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3 class="feature-title">UI/UX Design</h3>
                    <p class="feature-description">
                        Menciptakan desain interface yang menarik, intuitif, dan user-friendly 
                        dengan memperhatikan setiap detail untuk pengalaman pengguna yang optimal.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="feature-title">Responsive Design</h3>
                    <p class="feature-description">
                        Memastikan website Anda terlihat sempurna di semua perangkat, 
                        dari smartphone hingga desktop dengan pendekatan mobile-first.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3 class="feature-title">Backend Development</h3>
                    <p class="feature-description">
                        Mengembangkan sistem backend yang robust dan scalable dengan 
                        arsitektur yang solid untuk mendukung aplikasi Anda.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="feature-title">Performance</h3>
                    <p class="feature-description">
                        Optimasi performa website untuk loading time yang cepat dan 
                        pengalaman browsing yang smooth tanpa hambatan.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="feature-title">Support & Maintenance</h3>
                    <p class="feature-description">
                        Memberikan dukungan teknis dan maintenance berkelanjutan untuk 
                        memastikan website Anda selalu dalam kondisi terbaik.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.fade-in').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.8s ease';
        observer.observe(el);
    });
</script>
@endsection