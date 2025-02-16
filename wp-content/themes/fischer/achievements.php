<?php
/*
Template Name: Achievements
*/
?>
<?php get_header(); ?>
<section class="fischer-achievements">
    <div class="container">
        <h1>
            Achievements
        </h1>
        <div class="gallery-container">
            <?php
            function display_post_images_as_gallery($post_id)
            {
                // Get the post content
                $post = get_post($post_id);
                $content = $post->post_content;

                // Initialize DOMDocument
                $dom = new DOMDocument();

                // Suppress errors due to malformed HTML
                libxml_use_internal_errors(true);
                $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
                libxml_clear_errors();

                // Get all <img> elements
                $images = $dom->getElementsByTagName('img');

                // Check if there are any images
                if ($images->length > 0) {
                    echo '<div class="gallery">'; // Start gallery container

                    // Loop through all images and display them
                    foreach ($images as $image) {
                        $img_src = ($image instanceof DOMElement) ? $image->getAttribute('src') : '';
                        $img_alt = $image instanceof DOMElement ? $image->getAttribute('alt') : '';
                        echo '<div class="gallery-item">';
                        echo '<img src="' . esc_url($img_src) . '" alt="' . esc_attr($img_alt) . '">';
                        echo '</div>';
                    }

                    echo '</div>'; // End gallery container
                } else {
                    echo '<p>No images found in this post.</p>';
                }
            }
            // Usage
            display_post_images_as_gallery(25);
            ?>
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