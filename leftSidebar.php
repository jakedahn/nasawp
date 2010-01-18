
<div id="left_col">
  <div class="left_block">
    <h3>Connect With <?bloginfo("name")?></h3>
    <ul>
      <?= nasa_fetch_socialmedia()?>
      <li><a href="<?bloginfo("rss2_url")?>">RSS</a></li>
    </ul>
  </div>
  <div class="left_block">
    <h3><?bloginfo("name")?> in the News</h3>
    <ul>
      <?= nasa_fetch_links("Press Coverage") ?>
    </ul>
  </div>
  
  
</div>

