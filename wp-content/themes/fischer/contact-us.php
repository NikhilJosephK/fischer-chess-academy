<?php
/*
Template Name: Contact Us
*/
?>
<?php get_header(); ?>
<section class="fischer-contact-us">
    <div class="container">
        <h1>
            Contact Us
        </h1>
        <div class="inner-container">
            <div class="image-wrapper">
                <img src="/wp-content/themes/fischer/assets/images/contact-us/contact-us-img.png" alt="">
            </div>
            <div class="form-wrapper">
                <?php echo do_shortcode('[contact-form-7 id="04dc0fc" title="Contact form 1"]'); ?>
            </div>
        </div>
        <div class="address-container">
            <div>
                <img src="/wp-content/themes/fischer/assets/images/contact-us/tele.svg" alt="">
                <p>+91 985737 92023</p>
            </div>
            <div>
                <img src="/wp-content/themes/fischer/assets/images/contact-us/fischer-mail.svg" alt="">
                <p>fischerchessmumbai@gmail.com</p>
            </div>
            <div>
                <img src="/wp-content/themes/fischer/assets/images/contact-us/fischer-address.svg" alt="">
                <p>Kharghar, Navi Mumbai Maharashtra, 410210</p>
                <p>Nerul, Navi Mumbai Maharashtra, 400706</p>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>