<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portofolio Saya')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts - Kombinasi unik -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-light: #f8f9fa;
            --secondary-light: #ffffff;
            --accent-primary: #6366f1;
            --accent-secondary: #ec4899;
            --accent-tertiary: #f59e0b;
            --text-dark: #1e293b;
            --text-secondary: #475569;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --gradient-1: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            --gradient-2: linear-gradient(135deg, #ec4899 0%, #f97316 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--primary-light);
            color: var(--text-dark);
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }
        
        /* Animated Background */
        .bg-animated {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.4;
            background: 
                radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(236, 72, 153, 0.15) 0%, transparent 50%);
            animation: bgPulse 8s ease-in-out infinite;
        }
        
        @keyframes bgPulse {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.5; }
        }
        
        /* Navigation Styles */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1.2rem 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-bottom: 1px solid var(--border-color);
        }
        
        .navbar-custom.scrolled {
            padding: 0.8rem 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--text-dark) !important;
            letter-spacing: -1px;
            transition: all 0.3s ease;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .navbar-brand:hover {
            transform: translateY(-2px);
        }
        
        .nav-link {
            color: var(--text-secondary) !important;
            font-weight: 500;
            margin: 0 1rem;
            position: relative;
            transition: color 0.3s ease;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--accent-primary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover {
            color: var(--text-dark) !important;
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
        
        .nav-link.active {
            color: var(--accent-primary) !important;
            font-weight: 600;
        }
        
        /* Scroll to top button */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--accent-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.3);
        }
        
        .scroll-top.show {
            opacity: 1;
            visibility: visible;
        }
        
        .scroll-top:hover {
            background: var(--accent-secondary);
            transform: translateY(-5px);
            box-shadow: 0 6px 25px rgba(236, 72, 153, 0.4);
        }
        
        /* Footer */
        footer {
            background: var(--secondary-light);
            padding: 3rem 0 1rem;
            margin-top: 5rem;
            border-top: 2px solid var(--border-color);
        }
        
        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(99, 102, 241, 0.1);
            border-radius: 50%;
            color: var(--accent-primary);
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .social-links a:hover {
            background: var(--accent-primary);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        }
        
        /* Loading Animation */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--secondary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.5s ease;
        }
        
        .page-loader.hidden {
            opacity: 0;
            pointer-events: none;
        }
        
        .loader-circle {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(99, 102, 241, 0.2);
            border-top-color: var(--accent-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Fade in animation */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Stagger delays for elements */
        .fade-in:nth-child(1) { animation-delay: 0.1s; }
        .fade-in:nth-child(2) { animation-delay: 0.2s; }
        .fade-in:nth-child(3) { animation-delay: 0.3s; }
        .fade-in:nth-child(4) { animation-delay: 0.4s; }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-circle"></div>
    </div>
    
    <!-- Animated Background -->
    <div class="bg-animated"></div>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Alvian Dev</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    style="border: 2px solid var(--accent-primary);">
                <i class="fas fa-bars" style="color: var(--accent-primary);"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('projects') ? 'active' : '' }}" href="{{ url('/projects') }}">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main style="padding-top: 100px;">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <h5 class="mb-3" style="color: var(--accent-primary); font-weight: 700;">Mari Terhubung</h5>
                    <p style="color: var(--text-secondary);">Temukan saya di platform lain</p>
                    <div class="social-links">
                        <a href="#" title="GitHub"><i class="fab fa-github"></i></a>
                        <a href="#" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <h5 class="mb-3" style="color: var(--accent-primary); font-weight: 700;">Kontak</h5>
                    <p style="color: var(--text-secondary);" class="mb-1"><i class="fas fa-envelope me-2"></i> alvianyudhistirawijaya@gmail.com</p>
                    <p style="color: var(--text-secondary);"><i class="fas fa-phone me-2"></i> +62 857-0730-5055</p>
                </div>
            </div>
            <hr style="border-color: var(--border-color); margin: 2rem 0 1rem;">
            <div class="text-center" style="color: var(--text-muted);">
                <p class="mb-0">&copy; 2026 Alvian Yudhistira Wijaya</p>
            </div>
        </div>
    </footer>
    
    <!-- Scroll to Top Button -->
    <div class="scroll-top" id="scrollTop">
        <i class="fas fa-arrow-up" style="color: white;"></i>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Scripts -->
    <script>
        // Page Loader
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.getElementById('pageLoader').classList.add('hidden');
            }, 500);
        });
        
        // Navbar scroll effect
        const navbar = document.getElementById('mainNav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Scroll to top button
        const scrollTopBtn = document.getElementById('scrollTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.add('show');
            } else {
                scrollTopBtn.classList.remove('show');
            }
        });
        
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href !== '#!') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>