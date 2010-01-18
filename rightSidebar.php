<div id="right_col">
  <ul id="news">
  <? query_posts("showposts=5");?>
  <? while(have_posts()) : the_post(); ?>
  
    <li>
      <?= the_post_thumbnail(array(50, 50), array('class' => 'sidebarThumbnail', 'align' => 'left')) ?>
      <h3 class="title"><a href="<?= the_permalink() ?>" title="Permalink to <?= the_title(); ?>" rel="bookmark"><?= the_title(); ?></a></h3>
      <div class="post_text">
        <?= nasa_excerpt(10, 'p', '', FALSE); ?>
      </div>
    </li>
  <?endwhile?>
    <li>
