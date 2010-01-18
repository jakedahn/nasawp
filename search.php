<?php get_header(); ?>

    <div id="content">
      <?php include 'leftSidebar.php'; ?>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div id="post-<?php the_ID(); ?>" class="post">
        <h2 class="post-title"><?php the_title(); ?></h2>
        <div class="post-entry">
          <?php the_excerpt(); ?>
          <?php link_pages('<p class="page-link">Pages: ', '</p>', 'number'); ?>
          <!-- <?php trackback_rdf(); ?> -->
        </div><!-- END POST-ENTRY -->
      </div><!-- END POST -->

      <?php endwhile; endif; ?>
      <?php include 'rightSidebar.php'; ?>

    </div><!-- END CONTENT -->

<?php get_footer(); ?>