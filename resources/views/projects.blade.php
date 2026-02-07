@extends('layout.app')

@section('title', 'Projects - Portfolio')

@section('styles')
<style>
    .projects-hero {
        padding: 5rem 0 3rem;
        text-align: center;
    }
    
    .projects-title {
        font-size: 4rem;
        font-weight: 900;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--text-dark) 0%, var(--accent-primary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .projects-subtitle {
        font-size: 1.3rem;
        color: var(--text-secondary);
        max-width: 700px;
        margin: 0 auto 3rem;
    }
    
    /* Filter Buttons */
    .filter-buttons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 3rem;
    }
    
    .filter-btn {
        padding: 0.8rem 2rem;
        background: white;
        border: 2px solid var(--border-color);
        color: var(--text-dark);
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }
    
    .filter-btn:hover {
        border-color: var(--accent-primary);
        background: rgba(99, 102, 241, 0.05);
        transform: translateY(-2px);
    }
    
    .filter-btn.active {
        background: var(--accent-primary);
        border-color: var(--accent-primary);
        color: white;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
    }
    
    /* Project Cards */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }
    
    .project-card {
        background: white;
        border: 2px solid var(--border-color);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s ease;
        position: relative;
        opacity: 1;
        transform: scale(1);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    .project-card.hidden {
        opacity: 0;
        transform: scale(0.8);
        pointer-events: none;
        position: absolute;
    }
    
    .project-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(99, 102, 241, 0.2);
        border-color: var(--accent-primary);
    }
    
    .project-image {
        width: 100%;
        height: 250px;
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        position: relative;
        overflow: hidden;
    }
    
    .project-card:nth-child(2n) .project-image {
        background: linear-gradient(135deg, #ec4899 0%, #f97316 100%);
    }
    
    .project-card:nth-child(3n) .project-image {
        background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%);
    }
    
    .project-card:nth-child(4n) .project-image {
        background: linear-gradient(135deg, #10b981 0%, #14b8a6 100%);
    }
    
    .project-card:nth-child(5n) .project-image {
        background: linear-gradient(135deg, #f59e0b 0%, #eab308 100%);
    }
    
    .project-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.95);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .project-card:hover .project-overlay {
        opacity: 1;
    }
    
    .overlay-btn {
        width: 50px;
        height: 50px;
        background: var(--accent-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
    }
    
    .overlay-btn:hover {
        background: var(--accent-secondary);
        transform: scale(1.15);
        color: white;
        box-shadow: 0 6px 20px rgba(236, 72, 153, 0.4);
    }
    
    .project-content {
        padding: 2rem;
    }
    
    .project-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    
    .project-tag {
        padding: 0.4rem 1rem;
        background: rgba(99, 102, 241, 0.1);
        border: 1px solid rgba(99, 102, 241, 0.3);
        border-radius: 20px;
        color: var(--accent-primary);
        font-size: 0.85rem;
        font-weight: 600;
    }
    
    .project-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.8rem;
        color: var(--text-dark);
    }
    
    .project-description {
        color: var(--text-secondary);
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }
    
    .project-meta {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        color: var(--text-muted);
        font-size: 0.9rem;
    }
    
    .project-meta i {
        color: var(--accent-primary);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .projects-title {
            font-size: 2.5rem;
        }
        
        .projects-grid {
            grid-template-columns: 1fr;
        }
        
        .filter-buttons {
            gap: 0.5rem;
        }
        
        .filter-btn {
            padding: 0.6rem 1.5rem;
            font-size: 0.85rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Projects Hero -->
<section class="projects-hero">
    <div class="container">
        <h1 class="projects-title fade-in">Portfolio Saya</h1>
        <p class="projects-subtitle fade-in">
            Koleksi project yang telah saya kerjakan dengan passion dan dedikasi
        </p>
    </div>
</section>

<!-- Filter Section -->
<section class="filter-section">
    <div class="container">
        <div class="filter-buttons fade-in">
            <button class="filter-btn active" data-filter="all">Semua Project</button>
            <button class="filter-btn" data-filter="web">Web Development</button>
            <button class="filter-btn" data-filter="mobile">Mobile App</button>
            <button class="filter-btn" data-filter="design">UI/UX Design</button>
            <button class="filter-btn" data-filter="other">Lainnya</button>
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="projects-section">
    <div class="container">
        <div class="projects-grid">
            <!-- Project 1 -->
            <div class="project-card fade-in" data-category="web">
                <div class="project-image">
                    <div class="project-overlay">
                        <a href="#" class="overlay-btn" title="View Demo">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="overlay-btn" title="View Code">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-tags">
                        <span class="project-tag">Laravel</span>
                        <span class="project-tag">Vue.js</span>
                        <span class="project-tag">MySQL</span>
                    </div>
                    <h3 class="project-title">E-Commerce Platform</h3>
                    <p class="project-description">
                        Platform e-commerce lengkap dengan fitur payment gateway, inventory management, 
                        dan admin dashboard yang comprehensive.
                    </p>
                    <div class="project-meta">
                        <span><i class="fas fa-calendar"></i> 2024</span>
                        <span><i class="fas fa-user"></i> Corporate</span>
                    </div>
                </div>
            </div>
            
            <!-- Project 2 -->
            <div class="project-card fade-in" data-category="web">
                <div class="project-image">
                    <div class="project-overlay">
                        <a href="#" class="overlay-btn" title="View Demo">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="overlay-btn" title="View Code">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-tags">
                        <span class="project-tag">React</span>
                        <span class="project-tag">Node.js</span>
                        <span class="project-tag">MongoDB</span>
                    </div>
                    <h3 class="project-title">Social Media Dashboard</h3>
                    <p class="project-description">
                        Dashboard analytics untuk mengelola multiple social media accounts dengan 
                        real-time data visualization dan scheduling features.
                    </p>
                    <div class="project-meta">
                        <span><i class="fas fa-calendar"></i> 2024</span>
                        <span><i class="fas fa-user"></i> Agency</span>
                    </div>
                </div>
            </div>
            
            <!-- Project 3 -->
            <div class="project-card fade-in" data-category="mobile">
                <div class="project-image">
                    <div class="project-overlay">
                        <a href="#" class="overlay-btn" title="View Demo">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="overlay-btn" title="View Code">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-tags">
                        <span class="project-tag">React Native</span>
                        <span class="project-tag">Firebase</span>
                    </div>
                    <h3 class="project-title">Fitness Tracking App</h3>
                    <p class="project-description">
                        Mobile app untuk tracking workout, nutrition, dan progress dengan AI-powered 
                        workout recommendations dan social features.
                    </p>
                    <div class="project-meta">
                        <span><i class="fas fa-calendar"></i> 2023</span>
                        <span><i class="fas fa-user"></i> Personal</span>
                    </div>
                </div>
            </div>
            
            <!-- Project 4 -->
            <div class="project-card fade-in" data-category="design">
                <div class="project-image">
                    <div class="project-overlay">
                        <a href="#" class="overlay-btn" title="View Demo">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="overlay-btn" title="View Code">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-tags">
                        <span class="project-tag">Figma</span>
                        <span class="project-tag">UI/UX</span>
                    </div>
                    <h3 class="project-title">Banking App Redesign</h3>
                    <p class="project-description">
                        Complete redesign of mobile banking app focusing on improved user experience, 
                        accessibility, dan modern interface design.
                    </p>
                    <div class="project-meta">
                        <span><i class="fas fa-calendar"></i> 2023</span>
                        <span><i class="fas fa-user"></i> Freelance</span>
                    </div>
                </div>
            </div>
            
            <!-- Project 5 -->
            <div class="project-card fade-in" data-category="web">
                <div class="project-image">
                    <div class="project-overlay">
                        <a href="#" class="overlay-btn" title="View Demo">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="overlay-btn" title="View Code">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-tags">
                        <span class="project-tag">Laravel</span>
                        <span class="project-tag">Bootstrap</span>
                    </div>
                    <h3 class="project-title">School Management System</h3>
                    <p class="project-description">
                        Comprehensive system untuk mengelola data siswa, guru, kelas, nilai, 
                        dan attendance dengan role-based access control.
                    </p>
                    <div class="project-meta">
                        <span><i class="fas fa-calendar"></i> 2023</span>
                        <span><i class="fas fa-user"></i> Education</span>
                    </div>
                </div>
            </div>
            
            <!-- Project 6 -->
            <div class="project-card fade-in" data-category="other">
                <div class="project-image">
                    <div class="project-overlay">
                        <a href="#" class="overlay-btn" title="View Demo">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="overlay-btn" title="View Code">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-tags">
                        <span class="project-tag">Python</span>
                        <span class="project-tag">Django</span>
                        <span class="project-tag">AI/ML</span>
                    </div>
                    <h3 class="project-title">AI Content Generator</h3>
                    <p class="project-description">
                        Tool berbasis AI untuk generate content marketing menggunakan natural language 
                        processing dan machine learning models.
                    </p>
                    <div class="project-meta">
                        <span><i class="fas fa-calendar"></i> 2024</span>
                        <span><i class="fas fa-user"></i> Startup</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            button.classList.add('active');
            
            const filterValue = button.getAttribute('data-filter');
            
            projectCards.forEach(card => {
                const category = card.getAttribute('data-category');
                
                if (filterValue === 'all' || category === filterValue) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        });
    });
    
    // Fade-in animation on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
            }
        });
    }, { threshold: 0.1 });
    
    document.querySelectorAll('.fade-in').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.8s ease';
        observer.observe(el);
    });
</script>
@endsection