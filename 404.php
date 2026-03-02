<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section class="page_404_fullwidth">
		<div class="error_404_container">
			<div class="error_404_content">
				<div class="error_404_number">404</div>
				<div class="error_404_title">
					<?php echo __('Oops! Page Not Found', '404')?>
				</div>
				<div class="error_404_subtitle">
					<?php echo __('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', '404')?>
				</div>
				<div class="error_404_actions">
					<a href="<?php echo esc_url( home_url( '/' )); ?>" class="btn_404_home">
						<i class="fas fa-home"></i>
						<?php echo __('Back to Home', '404')?>
					</a>
					<?php if (class_exists('WooCommerce')) : ?>
					<a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>" class="btn_404_shop">
						<i class="fas fa-shopping-bag"></i>
						<?php echo __('Continue Shopping', '404')?>
					</a>
					<?php endif; ?>
				</div>
				<div class="error_404_search">
					<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search_404_form">
						<input type="search" placeholder="<?php echo __('Search for something else...', '404'); ?>" 
							value="<?php echo get_search_query(); ?>" name="s" class="search_404_input">
						<button type="submit" class="search_404_btn">
							<i class="fas fa-search"></i>
						</button>
					</form>
				</div>
			</div>
			<div class="error_404_decoration">
				<div class="floating_element element_1"></div>
				<div class="floating_element element_2"></div>
				<div class="floating_element element_3"></div>
			</div>
		</div>
	</section>

<?php
get_footer();
