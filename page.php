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

// Check if this is a WooCommerce checkout or cart page for full width
$is_fullwidth_page = (function_exists('is_checkout') && is_checkout()) || 
					 (function_exists('is_cart') && is_cart()) ||
					 (function_exists('is_account_page') && is_account_page());

if ($is_fullwidth_page) : ?>
	<div class="fullwidth-page-content">
		<?php
		while ( have_posts() ) : the_post();
			the_content();
		endwhile; // End of the loop.
		?>
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
