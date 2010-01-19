<div id="comments">

<?php if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) {
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
?>
	<p class="password">This post is password protected. Enter the password to proceed.<p>
<?php
	return;
		}
	}
	$oddcomment = 'alt';
?>

<?php if ($comments) : ?>

<?php /* NUMBERS OF PINGS AND COMMENTS */
	$numPingBacks = 0;
	$numComments  = 0;
foreach ($comments as $comment) {
	if (get_comment_type() != "comment") {
		$numPingBacks++;
	} else {
		$numComments++;
	}
} ?>

<?php if ($numComments != 0) : ?>

	<h3 class="comment-header" id="commentz">Comments</h3>

	<ol class="commentlist">

<?php foreach ($comments as $comment) : ?>
<?php if (get_comment_type() == "comment"){ ?>

  <li id="comment-<? comment_ID() ?>" class="<?= $oddcomment; ?>">
    <div class="comment-info">
      <?=get_avatar($comment->comment_author_email, 50)?>

      <p class="comment-author"><? comment_author_link() ?></p>
      <p class="comment-metadata">Posted <? comment_date('d M Y') ?> at <? comment_time('g:i a') ?> | <a href="#comment-<? comment_ID() ?>" title="Permalink to this comment" rel="permalink">Permalink</a></p>
    </div>
    <div class="comment-text">
      <? comment_text() ?>
    </div>
     <? if ($comment->comment_approved == '0') : ?><em class="moderation">Your comment is awaiting moderation.</em><? endif; ?>
  </li>



<?php /* ALTERNATES ALT CLASS */ if ('alt' == $oddcomment) $oddcomment = ''; else $oddcomment = 'alt'; ?>
<?php } ?>
<?php endforeach; /* END FOR EACH COMMENT */ ?>

	</ol>

<?php endif; ?>

<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
	
	<h3 id="respond">Post a Comment</h3>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>" title="Log in">logged in</a> to post a comment.</p>
<?php else : ?>

	<div class="formcontainer">	

		<form id="commentForm" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

<?php if ( $user_ID ) : ?>

			<p class="loggedIn">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php" title="Logged in as <?php echo $user_identity; ?>"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log off?</a></p>

<?php else : ?>

			<p class="disclaimer">Your email is <em>never</em> published nor shared. <?php if ($req) echo "Required fields are marked <span style='color:red;'>*</span>"; ?></p>

			<p class="form-label"><label for="author">Name</label> <?php if ($req) echo "<span class='sup'>*</span>"; ?></p>
			<p><input id="author" name="author" type="text" value="<?php echo $comment_author; ?>" tabindex="3" size="30" maxlength="20" /></p>

			<p class="form-label"><label for="email">Email</label> <?php if ($req) echo "<span class='sup'>*</span>"; ?></p>
			<p><input id="email" name="email" type="text" value="<?php echo $comment_author_email; ?>" tabindex="4" size="30" maxlength="50" /></p>

			<p class="form-label"><label for="url">Website</label></p>
			<p><input id="url" name="url" type="text" value="<?php echo $comment_author_url; ?>" tabindex="5" size="30" maxlength="50" /></p>

<?php endif; ?>

			<p class="form-label"><label for="comment">Comment</label></p>
			<p><textarea id="comment" name="comment" tabindex="6" cols="45" rows="8"></textarea></p>

			<p class="form-submit"><input id="submit" name="submit" type="submit" value="Post Comment" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>

<?php do_action('comment_form', $post->ID); ?>

		</form>
	</div>

<?php endif; ?>
<?php endif; ?>

</div>