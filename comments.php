<?php
/**
* @package WordPress
* @subpackage Default_Theme
*/

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
return;
}
?>

<!-- You can start editing here. -->

<div id="comments">

<?php if ( have_comments() ) : ?>
	<h2>Commentary</h2>

	<ol class="comment-list">
	<?php foreach ($comments as $comment) : ?>
	<?php if (get_comment_type() == "comment"){ ?>
		<li class="comment" id="comment-<?php comment_ID() ?>">
			<?php echo get_avatar($comment, $size = '64'); 
	?>
			<ul class="comment-details">
				<li class="name"><?php comment_author_link() ?></li>
				<li class="date"><?php comment_date('F jS, Y') ?></li>
				<li class="time"><?php comment_time() ?></li>
			</ul>
			<div class="comment-content unitx4">
				<?php comment_text() ?>
			</div>
		</li>
	<?php } ?>
	<?php endforeach; /* end for each comment */ ?>
	</ol>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
				</div>
			</div>

		</div>

		<div class="top"></div>
			<div id="respond">
				<div class="wrapper unitx7">
					<h2>Comments are closed</h2>
				</div>
			</div>			

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	
		</div>
	</div>
	
</div>

<div class="top"></div>
	<div id="respond">
		<div class="wrapper unitx7">

		<h2>Have your say</h2>

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( is_user_logged_in() ) : ?>

			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

	<?php else : ?>

	<div id="author-details" class="unitx2">
		<label for="author" class="unitx2">Name <?php if ($req) echo "(required)"; ?><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" /></label>
		<label for="email" class="unitx2">Email (will not be published) <?php if ($req) echo "(required)"; ?><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" /></label>
		<label for="url" class="unitx2">Website<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" /></label>
	</div>
		<?php endif; ?>

	<div id="comment-textarea">
		<label class="unitx4 multilinex7">Comment<textarea name="comment" id="comment" rows="10" tabindex="4"></textarea></label>
		<div id="markdown" class="unitx4">Comments support <a href="http://daringfireball.net/projects/markdown/">Markdown</a>.<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" /></div>
	</div>
			<?php comment_id_fields(); ?>

		<?php do_action('comment_form', $post->ID); ?>

	</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>