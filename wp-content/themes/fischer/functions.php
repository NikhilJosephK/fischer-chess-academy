<?php

/**
 * FischerTheme's functions and definitions
 *
 * @package FischerTheme
 * @since FischerTheme 1.0
 */

/**
 * First, let's set the maximum content width based on the theme's
 * design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if (! isset($content_width)) {
    $content_width = 800; /* pixels */
}


if (! function_exists('fischertheme_setup')) :

    /**
     * Sets up theme defaults and registers support for various
     * WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme
     * hook, which runs before the init hook. The init hook is too late
     * for some features, such as indicating support post thumbnails.
     */
    function fischertheme_setup()
    {

        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain('fischertheme', get_template_directory() . '/languages');

        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support('automatic-feed-links');

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support('post-thumbnails');

        /**
         * Add support for two custom navigation menus.
         */
        register_nav_menus(array(
            'primary'   => __('Primary Menu', 'fischertheme'),
            'secondary' => __('Secondary Menu', 'fischertheme'),
        ));

        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));
    }
endif; // fischertheme_setup
add_action('after_setup_theme', 'fischertheme_setup');

// CSS Starts here
function load_css()
{

    // load main.css for all pages eg: header.php footer.php etc or we can have seperate files for header and footer
    wp_register_style('main', get_template_directory_uri() . '/assets/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');

    // load front-page.css
    if (is_front_page()) {
        wp_register_style('front-page', get_template_directory_uri() . '/assets/css/front-page.css', array(), false, 'all');
        wp_enqueue_style('front-page');
    }
    //contact us
    if (is_page_template('contact-us.php')) {
        wp_enqueue_style('contact-us', get_template_directory_uri() . '/assets/css/contact-us.css');
    }
    //achievements
    if (is_page_template('achievements.php')) {
        wp_enqueue_style('achievements', get_template_directory_uri() . '/assets/css/achievements.css');
    }
    //about us
    if (is_page_template('about-us.php')) {
        wp_enqueue_style('about-us', get_template_directory_uri() . '/assets/css/about-us.css');
    }
    //pdf library
    if (is_page_template('pdf-library.php')) {
        wp_enqueue_style('pdf-library', get_template_directory_uri() . '/assets/css/pdf-library.css');
    }
    //blog inner
    if (is_singular('blog')) {
        wp_enqueue_style('single-blog', get_template_directory_uri() . '/assets/css/single-blog.css');
    }
    //blog inner
    if (is_post_type_archive('blog')) {
        wp_enqueue_style('archive-blog', get_template_directory_uri() . '/assets/css/archive-blog.css');
    }
}
add_action('wp_enqueue_scripts', 'load_css');
// CSS Ends here

//JS Starts here
function load_js()
{
    //  this line will automatically add all the jquery files needed automatically no need of js folders or files
    wp_enqueue_script('jquery');

    //main.js
    wp_register_script('main', get_template_directory_uri() . '/js/main.js', 'jquery', false, true);
    wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'load_js');
//JS Ends here

//register blog custom post type
function register_blog_post_type()
{
    $labels = [
        'name'               => 'Blogs',
        'singular_name'      => 'Blog',
        'menu_name'          => 'Blogs',
        'name_admin_bar'     => 'Blog',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Blog',
        'edit_item'          => 'Edit Blog',
        'new_item'           => 'New Blog',
        'view_item'          => 'View Blog',
        'search_items'       => 'Search Blogs',
        'not_found'          => 'No blogs found',
        'not_found_in_trash' => 'No blogs found in Trash',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'blog'], // Ensures the URL structure
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'comments'],
        'show_in_rest'       => true, // Enables REST API for this post type
        'taxonomies'         => ['category', 'post_tag'], // Optional: Allows default taxonomies
    ];

    register_post_type('blog', $args);
}
add_action('init', 'register_blog_post_type');

// added support for featured image in rest api
function add_featured_image_to_rest_api($data, $post, $context)
{
    $featured_image_id = get_post_thumbnail_id($post->ID);
    if ($featured_image_id) {
        $image = wp_get_attachment_image_src($featured_image_id, 'full'); // Get full-size image URL
        if ($image) {
            $data->data['featured_image_url'] = $image[0];
        }
    }
    return $data;
}

// Make sure to use the correct custom post type slug ("blog" in your case)
add_filter('rest_prepare_blog', 'add_featured_image_to_rest_api', 10, 3);

// added support for acf fields in rest api
function add_acf_fields_to_rest_api($data, $post, $context)
{
    $acf_fields = get_fields($post->ID);
    if (!empty($acf_fields)) {
        $data->data['acf'] = $acf_fields;
    }
    return $data;
}
add_filter('rest_prepare_blog', 'add_acf_fields_to_rest_api', 10, 3);
