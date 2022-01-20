<?php
/**
 * The template for displaying Comments.
 *
 * @package BuseguVideosuganda
 * @author Busegu Videos Uganda
 * @link https://buseguvideosuganda.com
 */
?>

<div id="comments">
	<?php if (post_password_required()) : ?>
		<p class="nopassword"><?php esc_attr_e('This post is password protected. Enter the password to view any comments.', 'buseguvideosuganda'); ?></p>
		</div>
		<?php return;
	endif; ?>

	<?php if (have_comments()) : ?>
		<h4 id="comments-title">
			<?php printf( _n( '%d Comment', '%d Comments', get_comments_number(), 'buseguvideosuganda' ), get_comments_number() ); ?>
		</h4>

		<ol class="commentlist">
			<?php wp_list_comments('avatar_size=64'); ?>
		</ol>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) :?>
			<nav id="comment-nav">
				<div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'buseguvideosuganda')); ?></div>
				<div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'buseguvideosuganda')); ?></div>
			</nav>
		<?php endif; ?>

	<?php
		elseif (! comments_open() && ! is_page() && post_type_supports(get_post_type(), 'comments')) :
	?>
		<p class="nocomments"><?php esc_html_e('Comments are closed.', 'buseguvideosuganda'); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div>
