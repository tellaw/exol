<?php
define('NO_PAGESECTIONS', TRUE);
get_header();
if (have_posts()) : while(have_posts()) : the_post(); ?>
	<section class="l-section">
		<?php the_content(); ?>
	</section>
<?php endwhile; endif;
get_footer();