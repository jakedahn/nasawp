<div id="comments">

<?

  if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die ('Please do not load this page directly. Thanks!');
  }
  if (!empty($post->post_password)) {
    if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
      echo '<p class="password">This post is password protected. Enter the password to proceed.<p>';
    }
  }
  
  $oddcomment = 'alt';
  $numPingBacks = 0;
  $numComments  = 0;
  
?>


<? if ($comments) : ?>

<?
  foreach ($comments as $comment) {
    if (get_comment_type() != "comment") {
      $numPingBacks++;
    } 
    else {
      $numComments++;
    }
  } 
?>

<? if ($numComments != 0) : ?>
  <h3 class="comment-header">Comments</h3>
  <ol class="commentlist">
  <? foreach ($comments as $comment) : ?>
    <? if (get_comment_type() == "comment") : ?>
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
  <? if ('alt' == $oddcomment) $oddcomment = ''; else $oddcomment = 'alt'; ?>
  <? endif; ?>
  <? endforeach; ?>
  </ol>
<? endif; ?>

<? if ('open' == $post->comment_status) : ?>
  
<? else : // COMMENTS ARE CLOSED ?>
  <h3 class="comment-header">Comments are closed.</h3>
<? endif; ?>

<? if ('open' == $post->comment_status) : ?> 
  <h3 id="respond">Post a Comment</h3>
  <? if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p>You must be <a href="<?= get_option('siteurl'); ?>/wp-login.php?redirect_to=<? the_permalink(); ?>" title="Log in">logged in</a> to post a comment.</p>
  <? else : ?>
    <div class="formcontainer"> 
      <form id="commentform" action="<?= get_option('siteurl'); ?>/wp-comments-post.php" method="post">
      <? if ( $user_ID ) : ?> 
        <p>Logged in as <a href="<?= get_option('siteurl'); ?>/wp-admin/profile.php" title="Logged in as <?= $user_identity; ?>"><?= $user_identity; ?></a>. <a href="<?= get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log off?</a></p>
      <? else : ?>
        <p>Your email is <em>never</em> published nor shared. <? if ($req) echo "Required fields are marked <span style='color:red;'>*</span>"; ?></p>

        <p class="form-label"><label for="author">Name</label> <? if ($req) echo "<span style='color:red;'>*</span>"; ?></p>
        <p><input id="author" name="author" type="text" value="<?= $comment_author; ?>" tabindex="3" size="30" maxlength="20" /></p>

        <p class="form-label"><label for="email">Email</label> <? if ($req) echo "<span style='color:red;'>*</span>"; ?></p>
        <p><input id="email" name="email" type="text" value="<?= $comment_author_email; ?>" tabindex="4" size="30" maxlength="50" /></p>

        <p class="form-label"><label for="url">Website</label></p>
        <p><input id="url" name="url" type="text" value="<?= $comment_author_url; ?>" tabindex="5" size="30" maxlength="50" /></p>

    <? endif; ?>

      <p class="form-label"><label for="comment">Comment</label></p>
      <p><textarea id="comment" name="comment" tabindex="6" cols="45" rows="8"></textarea></p>

      <p class="form-submit"><input id="submit" name="submit" type="submit" value="Post" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?= $id; ?>" /></p>

<? do_action('comment_form', $post->ID); ?>

    </form>
  </div>
<? endif; ?>

<? endif; ?>
<? endif; ?>

</div>