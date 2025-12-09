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
if(is_product()){
    $is_product_from_mystiquerose = has_term(17, 'product_cat', get_the_ID()) ||
                                    has_term(23, 'product_cat', get_the_ID()) ||
                                    has_term(18, 'product_cat', get_the_ID()) ||
                                    has_term(25, 'product_cat', get_the_ID()) ||
                                    has_term(20, 'product_cat', get_the_ID()) ? 1 : 0;
}
$all_generalFields = get_fields('options');
$top_header_fields = $all_generalFields['top_header_fields'];
$left_side_top_header_fields = $top_header_fields['left_side_top_header'];
$right_side_top_header_fields = $top_header_fields['right_side_top_header'];
$main_logo_image = $all_generalFields['main_logo'];
$main_logo_link = $all_generalFields['main_logo_link'];
$main_logo_mystiquerose = $all_generalFields['main_logo_mystiquerose'];
$main_logo_link_mystiquerose = $all_generalFields['main_logo_mystiquerose_link'];
$is_MystiqueRose = is_page(460) || is_page(2409) || is_product_category(17) || is_product_category(23) || is_product_category(18) || is_product_category(25) || is_product_category(20) || !empty($is_product_from_mystiquerose);
$header_menu = $is_MystiqueRose ? $all_generalFields['header_menu_mystique_rose'] : $all_generalFields['header_menu'];
$current_url = home_url(add_query_arg(array(), $wp->request));
$get_size_guide_fields = $all_generalFields;
$is_new_mystiquerose_page = is_page(2409);
if($_SERVER['REQUEST_URI'] == '/shop/'){
    header("Location: https://maisonlesley.com/");
    exit();
}
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
        <script>
        jQuery(document).ready(function($) {
        });
        </script>
        <div id="content" class="site-content">