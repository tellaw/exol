<?php global $smof_data; ?></div>
</div>
<!-- /MAIN -->

<!-- FOOTER -->
<div class="l-footer color_dark">
	<div class="l-footer-h">

		<?php if ($smof_data['footer_show_widgets'] != 0) { ?>
			<!-- subfooter: top -->
			<div class="l-subfooter at_top">
				<div class="l-subfooter-h g-cols cols_fluid">

					<div class="one-third">
						<?php dynamic_sidebar('footer_first') ?>
					</div>

					<div class="one-third">
						<?php dynamic_sidebar('footer_second') ?>
					</div>

					<div class="one-third">
						<?php dynamic_sidebar('footer_third') ?>
					</div>

				</div>
			</div>
		<?php } ?>

		<!-- subfooter -->
		<div class="l-subfooter at_bottom">
			<div class="l-subfooter-h i-cf">

				<div class="w-copyright"><?php echo $smof_data['footer_copyright'] ?></div>

				<div class="w-socials size_normal">
					<div class="w-socials-h">
						<div class="w-socials-list">

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
	if ($smof_data[$social_key.'_link'] != '')
	{
		if ($social_key == 'email')
		{
			$output .= '<div class="w-socials-item '.$social_key.'">
					<a class="w-socials-item-link" href="mailto:'.$smof_data[$social_key.'_link'].'">
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
					<a class="w-socials-item-link" target="_blank" href="'.$smof_data[$social_key.'_link'].'">
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
					<a class="w-socials-item-link" target="_blank" href="'.$smof_data[$social_key.'_link'].'">
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
					<a class="w-socials-item-link" target="_blank" href="'.$smof_data[$social_key.'_link'].'">
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
					<a class="w-socials-item-link" target="_blank" href="'.$smof_data[$social_key.'_link'].'">
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

echo $output;
?>



						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
<!-- /FOOTER -->
<a class="w-toplink" href="#"><i class="fa fa-chevron-up"></i></a>
<?php
$preloader = 'all';
if (isset($smof_data['preloader']) AND $smof_data['preloader'] == 'Shows Progress For First Page Section') {
	$preloader = 'first';
}
if (isset($smof_data['preloader']) AND $smof_data['preloader'] == 'Disabled') {
	$preloader = 'disabled';
}

?><script>
	window.ajaxURL = '<?php echo admin_url('admin-ajax.php'); ?>';
	window.nameFieldError = "<?php echo __("Please enter Your Name!", 'us'); ?>";
	window.emailFieldError = "<?php echo __("Please enter Your Email!", 'us'); ?>";
	window.phoneFieldError = "<?php echo __("Please enter Your Phone!", 'us'); ?>";
	window.messageFieldError = "<?php echo __("Please enter Message!", 'us'); ?>";
	window.messageFormSuccess = "<?php echo __("Message Sent!", 'us'); ?>";
	window.preloaderSetting = "<?php echo $preloader; ?>";
	<?php if ( ! empty($smof_data['mobile_nav_width']) AND $smof_data['mobile_nav_width'] != "1024") {?>window.mobileNavWidth = "<?php echo $smof_data['mobile_nav_width']; ?>";<?php } ?>
	<?php if ($smof_data['logo_height'] != "" AND $smof_data['logo_height'] != "50%" AND $smof_data['logo_height'] != "Exact height of the image") {?>jQuery(document).ready(function() { jQuery('.w-logo-img').css('height', '<?php echo $smof_data['logo_height'] ?>')});<?php } ?>
	<?php if ($smof_data['logo_height'] != "" AND $smof_data['logo_height'] == "Exact height of the image") {?>jQuery(document).ready(function() { jQuery('.w-logo-img').css('height', 'auto')});<?php } ?>
</script>
<?php if($smof_data['tracking_code'] != "") { echo $smof_data['tracking_code']; } ?>
<?php wp_footer(); ?>
</body>
</html>