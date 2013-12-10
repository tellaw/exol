<?php
define('IS_POST', TRUE);
define('NO_PAGESECTIONS', TRUE);

remove_shortcode('subsection');
add_shortcode('subsection', array($us_shortcodes, 'subsection_dummy'));

get_header();
if (have_posts()) : while(have_posts()) : the_post(); ?>
	<section class="l-section">

		<div class="l-subsection">
			<div class="l-subsection-h">
				<div class="l-subsection-hh g-html i-cf">
					<div class="l-content">

						<div <?php post_class("w-blogpost meta_tagscomments"); ?>>
							<div class="w-blogpost-h">
								<div class="w-blogpost-image"></div>
								<div class="w-blogpost-content">
									<h1 class="w-blogpost-title"><?php the_title(); ?></h1>
									<div class="w-blogpost-meta">
										<div class="w-blogpost-meta-date">
											<i class="fa fa-calendar"></i>
											<span class="w-blogpost-meta-date-month"><?php echo get_the_date('M') ?></span>
											<span class="w-blogpost-meta-date-day"><?php echo get_the_date('d') ?>,</span>
											<span class="w-blogpost-meta-date-year"><?php echo get_the_date('Y') ?></span>
										</div>
										<div class="w-blogpost-meta-author">
											<i class="fa fa-user"></i>
											<?php if (get_the_author_meta('url')) { ?>
												<a class="w-blogpost-meta-author-h" href="<?php echo esc_url( get_the_author_meta('url') ); ?>"><?php echo get_the_author() ?></a>
											<?php } else { ?>
												<span class="w-blogpost-meta-author-h"><?php echo get_the_author() ?></span>
											<?php } ?>
										</div>
										<div class="w-blogpost-meta-comments">
											<?php comments_popup_link('<i class="fa fa-comments"></i>'.__('No Comments', 'us'), '<i class="fa fa-comments"></i>'.__('1 Comment', 'us'), '<i class="fa fa-comments"></i>'.__('% Comments', 'us'), 'w-blogpost-meta-comments-h', ''); ?>
										</div>
									</div>
									<div class="w-blogpost-text i-cf">
										<?php the_content(__('Read More &raquo;', 'us')); ?>

									</div>
								</div>
								<?php
								$tags = wp_get_post_tags($post->ID);
								if ($tags) {
									if ( ! isset($smof_data['post_meta_tags']) OR $smof_data['post_meta_tags'] == 1) { ?>
								<div class="w-tags layout_block title_atleft">
									<div class="w-tags-h">
										<div class="w-tags-title">
											<h4 class="w-tags-title-h">Tags:</h4>
										</div>
										<div class="w-tags-list">
											<?php foreach ($tags as $tag) { ?>
											<div class="w-tags-item">
												<a class="w-tags-item-link" href="<?php echo get_tag_link($tag->term_id) ?>"><?php echo $tag->name ?></a><span class="w-tags-item-separator">,</span>
											</div>
											<?php } ?>
										</div>

									</div>
								</div>
								<?php }
								} ?>



							</div>
						</div>

						<?php if (comments_open()) { comments_template(); } ?>

					</div>


					<div class="l-sidebar">
						<?php if (@$smof_data['post_sidebar_pos'] != 'No Sidebar') {
							generated_dynamic_sidebar();
						} ?>
					</div>
				</div>
			</div>
		</div>

	</section>
<?php endwhile; endif;
get_footer();