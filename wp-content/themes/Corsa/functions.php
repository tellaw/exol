<?php
/**
 * Include all needed files
 */
/* Slightly Modified Options Framework */
require_once ('admin/index.php');
/* Admin specific functions */
require_once('functions/admin.php');
/* Load shortcodes */
require_once('functions/shortcodes.php');
require_once('functions/zilla-shortcodes/zilla-shortcodes.php');
/* Custom Post types */
require_once('functions/post_types.php');
/* Meta Box plugin and settings */
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/vendor/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/vendor/meta-box' ) );
require_once RWMB_DIR . 'meta-box.php';
require_once('functions/meta-box_settings.php');
/* Menu and it's custom markup */
require_once('functions/menu.php');
/* Comments custom markup */
require_once('functions/comments.php');
/* Sidebars init */
require_once('functions/sidebars.php');
/* Sidebar generator */
require_once('vendor/sidebar_generator.php');
/* wp_link_pages both next and numbers usage */
require_once('functions/link_pages.php');
/* CSS and JS enqueue */
require_once('functions/enqueue.php');
/* Widgets */
require_once('functions/widgets/contact.php');
/* AJAX backend */
require_once('functions/ajax_contact.php');
require_once('functions/ajax_import.php');
require_once('functions/ajax_blog.php');

if ( ! isset( $content_width ) ) $content_width = 1500;

/**
 * Theme Setup
 */
function us_theme_setup()
{
	global $smof_data;

	add_theme_support('automatic-feed-links');

	/* Add post thumbnail functionality */
	add_theme_support('post-thumbnails');
	add_image_size('portfolio-list', 500, 500, true);
	add_image_size('blog-list', 500, 500, true);
	add_image_size('gallery-s', 185, 185, true);
	add_image_size('gallery-m', 220, 220, true);
	add_image_size('gallery-l', 276, 276, true);
	add_image_size('carousel-thumb', 200, 140, false);

	/* Excerpt length */
	if (isset($smof_data['blog_excerpt_length']) AND $smof_data['blog_excerpt_length'] != 55) {
		add_filter( 'excerpt_length', 'us_excerpt_length', 999 );
	}

	/* Remove [...] from excerpt */
	add_filter('excerpt_more', 'us_excerpt_more');

	/* Theme localization */
	load_theme_textdomain( 'us', get_template_directory() . '/languages' );

	/* Disable admin bar */
	add_filter('show_admin_bar', '__return_false');
}

add_action( 'after_setup_theme', 'us_theme_setup' );

function us_excerpt_length( $length ) {
	global $smof_data;
	$blog_excerpt_length = ($smof_data['blog_excerpt_length'])?$smof_data['blog_excerpt_length']:22;
	return $blog_excerpt_length;
}

function us_excerpt_more( $more ) {
	return "&hellip;";
}

/* Custom code goes below this line. */

/* Custom code goes above this line. */
