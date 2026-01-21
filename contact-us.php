<?php
/**
 * Template Name: Contact Us Page
 */
get_header();
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Contact Us</h1>
        <p class="page-subtitle">We'd love to hear from you</p>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-7 col-md-12">
                <div class="contact-form-wrapper">
                    <h2 class="section-heading">Send us a Message</h2>
                    <p class="section-description">Have a question or want to learn more about our lash services? Fill out the form below and we'll get back to you as soon as possible.</p>
                    
                    <form class="contact-form" action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-5 col-md-12">
                <div class="contact-info-wrapper">
                    <h2 class="section-heading">Get in Touch</h2>
                    
                    <div class="contact-info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Visit Us</h4>
                            <p>123 Beauty Lane<br>Los Angeles, CA 90001<br>United States</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Call Us</h4>
                            <p><a href="tel:+11234567890">+1 (123) 456-7890</a></p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h4>Email Us</h4>
                            <p><a href="mailto:info@lupalashes.com">info@lupalashes.com</a></p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h4>Business Hours</h4>
                            <p>Monday - Friday: 9:00 AM - 7:00 PM<br>
                            Saturday: 10:00 AM - 6:00 PM<br>
                            Sunday: Closed</p>
                        </div>
                    </div>

                    <div class="social-links">
                        <h4>Follow Us</h4>
                        <div class="social-icons">
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Optional) -->
<section class="map-section">
    <div class="container">
        <div class="map-wrapper">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.7293932442607!2d-118.24368888478824!3d34.05223508060647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos%20Angeles%2C%20CA!5e0!3m2!1sen!2sus!4v1234567890123" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<?php
get_footer();
							<p>
								<a href="<?php echo $all_feilds['chat']['chat_link']; ?>">
									<?php echo $all_feilds['chat']['chat_text']; ?>
								</a>
							</p>
						<!-- </div>
					</div> -->
				</div>
				<div class="contact-form-box p-4 mt-3">
					<div class="row w-100 justify-content-between email-box pb-3 mx-0">
						<div class="col-3 d-flex justify-content-start align-items-center px-0">
							<div class="icon-email">
								<h4 class="mb-0"><?php echo $all_feilds['contact_us_section']['title']; ?></h4>
							</div>
						</div>
						<div class="col px-0">
							<p>
								<?php echo $all_feilds['contact_us_section']['sub_title']; ?>
							</p>
						</div>
					</div>
					<?php echo do_shortcode('[contact-form-7 id="786fd68" title="Contact form 1"]') ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- <div class="g-recaptcha" data-sitekey="6Lduc_8pAAAAAJDfVdJ5UT2-KbdaxA6IgSFY5fDG" data-callback="onSubmit" data-action="submit"></div>			 -->

<script>
	jQuery(document).ready(function($) {
	var cf7form = $('.wpcf7');
	if (cf7form) {
		$(cf7form).each(function(index, el) {
			if (el) {
			$(el).find('form').submit(function(event) {
				$(el).find('form').find('.wpcf7-submit').addClass('disabled');
				$(el).parents('.form_validation_parent').find('.contact_success_message').hide();
				$(el).parents('.form_validation_parent').find('.contact_fail_message').hide();
			});
			el.addEventListener( 'wpcf7mailsent', function( event ) {
				$(el).parents('.form_validation_parent').find('.contact_success_message').slideDown(300);
			}, false );
			el.addEventListener( 'wpcf7mailfailed', function( event ) {
				$(el).find('form').find('.wpcf7-submit').removeClass('disabled');
				$(el).parents('.form_validation_parent').find('.contact_fail_message').slideDown(300);
			}, false );
			el.addEventListener( 'wpcf7spam', function( event ) {
				$(el).find('form').find('.wpcf7-submit').removeClass('disabled');
				$(el).parents('.form_validation_parent').find('.contact_fail_message').slideDown(300);
			}, false );
			el.addEventListener( 'wpcf7invalid', function( event ) {
				$(el).find('form').find('.wpcf7-submit').removeClass('disabled');
				$(el).parents('.form_validation_parent').find('.contact_fail_message').slideDown(300);
			}, false );
			}
		});
	}
});
</script>
<?php
get_footer();