<div class="hero-container">
    <div class="d-flex px-5 justify-content-between align-items-center min-vh-100">
        <div class="header-section">
            <h1 class="hero-title">
                <span class="font-1 animated-text">Style Life With</span>
                <br>
                <span class="bold my-5 font-2">Our Products</span>
            </h1>
            <p class="hero-subtitle mb-4 text-white">Discover amazing products that transform your lifestyle with quality and elegance.</p>
            <div class="button-container">
                <button class="btn browse-btn">
                    <i class="bi bi-bag-check animated-icon"></i>
                    Browse Our Products
                    <i class="bi bi-arrow-right ms-2"></i>
                </button>
            </div>
        </div>
        
        <div class="image-section">
            <div class="animated-circle">
                <div class="inner-circle">
                    <i class="bi bi-shop animated-svg"></i>
                </div>
                <div class="orbit-ring"></div>
                <div class="floating-elements">
                    <div class="floating-icon floating-icon-1">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <div class="floating-icon floating-icon-2">
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="floating-icon floating-icon-3">
                        <i class="bi bi-cart-fill"></i>
                    </div>
                    <div class="floating-icon floating-icon-4">
                        <i class="bi bi-gift-fill"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Styles -->
<style>

</style>

<!-- Bootstrap Icons CDN and JavaScript -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add intersection observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    // Observe hero elements
    const heroElements = document.querySelectorAll('.header-section, .image-section');
    heroElements.forEach(el => observer.observe(el));

    // Add click effect to button
    const browseBtn = document.querySelector('.browse-btn');
    if (browseBtn) {
        browseBtn.addEventListener('click', function(e) {
            // Create ripple effect
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    }

    // Dynamic color sync animation
    let colorIndex = 0;
    const colors = [
        { primary: '#F29900', secondary: '#FF6B6B' },
        { primary: '#FF6B6B', secondary: '#4ECDC4' },
        { primary: '#4ECDC4', secondary: '#45B7D1' },
        { primary: '#45B7D1', secondary: '#96CEB4' },
        { primary: '#96CEB4', secondary: '#FFEAA7' },
        { primary: '#FFEAA7', secondary: '#F29900' }
    ];

    // Particle system for extra visual appeal
    createParticles();
    
    function createParticles() {
        const particleContainer = document.createElement('div');
        particleContainer.className = 'particle-container';
        particleContainer.style.cssText = `
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        `;
        
        document.querySelector('.hero-container').appendChild(particleContainer);
        
        for (let i = 0; i < 20; i++) {
            createParticle(particleContainer);
        }
    }
    
    function createParticle(container) {
        const particle = document.createElement('div');
        particle.style.cssText = `
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: particleFloat ${Math.random() * 10 + 10}s linear infinite;
            left: ${Math.random() * 100}%;
            animation-delay: ${Math.random() * 10}s;
        `;
        
        container.appendChild(particle);
        
        // Add CSS for particle animation
        if (!document.querySelector('#particle-style')) {
            const style = document.createElement('style');
            style.id = 'particle-style';
            style.textContent = `
                @keyframes particleFloat {
                    0% {
                        transform: translateY(100vh) rotate(0deg);
                        opacity: 0;
                    }
                    10% {
                        opacity: 1;
                    }
                    90% {
                        opacity: 1;
                    }
                    100% {
                        transform: translateY(-100px) rotate(360deg);
                        opacity: 0;
                    }
                }
                
                .ripple {
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.6);
                    transform: scale(0);
                    animation: rippleEffect 0.6s linear;
                }
                
                @keyframes rippleEffect {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }
    }
});
</script>