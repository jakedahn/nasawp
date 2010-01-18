<?

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 75 );


// Grabs list of links from specified category
function list_links($name) {
  $arguments = array(
    "category_name"    =>  $name
  );
  $links = get_bookmarks($arguments);
  
  foreach ($links as $link) {
    echo "\t<li><a href=\"$link->link_url\" title=\"$link->link_description\" target=\"_blank\">$link->link_name</a></li>\n";
  }
}