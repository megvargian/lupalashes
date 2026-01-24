<?php
/**
 * The template for displaying product content within loops - Modern Version
 *
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$product_id = $product->get_id();
$attachment_ids = $product->get_gallery_image_ids();
$first_gallery_image = ! empty( $attachment_ids ) ? wp_get_attachment_image_url( $attachment_ids[0], 'woocommerce_thumbnail' ) : '';
?>

<div <?php wc_product_class( 'modern-product-card', $product ); ?>>
	<div class="product-card-inner">
		<!-- Product Image Section -->
		<div class="product-image-wrapper">
			<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="product-link">
				<div class="product-image">
					<?php
					// Main product image
					$image_id = $product->get_image_id();
					if ( $image_id ) {
						$image_url = wp_get_attachment_image_url( $image_id, 'woocommerce_thumbnail' );
						echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $product->get_name() ) . '" class="main-image">';
					} else {
						echo wc_placeholder_img();
					}
					
					// Hover image (first gallery image)
					if ( $first_gallery_image ) {
						echo '<img src="' . esc_url( $first_gallery_image ) . '" alt="' . esc_attr( $product->get_name() ) . '" class="hover-image">';
					}
					?>
				</div>

				<!-- Product Badges -->
				<div class="product-badges">
					<?php if ( $product->is_on_sale() ) : ?>
						<span class="badge badge-sale">Sale</span>
					<?php endif; ?>
					<?php if ( ! $product->is_in_stock() ) : ?>
						<span class="badge badge-out-of-stock">Out of Stock</span>
					<?php endif; ?>
					<?php if ( $product->is_featured() ) : ?>
						<span class="badge badge-featured">Featured</span>
					<?php endif; ?>
				</div>
			</a>

			<!-- Quick Actions -->
			<div class="product-quick-actions">
				<?php
				// Quick view button
				echo '<button class="quick-action-btn quick-view-btn" data-product-id="' . esc_attr( $product_id ) . '" title="Quick View">
						<i class="fas fa-eye"></i>
					</button>';

				// Wishlist button (if plugin available)
				if ( function_exists( 'YITH_WCWL' ) ) {
					echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
				}
				?>
			</div>

			<!-- Add to Cart (appears on hover) -->
			<div class="product-add-to-cart-hover">
				<?php
				woocommerce_template_loop_add_to_cart();
				?>
			</div>
		</div>

		<!-- Product Info Section -->
		<div class="product-info">
			<?php
			/**
			 * Product category
			 */
			$categories = get_the_terms( $product_id, 'product_cat' );
			if ( $categories && ! is_wp_error( $categories ) ) {
				$category = array_shift( $categories );
				echo '<div class="product-category">' . esc_html( $category->name ) . '</div>';
			}
			?>

			<!-- Product Title -->
			<h3 class="product-title">
				<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
					<?php echo esc_html( $product->get_name() ); ?>
				</a>
			</h3>

			<!-- Product Rating -->
			<?php if ( $product->get_average_rating() ) : ?>
				<div class="product-rating">
					<?php woocommerce_template_loop_rating(); ?>
				</div>
			<?php endif; ?>

			<!-- Product Short Description (Optional) -->
			<?php if ( $product->get_short_description() ) : ?>
				<div class="product-short-description">
					<?php echo wp_trim_words( $product->get_short_description(), 10 ); ?>
				</div>
			<?php endif; ?>

			<!-- Product Price -->
			<div class="product-price">
				<?php woocommerce_template_loop_price(); ?>
			</div>
		</div>
	</div>
</div>
