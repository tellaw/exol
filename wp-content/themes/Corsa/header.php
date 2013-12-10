<?php
global $smof_data;

$home_fullscreen_class = ($smof_data['fullscreen_home'] == '1')?' hometype_fullscreen':'';
$sticky_header_class = ($smof_data['header_is_sticky'] == '1' OR (defined('ONE_PAGE_HOME') AND ONE_PAGE_HOME))?' headertype_sticky':'';

$header_position_class = ' headerpos_top';
if ($smof_data['header_position'] == 'At the BOTTOM of the Home Section') {
	$header_position_class = ' headerpos_bottom';
} elseif ($smof_data['header_position'] == 'BELOW the Home Section') {
	$header_position_class = ' headerpos_outside';
}

$no_pagesections = '';
$sidebar_position_class = '';

if (defined('NO_PAGESECTIONS') AND NO_PAGESECTIONS)
{
	$no_pagesections = ' no_pagesections';
	$home_fullscreen_class = '';
	$header_position_class = ' headerpos_top';
	$sidebar_position_class = ' col_cont';
}

if (defined('SIDEBAR_POS') AND SIDEBAR_POS == 'left')
{
	$sidebar_position_class = ' col_sidecont';
}
if (defined('SIDEBAR_POS') AND SIDEBAR_POS == 'right')
{
	$sidebar_position_class = ' col_contside';
}
if (defined('IS_BLOG') AND IS_BLOG)
{
	switch(@$smof_data['blog_sidebar_pos']) {
		case 'Right': $sidebar_position_class = ' col_contside';
			break;
		case 'Left': $sidebar_position_class = ' col_sidecont';
			break;
		default: $sidebar_position_class = ' col_cont';
	}
}
if (defined('IS_POST') AND IS_POST)
{
	switch(@$smof_data['post_sidebar_pos']) {
		case 'Right': $sidebar_position_class = ' col_contside';
			break;
		case 'Left': $sidebar_position_class = ' col_sidecont';
			break;
		default: $sidebar_position_class = ' col_cont';
	}
}

?><!DOCTYPE HTML>
<html <?php language_attributes('html')?>>
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name'); ?><?php wp_title(' - ', true, 'left'); ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php if($smof_data['custom_favicon'] != "") { ?><link rel="shortcut icon" href="<?php echo $smof_data['custom_favicon']; ?>"><?php } ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class("l-body".$home_fullscreen_class.$sticky_header_class.$header_position_class.$no_pagesections.$sidebar_position_class); ?>>
<?php get_template_part('templates/custom_css'); ?>
<?php if (defined('ONE_PAGE_HOME') AND ONE_PAGE_HOME AND ! (isset($smof_data['preloader']) AND $smof_data['preloader'] == 'Disabled')) { ?><div class='l-preloader'></div><?php }?>
<!-- HEADER -->
<div class="l-header">
	<div class="l-header-h">

		<!-- subheader -->
		<div class="l-subheader">
			<div class="l-subheader-h i-cf">

				<!-- logo -->
				<div class="w-logo<?php if (@$smof_data['logo_as_text'] == 1) { echo ' with_title'; } ?>">
					<div class="w-logo-h">
						<a class="w-logo-link" href="<?php if (defined('ONE_PAGE_HOME') AND ONE_PAGE_HOME) { echo '#'; } else { echo get_option('siteurl'); } ?>">
							<img class="w-logo-img" src="<?php echo ($smof_data['custom_logo'])?$smof_data['custom_logo']:get_template_directory_uri().'/img/logo_0.png';?>"  alt="<?php bloginfo('name'); ?>">
							<span class="w-logo-title">
								<span class="w-logo-title-h"><?php if (@$smof_data['logo_text'] != '') { echo $smof_data['logo_text']; } else { bloginfo('name'); } ?></span>
							</span>
						</a>
					</div>
				</div>
<?php
$socials = array (
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
);

$output = '';

foreach ($socials as $social_key => $social)
{
    if ($smof_data[$social_key.'_header_link'] != '')
    {
        if ($social_key == 'email')
        {
            $output .= '<div class="w-socials-item '.$social_key.'">
    <a class="w-socials-item-link" href="mailto:'.$smof_data[$social_key.'_header_link'].'">
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
    <a class="w-socials-item-link" target="_blank" href="'.$smof_data[$social_key.'_header_link'].'">
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
    <a class="w-socials-item-link" target="_blank" href="'.$smof_data[$social_key.'_header_link'].'">
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
    <a class="w-socials-item-link" target="_blank" href="'.$smof_data[$social_key.'_header_link'].'">
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
    <a class="w-socials-item-link" target="_blank" href="'.$smof_data[$social_key.'_header_link'].'">
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

if ($output != '') {
?>              <div class="w-socials size_normal">
                    <div class="w-socials-h">
                        <div class="w-socials-list">
                            <?php echo $output; ?>
                        </div>
                    </div>
                </div>
<?php }?>
				<!-- nav -->
				<nav class="w-nav">
					<div class="w-nav-h">
						<div class="w-nav-control">
							<i class="fa fa-bars"></i>
						</div>
						<div class="w-nav-list layout_hor width_auto level_1">
							<?php wp_nav_menu(
								array(
									'theme_location' => 'corsa-main-menu',
									'container' => 'div',
									'container_class' => 'w-nav-list-h',
									'walker' => new Walker_Nav_Menu_US(),
									'items_wrap' => '%3$s',
									'fallback_cb' => false,

								));
							?>
						</div>
					</div>
				</nav>

			</div>
		</div>

	</div>
</div>
<!-- /HEADER -->

<!-- MAIN -->
<div class="l-main">
	<div class="l-main-h">