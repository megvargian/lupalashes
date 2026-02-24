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

							<!-- Zoom Button -->
							<button class="image-zoom-btn" id="imageZoomBtn" title="Click to zoom">
								<i class="fas fa-search-plus"></i>
							</button>

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
						<!-- <div class="product-additional-info">
							<ul class="product-features">
								<li><i class="fas fa-shipping-fast"></i> Free Shipping Over $150</li>
								<li><i class="fas fa-undo"></i> Easy Returns & Refunds</li>
								<li><i class="fas fa-shield-alt"></i> Secure Payment</li>
								<li><i class="fas fa-truck"></i> 2-4 Business Days Delivery</li>
							</ul>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Product Long Description Section -->
	<?php
	$product_description = get_the_content();
	if ( ! empty( $product_description ) ) : ?>
	<div class="product-description-section">
		<div class="row">
			<div class="col-12">
				<div class="product-description-wrapper">
					<h3 class="section-title">Description</h3>
					<div class="product-full-description">
						<?php
						// Display the full product description
						the_content();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

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

	<!-- Image Zoom Modal -->
	<div class="image-zoom-modal" id="imageZoomModal">
		<div class="zoom-modal-overlay"></div>
		<div class="zoom-modal-content">
			<button class="zoom-modal-close" id="zoomModalClose">
				<i class="fas fa-times"></i>
			</button>
			<div class="zoom-image-container">
				<img src="" alt="" class="zoom-image" id="zoomImage">
			</div>
			<div class="zoom-navigation" id="zoomNavigation">
				<button class="zoom-nav-btn zoom-prev" id="zoomPrev">
					<i class="fas fa-chevron-left"></i>
				</button>
				<button class="zoom-nav-btn zoom-next" id="zoomNext">
					<i class="fas fa-chevron-right"></i>
				</button>
			</div>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

<script>
jQuery(document).ready(function($) {
	var currentImageIndex = 0;
	var galleryImages = [];

	// Build gallery images array
	function buildGalleryArray() {
		galleryImages = [];
		$('.thumbnail-item').each(function() {
			galleryImages.push({
				src: $(this).data('image'),
				alt: $(this).find('img').attr('alt')
			});
		});
	}

	// Initialize gallery
	buildGalleryArray();

	// Gallery thumbnail click handler
	$('.thumbnail-item').on('click', function() {
		var imageUrl = $(this).data('image');
		$('#mainProductImage').attr('src', imageUrl);
		$('.thumbnail-item').removeClass('active');
		$(this).addClass('active');

		// Update current index
		currentImageIndex = $(this).index();
	});

	// Zoom button click handler
	$('#imageZoomBtn, #mainProductImage').on('click', function() {
		var currentImage = $('#mainProductImage').attr('src');
		var currentAlt = $('#mainProductImage').attr('alt');

		// Set current image in modal
		$('#zoomImage').attr('src', currentImage).attr('alt', currentAlt);

		// Show modal
		$('#imageZoomModal').addClass('active');
		$('body').addClass('zoom-modal-open');

		// Show navigation if multiple images
		if (galleryImages.length > 1) {
			$('#zoomNavigation').show();
		} else {
			$('#zoomNavigation').hide();
		}
	});

	// Close zoom modal
	$('#zoomModalClose, .zoom-modal-overlay').on('click', function() {
		$('#imageZoomModal').removeClass('active');
		$('body').removeClass('zoom-modal-open');
	});

	// Zoom navigation
	$('#zoomPrev').on('click', function() {
		currentImageIndex = currentImageIndex > 0 ? currentImageIndex - 1 : galleryImages.length - 1;
		updateZoomImage();
	});

	$('#zoomNext').on('click', function() {
		currentImageIndex = currentImageIndex < galleryImages.length - 1 ? currentImageIndex + 1 : 0;
		updateZoomImage();
	});

	// Update zoom image
	function updateZoomImage() {
		if (galleryImages[currentImageIndex]) {
			$('#zoomImage').attr('src', galleryImages[currentImageIndex].src)
						  .attr('alt', galleryImages[currentImageIndex].alt);

			// Update main image and active thumbnail
			$('#mainProductImage').attr('src', galleryImages[currentImageIndex].src);
			$('.thumbnail-item').removeClass('active').eq(currentImageIndex).addClass('active');
		}
	}

	// Keyboard navigation
	$(document).on('keydown', function(e) {
		if ($('#imageZoomModal').hasClass('active')) {
			if (e.key === 'Escape') {
				$('#zoomModalClose').click();
			} else if (e.key === 'ArrowLeft') {
				$('#zoomPrev').click();
			} else if (e.key === 'ArrowRight') {
				$('#zoomNext').click();
			}
		}
	});

	// Prevent modal close when clicking on image
	$('#zoomImage').on('click', function(e) {
		e.stopPropagation();
	});
});
</script>

<style>
/* Product Gallery Enhancements */
.gallery-main-image {
	position: relative;
	overflow: hidden;
	border-radius: 12px;
	cursor: pointer;
	transition: all 0.3s ease;
}

.gallery-main-image:hover {
	transform: scale(1.02);
}

.main-product-image {
	width: 100%;
	height: auto;
	border-radius: 12px;
	transition: all 0.3s ease;
}

/* Zoom Button */
.image-zoom-btn {
	position: absolute;
	top: 15px;
	right: 15px;
	width: 45px;
	height: 45px;
	background: rgba(255, 255, 255, 0.9);
	border: none;
	border-radius: 50%;
	display: flex;
	align-items: center;
	justify-content: center;
	cursor: pointer;
	transition: all 0.3s ease;
	box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
	z-index: 10;
}

.image-zoom-btn:hover {
	background: #d1c2b4;
	color: white;
	transform: scale(1.1);
	box-shadow: 0 6px 20px rgba(212, 165, 116, 0.4);
}

.image-zoom-btn i {
	font-size: 18px;
	color: #666;
	transition: color 0.3s ease;
}

.image-zoom-btn:hover i {
	color: white;
}

/* Zoom Modal */
.image-zoom-modal {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.9);
	z-index: 9999;
	opacity: 0;
	visibility: hidden;
	transition: all 0.3s ease;
	display: flex;
	align-items: center;
	justify-content: center;
}

.image-zoom-modal.active {
	opacity: 1;
	visibility: visible;
}

.zoom-modal-overlay {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	cursor: pointer;
}

.zoom-modal-content {
	position: relative;
	max-width: 90%;
	max-height: 90%;
	z-index: 10;
}

.zoom-modal-close {
	position: absolute;
	top: -50px;
	right: 0;
	width: 40px;
	height: 40px;
	background: rgba(255, 255, 255, 0.2);
	border: 2px solid rgba(255, 255, 255, 0.3);
	border-radius: 50%;
	color: white;
	cursor: pointer;
	transition: all 0.3s ease;
	display: flex;
	align-items: center;
	justify-content: center;
	z-index: 11;
}

.zoom-modal-close:hover {
	background: #d1c2b4;
	border-color: #d1c2b4;
	transform: scale(1.1);
}

.zoom-image-container {
	position: relative;
	background: white;
	border-radius: 12px;
	overflow: hidden;
	box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.zoom-image {
	max-width: 100%;
	max-height: 80vh;
	width: auto;
	height: auto;
	display: block;
}

.zoom-navigation {
	position: absolute;
	top: 50%;
	transform: translateY(-50%);
	width: 100%;
	display: flex;
	justify-content: space-between;
	padding: 0 20px;
	pointer-events: none;
}

.zoom-nav-btn {
	width: 50px;
	height: 50px;
	background: rgba(255, 255, 255, 0.9);
	border: none;
	border-radius: 50%;
	color: #666;
	cursor: pointer;
	transition: all 0.3s ease;
	display: flex;
	align-items: center;
	justify-content: center;
	pointer-events: all;
	box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.zoom-nav-btn:hover {
	background: #d1c2b4;
	color: white;
	transform: scale(1.1);
}

.zoom-nav-btn i {
	font-size: 20px;
}

/* Body lock when modal is open */
body.zoom-modal-open {
	overflow: hidden;
}

/* Responsive adjustments */
@media (max-width: 768px) {
	.zoom-modal-content {
		max-width: 95%;
		max-height: 95%;
	}

	.zoom-modal-close {
		top: -40px;
		width: 35px;
		height: 35px;
	}

	.zoom-nav-btn {
		width: 40px;
		height: 40px;
	}

	.zoom-nav-btn i {
		font-size: 16px;
	}

	.image-zoom-btn {
		width: 40px;
		height: 40px;
		top: 10px;
		right: 10px;
	}

	.image-zoom-btn i {
		font-size: 16px;
	}
}

@media (max-width: 480px) {
	.zoom-navigation {
		padding: 0 10px;
	}
}

/* Product Description Section */
.product-description-section {
	margin: 60px 0;
	padding: 40px 0;
	background: #f9f9f9;
	border-radius: 12px;
}

.product-description-wrapper {
	max-width: 800px;
	margin: 0 auto;
	padding: 0 20px;
}

.product-description-section .section-title {
	font-size: 28px;
	font-weight: 600;
	color: #333;
	text-align: center;
	margin-bottom: 30px;
	position: relative;
}

.product-description-section .section-title::after {
	content: '';
	position: absolute;
	bottom: -10px;
	left: 50%;
	transform: translateX(-50%);
	width: 80px;
	height: 3px;
	background: #d1c2b4;
	border-radius: 2px;
}

.product-full-description {
	font-size: 16px;
	line-height: 1.7;
	color: #555;
	text-align: left;
}

.product-full-description p {
	margin-bottom: 20px;
}

.product-full-description h1,
.product-full-description h2,
.product-full-description h3,
.product-full-description h4,
.product-full-description h5,
.product-full-description h6 {
	color: #333;
	margin: 25px 0 15px 0;
	font-weight: 600;
}

.product-full-description ul,
.product-full-description ol {
	margin: 20px 0;
	padding-left: 30px;
}

.product-full-description li {
	margin-bottom: 8px;
}

.product-full-description a {
	color: #d1c2b4;
	text-decoration: none;
	transition: color 0.3s ease;
}

.product-full-description a:hover {
	color: #b8935f;
	text-decoration: underline;
}

.product-full-description img {
	max-width: 100%;
	height: auto;
	border-radius: 8px;
	margin: 20px 0;
}

.product-full-description blockquote {
	background: #fff;
	border-left: 4px solid #d1c2b4;
	padding: 20px 25px;
	margin: 25px 0;
	font-style: italic;
	border-radius: 0 8px 8px 0;
	box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

/* Responsive adjustments for description section */
@media (max-width: 768px) {
	.product-description-section {
		margin: 40px 0;
		padding: 30px 0;
	}

	.product-description-wrapper {
		padding: 0 15px;
	}

	.product-description-section .section-title {
		font-size: 24px;
		margin-bottom: 25px;
	}

	.product-full-description {
		font-size: 15px;
	}
}

@media (max-width: 480px) {
	.product-description-section {
		margin: 30px 0;
		padding: 25px 0;
	}

	.product-description-section .section-title {
		font-size: 22px;
		margin-bottom: 20px;
	}

	.product-full-description {
		font-size: 14px;
	}
}
</style>
