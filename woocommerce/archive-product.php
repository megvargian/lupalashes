<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 * Modern & Responsive Version
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
			
			<!-- Main Product Grid -->
			<div class="shop-main-content col-12">
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

<?php
get_footer( 'shop' );
