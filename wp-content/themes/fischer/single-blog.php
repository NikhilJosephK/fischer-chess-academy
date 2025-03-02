<?php
/*
Template Name: Blog Inner
*/
?>

<?php get_header(); ?>

<section class="fischer-blog-inner">
    <div class="container">
        <div class="feature-image-wrapper">
            <img src="<?php
                        echo  get_the_post_thumbnail_url();
                        ?>" alt="blog banner image">
        </div>
        <div class="content">
            <?php the_content(); ?>
        </div>

        <div class="publisher-wrapper">
            <p class="date">Published : <?php echo get_the_date(); ?></p>
            <p class="author">Author : <?php
                                        $post_id = get_the_ID();
                                        $author_id = get_post_field('post_author', $post_id);
                                        $author_name = get_the_author_meta('display_name', $author_id);
                                        echo $author_name;
                                        ?></p>
        </div>



        <div class="dots-wrapper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</section>

<?php get_footer(); ?>