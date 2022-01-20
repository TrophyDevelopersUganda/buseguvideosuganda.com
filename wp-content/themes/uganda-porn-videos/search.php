<?php
/**
 * The search template file.
 *
 * @package BuseguVideosuganda
 * @author Busegu Videos Uganda
 * @link https://buseguvideosuganda.com
 */

get_header();

$is_live_search = false;

if( mfn_opts_get('header-search-live') && isset( $_GET['mfn_livesearch'] ) ){
	$is_live_search = true;
}

// image

$image_show = mfn_opts_get('search-page-featured');
$image_position = mfn_opts_get('search-page-featured-position','left');

// meta

$has_author = mfn_opts_get('search-page-author');
$has_date = mfn_opts_get('search-page-date');
$has_excerpt = mfn_opts_get('search-page-excerpt');

// read more

$read_more = mfn_opts_get('search-page-readmore');
$read_more_align = 'align-'. mfn_opts_get('search-page-readmore-aligment');
$read_more_button = mfn_opts_get('search-page-readmore-style');
$read_more_icon = mfn_opts_get('search-page-readmore-icon');

if( $read_more_icon ){
	$read_more_icon = '<i class="'. esc_attr($read_more_icon) .'"></i>';
}

// translate

$translate['search-title'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-title','Ooops...') : __('Ooops...','buseguvideosuganda');
$translate['search-subtitle'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-subtitle','No results found for:') : __('No results found for:','buseguvideosuganda');

$translate['published']	= mfn_opts_get('translate') ? mfn_opts_get('translate-published','Published by') : __('Published by','buseguvideosuganda');
$translate['at'] = mfn_opts_get('translate') ? mfn_opts_get('translate-at','at') : __('at','buseguvideosuganda');
$translate['readmore'] = mfn_opts_get('translate') ? mfn_opts_get('translate-readmore','Read more') : __('Read more','buseguvideosuganda');
?>

<div id="Content">
	<div class="content_wrapper clearfix">

		<div class="sections_group">

			<div class="section">
				<div class="section_wrapper clearfix">

					<?php if( have_posts() && trim( $_GET['s'] ) ): ?>

						<div class="column one column_blog">
							<div class="blog_wrapper isotope_wrapper">

								<div class="posts_group <?php if( $is_live_search ){ echo 'lm_wrapper'; } ?>">

									<?php
										while ( have_posts() ):

											the_post();

											$has_image = 'no-image';
											if( $image_show && get_the_post_thumbnail_url() ){
												$has_image = 'has-image';
												$has_image .= ' has-image-on-'. $image_position;
											}
									?>

									<div id="post-<?php the_ID(); ?>" <?php post_class( array('search-item', 'clearfix', $has_image) ); ?>>

										<?php if( 'no-image' !== $has_image ): ?>
											<div class="post-featured-image">
												<?php the_post_thumbnail( 'blog-portfolio', array( 'class' => 'scale-with-grid' )); ?>
											</div>
										<?php endif; ?>

										<div class="search-content">

											<?php if( $has_author || $has_date ): ?>
												<div class="post-meta clearfix">
													<div class="author-date">
														<?php if( $has_author ): ?>
															<span class="author"><span><?php echo esc_html($translate['published']); ?> </span><i class="icon-user"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author_meta('display_name'); ?></a></span>
														<?php endif; ?>
														<?php if( $has_date ): ?>
															<span class="date"><span><?php if( $has_author ) echo esc_html($translate['at']) .' '; ?></span><i class="icon-clock"></i> <?php echo esc_html(get_the_date()); ?></span>
														<?php endif; ?>
													</div>
												</div>
											<?php endif; ?>

											<div class="post-title">
												<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											</div>

											<?php
												global $product;
												if( $product ):
											?>
												<div class="post-product-price">
													<?php
													 $price = $product->get_price() ? $product->get_price() . get_woocommerce_currency() : '';
													 echo $price;
													?>
												</div>
											<?php endif; ?>

											<?php if( $has_excerpt ): ?>
												<div class="post-excerpt">
													<?php the_excerpt(); ?>
												</div>
											<?php endif; ?>

											<?php if( $read_more ): ?>
												<div class="search-footer <?php echo $read_more_align; ?>">
													<a href="<?php the_permalink(); ?>" class="<?php echo $read_more_button; ?>"><?php echo $read_more_icon . esc_html($translate['readmore']); ?></a>
												</div>
											<?php endif; ?>

										</div>

									</div>

									<?php endwhile;	?>

								</div>

								<?php
									if ( $is_live_search ):
										echo '<div class="mfn-infinite-load-button">'. mfn_pagination(false, '10') .'</div>';
									elseif (function_exists( 'mfn_pagination' )):
										echo mfn_pagination();
									else:
										?>
											<div class="nav-next"><?php next_posts_link(esc_html__('&larr; Older Entries', 'buseguvideosuganda')) ?></div>
											<div class="nav-previous"><?php previous_posts_link(esc_html__('Newer Entries &rarr;', 'buseguvideosuganda')) ?></div>
										<?php
									endif;
								?>

							</div>
						</div>
					<?php else: ?>

						<div class="column one search-not-found">

							<div class="snf-pic">
								<i class="themecolor icon-search"></i>
							</div>

							<div class="snf-desc">
								<h4><?php echo esc_html($translate['search-title']); ?></h4>
								<p><?php echo esc_html($translate['search-subtitle']) .' '. esc_html($_GET['s']); ?></p>
							</div>

						</div>

					<?php endif; ?>

				</div>
			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer();
