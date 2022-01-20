<?php
/**
 * Search template file.
 *
 * @package BuseguVideosuganda
 * @author Busegu Videos Uganda
 * @link https://buseguvideosuganda.com
 */

get_header();
?>

<div id="Content">
	<div class="content_wrapper clearfix">

		<div class="sections_group">

			<div class="section">
				<div class="section_wrapper clearfix">

					<div class="column one">
						<?php
							while (have_posts()) {
								the_post(); ?>
									<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
										<?php the_content(false); ?>
									</div>
								<?php
							}
							mfn_pagination();
						?>
					</div>

				</div>
			</div>

		</div>

	</div>
</div>

<?php get_footer();
