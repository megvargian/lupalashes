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

<?php
get_footer();