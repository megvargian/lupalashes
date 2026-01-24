<?php
/**
 * WooCommerce AJAX Functions
 * - Cart count update
 * - Quick view
 * - AJAX add to cart
 */

// Get cart count via AJAX
add_action('wp_ajax_get_cart_count', 'ajax_get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'ajax_get_cart_count');

function ajax_get_cart_count() {
    if (class_exists('WooCommerce')) {
        $cart_count = WC()->cart->get_cart_contents_count();
        wp_send_json_success(array('count' => $cart_count));
    } else {
        wp_send_json_error(array('message' => 'WooCommerce not active'));
    }
}

// AJAX Add to Cart
add_action('wp_ajax_ajax_add_to_cart', 'ajax_add_to_cart_handler');
add_action('wp_ajax_nopriv_ajax_add_to_cart', 'ajax_add_to_cart_handler');

function ajax_add_to_cart_handler() {
    if (!isset($_POST['product_id'])) {
        wp_send_json_error(array('message' => 'Product ID is required'));
        return;
    }

    $product_id = absint($_POST['product_id']);
    $quantity = isset($_POST['quantity']) ? absint($_POST['quantity']) : 1;

    if ($quantity <= 0) {
        $quantity = 1;
    }

    // Add to cart
    $added = WC()->cart->add_to_cart($product_id, $quantity);

    if ($added) {
        $cart_count = WC()->cart->get_cart_contents_count();

        wp_send_json_success(array(
            'message' => 'Product added to cart successfully!',
            'cart_count' => $cart_count,
            'fragments' => apply_filters('woocommerce_add_to_cart_fragments', array()),
            'cart_hash' => WC()->cart->get_cart_hash()
        ));
    } else {
        wp_send_json_error(array('message' => 'Failed to add product to cart'));
    }
}

// Quick View Product
add_action('wp_ajax_quick_view_product', 'ajax_quick_view_product');
add_action('wp_ajax_nopriv_quick_view_product', 'ajax_quick_view_product');

function ajax_quick_view_product() {
    if (!isset($_POST['product_id'])) {
        wp_send_json_error(array('message' => 'Product ID is required'));
        return;
    }

    $product_id = absint($_POST['product_id']);
    $product = wc_get_product($product_id);

    if (!$product) {
        wp_send_json_error(array('message' => 'Product not found'));
        return;
    }

    ob_start();
    ?>
    <div class="quick-view-product">
        <div class="row">
            <!-- Product Images -->
            <div class="col-md-6">
                <div class="quick-view-images">
                    <?php
                    $image_id = $product->get_image_id();
                    if ($image_id) {
                        $image_url = wp_get_attachment_image_url($image_id, 'large');
                        echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($product->get_name()) . '" class="quick-view-main-image img-fluid mb-3">';
                    }

                    // Gallery thumbnails
                    $attachment_ids = $product->get_gallery_image_ids();
                    if ($attachment_ids && count($attachment_ids) > 0) {
                        echo '<div class="quick-view-thumbnails">';

                        // Main image thumbnail
                        if ($image_id) {
                            $thumb_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                            $full_url = wp_get_attachment_image_url($image_id, 'large');
                            echo '<img src="' . esc_url($thumb_url) . '" alt="' . esc_attr($product->get_name()) . '" class="quick-view-thumbnail active" data-image="' . esc_url($full_url) . '">';
                        }

                        // Gallery thumbnails
                        foreach ($attachment_ids as $attachment_id) {
                            $thumb_url = wp_get_attachment_image_url($attachment_id, 'thumbnail');
                            $full_url = wp_get_attachment_image_url($attachment_id, 'large');
                            echo '<img src="' . esc_url($thumb_url) . '" alt="' . esc_attr($product->get_name()) . '" class="quick-view-thumbnail" data-image="' . esc_url($full_url) . '">';
                        }

                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <div class="quick-view-info">
                    <h2 class="product-title"><?php echo esc_html($product->get_name()); ?></h2>

                    <div class="product-price mb-3">
                        <?php echo $product->get_price_html(); ?>
                    </div>

                    <?php if ($product->get_rating_count()) : ?>
                        <div class="product-rating mb-3">
                            <?php woocommerce_template_loop_rating(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($product->get_short_description()) : ?>
                        <div class="product-short-description mb-3">
                            <?php echo wpautop($product->get_short_description()); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($product->is_type('simple') && $product->is_purchasable() && $product->is_in_stock()) : ?>
                        <div class="quantity-add-to-cart">
                            <div class="quantity-selector mb-3">
                                <label for="quick-view-quantity">Quantity:</label>
                                <input type="number" id="quick-view-quantity" class="qty form-control" min="1" value="1" style="width: 80px; display: inline-block;">
                            </div>
                            <button class="btn btn-primary btn-lg ajax-add-to-cart" data-product-id="<?php echo esc_attr($product_id); ?>">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    <?php elseif (!$product->is_in_stock()) : ?>
                        <p class="out-of-stock">Out of stock</p>
                    <?php endif; ?>

                    <div class="product-meta mt-4">
                        <?php if ($product->get_sku()) : ?>
                            <span class="sku-wrapper d-block mb-2">
                                <strong>SKU:</strong> <?php echo esc_html($product->get_sku()); ?>
                            </span>
                        <?php endif; ?>

                        <?php
                        $categories = get_the_terms($product_id, 'product_cat');
                        if ($categories && !is_wp_error($categories)) {
                            echo '<span class="posted-in d-block mb-2"><strong>Category:</strong> ';
                            $cat_names = array();
                            foreach ($categories as $category) {
                                $cat_names[] = '<a href="' . get_term_link($category) . '">' . esc_html($category->name) . '</a>';
                            }
                            echo implode(', ', $cat_names);
                            echo '</span>';
                        }
                        ?>
                    </div>

                    <a href="<?php echo esc_url($product->get_permalink()); ?>" class="btn btn-outline-secondary mt-3">
                        View Full Details
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
    $html = ob_get_clean();

    wp_send_json_success(array('html' => $html));
}

// AJAX Product Search
add_action('wp_ajax_search_products', 'ajax_search_products');
add_action('wp_ajax_nopriv_search_products', 'ajax_search_products');

function ajax_search_products() {
    $search_term = isset($_POST['search_term']) ? sanitize_text_field($_POST['search_term']) : '';

    if (empty($search_term) || strlen($search_term) < 2) {
        wp_send_json_error(array('message' => 'Please enter at least 2 characters'));
        return;
    }

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 10,
        's' => $search_term,
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'exclude-from-search',
                'operator' => 'NOT IN',
            ),
        ),
    );

    // Also search in categories and tags
    $tax_query = array('relation' => 'OR');

    $categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'search' => $search_term,
        'hide_empty' => true,
    ));

    $tags = get_terms(array(
        'taxonomy' => 'product_tag',
        'search' => $search_term,
        'hide_empty' => true,
    ));

    if (!empty($categories)) {
        $tax_query[] = array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => wp_list_pluck($categories, 'term_id'),
        );
    }

    if (!empty($tags)) {
        $tax_query[] = array(
            'taxonomy' => 'product_tag',
            'field' => 'term_id',
            'terms' => wp_list_pluck($tags, 'term_id'),
        );
    }

    if (count($tax_query) > 1) {
        $args['tax_query'][] = $tax_query;
    }

    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        ob_start();
        ?>
        <div class="no-search-results">
            <i class="fas fa-search"></i>
            <p>No products found for "<?php echo esc_html($search_term); ?>"</p>
            <a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>" class="btn btn-primary">
                View All Products
            </a>
        </div>
        <?php
        $html = ob_get_clean();
        wp_send_json_success(array('html' => $html, 'count' => 0));
        return;
    }

    ob_start();
    ?>
    <div class="search-results-list">
        <div class="search-results-count">
            Found <?php echo $query->found_posts; ?> product(s) for "<?php echo esc_html($search_term); ?>"
        </div>
        <?php
        while ($query->have_posts()) {
            $query->the_post();
            global $product;
            ?>
            <div class="search-result-item">
                <a href="<?php echo esc_url(get_permalink()); ?>" class="search-result-link">
                    <div class="search-result-image">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('thumbnail');
                        } else {
                            echo '<img src="' . wc_placeholder_img_src() . '" alt="Placeholder">';
                        }
                        ?>
                    </div>
                    <div class="search-result-info">
                        <h4 class="search-result-title"><?php echo get_the_title(); ?></h4>
                        <div class="search-result-price">
                            <?php echo $product->get_price_html(); ?>
                        </div>
                        <?php if ($product->get_short_description()) : ?>
                            <p class="search-result-excerpt">
                                <?php echo wp_trim_words($product->get_short_description(), 15); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </a>
            </div>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
    <?php
    $html = ob_get_clean();

    wp_send_json_success(array('html' => $html, 'count' => $query->found_posts));
}
