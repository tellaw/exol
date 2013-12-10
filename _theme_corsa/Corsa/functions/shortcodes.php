<?php

// Avoid direct calls to this file where wp core files not present
if (!function_exists ('add_action')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
}

$auto_open = FALSE;
$first_tab = FALSE;
$first_tab_title = FALSE;

class US_Shortcodes {

	public function __construct()
	{
		add_filter('the_content', array($this, 'paragraph_fix'));
		add_filter('the_content', array($this, 'subsections_fix'));
		add_filter('the_content', array($this, 'a_to_img_magnific_pupup'));

		add_shortcode('row', array($this, 'row'));
		add_shortcode('one_half', array($this, 'one_half'));
		add_shortcode('one_third', array($this, 'one_third'));
		add_shortcode('two_third', array($this, 'two_third'));
		add_shortcode('one_quarter', array($this, 'one_quarter'));
		add_shortcode('three_quarter', array($this, 'three_quarter'));
		add_shortcode('one_fourth', array($this, 'one_fourth'));
		add_shortcode('three_fourth', array($this, 'three_fourth'));

		add_shortcode('subsection', array($this, 'subsection'));

		add_shortcode('button', array($this, 'button'));

		add_shortcode('tabs', array($this, 'tabs'));
		add_shortcode('accordion', array($this, 'accordion'));
		add_shortcode('toggle', array($this, 'toggle'));
		add_shortcode('item', array($this, 'item'));
		add_shortcode('item_title', array($this, 'item_title'));

		add_shortcode('separator', array($this, 'separator'));

		add_shortcode('icon', array($this, 'icon'));
		add_shortcode('iconbox', array($this, 'iconbox'));

		add_shortcode('testimonial', array($this, 'testimonial'));

		add_shortcode('team', array($this, 'team'));
		add_shortcode('member', array($this, 'member'));

		remove_shortcode('gallery');
		add_shortcode('gallery', array($this, 'gallery'));

		add_shortcode('simple_slider', array($this, 'simple_slider'));
		add_shortcode('simple_slide', array($this, 'simple_slide'));

		add_shortcode('portfolio', array($this, 'portfolio'));
		add_shortcode('blog', array($this, 'blog'));
		add_shortcode('horizontal_blocks', array($this, 'horizontal_blocks'));

		add_shortcode('home_heading', array($this, 'home_heading'));
		add_shortcode('heading_line', array($this, 'heading_line'));

		add_shortcode('contacts', array($this, 'contacts'));
		add_shortcode('contact_item', array($this, 'contact_item'));
		add_shortcode('contacts_form', array($this, 'contacts_form'));
		add_shortcode('bottom_buttons', array($this, 'bottom_buttons'));
		add_shortcode('offer', array($this, 'offer'));
		add_shortcode('shop', array($this, 'shop'));

		add_shortcode('link_block', array($this, 'link_block'));

		add_shortcode('vertical_blocks', array($this, 'vertical_blocks'));
		add_shortcode('left_block', array($this, 'left_block'));
		add_shortcode('right_block', array($this, 'right_block'));

		add_shortcode('subtitle', array($this, 'subtitle'));
		add_shortcode('paragraph_big', array($this, 'paragraph_big'));
		add_shortcode('highlight', array($this, 'highlight'));

		add_shortcode('pricing_table', array($this, 'pricing_table'));
		add_shortcode('pricing_column', array($this, 'pricing_column'));
		add_shortcode('pricing_row', array($this, 'pricing_row'));
		add_shortcode('pricing_footer', array($this, 'pricing_footer'));

		add_shortcode('video', array($this, 'video'));
		add_shortcode('clients', array($this, 'clients'));

		add_shortcode('actionbox', array($this, 'actionbox'));
		add_shortcode('counter', array($this, 'counter'));
		add_shortcode('social_links', array($this, 'social_links'));
		add_shortcode('message_box', array($this, 'message_box'));

		add_shortcode('fullscreen_slider', array($this, 'fullscreen_slider'));
		add_shortcode('fullscreen_slide', array($this, 'fullscreen_slide'));

		add_shortcode('gmaps', array($this, 'gmaps'));
	}

	public function paragraph_fix($content)
	{
		$array = array (
			'<p>[' => '[',
			']</p>' => ']',
			']<br />' => ']',
			']<br>' => ']',
		);

		$content = strtr($content, $array);
		return $content;
	}

	public function subsections_fix($content)
	{
		$link_pages_args = array(
			'before'           => '<div class="w-blog-pagination"><div class="g-pagination">',
			'after'            => '</div></div>',
			'next_or_number'   => 'next_and_number',
			'echo'             => 0
		);


		if (strpos($content, '[subsection') !== FALSE)
		{
			$content = strtr($content, array('[subsection' => '[/subsection automatic_end_subsection="1"][subsection'));

			$content = strtr($content, array('[/subsection]' => '[/subsection][subsection]'));

			$content = strtr($content, array('[/subsection automatic_end_subsection="1"]' => '[/subsection]'));

			$content = '[subsection]'.$content.us_wp_link_pages($link_pages_args).'[/subsection]';
		}
		else
		{
			$content = '[subsection]'.$content.us_wp_link_pages($link_pages_args).'[/subsection]';
		}

		$content = preg_replace('%\[subsection\](\\s)*\[/subsection\]%i', '', $content);//echo '<textarea>'.$content.'</textarea>';

		return $content;
	}

	public function a_to_img_magnific_pupup ($content)
	{
		$pattern = "/<a(.*?)href=('|\")([^>]*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
		$replacement = '<a$1ref="magnificPopup" href=$2$3.$4$5$6>';
		$content = preg_replace($pattern, $replacement, $content);

		return $content;
	}

	public function subsection ($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'color' => '',
				'full_width' => FALSE,
				'full_height' => FALSE,
				'background' => FALSE,
				'parallax' => FALSE,

			), $attributes);

		$output_type = ($attributes['color'] != '')?' color_'.$attributes['color']:'';
		$full_width_type = ($attributes['full_width'] == 1)?' full_width':'';
		$full_height_type = ($attributes['full_height'] == 1)?' full_height':'';
		$background_style = '';
		if ($attributes['background'] != '')
		{
			if (is_numeric($attributes['background']))
			{
				$img_id = preg_replace('/[^\d]/', '', $attributes['background']);
				$img = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => 'full' ));

				if ( $img != NULL )
				{
					$img = wp_get_attachment_image_src( $img_id, 'full');
					$img = $img[0];
				}

				$background_style = ' style="background-image: url('.$img.')"';
			}
			else
			{
				$background_style = ' style="background-image: url('.$attributes['background'].')"';
			}

		}

		$parallax_class = '';
		$parallax_data_output = '';
		if ($attributes['parallax']) {
			$parallax_class = ' with_parallax';
//			$parallax_data_output = ' data-prlx-xpos="50%" data-prlx-speed="'.$attributes['parallax_speed'].'"';
		}

		$output =	'<div class="l-subsection'.$full_height_type.$full_width_type.$output_type.$parallax_class.'"'.$background_style.$parallax_data_output.'>'.
			'<div class="l-subsection-h">'.
			'<div class="l-subsection-hh g-html i-cf">'.
			do_shortcode($content).
			'</div>'.
			'</div>'.
			'</div>';

		return $output;
	}

	public function subsection_dummy ($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'type' => FALSE,
				'with' => FALSE,

			), $attributes);

		$output = do_shortcode($content);

		return $output;
	}

	public function gmaps ($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'address' => '',
				'latitude' => '',
				'longitude' => '',
				'marker' => '',
				'height' => 400,
				'zoom' => 13,
				'type' => 'ROADMAP',

			), $attributes);

		$map_id = rand(99999, 999999);

		if ($attributes['latitude'] != '' AND $attributes['longitude'] != '') {
			$map_location_options = 'latitude: "'.$attributes['latitude'].'", longitude: "'.$attributes['longitude'].'", ';
		} elseif ($attributes['address'] != '') {
			$map_location_options = 'address: "'.$attributes['address'].'", ';
		} else {
			return null;
		}

		$map_marker_options = '';
		if ($attributes['marker'] != '') {
			$map_marker_options = 'html: "'.$attributes['marker'].'", popup: true';
		}

		wp_enqueue_script('gmaps');


		$output = '<div class="w-map" id="map_'.$map_id.'" style="height: '.$attributes['height'].'px">
				<div class="w-map-h">

				</div>
			</div>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					jQuery("#map_'.$map_id.'").gMap({
						'.$map_location_options.'
						zoom: '.$attributes['zoom'].',
						maptype: "'.$attributes['type'].'",
						markers:[
							{
								'.$map_location_options.$map_marker_options.'

							}
						]
					});
				});
			</script>';

		return $output;
	}

	public function simple_slider($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
			), $attributes);

		$output =   '<div class="w-gallery type_slider">
                        <div class="w-gallery-h">
                            <div class="w-gallery-main">
                                <div class="w-gallery-main-h flexslider flex-loading">
                                    <ul class="slides">
                                        '.do_shortcode($content).'
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>';

		return $output;
	}

	public function simple_slide($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'img' => '',
			), $attributes);



		$output = 	'<li><img src="'.$attributes['img'].'" alt=""></li>';


		return $output;
	}

	public function fullscreen_slider($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'interval' => 5000,
				'transition' => 2,
				'speed' => 400,
			), $attributes);

		global $first_slide;
		$first_slide = TRUE;

		$interval = (is_numeric($attributes['interval']))?round($attributes['interval']):5000;
		$speed = (is_numeric($attributes['speed']))?round($attributes['speed']):400;
		$transition = (in_array($attributes['transition'], array(0, 1, 2, 3, 4, 5, 6, 7)))?$attributes['transition']:2;

		$output = '<div class="us_supersized">
						<a id="prevslide" class="load-item"><i class="fa fa-chevron-left"></i></a>
						<a id="nextslide" class="load-item"><i class="fa fa-chevron-right"></i></a>
						<div class="slidecaption">
							<div id="slidecaption"></div>
						</div>
					</div>
					<script type="text/javascript">
						jQuery(document).ready(function() {
							jQuery.supersized({
								// Functionality
								slide_interval : '.$interval.', // Length between transitions
								transition : '.$transition.', // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
								transition_speed : '.$speed.', // Speed of transition
								// Components
								slides  : [ // Slideshow Images
									'.do_shortcode($content).'
								]
							});
						});
					</script>';

		return $output;
	}

	public function fullscreen_slide($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'img' => '',
			), $attributes);

		global $first_slide;
		if ( ! $first_slide) {
			$output = ',';
		} else {
			$output = '';
		}
		$first_slide = FALSE;

		$output .= '{thumb: "", image: "'.$attributes['img'].'", title: "'.trim(str_replace('"', "'", preg_replace('/\s+/', ' ', do_shortcode($content)))).'", url: ""}';

		return $output;
	}

	public function actionbox ($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'color' => '',
				'title' => 'ActionBox title',
				'description' => '',
				'btn_label' => '',
				'btn_link' => '',
				'btn_color' => 'default',
				'btn_size' => '',
				'btn_icon' => '',
				'btn_external' => '',
			), $attributes);

		$color_class = ($attributes['color'] != '')?' color_'.$attributes['color']:'';


		$output = 	'<div class="w-actionbox controls_aside'.$color_class.'">'.
			'<div class="w-actionbox-h">'.
			'<div class="w-actionbox-text">';
		if ($attributes['title'] != '')
		{
			$output .= 			'<h3>'.html_entity_decode($attributes['title']).'</h3>';
		}
		if ($attributes['description'] != '')
		{
			$output .= 			'<p>'.html_entity_decode($attributes['description']).'</p>';
		}


		$output .=			'</div>'.
			'<div class="w-actionbox-controls">';

		if ($attributes['btn_label'] != '' AND $attributes['btn_link'] != '')
		{
			$colour_class = ($attributes['btn_color'] != '')?' type_'.$attributes['btn_color']:'';
			$size_class = ($attributes['btn_size'] != '')?' size_'.$attributes['btn_size']:'';
			$icon_part = ($attributes['btn_icon'] != '')?'<i class="fa fa-'.$attributes['btn_icon'].'"></i>':'';
			$external_part = ($attributes['btn_external'] == 1)?' target="_blank"':'';
			$output .= 			'<a class="w-actionbox-button g-btn'.$size_class.$colour_class.'" href="'.$attributes['btn_link'].'"'.$external_part.'><span>'.$icon_part.$attributes['btn_label'].'</span></a>';
		}

		$output .=			'</div>'.
			'</div>'.
			'</div>';
		return $output;
	}

	public function counter ($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'count' => '99',
				'suffix' => '',
				'prefix' => '',
				'title' => '',
			), $attributes);

		$output = 	'<div class="w-counter" data-count="'.$attributes['count'].'" data-prefix="'.$attributes['prefix'].'" data-suffix="'.$attributes['suffix'].'">
						<div class="w-counter-h">
							<div class="w-counter-number">'.$attributes['prefix'].$attributes['count'].$attributes['suffix'].'</div>
							<h6 class="w-counter-title">'.$attributes['title'].'</h6>
						</div>
					</div>';

		return $output;

	}

	public function video ($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'link' => 'http://vimeo.com/23237102',

			), $attributes);

		global $wp_embed;
		$embed = $wp_embed->run_shortcode('[embed]'.$attributes['link'].'[/embed]');

		$output = '<div class="w-video"><div class="w-video-h">' . $embed . '</div></div>';

		return $output;
	}

	public function pricing_table($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
			), $attributes);

		$output = '<div class="w-pricing"> <div class="w-pricing-h">'.do_shortcode($content).'</div></div>';

		return $output;
	}

	public function pricing_column($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'title' => '',
				'type' => '',
				'price' => '',
				'time' => '',
			), $attributes);

		$featured_class = ($attributes['type'] == 'featured')?' type_featured':'';

		$output = 	'<div class="w-pricing-item'.$featured_class.'"><div class="w-pricing-item-h">
						<div class="w-pricing-item-header">
							<div class="w-pricing-item-title">'.$attributes['title'].'</div>
							<div class="w-pricing-item-price">'.$attributes['price'].'<small>'.$attributes['time'].'</small></div>
						</div>
						<ul class="w-pricing-item-features">'.
			do_shortcode($content).
			'</ul></div></div>';

		return $output;
	}

	public function pricing_row($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
			), $attributes);

		$output = 	'<li class="w-pricing-item-feature">'.do_shortcode($content).'</li>';

		return $output;

	}

	public function pricing_footer($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'url' => '',
				'type' => 'default',
				'size' => '',
				'icon' => '',
			), $attributes);

		if ($attributes['url'] == '') $attributes['url'] = 'javascript:void(0)';

		$output = 	'<div class="w-pricing-item-footer">
						<a class="w-pricing-item-footer-button g-btn';
		$output .= ($attributes['type'] != '')?' type_'.$attributes['type']:'';
		$output .= ($attributes['size'] != '')?' size_'.$attributes['size']:'';
		$output .= '" href="'.$attributes['url'].'"><span>'.do_shortcode($content).'</span></a>
					</div>';

		return $output;

	}

	public function tabs($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
			), $attributes);

		global $first_tab, $first_tab_title, $auto_open;
		$auto_open = TRUE;
		$first_tab_title = TRUE;
		$first_tab = TRUE;

		$content_titles = str_replace('[item', '[item_title', $content);
		$content_titles = str_replace('[/item', '[/item_title', $content_titles);

		$output = '<div class="w-tabs"><div class="w-tabs-h"><div class="w-tabs-list">'.do_shortcode($content_titles).'</div>'.do_shortcode($content).'</div></div>';

		$auto_open = FALSE;
		$first_tab_title = FALSE;
		$first_tab = FALSE;

		return $output;
	}

	public function accordion($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
			), $attributes);

		global $first_tab, $first_tab_title, $auto_open;
		$auto_open = TRUE;
		$first_tab_title = TRUE;
		$first_tab = TRUE;


		$output = '<div class="w-tabs layout_accordion"><div class="w-tabs-h">'.do_shortcode($content).'</div></div>';

		$auto_open = FALSE;
		$first_tab_title = FALSE;
		$first_tab = FALSE;

		return $output;
	}

	public function item_title($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'title' => '',
				'open' => (@in_array('open', $attributes) OR (isset($attributes['open']) AND $attributes['open'] == 1)),
				'icon' => '',
			), $attributes);

		global $first_tab_title, $auto_open;
		if ($auto_open) {
			$active_class = ($first_tab_title)?' active':'';
			$first_tab_title = FALSE;
		} else {
			$active_class = ($attributes['open'])?' active':'';
		}


		$icon_class = ($attributes['icon'] != '')?' fa fa-'.$attributes['icon']:'';
		$item_icon_class = ($attributes['icon'] != '')?' with_icon':'';

		$output = 	'<div class="w-tabs-item'.$active_class.$item_icon_class.'">'.
			'<span class="w-tabs-item-icon'.$icon_class.'"></span>'.
			'<span class="w-tabs-item-title">'.$attributes['title'].'</span>'.
			'</div>';

		return $output;
	}

	public function item($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'title' => '',
				'open' => (@in_array('open', $attributes) OR (isset($attributes['open']) AND $attributes['open'] == 1)),
				'icon' => '',
			), $attributes);

		global $first_tab, $auto_open;
		if ($auto_open) {
			$active_class = ($first_tab)?' active':'';
			$first_tab = FALSE;
		} else {
			$active_class = ($attributes['open'])?' active':'';
		}
		$icon_class = ($attributes['icon'] != '')?' fa fa-'.$attributes['icon']:'';
		$item_icon_class = ($attributes['icon'] != '')?' with_icon':'';

		$output = 	'<div class="w-tabs-section'.$active_class.$item_icon_class.'">'.
			'<div class="w-tabs-section-title">'.
			'<span class="w-tabs-section-title-icon'.$icon_class.'"></span>'.
			'<span class="w-tabs-section-title-text">'.$attributes['title'].'</span>'.
			'<span class="w-tabs-section-title-control"><i class="fa fa-angle-down"></i></span>'.
			'</div>'.
			'<div class="w-tabs-section-content">'.
			'<div class="w-tabs-section-content-h">'.
			'<p>'.do_shortcode($content).'</p>'.
			'</div>'.
			'</div>'.
			'</div>';

		return $output;
	}

	public function toggle($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'open' => (@in_array('open', $attributes) OR (isset($attributes['open']) AND $attributes['open'] == 1))
			), $attributes);

		$output = 	'<div class="w-tabs layout_accordion type_toggle"><div class="w-tabs-h">'.do_shortcode($content).'</div></div>';

		return $output;
	}

	public function subtitle($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'align' => '',
			), $attributes);

		$align_class = ($attributes['align'] != '')?' align_'.$attributes['align']:'';

		$output = '<p class="subtitle'.$align_class.'">'.do_shortcode($content).'</p>';

		return $output;
	}

	public function paragraph_big($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'align' => '',
			), $attributes);

		$align_class = ($attributes['align'] != '')?' align_'.$attributes['align']:'';

		$output = '<p class="size_big'.$align_class.'">'.do_shortcode($content).'</p>';

		return $output;
	}

	public function highlight($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
			), $attributes);


		$output = '<span class="highlight">'.do_shortcode($content).'</span>';

		return $output;
	}

	public function home_heading($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
			), $attributes);

		$output = 	'<h1 class="home-heading">';
		$output .= 	do_shortcode($content);
		$output .= 	'</h1>';

		return $output;
	}

	public function heading_line($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'type' => '',
				'new_line' => '0',
				'bold' => '0',
			), $attributes);

		$type_class = ($attributes['type'] != '')?' type_'.$attributes['type']:'';
		$type_class .= ($attributes['bold'] == '1')?' bold':'';

		$output = 	'';
		if ($attributes['new_line'] == '1') {
			$output .= 		'<br>';
		}
		$output .= 		'<span class="home-heading-line'.$type_class.'">'.do_shortcode($content).'</span>';

		return $output;
	}

	public function horizontal_blocks($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'title' => '',
				'title_bg' => '',
				'title_size' => 'h2',
			), $attributes);

		switch ($attributes['title_size']) {
			case 'h1': $title_tag = 'h1';
				break;
			case 'h4': $title_tag = 'h4';
				break;
			case 'h3': $title_tag = 'h3';
				break;
			default: $title_tag = 'h2';
			break;
		}

		$bg_style = ($attributes['title_bg'] != '')?'background-image:url('.$attributes['title_bg'].');':'';

		$output = 	'<div class="w-block">
						<div class="w-block-h">
							<div class="w-block-header">
								<div class="w-block-header-bg" style="'.$bg_style.'"></div>
								<div class="w-block-header-h">
									<'.$title_tag.' class="thin">'.$attributes['title'].'</'.$title_tag.'>
								</div>
							</div>
							<div class="w-block-content">
								<div class="w-block-content-h">
								    '.do_shortcode($content).'
								</div>
							</div>
						</div>
					</div>';

		return $output;
	}

	public function row ($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
			), $attributes);

		$output = '<div class="g-cols">'.do_shortcode($content).'</div>';

		return $output;
	}

	public function one_half ($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(

			), $attributes);



		$output = '<div class="one-half">'.do_shortcode($content).'</div>';

		return $output;

	}

	public function one_third ($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(

			), $attributes);



		$output = '<div class="one-third">'.do_shortcode($content).'</div>';

		return $output;

	}

	public function two_third ($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(

			), $attributes);



		$output = '<div class="two-thirds">'.do_shortcode($content).'</div>';

		return $output;

	}

	public function one_quarter ($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(

			), $attributes);



		$output = '<div class="one-quarter">'.do_shortcode($content).'</div>';

		return $output;

	}

	public function three_quarter ($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(

			), $attributes);



		$output = '<div class="three-quarters">'.do_shortcode($content).'</div>';

		return $output;

	}

	public function one_fourth ($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(

			), $attributes);



		$output = '<div class="one-quarter">'.do_shortcode($content).'</div>';

		return $output;

	}

	public function three_fourth ($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(

			), $attributes);



		$output = '<div class="three-quarters">'.do_shortcode($content).'</div>';

		return $output;

	}

	public function contacts($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'phone' => '',
				'email' => '',
				'address' => '',
				'align' => '',
			), $attributes);

        $align_class = ($attributes['align'] != '')?' align_'.$attributes['align']:'';

		$output = 	'<div class="w-contacts'.$align_class.'">
						<div class="w-contacts-h">
							<div class="w-contacts-list">';
		if ($attributes['address'] != ''){
			$output .= 			'<div class="w-contacts-item">
									<i class="fa fa-map-marker"></i>
									<span class="w-contacts-item-value">'.$attributes['address'].'</span>
								</div><br>';
		}
		if ($attributes['phone'] != ''){
			$output .= 			'<div class="w-contacts-item">
									<i class="fa fa-phone"></i>
									<span class="w-contacts-item-value">'.$attributes['phone'].'</span>
								</div>';
		}
		if ($attributes['email'] != ''){
			$output .= 			'<div class="w-contacts-item">
									<i class="fa fa-envelope-o"></i>
									<span class="w-contacts-item-value"><a href="mailto:'.$attributes['email'].'">'.$attributes['email'].'</a></span>
								</div>';
		}

		$output .= 			do_shortcode($content);
		$output .= 			'</div>
						</div>
					</div>';

		return $output;
	}

    public function contact_item($attributes, $content = null)
    {
        $attributes = shortcode_atts(
            array(
                'icon' => '',
                'new_line' => '0',
            ), $attributes);

        $output = 	'';
        if ($attributes['new_line'] == '1') {
            $output .= 		'<br>';
        }

        $output .= 			    '<div class="w-contacts-item">
									<i class="fa fa-'.$attributes['icon'].'"></i>
									<span class="w-contacts-item-value">'.$content.'</span>
								</div>';

        return $output;
    }

	public function contacts_form($attributes, $content = null)
	{
		global $smof_data;
		$attributes = shortcode_atts(
			array(
			), $attributes);



		$output = 	'<div class="w-form contacts_form">
						<div class="w-form-h">

							<form class="g-form" action="" method="post" id="contact_form">
								<div class="g-form-group">
									<div class="g-form-group-rows">';
		if (in_array(@$smof_data['contact_form_name_field'], array('Shown, required', 'Shown, not required')))
		{
			$name_required = (@$smof_data['contact_form_name_field'] == 'Shown, required')?1:0;
			$output .= 					'<div class="g-form-row" id="name_row">
											<div class="g-form-row-label">
												<label class="g-form-row-label-h">'.__('Your name', 'us').'</label>
											</div>
											<div class="g-form-row-field">
												<i class="fa fa-user"></i>
												<input type="text" name="name" data-required="'.$name_required.'">
											</div>
											<div class="g-form-row-state" id="name_state"></div>
										</div>';
		}

		if (in_array(@$smof_data['contact_form_email_field'], array('Shown, required', 'Shown, not required')))
		{
			$email_required = (@$smof_data['contact_form_email_field'] == 'Shown, required')?1:0;
			$output .= 					'<div class="g-form-row" id="email_row">
											<div class="g-form-row-label">
												<label class="g-form-row-label-h">'.__('Email', 'us').'</label>
											</div>
											<div class="g-form-row-field">
												<i class="fa fa-envelope"></i>
													<input type="email" name="email" data-required="'.$email_required.'">
											</div>
											<div class="g-form-row-state" id="email_state"></div>
										</div>';
		}

		if (in_array(@$smof_data['contact_form_phone_field'], array('Shown, required', 'Shown, not required')))
		{
			$phone_required = (@$smof_data['contact_form_phone_field'] == 'Shown, required')?1:0;
			$output .= 					'<div class="g-form-row" id="phone_row">
											<div class="g-form-row-label">
												<label class="g-form-row-label-h">'.__('Phone Number', 'us').'</label>
											</div>
											<div class="g-form-row-field">
												<i class="fa fa-phone"></i>
												<input type="text" name="phone" data-required="'.$phone_required.'">
											</div>
											<div class="g-form-row-state" id="phone_state"></div>
										</div>';
		}

		$output .= 						'<div class="g-form-row" id="message_row">
											<div class="g-form-row-label">
												<label class="g-form-row-label-h">'.__('Message', 'us').'</label>
											</div>
											<div class="g-form-row-field">
												<i class="fa fa-pencil"></i>
												<textarea name="message" cols="30" rows="10"></textarea>
											</div>
											<div class="g-form-row-state" id="message_state"></div>
										</div>
										<div class="g-form-row">
											<div class="g-form-row-label"></div>
											<div class="g-form-row-field">
												<button class="g-btn type_primary" id="message_send"><span>'.__('Send Message', 'us').'</span></button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>';

		return $output;
	}

	public function portfolio($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'items' => null,
				'category' => null,
			), $attributes);

		if (is_numeric($attributes['items']) AND $attributes['items'] > 0)
		{
			$attributes['items'] = ceil($attributes['items']);
		} else
		{
			$attributes['items'] = -1;
		}

		$args = array(
			'post_type' => 'us_portfolio',
			'posts_per_page' => $attributes['items'],
			'post__not_in' => get_option('sticky_posts')
		);

		if ( ! empty($attributes['category'])) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'us_portfolio_category',
					'field' => 'slug',
					'terms' => $attributes['category']
				)
			);
		}

		$portfolio = new WP_Query($args);

		$output = 	'<div class="w-portfolio">
						<div class="w-portfolio-h">
							<div class="w-portfolio-list">
								<div class="w-portfolio-list-h">';
		while($portfolio->have_posts())
		{
			$portfolio->the_post();
			$post = get_post();

            if (rwmb_meta('us_preview_fullwidth') == 1)
            {
                if (has_post_thumbnail()) {
                    $the_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-list');
                    $the_thumbnail = $the_thumbnail[0];
                    $the_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    $the_image = '<img src="'.$the_image[0].'" alt="">';
                } else {
                    $the_thumbnail =  get_template_directory_uri() .'/img/placeholder/500x500.gif';
                    $the_image = '<img src="'.get_template_directory_uri().'/img/placeholder/1200x800.gif" alt="">';
                }

                remove_shortcode('subsection');
                add_shortcode('subsection', array($this, 'subsection_dummy'));

                $content = get_the_content();
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);

                remove_shortcode('subsection');
                add_shortcode('subsection', array($this, 'subsection'));

                $output .= 				'<div class="w-portfolio-item">
											<div class="w-portfolio-item-h">
												<a class="w-portfolio-item-anchor" href="javascript:void(0);" data-id="'.$post->ID.'">
													<div class="w-portfolio-item-image" style="background-image:url('.$the_thumbnail.');"></div>
													<div class="w-portfolio-item-meta">
														<h2 class="w-portfolio-item-title">'.get_the_title().'</h2>
													</div>
													<div class="w-portfolio-item-hover"><i class="fa fa-plus"></i></div>
												</a>
												<div class="w-portfolio-item-details" style="display: none;">
													<div class="w-portfolio-item-details-h">
														<div class="w-portfolio-item-details-content">
                                                            '.$content.'
														</div>

														<div class="w-portfolio-item-details-close"></div>
														<div class="w-portfolio-item-details-arrow to_prev"><i class="fa fa-angle-left"></i></div>
														<div class="w-portfolio-item-details-arrow to_next"><i class="fa fa-angle-right"></i></div>

													</div>
												</div>
											</div>
										</div>';
            }
            else
            {
                if (has_post_thumbnail()) {
                    $the_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-list');
                    $the_thumbnail = $the_thumbnail[0];
                    $the_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    $the_image = '<img src="'.$the_image[0].'" alt="">';
                } else {
                    $the_thumbnail =  get_template_directory_uri() .'/img/placeholder/500x500.gif';
                    $the_image = '<img src="'.get_template_directory_uri().'/img/placeholder/1200x800.gif" alt="">';
                }

                if (rwmb_meta('us_preview_image') != '')
                {
                    $preview_img_id = preg_replace('/[^\d]/', '', rwmb_meta('us_preview_image'));
                    $preview_img = wp_get_attachment_image_src($preview_img_id, 'full');

                    if ( $preview_img != NULL )
                    {
                        $the_image = '<img src="'.$preview_img[0].'" alt="">';
                    }
                } elseif (rwmb_meta('us_preview_video') != '') {
                    $the_image = do_shortcode('[video link="'.rwmb_meta('us_preview_video').'"]');
                }

                remove_shortcode('subsection');
                add_shortcode('subsection', array($this, 'subsection_dummy'));

                $content = get_the_content();
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);

                remove_shortcode('subsection');
                add_shortcode('subsection', array($this, 'subsection'));

                $output .= 				'<div class="w-portfolio-item">
											<div class="w-portfolio-item-h">
												<a class="w-portfolio-item-anchor" href="javascript:void(0);" data-id="'.$post->ID.'">
													<div class="w-portfolio-item-image" style="background-image:url('.$the_thumbnail.');"></div>
													<div class="w-portfolio-item-meta">
														<h2 class="w-portfolio-item-title">'.get_the_title().'</h2>
													</div>
													<div class="w-portfolio-item-hover"><i class="fa fa-plus"></i></div>
												</a>
												<div class="w-portfolio-item-details" style="display: none;">
													<div class="w-portfolio-item-details-h">
														<div class="w-portfolio-item-details-content">
															<div class="w-portfolio-item-details-content-preview">
																'.$the_image.'
															</div>
															<div class="w-portfolio-item-details-content-text">
																<h3>'.get_the_title().'</h3>
																'.$content.'
															</div>
														</div>

														<div class="w-portfolio-item-details-close"></div>
														<div class="w-portfolio-item-details-arrow to_prev"><i class="fa fa-angle-left"></i></div>
														<div class="w-portfolio-item-details-arrow to_next"><i class="fa fa-angle-right"></i></div>

													</div>
												</div>
											</div>
										</div>';
            }


		}
		$output .= 				'</div>
							</div>
						</div>
					</div>';

		return $output;
	}

	public function blog($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'posts' => 6,
				'category' => null,
				'ajax' => 0,
			), $attributes);

		if (is_numeric($attributes['posts']) AND $attributes['posts'] > 0)
		{
			$attributes['posts'] = ceil($attributes['posts']);
		} else
		{
			$attributes['posts'] = 6;
		}

		$args = array(
			'posts_per_page' => $attributes['posts'],
			'post__not_in' => get_option('sticky_posts')
		);

		if ( ! empty($attributes['category'])) {
			$args['category_name'] = $attributes['category'];
		}

		$posts = new WP_Query($args);
		$max_num_pages = $posts->max_num_pages;

		$output = 	'<div class="w-blog imgpos_atleft more_hidden">
						<div class="w-blog-h">
							<div class="w-blog-list">';

		while($posts->have_posts())
		{
			$posts->the_post();

			if (has_post_thumbnail()) {
				$the_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'blog-list');
				$the_thumbnail = $the_thumbnail[0];
			} else {
				$the_thumbnail =  get_template_directory_uri() .'/img/placeholder/500x500.gif';
			}

			$output .= 			'<div class="w-blog-entry">
									<div class="w-blog-entry-h">
										<a class="w-blog-entry-link" href="'.get_permalink(get_the_ID()).'">
											<div class="w-blog-entry-preview">
												<img src="'.$the_thumbnail.'" alt="">
											</div>

											<h2 class="w-blog-entry-title">
												<span class="w-blog-entry-title-h">'.get_the_title().'</span>
											</h2>
										</a>
										<div class="w-blog-entry-body">
											<div class="w-blog-entry-meta">
												<div class="w-blog-entry-meta-date">
													<span class="w-blog-entry-meta-date-month">'.get_the_date('M').'</span>
													<span class="w-blog-entry-meta-date-day">'.get_the_date('d').'</span>
													<span class="w-blog-entry-meta-date-year">'.get_the_date('Y').'</span>
												</div>

												<div class="w-blog-entry-meta-comments">
													<a class="w-blog-entry-meta-comments-h" href="'.get_permalink(get_the_ID()).'#comments"><i class="fa fa-comments"></i>'.get_comments_number().'</a>
												</div>
											</div>

											<div class="w-blog-entry-short">
												'.apply_filters('the_excerpt', get_the_excerpt()).'
											</div>

										</div>
									</div>
								</div>';
		}

		$output .= 			'</div>
						</div>
					</div>';

		if ($max_num_pages > 1 AND $attributes['ajax'] == 1) {
			$output .=
'<script type="text/javascript">
var page = 1,
	max_page = '.$max_num_pages.'
jQuery(document).ready(function(){
	jQuery("#blog_load_more").click(function(){
		jQuery(this).hide();
		jQuery("#spinner").show();
		jQuery.ajax({
			type: "POST",
			url: "'.admin_url('admin-ajax.php').'",
			data: {
				action: "blogPagination",
				page: page+1,
				per_page: '.$attributes['posts'].'
			},
			success: function(data, textStatus, XMLHttpRequest){
				page++;
				jQuery(".w-blog-list").append(data);
				jQuery("#spinner").hide();
				if (max_page > page) {
					jQuery("#blog_load_more").show();
				}
			},
			error: function(MLHttpRequest, textStatus, errorThrown){
				jQuery("#spinner").hide();
				jQuery(this).show();
			}
		});
	});
});
</script>
<div class="w-blog-load">
<a href="javascript:void(0);" id="blog_load_more" class="g-btn type_default size_small"><span>Load More Posts</span></a>
<img id="spinner" src="'.get_template_directory_uri().'/img/loader.gif" style="display: none;">
</div>';
		}

		return $output;
	}

	public function clients($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'amount' => 1000,
			), $attributes);

		$args = array(
			'post_type' => 'us_client',
			'paged' => 1,
			'posts_per_page' => $attributes['amount'],
		);

		$cleints = new WP_Query($args);

		$output = 	'<div class="w-clients type_carousel columns_5">
							<div class="w-clients-h">
								<div class="w-clients-list">
									<div class="w-clients-list-h">';

		while($cleints->have_posts())
		{
			$cleints->the_post();
			if(has_post_thumbnail())
			{
				if (rwmb_meta('us_client_url') != '')
				{
					$client_new_tab = (rwmb_meta('us_client_new_tab') == 1)?' target="_blank"':'';
					$client_url = (rwmb_meta('us_client_url') != '')?rwmb_meta('us_client_url'):'javascript:void(0);';

					$output .= 			'<a class="w-clients-item" href="'.$client_url.'"'.$client_new_tab.'>'.
						get_the_post_thumbnail(get_the_ID(), 'carousel-thumb').
						'</a>';
				}
				else
				{
					$output .= 			'<div class="w-clients-item">'.
						get_the_post_thumbnail(get_the_ID(), 'carousel-thumb').
						'</div>';
				}

			}
		}

		$output .=						'</div>
								</div>
								<a class="w-clients-nav to_prev disabled" href="javascript:void(0)" title=""></a>
								<a class="w-clients-nav to_next" href="javascript:void(0)" title=""></a>
							</div>
						</div>';
		return $output;
	}

	public function button($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'text' => '',
				'url' => '',
				'external' => '',
				'type' => 'default',
				'size' => '',
				'icon' => '',
			), $attributes);

		$icon_part = '';
		if ($attributes['icon'] != '') {
			$icon_part = '<i class="fa fa-'.$attributes['icon'].'"></i>';
		}

		$output = '<a href="'.$attributes['url'].'"';
		$output .= ($attributes['external'] == '1')?' target="_blank"':'';
		$output .= 'class="g-btn';
		$output .= ($attributes['type'] != '')?' type_'.$attributes['type']:'';
		$output .= ($attributes['size'] != '')?' size_'.$attributes['size']:'';
		$output .= '"><span>'.$icon_part.$attributes['text'].'</span></a>';

		return $output;
	}

	public function separator($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'type' => "",
				'size' => "",
				'icon' => "star",
			), $attributes);

		if ($attributes['icon'] == '') {
			$attributes['icon'] = 'star';
		}

		$type_class = ($attributes['type'] != '')?' type_'.$attributes['type']:'';
		$size_class = ($attributes['size'] != '')?' size_'.$attributes['size']:'';

		$output = 	'<div class="g-hr'.$type_class.$size_class.'">
						<span class="g-hr-h">
							<i class="fa fa-'.$attributes['icon'].'"></i>
						</span>
					</div>';

		return $output;
	}

	public function icon($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'icon' => "",
				'color' => "",
				'size' => "",
				'with_circle' => "",
				'link' => "",
			), $attributes);

		$color_class = ($attributes['color'] != '')?' color_'.$attributes['color']:'';
		$size_class = ($attributes['size'] != '')?' size_'.$attributes['size']:'';
		$with_circle_class = ($attributes['with_circle'] == 1)?' with_circle':'';

		if ($attributes['link'] != '') {
			$link = $attributes['link'];
			$link_start = '<a class="w-icon-link" href="'.$link.'">';
			$link_end = '</a>';
		}
		else
		{
			$link_start = '<span class="w-icon-link">';
			$link_end = '</span>';
		}

		$output = 	'<span class="w-icon'.$color_class.$size_class.$with_circle_class.'">
						'.$link_start.'
							<i class="fa fa-'.$attributes['icon'].'"></i>
						'.$link_end.'
					</span>';

		return $output;
	}

	public function iconbox($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'icon' => '',
				'img' => '',
				'title' => '',
				'with_circle' => 'h2',
				'link' => '',
				'iconpos' => 'top',
				'external' => 'top',

			), $attributes);

		$img_class = ($attributes['img'] != '')?' with_img':'';
		$iconpos_class = ($attributes['iconpos'] != '')?' iconpos_'.$attributes['iconpos']:'';
		$with_circle_class = ($attributes['with_circle'] == 1)?' with_circle':'';

		if ($attributes['link'] != '') {
			$link = $attributes['link'];
			$link_start = '<a class="w-iconbox-link" href="'.$link.'"';
			$link_start .= ($attributes['external'] == '1')?' target="_blank"':'';
			$link_start .= '>';
			$link_end = '</a>';
		}
		else
		{
			$link_start = '<div class="w-iconbox-link">';
			$link_end = '</div>';
		}

		$output =	'<div class="w-iconbox'.$img_class.$iconpos_class.$with_circle_class.'">
						<div class="w-iconbox-h">
							'.$link_start.'
							<div class="w-iconbox-icon">
								<i class="fa fa-'.$attributes['icon'].'"></i>';
		if ($attributes['img'] != '') {
			$output .=			'<div class="w-iconbox-icon-img">
									<img src="'.$attributes['img'].'" alt=""/>
								</div>';
		}
		$output .=	'		</div>
							<h4 class="w-iconbox-title">'.$attributes['title'].'</h4>
							'.$link_end.'
							<div class="w-iconbox-text">
								<p>'.do_shortcode($content).'</p>
							</div>
						</div>
					</div>';

		return $output;
	}

	public function social_links($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'size' => '',
				'email' => '',
				'facebook' => '',
				'twitter' => '',
				'google' => '',
				'linkedin' => '',
				'youtube' => '',
				'vimeo' => '',
				'flickr' => '',
				'instagram' => '',
				'pinterest' => '',
				'skype' => '',
				'tumblr' => '',
				'dribbble' => '',
				'vk' => '',
				'rss' => '',
                'align' => '',
			), $attributes);

		$socials = array (
			'email' => 'Email',
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'google' => 'Google+',
			'linkedin' => 'LinkedIn',
			'youtube' => 'YouTube',
			'vimeo' => 'Vimeo',
			'flickr' => 'Flickr',
			'instagram' => 'Instagram',
			'pinterest' => 'Pinterest',
			'skype' => 'Skype',
			'tumblr' => 'Tumblr',
			'dribbble' => 'Dribbble',
			'vk' => 'Vkontakte',
			'rss' => 'RSS',
		);

		$align_class = ($attributes['align'] != '')?' align_'.$attributes['align']:'';
		$size_class = ($attributes['size'] != '')?' size_'.$attributes['size']:'';

		$output = '<div class="w-socials'.$size_class.$align_class.'">
			<div class="w-socials-h">
				<div class="w-socials-list">';

		foreach ($socials as $social_key => $social)
		{
			if ($attributes[$social_key] != '')
			{
				if ($social_key == 'email')
				{
					$output .= '<div class="w-socials-item '.$social_key.'">
					<a class="w-socials-item-link" href="mailto:'.$attributes[$social_key].'">
						<i class="fa fa-envelope"></i>
					</a>
					<div class="w-socials-item-popup">
						<div class="w-socials-item-popup-h">
							<span class="w-socials-item-popup-text">'.$social.'</span>
						</div>
					</div>
					</div>';

				}
				elseif ($social_key == 'google')
				{
					$output .= '<div class="w-socials-item gplus">
					<a class="w-socials-item-link" target="_blank" href="'.$attributes[$social_key].'">
						<i class="fa fa-google-plus"></i>
					</a>
					<div class="w-socials-item-popup">
						<div class="w-socials-item-popup-h">
							<span class="w-socials-item-popup-text">'.$social.'</span>
						</div>
					</div>
					</div>';

				}
				elseif ($social_key == 'youtube')
				{
					$output .= '<div class="w-socials-item '.$social_key.'">
					<a class="w-socials-item-link" target="_blank" href="'.$attributes[$social_key].'">
						<i class="fa fa-youtube-play"></i>
					</a>
					<div class="w-socials-item-popup">
						<div class="w-socials-item-popup-h">
							<span class="w-socials-item-popup-text">'.$social.'</span>
						</div>
					</div>
					</div>';

				}
				elseif ($social_key == 'vimeo')
				{
					$output .= '<div class="w-socials-item '.$social_key.'">
					<a class="w-socials-item-link" target="_blank" href="'.$attributes[$social_key].'">
						<i class="fa fa-vimeo-square"></i>
					</a>
					<div class="w-socials-item-popup">
						<div class="w-socials-item-popup-h">
							<span class="w-socials-item-popup-text">'.$social.'</span>
						</div>
					</div>
					</div>';

				}
				else
				{
					$output .= '<div class="w-socials-item '.$social_key.'">
					<a class="w-socials-item-link" target="_blank" href="'.$attributes[$social_key].'">
						<i class="fa fa-'.$social_key.'"></i>
					</a>
					<div class="w-socials-item-popup">
						<div class="w-socials-item-popup-h">
							<span class="w-socials-item-popup-text">'.$social.'</span>
						</div>
					</div>
					</div>';
				}

			}
		}

		$output .= '</div></div></div>';

		return $output;
	}

	public function testimonial($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'author' => '',
				'description' => '',

			), $attributes);

		$output = 	'<div class="w-testimonial">
						<div class="w-testimonial-h">
							<div class="w-testimonial-text">'.do_shortcode($content).'</div>
							<div class="w-testimonial-person">
								<i class="fa fa-user"></i>
								<span class="w-testimonial-person-name">'.$attributes['author'].'</span>
								<span class="w-testimonial-person-meta">'.$attributes['description'].'</span>
							</div>
						</div>
					</div>';



		return $output;
	}

	public function message_box ($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(
				'type' => 'info',
			), $attributes);

		$output = '<div class="g-alert with_close type_'.$attributes['type'].'"><div class="g-alert-close"> &#10005 </div><div class="g-alert-body"><p>'.do_shortcode($content).'</p></div></div>';

		return $output;
	}

	public function team ($attributes, $content)
	{
		$attributes = shortcode_atts(
			array(

			), $attributes);



		$output = 	'<div class="w-team">'.
			'<div class="w-team-h">'.
			'<div class="w-team-list">';
		$output .= 				do_shortcode($content);
		$output .= 			'</div>'.
			'</div>'.
			'</div>';

		return $output;
	}

	public function member ($attributes, $content = null)
	{
		$attributes = shortcode_atts(
			array(
				'name' => '',
				'role' => '',
				'img' => '',
				'email' => '',
				'facebook' => '',
				'twitter' => '',
				'linkedin' => '',
				'custom_icon' => '',
				'custom_link' => '',
			), $attributes);



		if ($attributes['img'] == '')
		{
			$attributes['img'] = get_template_directory_uri().'/img/placeholder/500x500.gif';
		}

		$social_output = '';

		if ($attributes['facebook'] != '' OR $attributes['twitter'] != '' OR $attributes['linkedin'] != '' OR $attributes['email'] != '' OR ($attributes['custom_icon'] != '' AND $attributes['custom_link'] != ''))
		{
			$social_output .=		'<div class="w-team-member-links">'.
				'<div class="w-team-member-links-list">';

			if ($attributes['email'] != '')
			{
				$social_output .= 			'<a class="w-team-member-links-item" href="mailto:'.$attributes['email'].'" target="_blank"><i class="fa fa-envelope"></i></a>';
			}
			if ($attributes['facebook'] != '')
			{
				$social_output .= 			'<a class="w-team-member-links-item" href="'.$attributes['facebook'].'" target="_blank"><i class="fa fa-facebook"></i></a>';
			}
			if ($attributes['twitter'] != '')
			{
				$social_output .= 			'<a class="w-team-member-links-item" href="'.$attributes['twitter'].'" target="_blank"><i class="fa fa-twitter"></i></a>';
			}
			if ($attributes['linkedin'] != '')
			{
				$social_output .= 			'<a class="w-team-member-links-item" href="'.$attributes['linkedin'].'" target="_blank"><i class="fa fa-linkedin"></i></a>';
			}
			if ($attributes['custom_icon'] != '' AND $attributes['custom_link'] != '')
			{
				$social_output .= 			'<a class="w-team-member-links-item" href="'.$attributes['custom_link'].'" target="_blank"><i class="fa fa-'.$attributes['custom_icon'].'"></i></a>';
			}
			$social_output .=			'</div>'.
				'</div>';
		}

		$output = 	'<div class="w-team-member">
						<div class="w-team-member-h">
							<div class="w-team-member-image">
								<img src="'.$attributes['img'].'" alt="member photo" />
							</div>
							<div class="w-team-member-meta">
								<div class="w-team-member-meta-h">
									<h4 class="w-team-member-name">'.$attributes['name'].'</h4>
									<div class="w-team-member-role">'.$attributes['role'].'</div>
									'.$social_output.'
								</div>
							</div>
						</div>
					</div>';

		return $output;
	}

	public function gallery($attributes)
	{
		$post = get_post();

		static $instance = 0;
		$instance++;

		if ( ! empty($attributes['ids']))
		{
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if (empty($attributes['orderby']))
			{
				$attributes['orderby'] = 'post__in';
			}
			$attributes['include'] = $attributes['ids'];
		}

		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if (isset($attributes['orderby']))
		{
			$attributes['orderby'] = sanitize_sql_orderby($attributes['orderby']);
			if ( !$attributes['orderby'])
			{
				unset($attributes['orderby']);
			}
		}

		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post->ID,
			'itemtag'    => 'dl',
			'icontag'    => 'dt',
			'captiontag' => 'dd',
			'columns'    => 3,
			'type'       => 's',
			'include'    => '',
			'exclude'    => ''
		), $attributes));

		if ( ! in_array($type, array('s', 'm', 'l', ))) {
			$type = "s";
		}

		$size = 'gallery-'.$type;
		if ($type == 'masonry') {
			$type_classes = ' type_masonry';
		} else {
			$type_classes = ' layout_tile size_'.$type;
		}


		$id = intval($id);
		if ('RAND' == $order)
		{
			$orderby = 'none';
		}

		if ( !empty($include))
		{
			$_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

			$attachments = array();
			if (is_array($_attachments))
			{
				foreach ($_attachments as $key => $val) {
					$attachments[$val->ID] = $_attachments[$key];
				}
			}
		}
		elseif ( !empty($exclude))
		{
			$attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
		}
		else
		{
			$attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
		}

		if (empty($attachments))
		{
			return '';
		}

		if (is_feed())
		{
			$output = "\n";
			if (is_array($attachments))
			{
				foreach ($attachments as $att_id => $attachment)
					$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			}
			return $output;
		}

		$rand_id = rand(99999, 999999);

		$output = '<div id="gallery_'.$rand_id.'" class="w-gallery'.$type_classes.'"> <div class="w-gallery-h"> <div class="w-gallery-tnails"> <div class="w-gallery-tnails-h">';

		$i = 1;
		if (is_array($attachments))
		{
			foreach ($attachments as $id => $attachment) {


				$title = trim(strip_tags(get_post_meta($id, '_wp_attachment_image_alt', true)));
				if (empty($title))
				{
					$title = trim(strip_tags($attachment->post_excerpt)); // If not, Use the Caption
				}
				if (empty($title))
				{
					$title = trim(strip_tags($attachment->post_title)); // Finally, use the title
				}

				$output .= '<a class="w-gallery-tnail order_'.$i.'" href="'.wp_get_attachment_url($id).'" title="'.$title.'">';
				$output .= '<span class="w-gallery-tnail-h">';
				$output .= wp_get_attachment_image($id, $size, 0);
				$output .= '<span class="w-gallery-tnail-hover"><i class="fa fa-search"></i></span>';

				$output .= '</span>';
				$output .= '</a>';

				$i++;

			}
		}

		$output .= "</div> </div> </div> </div>\n";

		$output .= "<script>
		jQuery(document).ready(function(){
		jQuery('#gallery_".$rand_id."').magnificPopup({
			type: 'image',
			delegate: 'a',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1]
			},
			removalDelay: 300,
			fixedBgPos: true,
			fixedContentPos: false,
			mainClass: 'mfp-fade'

		});
		});
		</script>";

		return $output;
	}
}

global $us_shortcodes;

$us_shortcodes = new US_Shortcodes;

// Add buttons to tinyMCE
function us_add_buttons() {
	if (current_user_can('edit_posts') &&  current_user_can('edit_pages'))
	{
		add_filter('mce_external_plugins', 'us_tinymce_plugin');
		add_filter('mce_buttons_3', 'us_tinymce_buttons');
	}
}

function us_tinymce_buttons($buttons) {
	array_push($buttons, "columns", "typography", "separator_btn", "button", "tabs", "accordion", "toggle", "icon", "iconbox", "video", "fullscreen_slider", "simple_slider", "portfolio", "blog", "testimonial", "team", "contacts", "contacts_form", "social_links", "gmaps", "actionbox", "subsection", "pricing_table", "message_box", "counter", "clients");
	return $buttons;
}

function us_tinymce_plugin($plugin_array) {
	$plugin_array['columns'] = get_template_directory_uri().'/functions/tinymce/buttons.js';

	$plugin_array['video'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['team'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['button'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['tabs'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['accordion'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['toggle'] = get_template_directory_uri().'/functions/tinymce/buttons.js';

	$plugin_array['separator_btn'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['icon'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['iconbox'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['testimonial'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['portfolio'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['blog'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['simple_slider'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['fullscreen_slider'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['subsection'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['contacts'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['contacts_form'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['typography'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['actionbox'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['pricing_table'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['social_links'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['gmaps'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['counter'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['message_box'] = get_template_directory_uri().'/functions/tinymce/buttons.js';
	$plugin_array['clients'] = get_template_directory_uri().'/functions/tinymce/buttons.js';

	return $plugin_array;
}

add_action('admin_init', 'us_add_buttons');

function us_media_templates(){

	?>
	<script type="text/html" id="tmpl-my-custom-gallery-setting">
		<label class="setting">
			<span><?php echo 'Type'; ?></span>
			<select data-setting="type">
				<option value="default_val"><?php echo 'Small size thumbs'; ?></option>
				<option value="m"><?php echo 'Medium size thumbs'; ?></option>
				<option value="l"><?php echo 'Big size thumbs'; ?></option>
			</select>
		</label>
	</script>

	<script>

		jQuery(document).ready(function(){

			// add your shortcode attribute and its default value to the
			// gallery settings list; $.extend should work as well...
			_.extend(wp.media.gallery.defaults, {
				type: 'default_val'
			});

			// merge default gallery settings template with yours
			wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
				template: function(view){
					return wp.media.template('gallery-settings')(view)
						+ wp.media.template('my-custom-gallery-setting')(view);
				}
			});

		});

	</script>
<?php

}

// Add Type select to Gallery window
add_action('print_media_templates', 'us_media_templates');

