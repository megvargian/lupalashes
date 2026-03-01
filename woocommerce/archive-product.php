<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 * Modern & Responsive Version - Category Grouped Layout
 *
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;
get_header( 'shop' );
?>

<!-- Modern Shop Page Header -->
<div class="shop-page-header">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="shop-title">
					<?php woocommerce_page_title(); ?>
				</h1>
				<?php if ( category_description() ) : ?>
					<div class="shop-description"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<!-- Shop Content -->
<div class="shop-content-wrapper">
	<div class="container">
		<div class="row">
			<?php
				/**
				 * Hook: woocommerce_before_main_content.
				 */
				do_action( 'woocommerce_before_main_content' );
			?>

			<!-- Main Product Content -->
			<div class="shop-main-content col-12">
				<?php if ( is_shop() && !is_product_category() ) : // Category-grouped layout for main shop page only ?>

				<?php
				// Get all product categories
				$product_categories = get_terms( array(
					'taxonomy' => 'product_cat',
					'hide_empty' => true,
					'parent' => 0, // Get only parent categories
					'exclude' => array(15) // Exclude uncategorized if needed
				));

				if ( !empty($product_categories) && !is_wp_error($product_categories) ) :
					foreach ( $product_categories as $category ) :
						// Get products for this category
						$products_query = new WP_Query(array(
							'post_type' => 'product',
							'posts_per_page' => -1, // Show all products
							'post_status' => 'publish',
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'term_id',
									'terms' => $category->term_id,
								)
							)
						));

						if ( $products_query->have_posts() ) :
				?>

				<!-- Category Section -->
				<div class="category-section" id="category-<?php echo $category->slug; ?>">
					<!-- Category Header -->
					<div class="category-header">
						<h2 class="category-title"><?php echo esc_html($category->name); ?></h2>
						<?php if ( $category->description ) : ?>
							<p class="category-description"><?php echo esc_html($category->description); ?></p>
						<?php endif; ?>
						<div class="category-divider"></div>
					</div>

					<!-- Products Grid for this Category -->
					<div class="category-products-grid">
						<div class="row">
							<?php
							while ( $products_query->have_posts() ) :
								$products_query->the_post();
								global $product;
							?>
							<div class="col-lg-3 col-md-4 col-6 mb-4 product-col">
								<div class="product-card">
									<div class="product-image-wrapper">
										<a href="<?php the_permalink(); ?>" class="product-link">
											<div class="product-image">
												<?php
												$image_id = $product->get_image_id();
												$gallery_ids = $product->get_gallery_image_ids();

												if ( $image_id ) {
													echo wp_get_attachment_image( $image_id, 'medium', false, array(
														'class' => 'main-image',
														'alt' => get_the_title()
													));
												}

												// Show hover image if available
												if ( !empty($gallery_ids) ) {
													echo wp_get_attachment_image( $gallery_ids[0], 'medium', false, array(
														'class' => 'hover-image',
														'alt' => get_the_title()
													));
												}
												?>
											</div>
										</a>

										<div class="product-actions">
											<button class="action-btn quick-view-btn" data-product-id="<?php echo get_the_ID(); ?>" title="Quick View">
												<i class="fas fa-search"></i>
											</button>
											<button class="action-btn add-to-cart-btn ajax-add-to-cart" data-product-id="<?php echo get_the_ID(); ?>" title="Add to Cart">
												<i class="fas fa-plus"></i>
											</button>
										</div>
									</div>

									<div class="product-info">
										<h3 class="product-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<div class="product-price">
											<?php echo $product->get_price_html(); ?>
										</div>
									</div>
								</div>
							</div>
							<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
				</div>

				<?php
					endif; // End if products found
					endforeach; // End categories loop
				else :
				?>

				<!-- No categories found -->
				<div class="no-products-found">
					<div class="no-products-message">
						<i class="fas fa-search"></i>
						<h3><?php _e( 'No products found', 'woocommerce' ); ?></h3>
						<p><?php _e( 'No products were found.', 'woocommerce' ); ?></p>
					</div>
				</div>

				<?php endif; ?>

				<?php else : // Standard layout for category pages ?>

				<?php if ( woocommerce_product_loop() ) : ?>

					<!-- Toolbar with sorting and view options -->
					<div class="shop-toolbar">
						<div class="toolbar-left">
							<p class="woocommerce-result-count">
								<?php
								$total = wc_get_loop_prop( 'total' );
								$per_page = wc_get_loop_prop( 'per_page' );
								$current = wc_get_loop_prop( 'current_page' );
								$first = ( $per_page * $current ) - $per_page + 1;
								$last = min( $total, $per_page * $current );
								printf( __( 'Showing %d-%d of %d results', 'woocommerce' ), $first, $last, $total );
								?>
							</p>
						</div>
						<div class="toolbar-right">
							<?php
							/**
							 * Hook: woocommerce_before_shop_loop.
							 *
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
							?>
						</div>
					</div>

					<!-- Products Grid -->
					<div class="products-grid-wrapper">
						<div class="row modern-products-grid">
							<?php
							while ( have_posts() ) {
								the_post();
								?>
								<div class="col-lg-3 col-md-4 col-6 mb-4 product-col">
									<?php
									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );
									wc_get_template_part( 'content', 'product' );
									?>
								</div>
								<?php
							}
							?>
						</div>
					</div>

					<!-- Pagination -->
					<div class="shop-pagination">
						<?php
						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
						?>
					</div>

				<?php else : ?>

					<!-- No products found -->
					<div class="no-products-found">
						<div class="no-products-message">
							<i class="fas fa-search"></i>
							<h3><?php _e( 'No products found', 'woocommerce' ); ?></h3>
							<p><?php _e( 'No products were found matching your selection.', 'woocommerce' ); ?></p>
							<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" class="btn btn-primary">
								<?php _e( 'View All Products', 'woocommerce' ); ?>
							</a>
						</div>
					</div>

				<?php endif; ?>

				<?php endif; // End conditional layout ?>

				<?php
				/**
				 * Hook: woocommerce_after_main_content.
				 */
				do_action( 'woocommerce_after_main_content' );
				?>
			</div>
		</div>
	</div>
</div>

<?php if ( is_shop() && !is_product_category() ) : ?>
<style>
/* Category Section Styles - Only for main shop page */
.category-section {
	margin-bottom: 80px;
}

.category-header {
	text-align: center;
	margin-bottom: 40px;
}

.category-title {
	font-size: 36px;
	font-weight: 600;
	color: #1a1a1a;
	margin-bottom: 10px;
	text-transform: uppercase;
	letter-spacing: 2px;
}

.category-description {
	font-size: 16px;
	color: #666;
	margin-bottom: 20px;
}

.category-divider {
	width: 80px;
	height: 3px;
	background: #d1c2b4;
	margin: 0 auto;
	border-radius: 2px;
}

.category-products-grid {
	margin-top: 40px;
}

/* Product Card Styles */
.product-card {
	background: #fff;
	border-radius: 10px;
	overflow: hidden;
	box-shadow: 0 5px 15px rgba(0,0,0,0.08);
	transition: all 0.3s ease;
	height: 100%;
}

.product-card:hover {
	transform: translateY(-5px);
	box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.product-image-wrapper {
	position: relative;
	overflow: hidden;
}

.product-image {
	position: relative;
	padding-top: 100%;
	overflow: hidden;
}

.product-image img {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: opacity 0.3s ease;
}

.product-image .hover-image {
	opacity: 0;
}

.product-card:hover .product-image .main-image {
	opacity: 0;
}

.product-card:hover .product-image .hover-image {
	opacity: 1;
}

.product-actions {
	position: absolute;
	top: 15px;
	right: 15px;
	display: flex;
	flex-direction: column;
	gap: 10px;
	opacity: 0;
	transform: translateX(20px);
	transition: all 0.3s ease;
}

.product-card:hover .product-actions {
	opacity: 1;
	transform: translateX(0);
}

.action-btn {
	width: 40px;
	height: 40px;
	border-radius: 50%;
	border: none;
	background: #fff;
	color: #1a1a1a;
	display: flex;
	align-items: center;
	justify-content: center;
	cursor: pointer;
	box-shadow: 0 2px 10px rgba(0,0,0,0.1);
	transition: all 0.3s ease;
}

.action-btn:hover {
	background: #d1c2b4;
	color: #fff;
	transform: scale(1.1);
}

.product-info {
	padding: 20px;
	text-align: center;
}

.product-title {
	font-size: 16px;
	font-weight: 600;
	margin-bottom: 10px;
}

.product-title a {
	color: #1a1a1a;
	text-decoration: none;
	transition: color 0.3s ease;
}

.product-title a:hover {
	color: #d1c2b4;
}

.product-price {
	font-size: 18px;
	font-weight: 700;
	color: #d1c2b4;
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
	.category-title {
		font-size: 28px;
	}

	.category-section {
		margin-bottom: 60px;
	}

	.product-actions {
		opacity: 1;
		transform: translateX(0);
		position: static;
		flex-direction: row;
		justify-content: center;
		margin-top: 15px;
	}
}
</style>
<?php endif; // End CSS conditional ?>

<?php
get_footer( 'shop' );
?>
