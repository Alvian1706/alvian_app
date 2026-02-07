@extends('layout.app')

@section('title', 'About - Portfolio')

@section('styles')
<style>
    .about-hero {
        padding: 5rem 0 3rem;
        text-align: center;
    }
    
    .about-title {
        font-size: 4rem;
        font-weight: 900;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--text-dark) 0%, var(--accent-primary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .about-subtitle {
        font-size: 1.3rem;
        color: var(--text-secondary);
        max-width: 700px;
        margin: 0 auto 3rem;
    }
    
    /* Profile Section */
    .profile-section {
        padding: 3rem 0;
    }
    
    .profile-image {
        position: relative;
        margin-bottom: 2rem;
    }
    
    .profile-image-wrapper {
        width: 350px;
        height: 350px;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        overflow: hidden;
        border: 5px solid var(--accent-primary);
        background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
        margin: 0 auto;
        animation: morph 8s ease-in-out infinite;
        position: relative;
        box-shadow: 0 10px 40px rgba(99, 102, 241, 0.3);
    }
    
    .profile-image-wrapper::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        height: 90%;
        background: var(--primary-light);
        border-radius: inherit;
    }
    
    @keyframes morph {
        0%, 100% {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }
        25% {
            border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%;
        }
        50% {
            border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%;
        }
        75% {
            border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%;
        }
    }
    
    .profile-content h2 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: var(--text-dark);
    }
    
    .profile-content p {
        color: var(--text-secondary);
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 1.5rem;
    }
    
    .highlight-text {
        color: var(--accent-primary);
        font-weight: 600;
    }
    
    /* Skills Section */
    .skills-section {
        padding: 5rem 0;
        background: white;
        border-top: 2px solid var(--border-color);
        border-bottom: 2px solid var(--border-color);
    }
    
    .skill-category {
        margin-bottom: 3rem;
    }
    
    .skill-category h3 {
        font-size: 1.8rem;
        margin-bottom: 2rem;
        color: var(--accent-primary);
        display: flex;
        align-items: center;
        font-weight: 700;
    }
    
    .skill-category h3 i {
        margin-right: 1rem;
        font-size: 2rem;
    }
    
    .skill-item {
        margin-bottom: 2rem;
    }
    
    .skill-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
    }
    
    .skill-name {
        font-weight: 600;
        color: var(--text-dark);
        font-size: 1.1rem;
    }
    
    .skill-percentage {
        color: var(--accent-primary);
        font-weight: 700;
    }
    
    .skill-bar {
        height: 12px;
        background: var(--border-color);
        border-radius: 10px;
        overflow: hidden;
        position: relative;
    }
    
    .skill-progress {
        height: 100%;
        background: linear-gradient(90deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
        border-radius: 10px;
        position: relative;
        width: 0;
        transition: width 1.5s ease;
        box-shadow: 0 2px 10px rgba(99, 102, 241, 0.3);
    }
    
    .skill-progress::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        animation: shimmer 2s infinite;
    }
    
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    /* Timeline Section */
    .timeline-section {
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
    
    .timeline {
        position: relative;
        padding: 2rem 0;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 3px;
        height: 100%;
        background: linear-gradient(180deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
    }
    
    .timeline-item {
        margin-bottom: 3rem;
        position: relative;
    }
    
    .timeline-item:nth-child(odd) .timeline-content {
        margin-left: auto;
    }
    
    .timeline-content {
        background: white;
        border: 2px solid var(--border-color);
        border-radius: 20px;
        padding: 2rem;
        width: 45%;
        position: relative;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    .timeline-content:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.2);
        border-color: var(--accent-primary);
    }
    
    .timeline-dot {
        position: absolute;
        top: 1.5rem;
        left: 50%;
        transform: translateX(-50%);
        width: 24px;
        height: 24px;
        background: var(--accent-primary);
        border: 5px solid var(--primary-light);
        border-radius: 50%;
        z-index: 2;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2);
    }
    
    .timeline-date {
        color: var(--accent-primary);
        font-weight: 700;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .timeline-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: var(--text-dark);
    }
    
    .timeline-company {
        color: var(--text-secondary);
        font-size: 1rem;
        margin-bottom: 1rem;
        font-weight: 500;
    }
    
    .timeline-description {
        color: var(--text-secondary);
        line-height: 1.7;
    }
    
    /* Responsive Timeline */
    @media (max-width: 768px) {
        .timeline::before {
            left: 20px;
        }
        
        .timeline-content {
            width: calc(100% - 50px);
            margin-left: 50px !important;
        }
        
        .timeline-dot {
            left: 20px;
        }
        
        .about-title {
            font-size: 2.5rem;
        }
        
        .profile-image-wrapper {
            width: 250px;
            height: 250px;
        }
    }
</style>
@endsection

@section('content')
<!-- About Hero -->
<section class="about-hero">
    <div class="container">
        <h1 class="about-title fade-in">Tentang Saya</h1>
        <p class="about-subtitle fade-in">
            Passionate developer dengan dedikasi untuk menciptakan pengalaman digital yang luar biasa
        </p>
    </div>
</section>

<!-- Profile Section -->
<section class="profile-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 text-center fade-in">
                <div class="profile-image">
                    <div class="profile-image-wrapper">
                        <!-- Placeholder untuk foto profil -->
                    </div>
                </div>
            </div>
            <div class="col-lg-7 fade-in">
                <div class="profile-content">
                    <h2>Hi, Saya <span class="highlight-text">Developer</span> & <span class="highlight-text">Designer</span></h2>
                    <p>
                        Saya adalah seorang full-stack developer dengan passion dalam menciptakan 
                        aplikasi web yang indah dan fungsional. Dengan pengalaman lebih dari 5 tahun 
                        di industri ini, saya telah membantu berbagai klien mewujudkan visi digital mereka.
                    </p>
                    <p>
                        Keahlian saya mencakup <span class="highlight-text">web development</span>, 
                        <span class="highlight-text">UI/UX design</span>, dan 
                        <span class="highlight-text">mobile app development</span>. 
                        Saya percaya bahwa teknologi yang baik harus mudah digunakan dan memberikan 
                        nilai nyata bagi penggunanya.
                    </p>
                    <p>
                        Ketika tidak coding, saya suka mengeksplorasi teknologi baru, berkontribusi 
                        ke open-source projects, dan berbagi pengetahuan dengan komunitas developer.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section class="skills-section">
    <div class="container">
        <h2 class="section-title fade-in">Keahlian & Teknologi</h2>
        <p class="section-subtitle fade-in">Tools dan teknologi yang saya kuasai</p>
        
        <div class="row">
            <div class="col-lg-6 fade-in">
                <div class="skill-category">
                    <h3><i class="fas fa-code"></i> Frontend Development</h3>
                    
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">HTML & CSS</span>
                            <span class="skill-percentage">95%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="95"></div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">JavaScript & TypeScript</span>
                            <span class="skill-percentage">90%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="90"></div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">React & Vue.js</span>
                            <span class="skill-percentage">85%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="85"></div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">Bootstrap & Tailwind</span>
                            <span class="skill-percentage">92%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="92"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 fade-in">
                <div class="skill-category">
                    <h3><i class="fas fa-server"></i> Backend Development</h3>
                    
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">PHP & Laravel</span>
                            <span class="skill-percentage">88%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="88"></div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">Node.js & Express</span>
                            <span class="skill-percentage">82%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="82"></div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">MySQL & PostgreSQL</span>
                            <span class="skill-percentage">85%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="85"></div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">RESTful API & GraphQL</span>
                            <span class="skill-percentage">80%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="80"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 fade-in">
                <div class="skill-category">
                    <h3><i class="fas fa-paint-brush"></i> Design & Tools</h3>
                    
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">Figma & Adobe XD</span>
                            <span class="skill-percentage">87%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="87"></div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">Photoshop & Illustrator</span>
                            <span class="skill-percentage">78%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="78"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 fade-in">
                <div class="skill-category">
                    <h3><i class="fas fa-tools"></i> Other Skills</h3>
                    
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">Git & GitHub</span>
                            <span class="skill-percentage">90%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="90"></div>
                        </div>
                    </div>
                    
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">Docker & CI/CD</span>
                            <span class="skill-percentage">75%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-progress="75"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="timeline-section">
    <div class="container">
        <h2 class="section-title fade-in">Perjalanan Karir</h2>
        <p class="section-subtitle fade-in">Pengalaman dan pencapaian saya</p>
        
        <div class="timeline">
            <div class="timeline-item fade-in">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-date">2023 - Sekarang</div>
                    <h3 class="timeline-title">Senior Full Stack Developer</h3>
                    <div class="timeline-company">Tech Solutions Inc.</div>
                    <p class="timeline-description">
                        Memimpin tim dalam pengembangan aplikasi enterprise menggunakan Laravel dan React. 
                        Bertanggung jawab atas arsitektur sistem dan code review.
                    </p>
                </div>
            </div>
            
            <div class="timeline-item fade-in">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-date">2021 - 2023</div>
                    <h3 class="timeline-title">Full Stack Developer</h3>
                    <div class="timeline-company">Digital Agency XYZ</div>
                    <p class="timeline-description">
                        Mengembangkan berbagai website dan aplikasi web untuk klien dari berbagai industri. 
                        Fokus pada performa dan user experience.
                    </p>
                </div>
            </div>
            
            <div class="timeline-item fade-in">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-date">2019 - 2021</div>
                    <h3 class="timeline-title">Frontend Developer</h3>
                    <div class="timeline-company">Creative Studio ABC</div>
                    <p class="timeline-description">
                        Mengimplementasikan desain UI/UX menjadi kode yang responsif dan interaktif. 
                        Bekerja dengan designer untuk menciptakan pengalaman web yang menarik.
                    </p>
                </div>
            </div>
            
            <div class="timeline-item fade-in">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-date">2018 - 2019</div>
                    <h3 class="timeline-title">Junior Web Developer</h3>
                    <div class="timeline-company">Startup Company</div>
                    <p class="timeline-description">
                        Memulai karir sebagai web developer. Belajar dan berkembang dalam tim yang dinamis 
                        dengan berbagai project challenging.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Skill bar animation
    const skillObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const progressBars = entry.target.querySelectorAll('.skill-progress');
                progressBars.forEach(bar => {
                    const progress = bar.getAttribute('data-progress');
                    setTimeout(() => {
                        bar.style.width = progress + '%';
                    }, 200);
                });
                skillObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    document.querySelectorAll('.skill-category').forEach(category => {
        skillObserver.observe(category);
    });
    
    // Fade-in animation
    const fadeObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    document.querySelectorAll('.fade-in').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.8s ease';
        fadeObserver.observe(el);
    });
</script>
@endsection