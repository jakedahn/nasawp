<?get_header()?>
      <div id="content">
        
        <?include 'leftSidebar.php'; ?>
        
        <div id="posts">
        <? if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div id="post-<?= the_id(); ?>" class="post">
            <?= the_post_thumbnail() ?>
            <h3 class="title"><a href="<?= the_permalink() ?>" title="Permalink to <?= the_title(); ?>" rel="bookmark"><?= the_title(); ?></a></h3>
            <div class="info">
              <span class="date"><?= the_time('F j Y') ?></span>
            </div>
            <div class="post_text">
              <?= the_content(); ?>
            </div>
          </div>
        <? endwhile; else : ?>
          <div id="post-error" class="post">
            <h3 class="title">Not Found</h3>
            <div class="post_text">
              <p>Sorry but we could not find what you were looking for. It could possibly be lost in space.</p>
            </div>
          </div>
        <? endif; ?>
        </div>
        
        <?include 'rightSidebar.php'; ?>
        
      </div>
<?get_footer()?>