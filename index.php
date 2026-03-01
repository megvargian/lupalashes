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
                <div class="slide-bg video-slide">
                    <video autoplay muted loop playsinline class="slide-video">
                        <source src="<?php echo get_template_directory_uri(); ?>/inc/assets/videos/video-slide-1.webm" type="video/webm">
                        Your browser does not support the video tag.
                    </video>
                    <div class="slide-overlay"></div>
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
                                    <a href="#" class="btn btn-white">SHOP NOW</a>
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

<!-- Categories Section -->
<section class="categories-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Shop by Category</h2>
            <p class="section-subtitle">Discover our premium lash collections</p>
        </div>
        <div class="categories-grid">
            <div class="category-item">
                <div class="category-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/extensions-lashes.webp" alt="Extensions Lashes">
                    <div class="category-overlay">
                        <div class="category-content">
                            <h3 class="category-title">Extensions Lashes</h3>
                            <p class="category-description">Professional lash extensions for stunning length</p>
                            <a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>?product_cat=extensions" class="category-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="category-item">
                <div class="category-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/faux-mink.webp" alt="Faux Mink">
                    <div class="category-overlay">
                        <div class="category-content">
                            <h3 class="category-title">Faux Mink</h3>
                            <p class="category-description">Cruelty-free luxury with natural appearance</p>
                            <a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>?product_cat=faux-mink" class="category-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="category-item">
                <div class="category-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/real-mink.webp" alt="Real Mink">
                    <div class="category-overlay">
                        <div class="category-content">
                            <h3 class="category-title">Real Mink</h3>
                            <p class="category-description">Premium authentic mink for ultimate luxury</p>
                            <a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>?product_cat=real-mink" class="category-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="category-item">
                <div class="category-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/gift-sets.webp" alt="Gift Sets">
                    <div class="category-overlay">
                        <div class="category-content">
                            <h3 class="category-title">Gift Sets</h3>
                            <p class="category-description">Perfect gifts for lash lovers and beginners</p>
                            <a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>?product_cat=gift-sets" class="category-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="category-item">
                <div class="category-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/tools.webp" alt="Tools">
                    <div class="category-overlay">
                        <div class="category-content">
                            <h3 class="category-title">Tools</h3>
                            <p class="category-description">Professional tools for perfect application</p>
                            <a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>?product_cat=tools" class="category-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="category-item">
                <div class="category-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/glue.webp" alt="Glue">
                    <div class="category-overlay">
                        <div class="category-content">
                            <h3 class="category-title">Glue</h3>
                            <p class="category-description">High-quality adhesives for long-lasting hold</p>
                            <a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>?product_cat=glue" class="category-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.categories-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: 36px;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
    letter-spacing: 1px;
}

.section-subtitle {
    font-size: 18px;
    color: #666;
    margin: 0;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    max-width: 1400px;
    margin: 0 auto;
    justify-items: center;
    align-items: center;
}

.category-item {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    background: white;
}

.category-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.category-image {
    position: relative;
    height: 350px;
    overflow: hidden;
}

.category-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.category-item:hover .category-image img {
    transform: scale(1.1);
}

.category-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(209, 194, 180, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.category-item:hover .category-overlay {
    opacity: 1;
    visibility: visible;
}

.category-content {
    text-align: center;
    color: white;
    padding: 20px;
    transform: translateY(20px);
    transition: transform 0.3s ease;
}

.category-item:hover .category-content {
    transform: translateY(0);
}

.category-title {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 15px;
    color: white;
}

.category-description {
    font-size: 16px;
    margin-bottom: 25px;
    opacity: 0.95;
    line-height: 1.5;
}

.category-btn {
    display: inline-block;
    padding: 12px 30px;
    background: white;
    color: #d1c2b4 !important;
    text-decoration: none;
    border-radius: 25px;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.category-btn:hover {
    background: #f8f9fa;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    color: #d1c2b4;
    text-decoration: none;
}

@media (max-width: 768px) {
    .categories-section {
        padding: 60px 0;
    }

    .section-title {
        font-size: 28px;
    }

    .categories-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        padding: 0 15px;
    }

    .category-image {
        height: 280px;
    }

    .category-title {
        font-size: 20px;
    }

    .category-description {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .categories-grid {
        grid-template-columns: 1fr;
    }

    .section-header {
        margin-bottom: 40px;
    }
}
</style>

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
            <h2 class="section-title">Shop Now Our Lashes</h2>
            <a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>" class="view-all-link">View all</a>
        </div>

        <!-- Desktop Grid -->
        <div class="products-grid desktop-products">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 5,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $products = new WP_Query($args);

            if ($products->have_posts()) :
                while ($products->have_posts()) : $products->the_post();
                    global $product;
                    $image_id = $product->get_image_id();
                    $gallery_ids = $product->get_gallery_image_ids();
                    $hover_image = '';
                    if (!empty($gallery_ids)) {
                        $hover_image = wp_get_attachment_image_url($gallery_ids[0], 'medium');
                    }
            ?>
            <div class="product-card">
                <div class="product-image-wrapper">
                    <div class="product-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" class="main-image">
                            <?php if ($hover_image) : ?>
                                <img src="<?php echo $hover_image; ?>" alt="<?php the_title(); ?>" class="hover-image">
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="product-actions">
                        <button class="action-btn search-btn quick-view-btn" data-product-id="<?php echo get_the_ID(); ?>" title="Quick View">
                            <i class="fas fa-search"></i>
                        </button>
                        <button class="action-btn add-btn ajax-add-to-cart" data-product-id="<?php echo get_the_ID(); ?>" title="Add to Cart">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="product-info">
                    <?php
                    $product_categories = get_the_terms(get_the_ID(), 'product_cat');
                    if ($product_categories && !is_wp_error($product_categories)) {
                        $first_category = $product_categories[0];
                        $category_link = get_term_link($first_category);
                        echo '<p class="product-vendor"><a href="' . esc_url($category_link) . '">' . esc_html($first_category->name) . '</a></p>';
                    } else {
                        echo '<p class="product-vendor">Uncategorized</p>';
                    }
                    ?>
                    <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="product-price-wrapper">
                        <span class="product-price"><?php echo $product->get_price_html(); ?></span>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- Mobile Swiper -->
        <div class="products-swiper mobile-products">
            <div class="swiper products-slider">
                <div class="swiper-wrapper">
                    <?php
                    $products->rewind_posts();
                    if ($products->have_posts()) :
                        while ($products->have_posts()) : $products->the_post();
                            global $product;
                            $image_id = $product->get_image_id();
                            $gallery_ids = $product->get_gallery_image_ids();
                            $hover_image = '';
                            if (!empty($gallery_ids)) {
                                $hover_image = wp_get_attachment_image_url($gallery_ids[0], 'medium');
                            }
                    ?>
                    <div class="swiper-slide">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <div class="product-image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" class="main-image">
                                    <?php endif; ?>
                                </div>
                                <div class="product-actions">
                                    <button class="action-btn search-btn quick-view-btn" data-product-id="<?php echo get_the_ID(); ?>" title="Quick View">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="action-btn add-btn ajax-add-to-cart" data-product-id="<?php echo get_the_ID(); ?>" title="Add to Cart">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="product-info">
                                <?php
                                $product_categories = get_the_terms(get_the_ID(), 'product_cat');
                                if ($product_categories && !is_wp_error($product_categories)) {
                                    $first_category = $product_categories[0];
                                    $category_link = get_term_link($first_category);
                                    echo '<p class="product-vendor"><a href="' . esc_url($category_link) . '">' . esc_html($first_category->name) . '</a></p>';
                                } else {
                                    echo '<p class="product-vendor">Uncategorized</p>';
                                }
                                ?>
                                <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="product-price-wrapper">
                                    <span class="product-price"><?php echo $product->get_price_html(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

<!-- Initialize Products Slider -->
<script>
window.addEventListener('DOMContentLoaded', function() {
    if (window.innerWidth <= 991) {
        var productsSwiper = new Swiper('.products-slider', {
            slidesPerView: 1.2,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                }
            }
        });
    }
});
</script>

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

<?php
get_footer();