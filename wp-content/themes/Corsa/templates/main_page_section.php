<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'main_page_section.php' == basename($_SERVER['SCRIPT_FILENAME'])){
	die ('This file can not be accessed directly!');
}

?>
<section id="<?php echo $post->post_name;?>" class="l-section">
	<?php the_content(); ?>
</section>