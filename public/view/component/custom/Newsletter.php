<div class="newsletter-section py-5 bg-dark text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="newsletter-content">
                    <div class="newsletter-icon mb-3">
                        <i class="bi bi-envelope-heart"></i>
                    </div>
                    <h2 class="newsletter-title">Stay Updated</h2>
                    <p class="newsletter-description">
                        Subscribe to our newsletter and get exclusive deals, new arrivals, and special offers delivered to your inbox.
                    </p>
                    <div class="newsletter-benefits mt-3">
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Exclusive deals & discounts</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Early access to new products</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Special promotions & offers</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="newsletter-form-wrapper">
                    <form class="newsletter-form" id="newsletterForm">
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="Your Name" 
                                    required
                                >
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input 
                                    type="email" 
                                    class="form-control" 
                                    placeholder="Your Email Address" 
                                    required
                                >
                            </div>
                        </div>
                        
                        <button type="submit" class="btn newsletter-btn w-100">
                            <i class="bi bi-send-fill me-2"></i>
                            Subscribe Now
                        </button>
                        
                        <p class="newsletter-privacy-note mt-3">
                            <i class="bi bi-shield-check"></i>
                            We respect your privacy. Unsubscribe at any time.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const newsletterForm = document.getElementById('newsletterForm');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const formData = new FormData(this);
            
            // Show success message
            const btn = this.querySelector('.newsletter-btn');
            const originalText = btn.innerHTML;
            
            btn.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>Subscribed!';
            btn.classList.add('success');
            
            // Reset after 3 seconds
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.classList.remove('success');
                this.reset();
            }, 3000);
        });
    }
});
</script>
