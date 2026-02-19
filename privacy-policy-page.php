<?php
/**
 * Template Name: Privacy Policy Page
 */
get_header();
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Privacy Policy</h1>
        <p class="page-subtitle">Your privacy is important to us. Learn how we collect and use your information.</p>
    </div>
</section>

<!-- Privacy Policy Content -->
<section class="privacy-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="privacy-content">
                    <div class="privacy-section">
                        <h2>Information We Collect</h2>
                        <p>We collect information you provide directly to us, such as when you create an account, make a purchase, or contact us for support. This may include your name, email address, phone number, billing and shipping addresses, and payment information.</p>

                        <h3>Personal Information</h3>
                        <ul>
                            <li>Name and contact information</li>
                            <li>Email address</li>
                            <li>Phone number</li>
                            <li>Billing and shipping addresses</li>
                            <li>Payment information</li>
                        </ul>
                    </div>

                    <div class="privacy-section">
                        <h2>How We Use Your Information</h2>
                        <p>We use the information we collect to provide, maintain, and improve our services, process transactions, and communicate with you.</p>

                        <h3>We use your information to:</h3>
                        <ul>
                            <li>Process and fulfill your orders</li>
                            <li>Send you order confirmations and updates</li>
                            <li>Provide customer support</li>
                            <li>Send you promotional communications (with your consent)</li>
                            <li>Improve our products and services</li>
                            <li>Comply with legal obligations</li>
                        </ul>
                    </div>

                    <div class="privacy-section">
                        <h2>Information Sharing and Disclosure</h2>
                        <p>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this policy.</p>

                        <h3>We may share your information with:</h3>
                        <ul>
                            <li>Service providers who help us operate our business</li>
                            <li>Payment processors to complete transactions</li>
                            <li>Shipping companies to deliver your orders</li>
                            <li>Law enforcement when required by law</li>
                        </ul>
                    </div>

                    <div class="privacy-section">
                        <h2>Data Security</h2>
                        <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet is 100% secure.</p>
                    </div>

                    <div class="privacy-section">
                        <h2>Cookies and Tracking Technologies</h2>
                        <p>We use cookies and similar tracking technologies to enhance your browsing experience, analyze site traffic, and understand where our visitors are coming from.</p>

                        <h3>Types of cookies we use:</h3>
                        <ul>
                            <li>Essential cookies for website functionality</li>
                            <li>Analytics cookies to understand how you use our site</li>
                            <li>Marketing cookies to show you relevant advertisements</li>
                        </ul>
                    </div>

                    <div class="privacy-section">
                        <h2>Your Rights</h2>
                        <p>Depending on your location, you may have certain rights regarding your personal information:</p>

                        <ul>
                            <li>Access to your personal information</li>
                            <li>Correction of inaccurate information</li>
                            <li>Deletion of your personal information</li>
                            <li>Opt-out of marketing communications</li>
                            <li>Data portability</li>
                        </ul>
                    </div>

                    <div class="privacy-section">
                        <h2>Third-Party Links</h2>
                        <p>Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of these external sites.</p>
                    </div>

                    <div class="privacy-section">
                        <h2>Children's Privacy</h2>
                        <p>Our services are not intended for children under 13 years of age. We do not knowingly collect personal information from children under 13.</p>
                    </div>

                    <div class="privacy-section">
                        <h2>Updates to This Policy</h2>
                        <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last Updated" date.</p>
                    </div>

                    <div class="privacy-section">
                        <h2>Contact Us</h2>
                        <p>If you have any questions about this privacy policy or our privacy practices, please contact us:</p>
                        <ul>
                            <li>Email: privacy@lupalashes.com</li>
                            <li>Phone: [Your Phone Number]</li>
                            <li>Address: [Your Business Address]</li>
                        </ul>
                    </div>

                    <div class="last-updated">
                        <p><strong>Last Updated:</strong> <?php echo date('F j, Y'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.privacy-content-section {
    padding: 60px 0;
    background-color: #f9f9f9;
}

.privacy-content {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.privacy-section {
    margin-bottom: 40px;
}

.privacy-section h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
    border-bottom: 2px solid #e74c3c;
    padding-bottom: 10px;
}

.privacy-section h3 {
    color: #555;
    font-size: 18px;
    margin: 20px 0 15px 0;
}

.privacy-section p {
    line-height: 1.8;
    color: #666;
    margin-bottom: 15px;
}

.privacy-section ul {
    list-style-type: disc;
    margin-left: 20px;
    color: #666;
}

.privacy-section li {
    margin-bottom: 8px;
    line-height: 1.6;
}

.last-updated {
    border-top: 1px solid #eee;
    padding-top: 20px;
    margin-top: 40px;
}

.last-updated p {
    color: #888;
    font-style: italic;
}

@media (max-width: 768px) {
    .privacy-content {
        padding: 20px;
        margin: 0 15px;
    }

    .privacy-section h2 {
        font-size: 20px;
    }
}
</style>

<?php get_footer(); ?>