<?php
/**
 * Template Name: Homepage
 */
get_header();
?>

<!-- Hero Slider Section -->
<section class="hero-slider">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <div class="slide-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/inc/assets/images/slide1.jpg');">
                    <div class="slide-overlay"></div>
                    <div class="slide-content">
                        <div class="container">
                            <div class="content-wrapper">
                                <span class="slide-subtitle">Premium Lash Collection</span>
                                <h1 class="slide-title">ELEVATE YOUR<br>NATURAL BEAUTY</h1>
                                <p class="slide-description">Discover our luxury lash extensions designed to enhance your natural elegance</p>
                                <div class="slide-buttons">
                                    <a href="#" class="btn btn-white">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
                <div class="slide-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/inc/assets/images/slide2.jpg');">
                    <div class="slide-overlay"></div>
                    <div class="slide-content">
                        <div class="container">
                            <div class="content-wrapper">
                                <span class="slide-subtitle">Professional Application</span>
                                <h1 class="slide-title">EXPERTLY<br>CRAFTED LASHES</h1>
                                <p class="slide-description">Experience the art of professional lash extension application</p>
                                <div class="slide-buttons">
                                    <a href="#" class="btn btn-white">BOOK APPOINTMENT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide">
                <div class="slide-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/inc/assets/images/slide3.jpg');">
                    <div class="slide-overlay"></div>
                    <div class="slide-content">
                        <div class="container">
                            <div class="content-wrapper">
                                <span class="slide-subtitle">Luxury Experience</span>
                                <h1 class="slide-title">TRANSFORM<br>YOUR LOOK</h1>
                                <p class="slide-description">Indulge in the ultimate luxury lash extension experience</p>
                                <div class="slide-buttons">
                                    <a href="#" class="btn btn-white">DISCOVER MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<!-- Initialize Slider -->
<script>
window.addEventListener('DOMContentLoaded', function() {
    var heroSwiper = new Swiper('.hero-swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        speed: 1000,
    });
});
</script>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="features-grid">
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <h3>Premium Quality</h3>
                <p>Only the finest materials for long-lasting, natural-looking lashes</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Safe & Gentle</h3>
                <p>Hypoallergenic products that are gentle on sensitive eyes</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <h3>Expert Application</h3>
                <p>Professionally trained technicians ensuring perfect results</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Long Lasting</h3>
                <p>Extensions that stay beautiful for weeks with proper care</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/about-lashes.jpg" alt="About Lupalashes">
            </div>
            <div class="about-text">
                <span class="section-subtitle">About Us</span>
                <h2 class="section-title">Your Beauty, Our Passion</h2>
                <p>At Lupalashes, we believe every woman deserves to feel beautiful and confident. Our premium lash extensions are carefully crafted to enhance your natural beauty while maintaining the health of your natural lashes.</p>
                <p>With years of experience and a commitment to excellence, we provide personalized service to ensure you get the perfect lash look for your unique style.</p>
                <a href="<?php echo site_url('/about-us'); ?>" class="btn btn-primary">Discover More</a>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="products-section" id="products">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Our Collection</span>
            <h2 class="section-title">Featured Products</h2>
        </div>
        <div class="products-grid">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $products = new WP_Query($args);

            if ($products->have_posts()) :
                while ($products->have_posts()) : $products->the_post();
                    global $product;
            ?>
            <div class="product-card">
                <div class="product-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php endif; ?>
                    <div class="product-overlay">
                        <a href="<?php the_permalink(); ?>" class="btn btn-light">View Details</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3><?php the_title(); ?></h3>
                    <span class="product-price"><?php echo $product->get_price_html(); ?></span>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <div class="section-footer">
            <a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>" class="btn btn-secondary">View All Products</a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Testimonials</span>
            <h2 class="section-title">What Our Clients Say</h2>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Amazing quality and service! My lashes look so natural and beautiful. I get compliments every day!"</p>
                <div class="testimonial-author">
                    <strong>Sarah Johnson</strong>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"The best lash extensions I've ever had. They last for weeks and still look perfect!"</p>
                <div class="testimonial-author">
                    <strong>Emily Davis</strong>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Professional service and stunning results. Highly recommend Lupalashes to everyone!"</p>
                <div class="testimonial-author">
                    <strong>Jessica Martinez</strong>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Transform Your Look?</h2>
            <p>Book your appointment today and experience the luxury of professional lash extensions.</p>
            <a href="<?php echo site_url('/contact-us'); ?>" class="btn btn-light">Book Appointment</a>
        </div>
    </div>
</section>

<?php
get_footer();