<?get_header()?>
      <div id="content">
        
        <?include 'leftSidebar.php'; ?>
        
        <div id="single">
          <? if (have_posts()) : while (have_posts()) : the_post(); ?>
          <? $singlePost = get_post(the_id());?>
          <div class="postNavigation">
            <div class="nav-left"><?php previous_post_link('&laquo; %link') ?></div>
            <div class="nav-right"><?php next_post_link('%link &raquo;') ?></div>
          </div>
          <div id="post-<?= the_id(); ?>" class="post">
            <?= the_post_thumbnail() ?>
            <h3 class="title"><a href="<?= the_permalink() ?>" title="Permalink to <?= the_title(); ?>" rel="bookmark"><?= the_title(); ?></a></h3>
            <div class="info">
              <span class="date"><?= the_time('F j Y') ?></span>
            </div>
            <div class="post_text">
              <?= the_content(); ?>
            </div>
            <p id="single-post-footer">
              This entry was posted on <? the_time('l, F jS, Y') ?> at <? the_time() ?> and is filed under <? the_category(', ') ?>. You can follow any responses to this entry through the <? comments_rss_link('RSS 2.0'); ?> feed.
            <? if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) { // COMMENTS & PINGS OPEN ?>
              <a href="#respond">Post a comment</a> or leave a trackback: <a href="<? trackback_url(true); ?>" rel="trackback">Trackback URI</a>.
            <? } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) { // PINGS ONLY OPEN ?>
              Comments are closed, but you can leave a trackback: <a href="<? trackback_url(true); ?>" rel="trackback">Trackback URI</a>.
            <? } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) { // COMMENTS OPEN ?>
              Trackbacks are closed, but you can <a href="#respond">post a comment</a>.
            <? } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) { // NOTHING OPEN ?>
              Both comments and trackbacks are currently closed.      
            <? } edit_post_link('Edit this entry.','',''); ?>
            </p>
            
            <div class="postNavigation">
              <div class="nav-left"><?= previous_post_link('&laquo; %link') ?></div>
              <div class="nav-right"><?= next_post_link('%link &raquo;') ?></div>
            </div>

            <?= comments_template(); ?>
            
          </div>
        <? endwhile; else :?>
          <div id="post-error" class="post">
            <h3 class="title">Not Found</h3>
            <div class="post_text">
              <p>Sorry but we could not find what you were looking for. Please check the related links below to find what you were looking for.</p>
            </div>
            <h4 class="related">Related Posts</h4>
            <!--
              TODO add related plugin here
            -->
          </div>
        <? endif; ?>
        </div>
        
        <?include 'rightSidebar.php'; ?>
        
      </div>
<? $postDate = date("F j Y", time($singlePost->post_date)) ?>
<?get_footer()?>