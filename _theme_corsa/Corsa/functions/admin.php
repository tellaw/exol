<?php

function us_enqueue_editor_style() {

	add_editor_style( 'functions/tinymce/mce_styles.css' );
}

add_action('init', 'us_enqueue_editor_style');

function us_theme_activation()
{
	global $pagenow;
	if (is_admin() && $pagenow == 'themes.php' && isset($_GET['activated']))
	{
		header( 'Location: '.admin_url().'themes.php?page=optionsframework' ) ;
	}
}

add_action('admin_init','us_theme_activation');