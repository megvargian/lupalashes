<?php
/**
 * Template Name: FAQ Page
 */
get_header();
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Frequently Asked Questions</h1>
        <p class="page-subtitle">Find answers to common questions about our products and services</p>
    </div>
</section>

<!-- FAQ Content -->
<section class="faq-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-content">

                    <!-- Product Information -->
                    <div class="faq-category">
                        <h2 class="category-heading">Product Information</h2>

                        <div class="faq-item">
                            <h3 class="faq-question">Are your products cruelty-free and safe?</h3>
                            <div class="faq-answer">
                                <p>Yes! Our faux mink lashes, cashmere silk lash extension trays, and lash adhesives are all cruelty-free and latex-free products. We are committed to ethical beauty practices and ensuring our products are safe for use.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <h3 class="faq-question">How many times can I reuse real mink lashes?</h3>
                            <div class="faq-answer">
                                <p>Our real mink lashes are handmade and can be used up to 15 times with proper care. Please note that slight variations in length or volume may occur between pairs due to their handcrafted nature.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <h3 class="faq-question">Why do lash colors look different in photos versus in person?</h3>
                            <div class="faq-answer">
                                <p>Screen settings can affect how lash colors appear in photos compared to how they look in person. We recommend reading product descriptions and customer reviews for the most accurate color representation.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Lash Adhesive Care -->
                    <div class="faq-category">
                        <h2 class="category-heading">Lash Adhesive Care</h2>

                        <div class="faq-item">
                            <h3 class="faq-question">How should I store my lash adhesive?</h3>
                            <div class="faq-answer">
                                <p>Store your lash adhesive in a cool, dry place in an airtight container. <strong>Important:</strong> Do not refrigerate the adhesive after opening, as this can affect its performance.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <h3 class="faq-question">Should I do a patch test before using lash adhesive?</h3>
                            <div class="faq-answer">
                                <p>Absolutely! We strongly recommend performing a patch test before using any lash adhesive. This helps identify any potential allergic reactions before full application. Apply a small amount behind your ear or on your wrist and wait 24 hours to check for any reactions.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Orders and Shipping -->
                    <div class="faq-category">
                        <h2 class="category-heading">Orders and Shipping</h2>

                        <div class="faq-item">
                            <h3 class="faq-question">How long does it take to process my order?</h3>
                            <div class="faq-answer">
                                <p>Our processing time is approximately 24 hours to pack your order and pass it to the carrier for delivery. You will receive tracking information once your order has been shipped.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <h3 class="faq-question">What if my package shows as delivered but I didn't receive it?</h3>
                            <div class="faq-answer">
                                <p>Once tracking shows "Delivered," the risk of loss passes to the customer. We recommend tracking your package closely and being available for delivery. If you believe there was a delivery error, please contact the carrier first, then reach out to us for assistance.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <h3 class="faq-question">Can I return my lashes if I don't like them?</h3>
                            <div class="faq-answer">
                                <p>For hygiene reasons, lashes cannot be returned once the packaging is opened or the seal is broken. However, if you receive damaged or "shedding" lashes, you have 24 hours after delivery to report the issue with photographic proof.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Professional Use -->
                    <div class="faq-category">
                        <h2 class="category-heading">Professional Use</h2>

                        <div class="faq-item">
                            <h3 class="faq-question">Are lash extension trays suitable for personal use?</h3>
                            <div class="faq-answer">
                                <p>Lash extension trays are intended for professional use only. We recommend having extensions applied by a certified lash technician to ensure proper application and safety.</p>
                            </div>
                        </div>
                    </div>

                    <!-- About LUPA -->
                    <div class="faq-category">
                        <h2 class="category-heading">About LUPA Lashes</h2>

                        <div class="faq-item">
                            <h3 class="faq-question">What does LUPA mean?</h3>
                            <div class="faq-answer">
                                <p>In ancient lore, the Lupa (She-Wolf) was a symbol of power and protection. We created LUPA Lashes for the woman who isn't afraid to be seen. Whether you're looking for a soft, natural flutter or a dark, savage volume, our lashes are crafted to mirror the intensity and beauty of the She-Wolf.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Still Have Questions -->
                    <div class="faq-contact">
                        <h2 class="contact-heading">Still Have Questions?</h2>
                        <p>If you can't find the answer you're looking for, please don't hesitate to contact us. Our customer service team is here to help!</p>
                        <a href="<?php echo home_url('/contact-us'); ?>" class="btn btn-primary">Contact Us</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
.faq-content-section {
    padding: 60px 0;
    background-color: #f8f9fa;
}

.faq-content {
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.faq-category {
    margin-bottom: 50px;
}

.category-heading {
    color: #333;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 3px solid #d4a574;
    position: relative;
}

.category-heading::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 60px;
    height: 3px;
    background: #c39463;
}

.faq-item {
    margin-bottom: 25px;
    border: 1px solid #e9ecef;
    border-radius: 10px;
    overflow: hidden;
    transition: box-shadow 0.3s ease;
}

.faq-item:hover {
    box-shadow: 0 5px 15px rgba(212, 165, 116, 0.2);
}

.faq-question {
    background: linear-gradient(135deg, #d4a574, #c39463);
    color: white;
    padding: 20px 25px;
    margin: 0;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.faq-question::after {
    content: '+';
    position: absolute;
    right: 25px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 24px;
    font-weight: bold;
    transition: transform 0.3s ease;
}

.faq-item.active .faq-question::after {
    transform: translateY(-50%) rotate(45deg);
}

.faq-answer {
    padding: 25px;
    background: white;
    display: none;
}

.faq-item.active .faq-answer {
    display: block;
}

.faq-answer p {
    margin: 0 0 15px 0;
    line-height: 1.7;
    color: #555;
}

.faq-answer p:last-child {
    margin-bottom: 0;
}

.faq-answer strong {
    color: #d4a574;
    font-weight: 600;
}

.faq-contact {
    background: linear-gradient(135deg, #d4a574, #c39463);
    color: white;
    padding: 40px;
    border-radius: 15px;
    text-align: center;
    margin-top: 50px;
}

.contact-heading {
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 20px;
    color: white;
}

.faq-contact p {
    font-size: 16px;
    margin-bottom: 25px;
    opacity: 0.95;
}

.faq-contact .btn {
    background: white;
    color: #d4a574;
    border: none;
    padding: 12px 30px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 25px;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.faq-contact .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    color: #c39463;
}

@media (max-width: 768px) {
    .faq-content {
        padding: 20px;
        margin: 0 15px;
    }

    .category-heading {
        font-size: 24px;
    }

    .faq-question {
        padding: 15px 20px;
        font-size: 16px;
    }

    .faq-question::after {
        right: 20px;
    }

    .faq-answer {
        padding: 20px;
    }

    .faq-contact {
        padding: 30px 20px;
    }

    .contact-heading {
        font-size: 24px;
    }
}
</style>

<script>
jQuery(document).ready(function($) {
    // FAQ Accordion functionality
    $('.faq-question').on('click', function() {
        var faqItem = $(this).parent();

        // Close other open items
        $('.faq-item').not(faqItem).removeClass('active').find('.faq-answer').slideUp(300);

        // Toggle current item
        if (faqItem.hasClass('active')) {
            faqItem.removeClass('active');
            faqItem.find('.faq-answer').slideUp(300);
        } else {
            faqItem.addClass('active');
            faqItem.find('.faq-answer').slideDown(300);
        }
    });

    // Open first FAQ item by default
    $('.faq-item:first').addClass('active').find('.faq-answer').show();
});
</script>

<?php
get_footer();