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
