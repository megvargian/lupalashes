<?php
/**
 * Template Name: Homepage
 */
get_header();
?>

<!-- Coming Soon Section -->
<div class="lupalashes-coming-soon">
    <div class="coming-soon-overlay"></div>
    <div class="coming-soon-container">
        <div class="lashes-decoration">
            <div class="lash-line lash-1"></div>
            <div class="lash-line lash-2"></div>
            <div class="lash-line lash-3"></div>
            <div class="lash-line lash-4"></div>
            <div class="lash-line lash-5"></div>
        </div>

        <div class="coming-soon-content">
            <div class="logo-container">
                <h1 class="brand-name">Lupalashes</h1>
                <div class="brand-tagline">Luxury Lash Extensions</div>
            </div>

            <div class="coming-soon-text">
                <h2 class="main-heading">Coming Soon</h2>
                <p class="sub-heading">Something beautiful is on its way</p>
            </div>

            <div class="countdown-timer">
                <div class="time-box">
                    <span class="time-value" id="days">00</span>
                    <span class="time-label">Days</span>
                </div>
                <div class="time-box">
                    <span class="time-value" id="hours">00</span>
                    <span class="time-label">Hours</span>
                </div>
                <div class="time-box">
                    <span class="time-value" id="minutes">00</span>
                    <span class="time-label">Minutes</span>
                </div>
                <div class="time-box">
                    <span class="time-value" id="seconds">00</span>
                    <span class="time-label">Seconds</span>
                </div>
            </div>

            <div class="social-links">
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
            </div>
        </div>

        <div class="lashes-decoration bottom">
            <div class="lash-line lash-1"></div>
            <div class="lash-line lash-2"></div>
            <div class="lash-line lash-3"></div>
            <div class="lash-line lash-4"></div>
            <div class="lash-line lash-5"></div>
        </div>
    </div>

    <div class="floating-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        // Countdown Timer
        const launchDate = new Date('2025-12-31 00:00:00').getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = launchDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $('#days').text(String(days).padStart(2, '0'));
            $('#hours').text(String(hours).padStart(2, '0'));
            $('#minutes').text(String(minutes).padStart(2, '0'));
            $('#seconds').text(String(seconds).padStart(2, '0'));

            if (distance < 0) {
                clearInterval(countdownInterval);
                $('.countdown-timer').html('<h3>We are live!</h3>');
            }
        }

        const countdownInterval = setInterval(updateCountdown, 1000);
        updateCountdown();

        // Email form submission
        $('.notify-form').on('submit', function(e) {
            e.preventDefault();
            const email = $(this).find('.email-input').val();

            // Add your email submission logic here
            alert('Thank you! We will notify you at: ' + email);
            $(this).find('.email-input').val('');
        });

        // Animate elements on load
        setTimeout(function() {
            $('.brand-name').addClass('animate-in');
            setTimeout(function() {
                $('.coming-soon-text').addClass('animate-in');
                setTimeout(function() {
                    $('.countdown-timer').addClass('animate-in');
                    setTimeout(function() {
                        $('.notify-section').addClass('animate-in');
                    }, 300);
                }, 300);
            }, 300);
        }, 500);
    });
</script>

<?php
get_footer();