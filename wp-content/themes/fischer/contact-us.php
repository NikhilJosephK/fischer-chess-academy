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
                 <img src="/wp-content/themes/fischer/assets/images/contact-us/fischer-address.svg" alt="">
                 <p>Kharghar, Navi Mumbai Maharashtra, 410210</p>
                <p>+91 9920254240</p>
                <p>+91 7977075421</p>
            </div>
            <div>
                <img src="/wp-content/themes/fischer/assets/images/contact-us/fischer-address.svg" alt="">
                <p>Nerul, Navi Mumbai Maharashtra, 400706</p>
                <p>+91 7777097875</p>
                <p>+91 8356922283</p>
            </div>
            <div>
                <img src="/wp-content/themes/fischer/assets/images/contact-us/fischer-mail.svg" alt="">
                <p>fischerchessmumbai@gmail.com</p>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>