/**
 * WooCommerce Custom JavaScript
 * - Dynamic Cart Count Update
 * - Quick View Modal
 * - AJAX Add to Cart
 * - Product Search Modal
 */

(function($) {
    'use strict';

    // ===== SEARCH MODAL =====
    var searchTimeout;

    // Open search modal
    $('#searchToggle').on('click', function(e) {
        e.preventDefault();
        $('#searchModal').addClass('active');
        $('body').addClass('search-modal-open');
        setTimeout(function() {
            $('#productSearchInput').focus();
        }, 300);
    });

    // Close search modal
    $('#searchModalClose, .search-modal-overlay').on('click', function() {
        $('#searchModal').removeClass('active');
        $('body').removeClass('search-modal-open');
        $('#productSearchInput').val('');
        $('#searchResults').html('<div class="search-results-info"><p>Start typing to search products...</p></div>');
    });

    // Close on Escape key
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && $('#searchModal').hasClass('active')) {
            $('#searchModalClose').trigger('click');
        }
    });

    // Live search
    $('#productSearchInput').on('input', function() {
        var searchTerm = $(this).val().trim();

        clearTimeout(searchTimeout);

        if (searchTerm.length < 2) {
            $('#searchResults').html('<div class="search-results-info"><p>Please enter at least 2 characters...</p></div>');
            return;
        }

        // Show loading
        $('#searchResults').html('<div class="search-loading"><i class="fas fa-spinner fa-spin fa-2x"></i><p>Searching...</p></div>');

        searchTimeout = setTimeout(function() {
            performSearch(searchTerm);
        }, 500);
    });

    // Search form submit
    $('.product-search-form').on('submit', function(e) {
        e.preventDefault();
        var searchTerm = $('#productSearchInput').val().trim();
        if (searchTerm.length >= 2) {
            clearTimeout(searchTimeout);
            performSearch(searchTerm);
        }
    });

    // Perform AJAX search
    function performSearch(searchTerm) {
        $.ajax({
            url: woocommerce_params.ajax_url,
            type: 'POST',
            data: {
                action: 'search_products',
                search_term: searchTerm
            },
            success: function(response) {
                if (response.success) {
                    $('#searchResults').html(response.data.html);
                } else {
                    $('#searchResults').html('<div class="search-error"><p>' + response.data.message + '</p></div>');
                }
            },
            error: function() {
                $('#searchResults').html('<div class="search-error"><p>Error performing search. Please try again.</p></div>');
            }
        });
    }

    // Update cart count via AJAX
    function updateCartCount() {
        $.ajax({
            url: woocommerce_params.ajax_url,
            type: 'POST',
            data: {
                action: 'get_cart_count'
            },
            success: function(response) {
                if (response.success) {
                    $('.cart-count').text(response.data.count);

                    // Add animation
                    $('.cart-icon').addClass('cart-updated');
                    setTimeout(function() {
                        $('.cart-icon').removeClass('cart-updated');
                    }, 600);
                }
            }
        });
    }

    // AJAX Add to Cart
    $(document).on('click', '.ajax-add-to-cart', function(e) {
        e.preventDefault();

        var $button = $(this);
        var product_id = $button.data('product-id');
        var quantity = $button.closest('.product-info, .quick-view-content').find('.qty').val() || 1;

        // Disable button and show loading
        $button.prop('disabled', true);
        $button.addClass('loading');

        var originalText = $button.html();
        $button.html('<i class="fas fa-spinner fa-spin"></i> Adding...');

        $.ajax({
            url: woocommerce_params.ajax_url,
            type: 'POST',
            data: {
                action: 'ajax_add_to_cart',
                product_id: product_id,
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    // Update cart count
                    updateCartCount();

                    // Show success message
                    $button.html('<i class="fas fa-check"></i> Added!');
                    $button.addClass('added');

                    // Show mini notification
                    showCartNotification(response.data.message);

                    // Reset button after delay
                    setTimeout(function() {
                        $button.html(originalText);
                        $button.removeClass('loading added');
                        $button.prop('disabled', false);
                    }, 2000);

                    // Trigger WooCommerce added to cart event
                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $button]);
                } else {
                    $button.html(originalText);
                    $button.removeClass('loading');
                    $button.prop('disabled', false);
                    alert(response.data.message || 'Error adding to cart');
                }
            },
            error: function() {
                $button.html(originalText);
                $button.removeClass('loading');
                $button.prop('disabled', false);
                alert('Error adding to cart. Please try again.');
            }
        });
    });

    // Show cart notification
    function showCartNotification(message) {
        var $notification = $('<div class="cart-notification">' + message + '</div>');
        $('body').append($notification);

        setTimeout(function() {
            $notification.addClass('show');
        }, 100);

        setTimeout(function() {
            $notification.removeClass('show');
            setTimeout(function() {
                $notification.remove();
            }, 300);
        }, 3000);
    }

    // Quick View Modal
    $(document).on('click', '.quick-view-btn', function(e) {
        e.preventDefault();

        var product_id = $(this).data('product-id');
        var $modal = $('#quickViewModal');
        var $modalBody = $modal.find('.quick-view-content');

        // Show loading
        $modalBody.html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-3x"></i></div>');
        $modal.modal('show');

        // Load product data
        $.ajax({
            url: woocommerce_params.ajax_url,
            type: 'POST',
            data: {
                action: 'quick_view_product',
                product_id: product_id
            },
            success: function(response) {
                if (response.success) {
                    $modalBody.html(response.data.html);

                    // Initialize image gallery for quick view
                    initQuickViewGallery();
                } else {
                    $modalBody.html('<div class="alert alert-danger">Error loading product.</div>');
                }
            },
            error: function() {
                $modalBody.html('<div class="alert alert-danger">Error loading product.</div>');
            }
        });
    });

    // Initialize Quick View Gallery
    function initQuickViewGallery() {
        $('.quick-view-thumbnail').on('click', function() {
            var imageUrl = $(this).data('image');
            $('.quick-view-main-image').attr('src', imageUrl);
            $('.quick-view-thumbnail').removeClass('active');
            $(this).addClass('active');
        });
    }

    // Update cart count on page load
    $(document).ready(function() {
        // Listen for WooCommerce events
        $(document.body).on('added_to_cart removed_from_cart updated_cart_totals', function() {
            updateCartCount();
        });
    });

    // Handle standard WooCommerce add to cart buttons
    $(document).on('click', '.single_add_to_cart_button:not(.disabled)', function(e) {
        if (!$(this).hasClass('product_type_variable') && !$(this).hasClass('product_type_grouped')) {
            setTimeout(function() {
                updateCartCount();
            }, 500);
        }
    });

})(jQuery);
