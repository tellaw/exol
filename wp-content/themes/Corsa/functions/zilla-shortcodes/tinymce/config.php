<?php

$post_categories = array('' => 'All');
$post_categories_raw = get_categories("hierarchical=0");
foreach ($post_categories_raw as $post_category_raw)
{
	$post_categories[$post_category_raw->slug] = $post_category_raw->name;
}
$portfolio_categories = array('' => 'All');
$portfolio_categories_raw = get_categories("taxonomy=us_portfolio_category&hierarchical=0");
foreach ($portfolio_categories_raw as $portfolio_category_raw)
{
	$portfolio_categories[$portfolio_category_raw->slug] = $portfolio_category_raw->name;
}

/*-----------------------------------------------------------------------------------*/
/*	Blog Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['blog'] = array(
	'no_preview' => true,
	'params' => array(
		'posts' => array(
			'type' => 'text',
			'std' => '6',
			'label' => 'Posts',
			'desc' => 'Number of posts to show',
		),
		'category' => array(
			'type' => 'select',
			'label' => 'Category',
			'desc' => '',
			'options' => $post_categories,
		),
		'ajax' => array(
			'std' => false,
			'type' => 'checkbox',
			'label' => 'AJAX Button',
			'checkbox_text' => 'Add Button that lets visitor load more posts via AJAX',
			'desc' => '',
			'options' => $post_categories,
		),
	),
	'shortcode' => '[blog posts="{{posts}}" category="{{category}}" ajax="{{ajax}}"]',
	'popup_title' => 'Insert Blog shortcode'
);
/*-----------------------------------------------------------------------------------*/
/*	Portfolio Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['portfolio'] = array(
	'no_preview' => true,
	'params' => array(
		'items' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Amount of Items to show',
			'desc' => 'If left blank, shows all present items',
		),
		'category' => array(
			'type' => 'select',
			'label' => 'Category',
			'desc' => '',
			'options' => $portfolio_categories,
		),
	),
	'shortcode' => '[portfolio items="{{items}}" category="{{category}}"]',
	'popup_title' => 'Insert Portfolio shortcode'
);

/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'URL',
			'desc' => 'Add the button\'s url eg http://example.com'
		),
		'text' => array(
			'std' => 'Push the Button',
			'type' => 'text',
			'label' => 'Text',
			'desc' => '',
		),
		'type' => array(
			'type' => 'select',
			'label' => 'Color Style',
			'desc' => '',
			'options' => array(
				'default' => 'Default Theme Color',
				'primary' => 'Primary Theme Color',
				'secondary' => 'Secondary Theme Color',
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => 'Size',
			'desc' => '',
			'options' => array(
				'' => 'Normal',
				'small' => 'Small',
				'big' => 'Big'
			)
		),
		'icon' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Icon (optional)',
			'desc' => 'FontAwesome Icon name. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Full list of icons</a>',
		),
		'external' => array(
			'std' => false,
			'type' => 'checkbox',
			'label' => 'External Link',
			'checkbox_text' => 'Opens in new tab',
			'desc' => '',
		),
	),
	'shortcode' => '[button url="{{url}}" text="{{text}}" size="{{size}}" type="{{type}}" icon="{{icon}}" external="{{external}}"]',
	'popup_title' => 'Insert Button shortcode'
);

/*-----------------------------------------------------------------------------------*/
/*	Team Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['team'] = array(
	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[team] {{child_shortcode}} [/team]',
	'popup_title' => 'Insert Team shortcode',

	'child_shortcode' => array(
		'params' => array(
			'name' => array(
				'std' => '',
				'type' => 'text',
				'label' => 'Name',
				'desc' => '',
			),
			'role' => array(
				'std' => '',
				'type' => 'text',
				'label' => 'Role',
				'desc' => '',
			),
			'img' => array(
				'std' => '',
				'type' => 'image',
				'label' => 'Photo',
				'desc' => 'Path to member\'s photo',
			),
			'email' => array(
				'std' => '',
				'type' => 'text',
				'label' => 'Email',
				'desc' => '',
			),
			'facebook' => array(
				'std' => '',
				'type' => 'text',
				'label' => 'Facebook',
				'desc' => '',
			),
			'twitter' => array(
				'std' => '',
				'type' => 'text',
				'label' => 'Twitter',
				'desc' => '',
			),
			'linkedin' => array(
				'std' => '',
				'type' => 'text',
				'label' => 'LinkedIn',
				'desc' => '',
			),
			'custom_icon' => array(
				'std' => '',
				'type' => 'text',
				'label' => 'Custom Icon',
				'desc' => 'FontAwesome Icon name. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Full list of icons</a>',
			),
			'custom_link' => array(
				'std' => '',
				'type' => 'text',
				'label' => 'Custom Link',
				'desc' => 'Fill Custom Link and Custom Icon fields to display additional icon for Team Member',
			),
		),
		'shortcode' => '<br>[member name="{{name}}" role="{{role}}" img="{{img}}" email="{{email}}" facebook="{{facebook}}" twitter="{{twitter}}" linkedin="{{linkedin}}" custom_icon="{{custom_icon}}" custom_link="{{custom_link}}"]',
		'clone_button' => 'Add Member'
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Separator Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['separator'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => 'Separator Type',
			'desc' => '',
			'options' => array(
				'' => 'Full Width',
				'short' => 'Short',
				'invisible' => 'Invisible',
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => 'Separator Size',
			'desc' => '',
			'options' => array(
				'' => 'Medium',
				'big' => 'Big',
				'small' => 'Small',
			)
		),
		'icon' => array(
			'std' => 'star',
			'type' => 'text',
			'label' => 'Icon',
			'desc' => 'FontAwesome Icon name. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Full list of icons</a>',
		),
	),
	'shortcode' => '[separator type="{{type}}" size="{{size}}" icon="{{icon}}"]',
	'popup_title' => 'Insert Separator shortcode'
);

/*-----------------------------------------------------------------------------------*/
/*	Icon Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['icon'] = array(
	'no_preview' => true,
	'params' => array(
		'icon' => array(
			'std' => 'star',
			'type' => 'text',
			'label' => 'Icon',
			'desc' => 'FontAwesome Icon name. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Full list of icons</a>',
		),
		'color' => array(
			'type' => 'select',
			'label' => 'Color Style',
			'desc' => '',
			'options' => array(
				'' => 'Text Color',
				'primary' => 'Primary Theme Color',
				'secondary' => 'Secondary Theme Color',
				'fade' => 'Fade Theme Color',
				'border' => 'Border Theme Color',
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => 'Size',
			'desc' => '',
			'options' => array(
				'tiny' => 'Tiny',
				'small' => 'Small',
				'medium' => 'Medium',
				'big' => 'Big',
				'huge' => 'Huge',
			)
		),
		'with_circle' => array(
			'std' => false,
			'type' => 'checkbox',
			'label' => 'With Circle',
			'checkbox_text' => 'Place Icon into Circle',
			'desc' => '',
		),
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Link (optional)',
			'desc' => '',
		),
	),
	'shortcode' => '[icon icon="{{icon}}" color="{{color}}" size="{{size}}" with_circle="{{with_circle}}" link="{{link}}"]',
	'popup_title' => 'Insert Icon shortcode'
);

/*-----------------------------------------------------------------------------------*/
/*	IconBox Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['iconbox'] = array(
	'no_preview' => true,
	'params' => array(
		'icon' => array(
			'std' => 'star',
			'type' => 'text',
			'label' => 'Icon',
			'desc' => 'FontAwesome Icon name. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Full list of icons</a>',
		),
		'iconpos' => array(
			'type' => 'select',
			'label' => 'Icon Position',
			'desc' => '',
			'options' => array(
				'top' => 'Top',
				'left' => 'Left',
			)
		),
		'with_circle' => array(
			'std' => false,
			'type' => 'checkbox',
			'label' => 'With Circle',
			'checkbox_text' => 'Place Icon into Circle',
			'desc' => '',
		),
		'title' => array(
			'std' => 'Title',
			'type' => 'text',
			'label' => 'Title',
			'desc' => '',
		),
		'content' => array(
			'std' => 'Any text goes here',
			'type' => 'textarea',
			'label' => 'IconBox Text',
			'desc' => '',
		),
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Link (optional)',
			'desc' => '',
		),
		'external' => array(
			'std' => false,
			'type' => 'checkbox',
			'label' => 'External Link',
			'checkbox_text' => 'Opens in new tab',
			'desc' => '',
		),
		'img' => array(
			'std' => '',
			'type' => 'image',
			'label' => 'Image (optional)',
			'desc' => 'Path to 32x32 px image. Image overrides icon setting.',
		),
	),
	'shortcode' => '[iconbox iconpos="{{iconpos}}" icon="{{icon}}" with_circle="{{with_circle}}" title="{{title}}" link="{{link}}" external="{{external}}" img="{{img}}"] {{content}} [/iconbox]',
	'popup_title' => 'Insert IconBox shortcode'
);

/*-----------------------------------------------------------------------------------*/
/*	Testimonials Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['testimonial'] = array(

	'no_preview' => true,
	'popup_title' => 'Insert Testimonial shortcode',

	'params' => array(
		'author' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Author',
			'desc' => '',
		),
		'description' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Description',
			'desc' => 'Author\'s Description',
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => 'Testimonial Text',
			'desc' => '',
		),



	),
	'shortcode' => '<br>[testimonial author="{{author}}" description="{{description}}"] {{content}} [/testimonial]',
);

/*-----------------------------------------------------------------------------------*/
/*	Slider Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['simple_slider'] = array(
	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[simple_slider] {{child_shortcode}} [/simple_slider]',
	'popup_title' => 'Insert Simple Slider shortcode',

	'child_shortcode' => array(
		'params' => array(
			'img' => array(
				'std' => '',
				'type' => 'image',
				'label' => 'Image',
				'desc' => 'Path to image',
			),
//			'url' => array(
//				'std' => '',
//				'type' => 'text',
//				'label' => 'URL (optional)',
//				'desc' => '',
//			),
		),
		'shortcode' => '<br>[simple_slide img="{{img}}"]',
		'clone_button' => 'Add Slide'
	)
);

/*-----------------------------------------------------------------------------------*/
/*	FullScreen Slider Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['fullscreen_slider'] = array(
	'params' => array(
		'interval' => array(
			'std' => '5000',
			'type' => 'text',
			'label' => 'Interval',
			'desc' => 'Time between slides change in milliseconds',
		),
		'transition' => array(
			'std' => '',
			'type' => 'select',
			'label' => 'Transition Type',
			'desc' => 'Select type of transition animation',
			'options' => array(
				'2' => 'Slide Top',
				'1' => 'Fade',
				'3' => 'Slide Right',
				'4' => 'Slide Bottom',
				'5' => 'Slide Left',
				'6' => 'Carousel Right',
				'7' => 'Carousel Left',
				'0' => 'None',
			)
		),
		'speed' => array(
			'std' => '400',
			'type' => 'text',
			'label' => 'Transition Speed',
			'desc' => 'Time of slide change animation duration in milliseconds',
		),
	),
	'no_preview' => true,
	'shortcode' => '[fullscreen_slider interval="{{interval}}" transition="{{transition}}" speed="{{speed}}"] {{child_shortcode}} [/fullscreen_slider]',
	'popup_title' => 'Insert Slider shortcode',

	'child_shortcode' => array(
		'params' => array(
			'img' => array(
				'std' => '',
				'type' => 'image',
				'label' => 'Image',
				'desc' => '',
			),
			'title' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => 'Content (optional)',
				'desc' => '',
			),
		),
		'shortcode' => '<br>[fullscreen_slide img="{{img}}"] {{title}} [/fullscreen_slide]',
		'clone_button' => 'Add Slide'
	)
);


/*-----------------------------------------------------------------------------------*/
/*	Counter Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['counter'] = array(
	'no_preview' => true,
	'params' => array(
		'count' => array(
			'std' => '99',
			'type' => 'text',
			'label' => 'Number for Counter',
			'desc' => '',
		),
		'prefix' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Prefix (optional)',
			'desc' => 'Text before number',
		),
		'suffix' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Suffix (optional)',
			'desc' => 'Text after number',
		),
		'title' => array(
			'std' => 'Projects completed',
			'type' => 'text',
			'label' => 'Title for Counter',
			'desc' => '',
		),
	),
	'shortcode' => '[counter count="{{count}}" prefix="{{prefix}}" suffix="{{suffix}}" title="{{title}}"]',
	'popup_title' => 'Insert Counter shortcode'
);


/*-----------------------------------------------------------------------------------*/
/*	Contacts Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['contacts'] = array(
	'no_preview' => true,
	'params' => array(
        'align' => array(
            'type' => 'select',
            'label' => 'Align',
            'desc' => '',
            'options' => array(
                '' => 'Default',
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            )
        ),
//		'address' => array(
//			'std' => '',
//			'type' => 'text',
//			'label' => 'Address',
//			'desc' => '',
//		),
//		'phone' => array(
//			'std' => '',
//			'type' => 'text',
//			'label' => 'Phone number',
//			'desc' => '',
//		),
//		'email' => array(
//			'std' => '',
//			'type' => 'text',
//			'label' => 'Email',
//			'desc' => '',
//		),
	),
	'shortcode' => '[contacts align="{{align}}"] {{child_shortcode}} <br>[/contacts]',
	'popup_title' => 'Insert Contacts shortcode',
    'child_shortcode' => array(
        'params' => array(
            'icon' => array(
                'std' => '',
                'type' => 'text',
                'label' => 'Icon',
                'desc' => 'FontAwesome Icon name. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Full list of icons</a>',
            ),
            'content' => array(
                'std' => 'Any text goes here',
                'type' => 'textarea',
                'label' => 'Contact Item Text',
                'desc' => ''
            ),
            'new_line' => array(
                'std' => false,
                'type' => 'checkbox',
                'label' => 'Start from new line',
                'checkbox_text' => '',
                'desc' => '',
            ),

        ),
        'shortcode' => '<br>[contact_item icon="{{icon}}" new_line="{{new_line}}"] {{content}} [/contact_item]',
        'clone_button' => 'Add Contact Item'
    )
);


/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['tabs'] = array(
	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[tabs] {{child_shortcode}} <br>[/tabs]',
	'popup_title' => 'Insert Tabs shortcode',

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => 'Tab Title',
				'desc' => '',
			),
			'content' => array(
				'std' => 'You can use other shortcodes here',
				'type' => 'textarea',
				'label' => 'Tab Content',
				'desc' => ''
			),
			'icon' => array(
				'std' => '',
				'type' => 'text',
				'label' => 'Tab Icon (optional)',
				'desc' => 'FontAwesome Icon name. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Full list of icons</a>',
			),
		),
		'shortcode' => '<br>[item title="{{title}}" icon="{{icon}}"] {{content}} [/item]',
		'clone_button' => 'Add Tab'
	)
);


/*-----------------------------------------------------------------------------------*/
/*	Toggle Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['toggle'] = array(
	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[toggle] {{child_shortcode}} [/toggle]',
	'popup_title' => 'Insert Toggles shortcode',

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => 'Toggle Title',
				'desc' => '',
			),
			'open' => array(
				'type' => 'select',
				'label' => 'Open/Closed',
				'desc' => '',
				'options' => array(
					'0' => 'Closed',
					'1' => 'Open',
				)
			),
			'content' => array(
				'std' => 'You can use other shortcodes here',
				'type' => 'textarea',
				'label' => 'Toggle Content',
				'desc' => ''
			),
			'icon' => array(
				'std' => '',
				'type' => 'text',
				'label' => 'Toggle Icon (optional)',
				'desc' => 'FontAwesome Icon name. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Full list of icons</a>',
			),
		),
		'shortcode' => '<br>[item title="{{title}}" icon="{{icon}}" open="{{open}}"] {{content}} [/item]',
		'clone_button' => 'Add Toggle'
	)
);


/*-----------------------------------------------------------------------------------*/
/*	Accordion Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['accordion'] = array(
	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[accordion] {{child_shortcode}} [/accordion]',
	'popup_title' => 'Insert Accordion shortcode',

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => 'Accordion Section Title',
				'desc' => '',
			),
			'content' => array(
				'std' => 'You can use other shortcodes here',
				'type' => 'textarea',
				'label' => 'Accordion Section Content',
				'desc' => ''
			),
			'icon' => array(
				'std' => '',
				'type' => 'text',
				'label' => 'Accordion Section Icon (optional)',
				'desc' => 'FontAwesome Icon name. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Full list of icons</a>',
			),
		),
		'shortcode' => '<br>[item title="{{title}}" icon="{{icon}}"] {{content}} [/item]',
		'clone_button' => 'Add Accordion Section'
	)
);


/*-----------------------------------------------------------------------------------*/
/*	Video Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['video'] = array(
	'no_preview' => true,
	'params' => array(
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Video link',
			'desc' => 'Link to the video. More about supported formats at <a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>',
		),

	),
	'shortcode' => '[video link="{{link}}"]',
	'popup_title' => 'Insert Video shortcode'
);


/*-----------------------------------------------------------------------------------*/
/*	Google Maps Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['gmaps'] = array(
	'no_preview' => true,
	'params' => array(
		'address' => array(
			'std' => '1600 Amphitheatre Parkway, Mountain View, CA 94043, United States',
			'type' => 'text',
			'label' => 'Map Address',
			'desc' =>  '',
		),
		'marker' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Map Marker text',
			'desc' =>  'Leave blank to hide the Marker.',
		),
		'height' => array(
			'std' => '400',
			'type' => 'text',
			'label' => 'Map height',
			'desc' =>  'Enter map height in pixels. Default: 400.',
		),
		'type' => array(
			'type' => 'select',
			'label' => 'Map type',
			'desc' => '',
			'options' => array(
				'ROADMAP' => 'Roadmap',
				'SATELLITE' => 'Satellite',
				'HYBRID' => 'Map + Terrain',
				'TERRAIN' => 'Terrain',
			)
		),
		'zoom' => array(
			'type' => 'select',
			'label' => 'Map zoom',
			'desc' => '',
			'options' => array(
				'14' => '14 - Default',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
			)
		),
		'latitude' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Map Latitude',
			'desc' =>  'If Longitude and Latitude are set, they override the Address for Google Map.',
		),
		'longitude' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Map Longitude',
			'desc' =>  'If Longitude and Latitude are set, they override the Address for Google Map.',
		),
	),
	'shortcode' => '[gmaps address="{{address}}" latitude="{{latitude}}" longitude="{{longitude}}" marker="{{marker}}" height="{{height}}" type="{{type}}" zoom="{{zoom}}"]',
	'popup_title' => 'Insert Google Maps shortcode'
);


/*-----------------------------------------------------------------------------------*/
/*	Social Links Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['social_links'] = array(
	'no_preview' => true,
	'params' => array(
		'size' => array(
			'type' => 'select',
			'label' => 'Icons Size',
			'desc' => '',
			'options' => array(
				'normal' => 'Normal',
				'' => 'Small',
				'big' => 'Big',
			)
		),
		'align' => array(
			'type' => 'select',
			'label' => 'Align',
			'desc' => '',
			'options' => array(
				'' => 'Default',
				'left' => 'Left',
				'center' => 'Center',
				'right' => 'Right',
			)
		),
		'email' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Email',
			'desc' => '',
		),
		'facebook' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Facebook',
			'desc' => '',
		),
		'twitter' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Twitter',
			'desc' => '',
		),
		'google' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Google+',
			'desc' => '',
		),
		'linkedin' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'LinkedIn',
			'desc' => '',
		),
		'youtube' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'YouTube',
			'desc' => '',
		),
		'vimeo' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Vimeo',
			'desc' => '',
		),
		'flickr' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Flickr',
			'desc' => '',
		),
		'instagram' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Instagram',
			'desc' => '',
		),
		'pinterest' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Pinterest',
			'desc' => '',
		),
		'skype' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Skype',
			'desc' => '',
		),
		'tumblr' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Tumblr',
			'desc' => '',
		),
		'dribbble' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Dribbble',
			'desc' => '',
		),
		'vk' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Vkontakte',
			'desc' => '',
		),
		'rss' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'RSS',
			'desc' => '',
		),

	),
	'shortcode' => '[social_links size="{{size}}" align="{{align}}" email="{{email}}" facebook="{{facebook}}" twitter="{{twitter}}" google="{{google}}" linkedin="{{linkedin}}" youtube="{{youtube}}" vimeo="{{vimeo}}" flickr="{{flickr}}" instagram="{{instagram}}" pinterest="{{pinterest}}" skype="{{skype}}" tumblr="{{tumblr}}" dribbble="{{dribbble}}" vk="{{vk}}" rss="{{rss}}"]',
	'popup_title' => 'Insert Social Links shortcode'
);


/*-----------------------------------------------------------------------------------*/
/*	Subsection Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['subsection'] = array(
	'no_preview' => true,
	'params' => array(
		'color' => array(
			'type' => 'select',
			'label' => 'Color Style',
			'desc' => '',
			'options' => array(
				'' => 'Default',
				'alternate' => 'Alternate',
				'primary' => 'White text on Primary background',
				'dark' => 'White text on Black background (muted background image)',
			)
		),
		'full_width' => array(
			'std' => false,
			'type' => 'checkbox',
			'label' => 'Full Width',
			'checkbox_text' => 'Expand to full width of the screen',
			'desc' => '',
		),
		'full_height' => array(
			'std' => false,
			'type' => 'checkbox',
			'label' => 'Full Height',
			'checkbox_text' => 'Remove vertical indents',
			'desc' => '',
		),
		'background' => array(
			'std' => '',
			'type' => 'image',
			'label' => 'Background Image',
			'desc' => 'Link to Background Image',
		),
		'parallax' => array(
			'std' => false,
			'type' => 'checkbox',
			'label' => 'Parallax',
			'checkbox_text' => 'Apply parallax effect to Background Image',
			'desc' => '',
		),
		'video' => array(
			'std' => false,
			'type' => 'checkbox',
			'label' => 'Vide background',
			'checkbox_text' => 'Apply Video Background to section',
			'desc' => '',
		),
//		'parallax_speed' => array(
//			'type' => 'select',
//			'label' => 'Parallax Speed',
//			'desc' => '',
//			'options' => array(
//				'0.2' => 'Slow',
//				'0.4' => 'Medium',
//				'0.6' => 'Fast',
//			)
//		),
		'content' => array(
			'std' => 'You can use other shortcodes here ',
			'type' => 'textarea',
			'label' => 'Subsection content',
			'desc' => '',
		),

	),
	'shortcode' => '[subsection color="{{color}}" full_width="{{full_width}}" full_height="{{full_height}}" background="{{background}}" parallax="{{parallax}}"]<br>{{content}}<br>[/subsection]',
	'popup_title' => 'Insert Subsection shortcode'
);


/*-----------------------------------------------------------------------------------*/
/*	ActionBox Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['actionbox'] = array(
	'no_preview' => true,
	'params' => array(
		'color' => array(
			'type' => 'select',
			'label' => 'Color Style',
			'desc' => '',
			'options' => array(
				'default' => 'Default Theme Color',
				'primary' => 'Primary Theme Color',
			)
		),
		'title' => array(
			'std' => 'This is Call-to-Action Title',
			'type' => 'text',
			'label' => 'ActionBox Title',
			'desc' =>  '',
		),
		'description' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => 'ActionBox Description (optional)',
			'desc' =>  '',
		),
		'btn_label' => array(
			'std' => 'Click Me!',
			'type' => 'text',
			'label' => 'Button Label',
			'desc' => '',
		),
		'btn_link' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Button Link',
			'desc' => '',
		),
		'btn_color' => array(
			'type' => 'select',
			'label' => 'Button Color',
			'desc' => '',
			'options' => array(
				'default' => 'Default Theme Color',
				'primary' => 'Primary Theme Color',
				'secondary' => 'Secondary Theme Color',
			)
		),
		'btn_size' => array(
			'type' => 'select',
			'label' => 'Button Size',
			'desc' => '',
			'options' => array(
				'' => 'Normal',
				'small' => 'Small',
				'big' => 'Big'
			)
		),
		'btn_icon' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Button Icon (optional)',
			'desc' => 'FontAwesome Icon name. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Full list of icons</a>',
		),
		'btn_external' => array(
			'std' => false,
			'type' => 'checkbox',
			'label' => 'Button External',
			'checkbox_text' => 'Opens in new tab',
			'desc' => '',
		),
	),
	'shortcode' => '[actionbox color="{{color}}" title="{{title}}" description="{{description}}" btn_label="{{btn_label}}" btn_link="{{btn_link}}" btn_color="{{btn_color}}" btn_size="{{btn_size}}" btn_icon="{{btn_icon}}" btn_external="{{btn_external}}"]',
	'popup_title' => 'Insert ActionBox shortcode'
);


/*-----------------------------------------------------------------------------------*/
/*	Home Heading Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['home_heading'] = array(
	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[home_heading] {{child_shortcode}} <br>[/home_heading]',
	'popup_title' => 'Insert Home Heading shortcode',

	'child_shortcode' => array(
		'params' => array(
			'content' => array(
				'std' => 'Any text goes here',
				'type' => 'text',
				'label' => 'Text',
				'desc' => '',
			),
			'type' => array(
				'type' => 'select',
				'label' => 'Color Style',
				'desc' => '',
				'options' => array(
					'white' => 'White',
					'black' => 'Black',
					'primary' => 'Primary',
					'secondary' => 'Secondary',
					'light_bg' => 'Light Background',
					'dark_bg' => 'Dark Background',
					'primary_bg' => 'Primary Background',
					'secondary_bg' => 'Secondary Background',
				)
			),
			'new_line' => array(
				'std' => false,
				'type' => 'checkbox',
				'label' => 'Start from new line',
				'checkbox_text' => '',
				'desc' => '',
			),
		),
		'shortcode' => '<br>[heading_line type="{{type}}" new_line="{{new_line}}"] {{content}} [/heading_line]',
		'clone_button' => 'Add Line'
	)
);


/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/

$us_zilla_shortcodes['message_box'] = array(
	'no_preview' => true,
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => 'Message Type',
			'desc' => '',
			'options' => array(
				'info' => 'Notification (blue)',
				'attention' => 'Attention (yellow)',
				'success' => 'Success (green)',
				'error' => 'Error (red)',
			)
		),
		'content' => array(
			'std' => 'Message Text',
			'type' => 'textarea',
			'label' => 'Message Text',
			'desc' => '',
		)

	),
	'shortcode' => '[message_box type="{{type}}"] {{content}} [/message_box]',
	'popup_title' => 'Insert Message Box shortcode'
);