<?php
/**
 * The template for displaying product content in the single-product.php template - Modern Version
 *
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'modern-single-product', $product ); ?>>

	<!-- Product Main Section -->
	<div class="single-product-main">
		<div class="row">
			<!-- Product Gallery - Left Side -->
			<div class="col-lg-6 col-md-6 col-12 product-gallery-col">
				<div class="product-gallery-wrapper">
					<!-- Custom Gallery for Better UX -->
					<div class="custom-product-gallery">
						<!-- Main Image -->
						<div class="gallery-main-image">
							<?php
							$image_id = $product->get_image_id();
							if ( $image_id ) {
								$main_image_url = wp_get_attachment_image_url( $image_id, 'full' );
								echo '<img src="' . esc_url( $main_image_url ) . '" alt="' . esc_attr( $product->get_name() ) . '" class="main-product-image" id="mainProductImage">';
							}
							?>

							<!-- Product Badges -->
							<div class="single-product-badges">
								<?php if ( $product->is_on_sale() ) : ?>
									<span class="badge badge-sale">Sale</span>
								<?php endif; ?>
								<?php if ( $product->is_featured() ) : ?>
									<span class="badge badge-featured">Featured</span>
								<?php endif; ?>
								<?php if ( ! $product->is_in_stock() ) : ?>
									<span class="badge badge-out-of-stock">Out of Stock</span>
								<?php endif; ?>
							</div>
						</div>

						<!-- Thumbnail Gallery -->
						<?php
						$attachment_ids = $product->get_gallery_image_ids();
						if ( $attachment_ids && count( $attachment_ids ) > 0 ) :
						?>
						<div class="gallery-thumbnails">
							<div class="thumbnails-wrapper">
								<!-- Main Image Thumbnail -->
								<?php if ( $image_id ) :
									$thumb_url = wp_get_attachment_image_url( $image_id, 'thumbnail' );
									$full_url = wp_get_attachment_image_url( $image_id, 'full' );
								?>
								<div class="thumbnail-item active" data-image="<?php echo esc_url( $full_url ); ?>">
									<img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>">
								</div>
								<?php endif; ?>

								<!-- Gallery Thumbnails -->
								<?php foreach ( $attachment_ids as $attachment_id ) :
									$thumb_url = wp_get_attachment_image_url( $attachment_id, 'thumbnail' );
									$full_url = wp_get_attachment_image_url( $attachment_id, 'full' );
								?>
								<div class="thumbnail-item" data-image="<?php echo esc_url( $full_url ); ?>">
									<img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>">
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<!-- Product Summary - Right Side -->
			<div class="col-lg-6 col-md-6 col-12 product-summary-col">
				<div class="product-summary-wrapper">
					<div class="summary entry-summary">
						<?php
						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 */
						do_action( 'woocommerce_single_product_summary' );
						?>

						<!-- Additional Product Information -->
						<div class="product-additional-info">
							<ul class="product-features">
								<li><i class="fas fa-shipping-fast"></i> Free Shipping Over $150</li>
								<li><i class="fas fa-undo"></i> Easy Returns & Refunds</li>
								<li><i class="fas fa-shield-alt"></i> Secure Payment</li>
								<li><i class="fas fa-truck"></i> 2-4 Business Days Delivery</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Related Products Section -->
	<div class="related-products-section">
		<div class="row">
			<div class="col-12">
				<h3 class="section-title">You May Also Like</h3>
				<div class="related-products-grid">
					<?php
					$related_products = wc_get_related_products( $product->get_id(), 4 );
					if ( ! empty( $related_products ) ) {
						echo '<div class="row">';
						foreach ( $related_products as $related_product_id ) {
							$post_object = get_post( $related_product_id );
							setup_postdata( $GLOBALS['post'] =& $post_object );
							echo '<div class="col-lg-3 col-md-4 col-6 mb-4">';
							wc_get_template_part( 'content', 'product' );
							echo '</div>';
						}
						echo '</div>';
						wp_reset_postdata();
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

<script>
jQuery(document).ready(function($) {
	// Gallery thumbnail click handler
	$('.thumbnail-item').on('click', function() {
		var imageUrl = $(this).data('image');
		$('#mainProductImage').attr('src', imageUrl);
		$('.thumbnail-item').removeClass('active');
		$(this).addClass('active');
	});
});
</script>
