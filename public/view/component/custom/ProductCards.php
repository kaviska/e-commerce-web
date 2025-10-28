<?php
// Sample product data - In a real application, this would come from a database
$products = [
    [
        'id' => 1,
        'name' => 'Wireless Bluetooth Headphones',
        'category' => 'electronics',
        'price' => 129.99,
        'original_price' => 199.99,
        'rating' => 4.5,
        'reviews' => 234,
        'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop',
        'badge' => 'Best Seller',
        'features' => ['Noise Cancelling', 'Wireless', '30hr Battery'],
        'in_stock' => true
    ],
    [
        'id' => 2,
        'name' => 'Smart Fitness Watch',
        'category' => 'electronics',
        'price' => 249.99,
        'original_price' => 299.99,
        'rating' => 4.8,
        'reviews' => 567,
        'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=300&h=300&fit=crop',
        'badge' => 'New',
        'features' => ['Heart Rate Monitor', 'GPS', 'Waterproof'],
        'in_stock' => true
    ],
    [
        'id' => 3,
        'name' => 'Designer Handbag',
        'category' => 'fashion',
        'price' => 89.99,
        'original_price' => 150.00,
        'rating' => 4.3,
        'reviews' => 123,
        'image' => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=300&h=300&fit=crop',
        'badge' => 'Sale',
        'features' => ['Genuine Leather', 'Multiple Compartments', 'Adjustable Strap'],
        'in_stock' => true
    ],
    [
        'id' => 4,
        'name' => 'Organic Coffee Beans',
        'category' => 'home',
        'price' => 24.99,
        'original_price' => 29.99,
        'rating' => 4.7,
        'reviews' => 89,
        'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?w=300&h=300&fit=crop',
        'badge' => 'Organic',
        'features' => ['Fair Trade', 'Freshly Roasted', 'Single Origin'],
        'in_stock' => true
    ],
    [
        'id' => 5,
        'name' => 'Yoga Mat Premium',
        'category' => 'sports',
        'price' => 45.99,
        'original_price' => 65.99,
        'rating' => 4.6,
        'reviews' => 78,
        'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=300&h=300&fit=crop',
        'badge' => 'Eco-Friendly',
        'features' => ['Non-Slip', 'Extra Thick', 'Eco Material'],
        'in_stock' => true
    ],
    [
        'id' => 6,
        'name' => 'Educational Building Blocks',
        'category' => 'toys',
        'price' => 34.99,
        'original_price' => 49.99,
        'rating' => 4.4,
        'reviews' => 156,
        'image' => 'https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?w=300&h=300&fit=crop',
        'badge' => 'Educational',
        'features' => ['Safe Materials', 'Age 3+', 'Creative Play'],
        'in_stock' => false
    ],
    [
        'id' => 7,
        'name' => 'Skincare Serum Set',
        'category' => 'beauty',
        'price' => 67.99,
        'original_price' => 95.99,
        'rating' => 4.9,
        'reviews' => 234,
        'image' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?w=300&h=300&fit=crop',
        'badge' => 'Premium',
        'features' => ['Natural Ingredients', 'Anti-Aging', 'Dermatologist Tested'],
        'in_stock' => true
    ],
    [
        'id' => 8,
        'name' => 'Wireless Charging Stand',
        'category' => 'electronics',
        'price' => 39.99,
        'original_price' => 59.99,
        'rating' => 4.2,
        'reviews' => 97,
        'image' => 'https://images.unsplash.com/photo-1609592439039-e6db5c7c1ac2?w=300&h=300&fit=crop',
        'badge' => 'Fast Charging',
        'features' => ['10W Fast Charge', 'Universal Compatible', 'LED Indicator'],
        'in_stock' => true
    ],
    [
        'id' => 9,
        'name' => 'Vintage Denim Jacket',
        'category' => 'fashion',
        'price' => 79.99,
        'original_price' => 120.00,
        'rating' => 4.1,
        'reviews' => 67,
        'image' => 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=300&h=300&fit=crop',
        'badge' => 'Vintage',
        'features' => ['100% Cotton', 'Classic Fit', 'Multiple Sizes'],
        'in_stock' => true
    ],
    [
        'id' => 10,
        'name' => 'Smart Home Hub',
        'category' => 'electronics',
        'price' => 149.99,
        'original_price' => 199.99,
        'rating' => 4.6,
        'reviews' => 189,
        'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=300&h=300&fit=crop',
        'badge' => 'Smart',
        'features' => ['Voice Control', 'WiFi 6', 'Multiple Devices'],
        'in_stock' => true
    ],
    [
        'id' => 11,
        'name' => 'Indoor Plant Collection',
        'category' => 'home',
        'price' => 55.99,
        'original_price' => 75.99,
        'rating' => 4.8,
        'reviews' => 134,
        'image' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=300&h=300&fit=crop',
        'badge' => 'Live Plants',
        'features' => ['Air Purifying', 'Easy Care', '3 Plant Set'],
        'in_stock' => true
    ],
    [
        'id' => 12,
        'name' => 'Professional Tennis Racket',
        'category' => 'sports',
        'price' => 189.99,
        'original_price' => 250.00,
        'rating' => 4.7,
        'reviews' => 78,
        'image' => 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=300&h=300&fit=crop',
        'badge' => 'Pro',
        'features' => ['Carbon Fiber', 'Professional Grade', 'Lightweight'],
        'in_stock' => true
    ]
];

function renderStars($rating) {
    $fullStars = floor($rating);
    $hasHalfStar = ($rating - $fullStars) >= 0.5;
    $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
    
    $starsHtml = '';
    
    // Full stars
    for ($i = 0; $i < $fullStars; $i++) {
        $starsHtml .= '<i class="bi bi-star-fill"></i>';
    }
    
    // Half star
    if ($hasHalfStar) {
        $starsHtml .= '<i class="bi bi-star-half"></i>';
    }
    
    // Empty stars
    for ($i = 0; $i < $emptyStars; $i++) {
        $starsHtml .= '<i class="bi bi-star"></i>';
    }
    
    return $starsHtml;
}

function calculateDiscount($original, $current) {
    return round((($original - $current) / $original) * 100);
}
?>

<div class="products-grid-container">
    <?php foreach ($products as $product): ?>
        <div class="product-card" data-category="<?php echo $product['category']; ?>">
            <div class="card-inner">
                <!-- Product Badge -->
                <?php if (!empty($product['badge'])): ?>
                    <div class="product-badge <?php echo strtolower(str_replace(' ', '-', $product['badge'])); ?>">
                        <?php echo $product['badge']; ?>
                    </div>
                <?php endif; ?>
                
                <!-- Stock Status -->
                <?php if (!$product['in_stock']): ?>
                    <div class="stock-overlay">
                        <span class="out-of-stock">Out of Stock</span>
                    </div>
                <?php endif; ?>

                <!-- Product Image -->
                <div class="product-image-container">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                    <div class="image-overlay">
                        <div class="quick-actions">
                            <button class="quick-action-btn" title="Quick View">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="quick-action-btn" title="Add to Wishlist">
                                <i class="bi bi-heart"></i>
                            </button>
                            <button class="quick-action-btn" title="Compare">
                                <i class="bi bi-arrow-left-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="product-info">
                    <div class="product-category"><?php echo ucfirst($product['category']); ?></div>
                    <h3 class="product-name"><?php echo $product['name']; ?></h3>
                    
                    <!-- Product Features -->
                    <div class="product-features">
                        <?php foreach (array_slice($product['features'], 0, 2) as $feature): ?>
                            <span class="feature-tag"><?php echo $feature; ?></span>
                        <?php endforeach; ?>
                    </div>

                    <!-- Rating -->
                    <div class="product-rating">
                        <div class="stars">
                            <?php echo renderStars($product['rating']); ?>
                        </div>
                        <span class="rating-text"><?php echo $product['rating']; ?> (<?php echo $product['reviews']; ?>)</span>
                    </div>

                    <!-- Price -->
                    <div class="product-price">
                        <span class="current-price">$<?php echo number_format($product['price'], 2); ?></span>
                        <?php if ($product['original_price'] > $product['price']): ?>
                            <span class="original-price">$<?php echo number_format($product['original_price'], 2); ?></span>
                            <span class="discount-percent"><?php echo calculateDiscount($product['original_price'], $product['price']); ?>% OFF</span>
                        <?php endif; ?>
                    </div>

                    <!-- Action Buttons -->
                    <div class="product-actions">
                        <?php if ($product['in_stock']): ?>
                            <button class="btn add-to-cart-btn" data-product-id="<?php echo $product['id']; ?>">
                                <i class="bi bi-cart-plus me-2"></i>
                                Add to Cart
                            </button>
                        <?php else: ?>
                            <button class="btn notify-btn" data-product-id="<?php echo $product['id']; ?>">
                                <i class="bi bi-bell me-2"></i>
                                Notify Me
                            </button>
                        <?php endif; ?>
                        <button class="btn buy-now-btn" data-product-id="<?php echo $product['id']; ?>" 
                                <?php echo !$product['in_stock'] ? 'disabled' : ''; ?>>
                            <i class="bi bi-lightning me-2"></i>
                            Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Product Cards Styles -->
<style>
.products-grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 2rem;
    padding: 1rem 0;
}

.product-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    border: 1px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
}

.product-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.card-inner {
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
}

/* Product Badge */
.product-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    z-index: 3;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.product-badge.best-seller {
    background: linear-gradient(45deg, #FF6B6B, #FF8E53);
    color: white;
}

.product-badge.new {
    background: linear-gradient(45deg, #4ECDC4, #44A08D);
    color: white;
}

.product-badge.sale {
    background: linear-gradient(45deg, #F29900, #FFD93D);
    color: white;
}

.product-badge.organic, .product-badge.eco-friendly {
    background: linear-gradient(45deg, #96CEB4, #FFEAA7);
    color: #2C3E50;
}

.product-badge.premium {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
}

.product-badge.educational, .product-badge.live-plants, .product-badge.pro {
    background: linear-gradient(45deg, #a8edea, #fed6e3);
    color: #2C3E50;
}

/* Stock Overlay */
.stock-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 5;
    border-radius: 20px;
}

.out-of-stock {
    background: rgba(220, 53, 69, 0.9);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-weight: 600;
    font-size: 1rem;
}

/* Product Image */
.product-image-container {
    position: relative;
    height: 250px;
    overflow: hidden;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.product-card:hover .product-image {
    transform: scale(1.1);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover .image-overlay {
    opacity: 1;
}

.quick-actions {
    display: flex;
    gap: 0.75rem;
}

.quick-action-btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    color: #2C3E50;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.quick-action-btn:hover {
    background: #F29900;
    color: white;
    transform: scale(1.1);
}

/* Product Info */
.product-info {
    padding: 1.5rem;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.product-category {
    color: #6C757D;
    font-size: 0.85rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.5rem;
}

.product-name {
    font-size: 1.2rem;
    font-weight: 600;
    color: #2C3E50;
    margin-bottom: 1rem;
    line-height: 1.4;
    height: 3.4rem;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

/* Product Features */
.product-features {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.feature-tag {
    background: rgba(242, 153, 0, 0.1);
    color: #F29900;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.75rem;
    font-weight: 500;
    border: 1px solid rgba(242, 153, 0, 0.2);
}

/* Rating */
.product-rating {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.stars {
    color: #FFD93D;
    font-size: 0.9rem;
}

.rating-text {
    color: #6C757D;
    font-size: 0.85rem;
    font-weight: 500;
}

/* Price */
.product-price {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
}

.current-price {
    font-size: 1.4rem;
    font-weight: 700;
    color: #F29900;
}

.original-price {
    font-size: 1rem;
    color: #6C757D;
    text-decoration: line-through;
}

.discount-percent {
    background: linear-gradient(45deg, #FF6B6B, #FF8E53);
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 10px;
    font-size: 0.75rem;
    font-weight: 600;
}

/* Action Buttons */
.product-actions {
    display: flex;
    gap: 0.75rem;
    margin-top: auto;
}

.add-to-cart-btn, .buy-now-btn, .notify-btn {
    flex: 1;
    padding: 0.75rem 1rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.add-to-cart-btn {
    background: linear-gradient(45deg, #4ECDC4, #44A08D);
    color: white;
}

.add-to-cart-btn:hover {
    background: linear-gradient(45deg, #44A08D, #4ECDC4);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(78, 205, 196, 0.3);
}

.buy-now-btn {
    background: linear-gradient(45deg, #F29900, #FF6B6B);
    color: white;
}

.buy-now-btn:hover:not(:disabled) {
    background: linear-gradient(45deg, #FF6B6B, #F29900);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(242, 153, 0, 0.3);
}

.buy-now-btn:disabled {
    background: #6C757D;
    cursor: not-allowed;
    opacity: 0.6;
}

.notify-btn {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
}

.notify-btn:hover {
    background: linear-gradient(45deg, #764ba2, #667eea);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
}

/* Button Ripple Effect */
.add-to-cart-btn::before, .buy-now-btn::before, .notify-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.add-to-cart-btn:hover::before, .buy-now-btn:hover::before, .notify-btn:hover::before {
    left: 100%;
}

/* Responsive Design */
@media (max-width: 768px) {
    .products-grid-container {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }
    
    .product-actions {
        flex-direction: column;
    }
    
    .product-name {
        font-size: 1.1rem;
        height: auto;
        -webkit-line-clamp: 3;
    }
}

@media (max-width: 576px) {
    .products-grid-container {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .product-card {
        margin: 0 0.5rem;
    }
}

/* Loading Animation */
.product-card.loading {
    opacity: 0.6;
    pointer-events: none;
}

.product-card.loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}
</style>

<!-- Product Cards JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add to Cart functionality
    const addToCartBtns = document.querySelectorAll('.add-to-cart-btn');
    addToCartBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            addToCart(productId);
        });
    });
    
    // Buy Now functionality
    const buyNowBtns = document.querySelectorAll('.buy-now-btn');
    buyNowBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            buyNow(productId);
        });
    });
    
    // Notify Me functionality
    const notifyBtns = document.querySelectorAll('.notify-btn');
    notifyBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            notifyWhenAvailable(productId);
        });
    });
    
    // Quick Action functionality
    const quickActionBtns = document.querySelectorAll('.quick-action-btn');
    quickActionBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const action = this.title;
            handleQuickAction(action, this);
        });
    });
    
    function addToCart(productId) {
        console.log('Adding product to cart:', productId);
        // Add your cart logic here
        showNotification('Product added to cart!', 'success');
    }
    
    function buyNow(productId) {
        console.log('Buying product now:', productId);
        // Add your buy now logic here
        showNotification('Redirecting to checkout...', 'info');
    }
    
    function notifyWhenAvailable(productId) {
        console.log('Setting notification for product:', productId);
        // Add your notification logic here
        showNotification('You will be notified when this item is back in stock!', 'info');
    }
    
    function handleQuickAction(action, element) {
        switch(action) {
            case 'Quick View':
                console.log('Opening quick view');
                // Add quick view modal logic here
                break;
            case 'Add to Wishlist':
                element.style.color = '#FF6B6B';
                element.innerHTML = '<i class="bi bi-heart-fill"></i>';
                showNotification('Added to wishlist!', 'success');
                break;
            case 'Compare':
                console.log('Adding to compare');
                showNotification('Added to compare list!', 'info');
                break;
        }
    }
    
    function showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <i class="bi bi-check-circle me-2"></i>
            ${message}
        `;
        
        // Add styles
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${type === 'success' ? '#28a745' : type === 'error' ? '#dc3545' : '#17a2b8'};
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            z-index: 1000;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
});
</script>
