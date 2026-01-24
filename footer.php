<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
?>
    </div><!-- #content -->

    <!-- Search Modal -->
    <?php if (class_exists('WooCommerce')) : ?>
    <div class="search-modal" id="searchModal">
        <div class="search-modal-overlay"></div>
        <div class="search-modal-content">
            <button class="search-modal-close" id="searchModalClose">
                <i class="fas fa-times"></i>
            </button>
            <div class="search-modal-header">
                <h2>Search Products</h2>
            </div>
            <div class="search-modal-body">
                <form class="product-search-form" role="search">
                    <div class="search-input-wrapper">
                        <input type="search"
                               id="productSearchInput"
                               class="product-search-input"
                               placeholder="Search for products..."
                               autocomplete="off">
                        <button type="submit" class="search-submit-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="search-results" id="searchResults">
                    <div class="search-results-info">
                        <p>Start typing to search products...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Quick View Modal -->
    <?php if (class_exists('WooCommerce')) : ?>
    <div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quickViewModalLabel">Quick View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="quick-view-content">
                        <!-- Content loaded via AJAX -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <footer>
    </footer>
</div><!-- #page -->
<script>
    jQuery(document).ready(function($) {
    });
</script>
<?php wp_footer(); ?>
</body>
</html>