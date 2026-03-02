<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header();

// Check if this is a WooCommerce page for special styling
$is_checkout_page = function_exists('is_checkout') && is_checkout();
$is_cart_page = function_exists('is_cart') && is_cart();
$is_account_page = function_exists('is_account_page') && is_account_page();

if ($is_checkout_page || $is_cart_page || $is_account_page) : ?>
	<div class="woocommerce-page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php
					while ( have_posts() ) : the_post();
						the_content();
					endwhile; // End of the loop.
					?>
				</div>
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile; // End of the loop.
				?>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php
get_footer();
