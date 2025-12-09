<?php
/**
 * Template Name: Homepage
 */
get_header();
?>
<?php
	while ( have_posts() ) : the_post();
        the_content();
	endwhile;
?>
<script>
    jQuery(document).ready(function($) {
    });
</script>
<?php
get_footer();