<?php
/*
Template Name: PDF Library
*/
?>
<?php get_header(); ?>
<section class="fischer-pdf-library">
    <div class="container">
        <h1>PDF Library</h1>
        <div class="pdf-content-container">
            <?php
            echo the_content();
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>