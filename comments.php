<?php
/*
*/
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('You cannot load this page directly.');

if ( post_password_required() ) : 
?>
		<p>This post is password protected. Enter the password to view comments.</p>
<?php
	return;
endif;
?>
		<div class="comments">
<?php 
if ( have_comments() ) : 
?>
			<h3>Comments</h3>
			<p id="commentCount"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</p>
	
			<div class="navigation">
				<div class="previous"><?php previous_comments_link() ?></div>
				<div class="next"><?php next_comments_link() ?></div>
			</div>
	
			<ul class="commentlist">
				<?php wp_list_comments(); ?>
			</ul>
	
			<div class="navigation">
				<div class="alignleft"><?php previous_comments_link() ?></div>
				<div class="alignright"><?php next_comments_link() ?></div>
			</div>
<?php 
endif; 

if ( comments_open() ) : 
?>
			<div id="commentResponse">
				<div><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></div>
				<div class="cancel-comment-reply">
					<?php cancel_comment_reply_link(); ?>
				</div>
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
				<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
				<form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<?php 	if ( is_user_logged_in() ) : ?>
					<div>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></div>
<?php 	else : ?>
					<div>
						<label for="author">Name <?php if ($req) echo "(required)"; ?></label>
						<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" <?php if ($req) echo "aria-required='true'"; ?> />
					</div>
					<div>
						<label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label>
						<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" <?php if ($req) echo "aria-required='true'"; ?> />
					</div>
					<div>
						<label for="url"><small>Website</small></label>
						<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" />
					</div>
<?php 	endif; ?>
<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
					<div><textarea id="commentContent" name="comment" cols="58" rows="10"></textarea></div>
	
					<div>
						<input name="submit" type="submit" id="submit" value="Submit Comment" />
						<?php comment_id_fields(); ?>
					</div>
<?php do_action('comment_form', $post->ID); ?>
				</form>
<?php endif; ?>
			</div>
<?php
else:
?>
			<span class="commentsClosed">Comments are closed.</span>
<?php 
endif; 
?>
		</div>
