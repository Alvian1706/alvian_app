@extends('layout.app')

@section('title', 'Contact - Portfolio')

@section('styles')
<style>
    .contact-hero {
        padding: 5rem 0 3rem;
        text-align: center;
    }
    
    .contact-title {
        font-size: 4rem;
        font-weight: 900;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--text-dark) 0%, var(--accent-primary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .contact-subtitle {
        font-size: 1.3rem;
        color: var(--text-secondary);
        max-width: 700px;
        margin: 0 auto 3rem;
    }
    
    .contact-section {
        padding: 3rem 0 5rem;
    }
    
    /* Contact Info Cards */
    .contact-info-card {
        background: white;
        border: 2px solid var(--border-color);
        border-radius: 20px;
        padding: 2.5rem;
        text-align: center;
        height: 100%;
        transition: all 0.3s ease;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    .contact-info-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(99, 102, 241, 0.2);
        border-color: var(--accent-primary);
    }
    
    .contact-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        margin: 0 auto 1.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(99, 102, 241, 0.3);
    }
    
    .contact-info-card:hover .contact-icon {
        transform: scale(1.1) rotate(5deg);
    }
    
    .contact-info-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 0.8rem;
        color: var(--text-dark);
    }
    
    .contact-info-text {
        color: var(--text-secondary);
        line-height: 1.7;
    }
    
    .contact-info-link {
        color: var(--accent-primary);
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 600;
    }
    
    .contact-info-link:hover {
        color: var(--accent-secondary);
    }
    
    /* Contact Form */
    .contact-form {
        background: white;
        border: 2px solid var(--border-color);
        border-radius: 20px;
        padding: 3rem;
        margin-top: 3rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    .form-group {
        margin-bottom: 2rem;
    }
    
    .form-label {
        display: block;
        color: var(--text-dark);
        font-weight: 600;
        margin-bottom: 0.8rem;
        font-size: 1.05rem;
    }
    
    .form-control-custom {
        width: 100%;
        padding: 1rem 1.5rem;
        background: var(--primary-light);
        border: 2px solid var(--border-color);
        border-radius: 12px;
        color: var(--text-dark);
        font-size: 1rem;
        transition: all 0.3s ease;
        font-family: 'DM Sans', sans-serif;
    }
    
    .form-control-custom:focus {
        outline: none;
        border-color: var(--accent-primary);
        background: white;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }
    
    .form-control-custom::placeholder {
        color: var(--text-muted);
    }
    
    textarea.form-control-custom {
        resize: vertical;
        min-height: 150px;
    }
    
    .submit-btn {
        width: 100%;
        padding: 1.2rem 2rem;
        background: var(--accent-primary);
        border: none;
        border-radius: 12px;
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
    }
    
    .submit-btn:hover {
        background: var(--accent-secondary);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(236, 72, 153, 0.4);
    }
    
    .submit-btn i {
        transition: transform 0.3s ease;
    }
    
    .submit-btn:hover i {
        transform: translateX(5px);
    }
    
    /* Map Section */
    .map-section {
        margin-top: 4rem;
        border-radius: 20px;
        overflow: hidden;
        border: 2px solid var(--border-color);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    .map-placeholder {
        width: 100%;
        height: 400px;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(236, 72, 153, 0.1) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-muted);
        font-size: 1.2rem;
    }
    
    /* Social Links */
    .social-section {
        text-align: center;
        margin-top: 4rem;
        padding: 3rem;
        background: white;
        border-radius: 20px;
        border: 2px solid var(--border-color);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    .social-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 2rem;
        color: var(--text-dark);
    }
    
    .social-links-large {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }
    
    .social-link-large {
        width: 70px;
        height: 70px;
        background: rgba(99, 102, 241, 0.1);
        border: 2px solid var(--border-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent-primary);
        font-size: 1.8rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .social-link-large:hover {
        background: var(--accent-primary);
        border-color: var(--accent-primary);
        color: white;
        transform: translateY(-5px) scale(1.1);
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
    }
    
    /* Success Message */
    .success-message {
        background: rgba(16, 185, 129, 0.1);
        border: 2px solid rgba(16, 185, 129, 0.3);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        color: #10b981;
        display: none;
        align-items: center;
        gap: 1rem;
        font-weight: 600;
    }
    
    .success-message.show {
        display: flex;
    }
    
    .success-message i {
        font-size: 1.5rem;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .contact-title {
            font-size: 2.5rem;
        }
        
        .contact-form {
            padding: 2rem;
        }
        
        .contact-info-card {
            margin-bottom: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Contact Hero -->
<section class="contact-hero">
    <div class="container">
        <h1 class="contact-title fade-in">Hubungi Saya</h1>
        <p class="contact-subtitle fade-in">
            Punya project atau pertanyaan? Jangan ragu untuk menghubungi saya. Mari wujudkan ide Anda!
        </p>
    </div>
</section>

<!-- Contact Info -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="contact-info-card fade-in">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="contact-info-title">Email</h3>
                    <p class="contact-info-text">
                        <a href="mailto:alvianyudhistirawijaya@gmail.com" class="contact-info-link">
                            alvianyudhistirawijaya@gmail.com
                        </a>
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="contact-info-card fade-in">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3 class="contact-info-title">Telepon</h3>
                    <p class="contact-info-text">
                        <a href="tel:+6285707305055" class="contact-info-link">
                            +62 857-0730-5055
                        </a>
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="contact-info-card fade-in">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="contact-info-title">Lokasi</h3>
                    <p class="contact-info-text">
                        Kediri, Jawa Timur
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Contact Form -->
        <div class="contact-form fade-in">
            <div class="success-message" id="successMessage">
                <i class="fas fa-check-circle"></i>
                <span>Terima kasih! Pesan Anda telah terkirim. Saya akan segera menghubungi Anda.</span>
            </div>
            
            <form id="contactForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control-custom" name="name" placeholder="Masukkan nama Anda" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control-custom" name="email" placeholder="email@example.com" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Subjek</label>
                    <input type="text" class="form-control-custom" name="subject" placeholder="Subjek pesan Anda" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Pesan</label>
                    <textarea class="form-control-custom" name="message" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                </div>
                
                <button type="submit" class="submit-btn">
                    <span>Kirim Pesan</span>
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
        
        <!-- Map Section -->
        <div class="map-section fade-in">
            <div class="map-placeholder">
                <i class="fas fa-map-marked-alt" style="font-size: 3rem;"></i>
            </div>
        </div>
        
        <!-- Social Links -->
        <div class="social-section fade-in">
            <h3 class="social-title">Ikuti Saya</h3>
            <div class="social-links-large">
                <a href="#" class="social-link-large" title="GitHub">
                    <i class="fab fa-github"></i>
                </a>
                <a href="#" class="social-link-large" title="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" class="social-link-large" title="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-link-large" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="social-link-large" title="Dribbble">
                    <i class="fab fa-dribbble"></i>
                </a>
                <a href="#" class="social-link-large" title="Behance">
                    <i class="fab fa-behance"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Form submission handling
    const contactForm = document.getElementById('contactForm');
    const successMessage = document.getElementById('successMessage');
    
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Simulate form submission
        // In real application, you would send data to server here
        
        // Show success message
        successMessage.classList.add('show');
        
        // Reset form
        contactForm.reset();
        
        // Scroll to success message
        successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        
        // Hide success message after 5 seconds
        setTimeout(() => {
            successMessage.classList.remove('show');
        }, 5000);
    });
    
    // Fade-in animation on scroll
    const observer = new IntersectionObserver((entries) => {
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
        observer.observe(el);
    });
</script>
@endsection