<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="page" class="site main_page_wrapper">
        <!-- Header Navigation -->
        <header class="site-header">
            <div class="header-container">
                <div class="site-logo">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo home_url('/'); ?>" class="logo-text">
                            <span class="brand-name">Lupalashes</span>
                        </a>
                    <?php endif; ?>
                </div>

                <nav class="main-navigation">
                    <ul class="nav-menu">
                        <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
                        <li><a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>">Shop</a></li>
                        <li><a href="<?php echo site_url('/about-us'); ?>">About</a></li>
                        <li><a href="<?php echo site_url('/contact-us'); ?>">Contact</a></li>
                    </ul>
                </nav>

                <div class="header-actions">
                    <?php if (class_exists('WooCommerce')) : ?>
                        <a href="<?php echo wc_get_cart_url(); ?>" class="cart-icon">
                            <i class="fas fa-shopping-bag"></i>
                            <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        </a>
                    <?php endif; ?>
                    <button class="mobile-menu-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </header>

        <script>
        jQuery(document).ready(function($) {
            // Mobile menu toggle
            $('.mobile-menu-toggle').on('click', function() {
                $(this).toggleClass('active');
                $('.main-navigation').toggleClass('active');
                $('body').toggleClass('menu-open');
            });

            // Close menu when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.site-header').length) {
                    $('.mobile-menu-toggle').removeClass('active');
                    $('.main-navigation').removeClass('active');
                    $('body').removeClass('menu-open');
                }
            });
        });
        </script>
        <div id="content" class="site-content">