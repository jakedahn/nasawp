<?get_header()?>
      <div id="content">
        
        <?include 'leftSidebar.php'; ?>
        
        <div id="posts">
        <? if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div id="post-<?= the_id(); ?>" class="post">
            <?= the_post_thumbnail(array(100, 75), array('class' => 'thumbnail', 'align' => 'left')) ?>
            
            <h3 class="title"><a href="<?= the_permalink() ?>" title="Permalink to <?= the_title(); ?>" rel="bookmark"><?= the_title(); ?></a></h3>
            <div class="info">
              <span class="date"><?= the_time('F j Y') ?></span>
            </div>
            <div class="post_text">
              <?= the_content(); ?>
            </div>
            <h4 class="comments"><?= comments_popup_link('Leave a comment.', '(1) comment.', '(%) comments.'); ?></h4>
          </div>
        <? endwhile; else : ?>
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
<?get_footer()?>