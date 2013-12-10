<?php


function us_fonts() {
	global $smof_data;
	$protocol = is_ssl() ? 'https' : 'http';

    if (empty($smof_data['font_subset'])) {
        $subset = '';
    } else {
        $subset = '&subset='.$smof_data['font_subset'];
    }

	if ($smof_data['body_text_font'] != '' AND $smof_data['body_text_font'] != 'none')
	{

		wp_enqueue_style( 'us-body-text-font', "$protocol://fonts.googleapis.com/css?family=".str_replace(' ', '+', $smof_data['body_text_font']).":400,700".$subset );
	}
	else
	{
		wp_enqueue_style( 'us-body-text-font', "$protocol://fonts.googleapis.com/css?family=PT+Sans:400,700".$subset );
	}


	if ($smof_data['body_text_font'] != $smof_data['navigation_font'] AND $smof_data['navigation_font'] != '' AND $smof_data['navigation_font'] != 'none')
	{
		wp_enqueue_style( 'us-navigation-font', "$protocol://fonts.googleapis.com/css?family=".str_replace(' ', '+', $smof_data['navigation_font']).":400,700".$subset );
	}

	if ($smof_data['heading_font'] != '' AND $smof_data['heading_font'] != 'none')
	{

		wp_enqueue_style( 'us-heading-font', "$protocol://fonts.googleapis.com/css?family=".str_replace(' ', '+', $smof_data['heading_font']).":400,700".$subset );
	}
	else
	{
		wp_enqueue_style( 'us-heading-font', "$protocol://fonts.googleapis.com/css?family=Dosis:400,700".$subset );
	}


}
add_action( 'wp_enqueue_scripts', 'us_fonts' );

function us_styles()
{
	wp_register_style('motioncss', get_template_directory_uri() . '/css/motioncss.css', array(), '1', 'all');
	wp_register_style('motioncss-widgets', get_template_directory_uri() . '/css/motioncss-widgets.css', array(), '1', 'all');
	wp_register_style('jgrowl', get_template_directory_uri() . '/css/jquery.jgrowl.css', array(), '1', 'all');
	wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '1', 'all');
	wp_register_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), '1', 'all');
	wp_register_style('style', get_template_directory_uri() . '/css/style.css', array(), '1', 'all');
	wp_register_style('wp-widgets', get_template_directory_uri() . '/css/wp-widgets.css', array(), '1', 'all');
	wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1', 'all');

	wp_register_style( 'corsa-style' ,  get_stylesheet_directory_uri() . '/style.css', array(), '1', 'all' );

	wp_enqueue_style('motioncss');
	wp_enqueue_style('motioncss-widgets');
	wp_enqueue_style('jgrowl');
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('magnific-popup');
	wp_enqueue_style('style');
	wp_enqueue_style('wp-widgets');
	wp_enqueue_style('responsive');

	if(get_template_directory_uri() !=  get_stylesheet_directory_uri())
	{
		wp_enqueue_style( 'corsa-style');
	}
}
add_action('wp_enqueue_scripts', 'us_styles', 12);

function us_jscripts()
{
	wp_register_script('modernizr', get_template_directory_uri().'/js/modernizr.js');
	wp_register_script('jquery_easing', get_template_directory_uri().'/js/jquery.easing.min.js', array('jquery'), '', TRUE);
	wp_register_script('carousello', get_template_directory_uri().'/js/jquery.carousello.js', array('jquery'), '', TRUE);
	wp_register_script('isotope', get_template_directory_uri().'/js/jquery.isotope.js', array('jquery'), '', TRUE);
	wp_register_script('us_flexslider', get_template_directory_uri().'/js/jquery.flexslider.js', array('jquery'), '', TRUE);
	wp_register_script('jgrowl', get_template_directory_uri().'/js/jquery.jgrowl.js', array('jquery'), '', TRUE);
	wp_register_script('gmap', get_template_directory_uri().'/js/jquery.gmap.min.js', array('jquery'), '', TRUE);
	wp_register_script('magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.js', array('jquery'), '', TRUE);
	wp_register_script('parallax', get_template_directory_uri().'/js/jquery.parallax.js', array('jquery'), '', TRUE);
	wp_register_script('queryloader2', get_template_directory_uri().'/js/jquery.queryloader2.js', array('jquery'), '', TRUE);
	wp_register_script('plugins', get_template_directory_uri().'/js/plugins.js', array('jquery'), '', TRUE);
	wp_register_script('responsive', get_template_directory_uri().'/js/responsive.js', array('jquery'), '', TRUE);
	wp_register_script('supersized_main', get_template_directory_uri().'/js/supersized.3.2.7.js', array('jquery'), '', FALSE);
	wp_register_script('supersized_shutter', get_template_directory_uri().'/js/supersized.shutter.js', array('jquery'), '', TRUE);
	wp_register_script('us_widgets', get_template_directory_uri().'/js/us.widgets.js', array('jquery'), '', TRUE);
	wp_register_script('waypoints', get_template_directory_uri().'/js/waypoints.min.js', array('jquery'), '', TRUE);

	wp_enqueue_script('modernizr');
	wp_enqueue_script('jquery_easing');
	wp_enqueue_script('isotope');
	wp_enqueue_script('carousello');
	wp_enqueue_script('us_flexslider');
	wp_enqueue_script('jgrowl');
	wp_enqueue_script('gmap');
	wp_enqueue_script('magnific-popup');
	wp_enqueue_script('parallax');
	wp_enqueue_script('queryloader2');
	wp_enqueue_script('supersized_main');
	wp_enqueue_script('supersized_shutter');
	wp_enqueue_script('waypoints');
	wp_enqueue_script('us_widgets');
	wp_enqueue_script('responsive');
	wp_enqueue_script('plugins');

	wp_enqueue_script('comment-reply');

}
add_action('wp_enqueue_scripts', 'us_jscripts');