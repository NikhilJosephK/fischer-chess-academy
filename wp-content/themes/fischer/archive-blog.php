<?php
/*
Template Name: Blog
*/
?>


<?php get_header(); ?>

<section class="fischer-blog">
    <div class="container">
        <h1>
            Blog
        </h1>
        <div class="blog-container">
            <p class="no-more-blogs">No More Blogs to Read.</p>
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="button-container">
            <button class="previous" type="button">
                <img data-previous="previous" src="/wp-content/themes/fischer/assets/images/achievements/fischer-left-arrow.svg" alt="left Arrow">
            </button>
            <button class="next" type="button">
                <img data-next="next" src="/wp-content/themes/fischer/assets/images/achievements/fischer-next-arrow.svg" alt="Right Arrow">
            </button>
        </div>
    </div>
</section>

<?php get_footer(); ?>