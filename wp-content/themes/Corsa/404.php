<?php
define('NO_PAGESECTIONS', TRUE);
get_header();
?>
	<section class="l-section">

		<div class="l-subsection">
			<div class="l-subsection-h">
				<div class="l-subsection-hh g-html i-cf">
					<div class="l-content">
						<div class="page-404">
							<i class="fa fa-compass"></i>
							<h1><?php echo __('Error 404 - page not found', 'us') ?></h1>
							<p><?php echo __('Ohh... You have requested the page that is no longer there', 'us') ?>.<p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();