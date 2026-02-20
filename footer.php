<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
?>
    </div><!-- #content -->

    <!-- Search Modal -->
    <?php if (class_exists('WooCommerce')) : ?>
    <div class="search-modal" id="searchModal">
        <div class="search-modal-overlay"></div>
        <div class="search-modal-content">
            <button class="search-modal-close" id="searchModalClose">
                <i class="fas fa-times"></i>
            </button>
            <div class="search-modal-header">
                <h2>Search Products</h2>
            </div>
            <div class="search-modal-body">
                <form class="product-search-form" role="search">
                    <div class="search-input-wrapper">
                        <input type="search"
                               id="productSearchInput"
                               class="product-search-input"
                               placeholder="Search for products..."
                               autocomplete="off">
                        <button type="submit" class="search-submit-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="search-results" id="searchResults">
                    <div class="search-results-info">
                        <p>Start typing to search products...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Quick View Modal -->
    <?php if (class_exists('WooCommerce')) : ?>
    <div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title" id="quickViewModalLabel">Quick View</h5>
                    <button type="button" class="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border:none; background:none;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="quick-view-content">
                        <!-- Content loaded via AJAX -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <footer class="site-footer">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <!-- Brand Section -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="footer-brand">
                            <h3 class="footer-logo">LUPALASHES</h3>
                            <p class="footer-description">
                                Premium quality eyelashes to enhance your natural beauty.
                                Discover our collection of luxurious lashes designed for every occasion.
                            </p>
                            <div class="footer-social">
                                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-links">
                            <h4 class="footer-title">Quick Links</h4>
                            <ul class="footer-menu">
                                <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
                                <li><a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>">Shop</a></li>
                                <li><a href="<?php echo site_url('/about-us'); ?>">About Us</a></li>
                                <li><a href="<?php echo site_url('/faq'); ?>">FAQ</a></li>
                                <li><a href="<?php echo site_url('/contact-us'); ?>">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Customer Service -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-links">
                            <h4 class="footer-title">Customer Service</h4>
                            <ul class="footer-menu">
                                <li><a href="<?php echo wc_get_page_permalink('myaccount'); ?>">My Account</a></li>
                                <li><a href="<?php echo wc_get_page_permalink('cart'); ?>">Shopping Cart</a></li>
                                <li><a href="<?php echo wc_get_page_permalink('checkout'); ?>">Checkout</a></li>
                                <li><a href="<?php echo site_url('/terms-conditions'); ?>">Shipping Info</a></li>
                                <li><a href="<?php echo site_url('/terms-conditions'); ?>">Returns & Exchanges</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-contact">
                            <h4 class="footer-title">Get In Touch</h4>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>123 Beauty Street<br>Fashion District, NY 10001</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+1 (555) 123-4567</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span><a href="mailto:info@lupalashes.com">info@lupalashes.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="copyright">
                            &copy; <?php echo date('Y'); ?> LUPALASHES. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-legal">
                            <a href="<?php echo site_url('/privacy-policy'); ?>">Privacy Policy</a>
                            <span class="separator">|</span>
                            <a href="<?php echo site_url('/terms-conditions'); ?>">Terms & Conditions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <style>
    .site-footer {
        background: linear-gradient(135deg, #d4a574 0%, #c39463 100%);
        color: #fff;
        position: relative;
        z-index: 1;
    }

    .site-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><linearGradient id="a" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="%23ffffff" stop-opacity="0.05"/><stop offset="100%" stop-color="%23ffffff" stop-opacity="0"/></linearGradient></defs><polygon fill="url(%23a)" points="0,20 100,0 100,20"/></svg>') repeat-x;
        z-index: -1;
    }

    .footer-main {
        padding: 60px 0 40px;
    }

    .footer-brand .footer-logo {
        font-size: 28px;
        font-weight: bold;
        color: #fff;
        margin-bottom: 20px;
        letter-spacing: 1px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .footer-description {
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
        margin-bottom: 25px;
        font-size: 15px;
    }

    .footer-social {
        display: flex;
        gap: 15px;
    }

    .social-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        color: #fff;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        background: rgba(255, 255, 255, 0.3);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .footer-title {
        font-size: 18px;
        font-weight: 600;
        color: #fff;
        margin-bottom: 25px;
        position: relative;
    }

    .footer-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 30px;
        height: 2px;
        background: rgba(255, 255, 255, 0.8);
    }

    .footer-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-menu li {
        margin-bottom: 12px;
    }

    .footer-menu a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 15px;
    }

    .footer-menu a:hover {
        color: #fff;
        padding-left: 5px;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }

    .footer-contact .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
        color: rgba(255, 255, 255, 0.8);
    }

    .footer-contact .contact-item i {
        margin-right: 15px;
        margin-top: 3px;
        color: #fff;
        width: 16px;
    }

    .footer-bottom {
        background: rgba(0, 0, 0, 0.2);
        padding: 20px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
    }

    .copyright {
        margin: 0;
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
    }

    .footer-legal {
        text-align: right;
    }

    .footer-legal a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-size: 14px;
        transition: color 0.3s ease;
    }

    .footer-legal a:hover {
        color: #fff;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }

    .footer-legal .separator {
        margin: 0 15px;
        color: rgba(255, 255, 255, 0.6);
    }

    @media (max-width: 768px) {
        .footer-main {
            padding: 40px 0 30px;
        }

        .footer-legal {
            text-align: center;
            margin-top: 15px;
        }

        .copyright {
            text-align: center;
        }

        .footer-social {
            justify-content: center;
        }

        .footer-title::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .footer-brand,
        .footer-links,
        .footer-contact {
            text-align: center;
        }
    }

    /* ===========================================
       SCROLL DRIVEN ANIMATIONS
    =========================================== */

    /* Base animation classes */
    .animate-on-scroll {
        opacity: 0;
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .animate-on-scroll.animated {
        opacity: 1;
    }

    /* Fade animations */
    .fade-up {
        transform: translateY(50px);
    }

    .fade-up.animated {
        transform: translateY(0);
    }

    .fade-down {
        transform: translateY(-50px);
    }

    .fade-down.animated {
        transform: translateY(0);
    }

    .fade-left {
        transform: translateX(50px);
    }

    .fade-left.animated {
        transform: translateX(0);
    }

    .fade-right {
        transform: translateX(-50px);
    }

    .fade-right.animated {
        transform: translateX(0);
    }

    .fade-in {
        opacity: 0;
    }

    .fade-in.animated {
        opacity: 1;
    }

    /* Scale animations */
    .scale-up {
        transform: scale(0.8);
        opacity: 0;
    }

    .scale-up.animated {
        transform: scale(1);
        opacity: 1;
    }

    /* Rotate animations */
    .rotate-in {
        transform: rotate(-10deg) scale(0.8);
        opacity: 0;
    }

    .rotate-in.animated {
        transform: rotate(0deg) scale(1);
        opacity: 1;
    }

    /* Stagger animations for groups */
    .stagger-item {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .stagger-item.animated {
        opacity: 1;
        transform: translateY(0);
    }

    /* Bounce effect */
    .bounce-in {
        transform: translateY(100px);
        opacity: 0;
    }

    .bounce-in.animated {
        transform: translateY(0);
        opacity: 1;
        animation: bounceEffect 0.8s ease-out;
    }

    @keyframes bounceEffect {
        0% { transform: translateY(100px); }
        60% { transform: translateY(-20px); }
        80% { transform: translateY(10px); }
        100% { transform: translateY(0); }
    }

    /* Slide animations */
    .slide-in-left {
        transform: translateX(-100px);
        opacity: 0;
    }

    .slide-in-left.animated {
        transform: translateX(0);
        opacity: 1;
    }

    .slide-in-right {
        transform: translateX(100px);
        opacity: 0;
    }

    .slide-in-right.animated {
        transform: translateX(0);
        opacity: 1;
    }

    /* Flip animations */
    .flip-in {
        transform: perspective(400px) rotateY(90deg);
        opacity: 0;
    }

    .flip-in.animated {
        transform: perspective(400px) rotateY(0deg);
        opacity: 1;
    }

    /* Auto-apply animations to common elements */
    .section-title,
    .page-title,
    .slide-title,
    h1, h2, h3 {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .section-title.in-view,
    .page-title.in-view,
    .slide-title.in-view,
    h1.in-view, h2.in-view, h3.in-view {
        opacity: 1;
        transform: translateY(0);
    }

    .category-item,
    .feature-item,
    .faq-item,
    .product-item {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .category-item.in-view,
    .feature-item.in-view,
    .faq-item.in-view,
    .product-item.in-view {
        opacity: 1;
        transform: translateY(0);
    }

    .btn {
        transition: all 0.3s ease, transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
    }

    .btn:not(.in-view) {
        opacity: 0;
        transform: translateY(20px) scale(0.95);
    }

    .btn.in-view {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    /* Reduced motion for accessibility */
    @media (prefers-reduced-motion: reduce) {
        .animate-on-scroll,
        .stagger-item,
        .section-title,
        .page-title,
        .slide-title,
        h1, h2, h3,
        .category-item,
        .feature-item,
        .faq-item,
        .product-item,
        .btn {
            transition: none !important;
            animation: none !important;
            opacity: 1 !important;
            transform: none !important;
        }
    }
    </style>
</div><!-- #page -->

<!-- Scroll Animation System -->
<script>
    jQuery(document).ready(function($) {
        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        // Create observers for different animation types
        const createObserver = (className, callback) => {
            return new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        callback(entry.target);
                        // Optional: stop observing after animation
                        // observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
        };

        // Auto-animate common elements
        const autoAnimateObserver = createObserver('in-view', (element) => {
            element.classList.add('in-view');
        });

        // Stagger animation observer
        const staggerObserver = createObserver('animated', (element) => {
            const staggerItems = element.querySelectorAll('.stagger-item');
            staggerItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('animated');
                }, index * 100); // 100ms delay between each item
            });
        });

        // General animation observer
        const generalObserver = createObserver('animated', (element) => {
            element.classList.add('animated');
        });

        // Initialize animations when page loads
        function initScrollAnimations() {
            // Auto-animate common elements
            const autoElements = document.querySelectorAll(`
                .section-title,
                .page-title,
                .slide-title,
                h1:not(.slide-title):not(.page-title):not(.section-title),
                h2:not(.slide-title):not(.page-title):not(.section-title),
                h3:not(.slide-title):not(.page-title):not(.section-title),
                .category-item,
                .feature-item,
                .faq-item,
                .product-item,
                .woocommerce .product,
                .btn
            `);

            autoElements.forEach(el => {
                autoAnimateObserver.observe(el);
            });

            // Observe elements with specific animation classes
            const animatedElements = document.querySelectorAll(`
                .animate-on-scroll,
                .fade-up,
                .fade-down,
                .fade-left,
                .fade-right,
                .fade-in,
                .scale-up,
                .rotate-in,
                .bounce-in,
                .slide-in-left,
                .slide-in-right,
                .flip-in
            `);

            animatedElements.forEach(el => {
                generalObserver.observe(el);
            });

            // Observe stagger containers
            const staggerContainers = document.querySelectorAll('.stagger-container');
            staggerContainers.forEach(container => {
                staggerObserver.observe(container);
            });

            // Handle categories grid with stagger effect
            const categoriesGrid = document.querySelector('.categories-grid');
            if (categoriesGrid) {
                const categoryItems = categoriesGrid.querySelectorAll('.category-item');
                categoryItems.forEach((item, index) => {
                    item.style.transitionDelay = `${index * 0.1}s`;
                });
            }

            // Handle features grid with stagger effect
            const featuresGrid = document.querySelector('.features-grid');
            if (featuresGrid) {
                const featureItems = featuresGrid.querySelectorAll('.feature-item');
                featureItems.forEach((item, index) => {
                    item.style.transitionDelay = `${index * 0.15}s`;
                });
            }

            // Handle FAQ items with stagger effect
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach((item, index) => {
                item.style.transitionDelay = `${index * 0.1}s`;
            });
        }

        // Initialize on page load
        initScrollAnimations();

        // Re-initialize on window resize (for responsive changes)
        let resizeTimeout;
        $(window).on('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(initScrollAnimations, 250);
        });

        // Add smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            const target = $($(this).attr('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'easeInOutCubic');
            }
        });

        // Parallax effect for hero sections (optional)
        $(window).on('scroll', function() {
            const scrolled = $(this).scrollTop();
            const heroElements = $('.hero-slider, .page-header');

            heroElements.each(function() {
                const $this = $(this);
                const speed = 0.5;
                $this.css('transform', `translateY(${scrolled * speed}px)`);
            });
        });
    });
</script>
<?php wp_footer(); ?>
</body>
</html>