<div class="product-section-container compact-home">
    <div class="container py-3">
        <!-- Compact Section Header -->
        <div class="section-header text-center mb-3">
            <h2 class="section-title">
                <span class="highlight-text">Trending</span> Products
            </h2>
            <p class="section-subtitle">Discover our most popular items</p>
        </div>

        <div class="row">
            <!-- Compact Category Pills -->
            <div class="col-12 mb-3">
                <div class="category-pills-container">
                    <div class="category-pills">
                        <button class="btn category-pill active" data-category="all">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                            All
                        </button>
                        <button class="btn category-pill" data-category="electronics">
                            <i class="bi bi-laptop"></i>
                            Electronics
                        </button>
                        <button class="btn category-pill" data-category="fashion">
                            <i class="bi bi-bag-heart"></i>
                            Fashion
                        </button>
                        <button class="btn category-pill" data-category="home">
                            <i class="bi bi-house-heart"></i>
                            Home
                        </button>
                        <button class="btn category-pill" data-category="sports">
                            <i class="bi bi-trophy"></i>
                            Sports
                        </button>
                        <button class="btn category-pill" data-category="beauty">
                            <i class="bi bi-heart-fill"></i>
                            Beauty
                        </button>
                    </div>
                    <div class="view-all-btn">
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            View All Products
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Compact Products Grid -->
            <div class="col-12">
                <div class="products-grid compact" id="productsContainer">
                    <?php
                        // Include the ProductCards component
                        include_once __DIR__ . '/ProductCards.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Compact Styles for Home Page Product Section -->
<style>
.product-section-container.compact-home {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    position: relative;
    overflow: hidden;
    padding: 2rem 0;
}

.product-section-container.compact-home::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.2) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 177, 153, 0.2) 0%, transparent 50%);
    pointer-events: none;
}

/* Compact Section Header */
.compact-home .section-header {
    position: relative;
    z-index: 2;
}

.compact-home .section-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2C3E50;
    margin-bottom: 0.5rem;
}

.compact-home .section-subtitle {
    font-size: 1rem;
    color: #6C757D;
    margin: 0;
}

.compact-home .highlight-text {
    background: linear-gradient(45deg, #F29900, #FF6B6B);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Compact Category Pills */
.category-pills-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 1rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 1rem;
}

.category-pills {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    flex: 1;
}

.category-pill {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border: 1px solid transparent;
    border-radius: 25px;
    padding: 0.5rem 1rem;
    color: #495057;
    font-weight: 500;
    font-size: 0.85rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    white-space: nowrap;
}

.category-pill:hover, .category-pill.active {
    background: linear-gradient(135deg, #F29900, #FF6B6B);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(242, 153, 0, 0.3);
}

.category-pill i {
    font-size: 0.9rem;
}

.view-all-btn {
    margin-left: 1rem;
}

.view-all-btn .btn {
    font-size: 0.85rem;
    padding: 0.5rem 1rem;
    border-radius: 20px;
}

/* Compact Products Grid */
.products-grid.compact {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 1rem;
    padding: 0;
}

/* Compact Product Cards Override */
.compact .product-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.compact .product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.compact .product-image-container {
    height: 180px;
}

.compact .product-info {
    padding: 1rem;
}

.compact .product-name {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    height: 2.5rem;
    -webkit-line-clamp: 2;
}

.compact .product-features {
    margin-bottom: 0.75rem;
}

.compact .feature-tag {
    font-size: 0.7rem;
    padding: 0.2rem 0.5rem;
}

.compact .product-rating {
    margin-bottom: 0.75rem;
}

.compact .stars {
    font-size: 0.8rem;
}

.compact .rating-text {
    font-size: 0.75rem;
}

.compact .product-price {
    margin-bottom: 1rem;
}

.compact .current-price {
    font-size: 1.2rem;
}

.compact .original-price {
    font-size: 0.85rem;
}

.compact .discount-percent {
    font-size: 0.7rem;
    padding: 0.2rem 0.4rem;
}

.compact .product-actions {
    gap: 0.5rem;
}

.compact .add-to-cart-btn, 
.compact .buy-now-btn, 
.compact .notify-btn {
    padding: 0.6rem 0.8rem;
    font-size: 0.8rem;
    border-radius: 8px;
}

.compact .product-badge {
    padding: 0.3rem 0.8rem;
    font-size: 0.7rem;
    top: 10px;
    left: 10px;
}

.compact .quick-action-btn {
    width: 35px;
    height: 35px;
    font-size: 0.9rem;
}

/* Hide some elements in compact mode */
.compact .product-category {
    display: none;
}

.compact .image-overlay {
    opacity: 0;
}

.compact .product-card:hover .image-overlay {
    opacity: 1;
}

/* Responsive adjustments for compact mode */
@media (max-width: 1200px) {
    .products-grid.compact {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    }
}

@media (max-width: 768px) {
    .compact-home .section-title {
        font-size: 1.5rem;
    }
    
    .category-pills-container {
        flex-direction: column;
        gap: 1rem;
    }
    
    .category-pills {
        justify-content: center;
    }
    
    .view-all-btn {
        margin-left: 0;
    }
    
    .products-grid.compact {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 0.75rem;
    }
    
    .category-pill {
        font-size: 0.8rem;
        padding: 0.4rem 0.8rem;
    }
}

@media (max-width: 576px) {
    .products-grid.compact {
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 0.5rem;
    }
    
    .compact .product-image-container {
        height: 140px;
    }
    
    .compact .product-info {
        padding: 0.75rem;
    }
    
    .compact .product-actions {
        flex-direction: column;
    }
    
    .compact .add-to-cart-btn, 
    .compact .buy-now-btn, 
    .compact .notify-btn {
        font-size: 0.75rem;
        padding: 0.5rem;
    }
}

/* Show more products on larger screens */
@media (min-width: 1400px) {
    .products-grid.compact {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    }
}

/* Animation for smooth transitions */
.compact .products-grid {
    transition: all 0.3s ease;
}

.compact .fade-in {
    animation: compactFadeIn 0.3s ease-in-out;
}

@keyframes compactFadeIn {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
}

.load-more-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
    color: white;
}

.btn-ripple {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.load-more-btn:hover .btn-ripple {
    left: 100%;
}

/* Responsive Design */
@media (max-width: 768px) {
    .section-title {
        font-size: 2rem;
    }
    
    .category-sidebar {
        position: static;
        margin-bottom: 2rem;
    }
    
    .products-header {
        flex-direction: column;
        gap: 1rem;
    }
    
    .sort-select {
        min-width: 100%;
    }
}

/* Animation for smooth transitions */
.products-grid {
    transition: all 0.3s ease;
}

.fade-in {
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<!-- Compact JavaScript for Interactive Features -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Category Pills Functionality
    const categoryPills = document.querySelectorAll('.category-pill');
    const productsContainer = document.getElementById('productsContainer');
    
    categoryPills.forEach(pill => {
        pill.addEventListener('click', function() {
            // Remove active class from all pills
            categoryPills.forEach(p => p.classList.remove('active'));
            // Add active class to clicked pill
            this.classList.add('active');
            
            // Get category
            const category = this.getAttribute('data-category');
            filterProducts(category);
        });
    });
    
    // Filter Functions (optimized for compact view)
    function filterProducts(category) {
        console.log('Filtering by category:', category);
        
        // Get all product cards
        const productCards = document.querySelectorAll('.product-card');
        
        productCards.forEach(card => {
            const cardCategory = card.getAttribute('data-category');
            
            if (category === 'all' || cardCategory === category) {
                card.style.display = 'block';
                card.classList.add('fade-in');
            } else {
                card.style.display = 'none';
                card.classList.remove('fade-in');
            }
        });
        
        // Update visible count
        setTimeout(() => {
            updateVisibleProductCount();
        }, 300);
    }
    
    function updateVisibleProductCount() {
        const visibleCards = document.querySelectorAll('.product-card[style*="block"], .product-card:not([style*="none"])');
        console.log(`Showing ${visibleCards.length} products`);
    }
    
    // Intersection Observer for scroll animations
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

    // Observe product cards for animations
    const productCards = document.querySelectorAll('.product-card');
    productCards.forEach(card => observer.observe(card));
    
    // Smooth scrolling for better UX
    function smoothScrollTo(element) {
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
    
    // Auto-filter to show limited products for home page
    setTimeout(() => {
        limitProductsForHomePage();
    }, 100);
    
    function limitProductsForHomePage() {
        const allProducts = document.querySelectorAll('.product-card');
        const maxProducts = window.innerWidth >= 1200 ? 8 : window.innerWidth >= 768 ? 6 : 4;
        
        allProducts.forEach((product, index) => {
            if (index >= maxProducts) {
                product.style.display = 'none';
            }
        });
    }
    
    // Handle responsive layout changes
    window.addEventListener('resize', function() {
        limitProductsForHomePage();
    });
});
</script>