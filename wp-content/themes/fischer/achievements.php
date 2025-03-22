<?php
/*
Template Name: Achievements
*/
?>
<?php get_header(); ?>
<!--  search 23 in the file and change it to 25 to work in local (post id) -->
<section class="fischer-achievements">
    <div class="container">
        <h1>
            Achievements
        </h1>
        <div class="gallery-container">
            <?php
            function display_post_images_as_gallery($post_id)
            {
                // Verify post ID exists and is valid
                if (!$post_id || !get_post($post_id)) {
                    error_log('Invalid post ID provided to display_post_images_as_gallery: ' . $post_id);
                    return '<p>Unable to display gallery at this time.</p>';
                }

                try {
                    // Get the post content
                    $post = get_post($post_id);
                    $content = $post->post_content;

                    // Check if content is empty
                    if (empty($content)) {
                        return '<p>No content found in this post.</p>';
                    }

                    // Initialize DOMDocument with error handling
                    $dom = new DOMDocument();

                    // Enable internal error handling
                    libxml_use_internal_errors(true);

                    // Add HTML5 doctype and UTF-8 meta tag to prevent encoding issues
                    $content = '<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body>' . $content . '</body></html>';

                    // Load HTML with proper encoding
                    $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

                    // Clear any errors that might have occurred
                    $errors = libxml_get_errors();
                    libxml_clear_errors();

                    // Log any parsing errors
                    if (!empty($errors)) {
                        foreach ($errors as $error) {
                            error_log('HTML parsing error: ' . $error->message);
                        }
                    }

                    // Get all <img> elements
                    $images = $dom->getElementsByTagName('img');

                    // Prepare output with proper escaping
                    $output = '';

                    // Check if there are any images
                    if ($images->length > 0) {
                        $output .= '<div class="gallery">'; // Start gallery container

                        // Loop through all images and display them
                        foreach ($images as $image) {
                            if ($image instanceof DOMElement) {
                                $img_src = $image->getAttribute('src');
                                $img_alt = $image->getAttribute('alt');

                                // Verify image source is not empty
                                if (!empty($img_src)) {
                                    $output .= '<div class="gallery-item">';
                                    $output .= '<img src="' . esc_url($img_src) . '" alt="' . esc_attr($img_alt) . '" loading="lazy">';
                                    $output .= '</div>';
                                }
                            }
                        }

                        $output .= '</div>'; // End gallery container
                    } else {
                        $output .= '<p>No images found in this post.</p>';
                    }

                    return $output;
                } catch (Exception $e) {
                    // Log the error for debugging
                    error_log('Error in display_post_images_as_gallery: ' . $e->getMessage());
                    return '<p>Unable to display gallery at this time.</p>';
                }
            }

            // Usage (change it to 23 for production and 25 for local development)
            echo display_post_images_as_gallery(23);
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

        <div class="more-container">
                      <a rel='noopener noreferrer' target="_blank" href="https://www.instagram.com/fischerchessindia/?hl=en">Click here to see more achievements of our students</a>
        </div>


    </div>
</section>
<?php get_footer(); ?>