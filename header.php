<!DOCTYPE html>
<html lang="en" xml:lang="en">
  <head>
    <title>Nasa</title>
    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="Robots" content="index,all" />
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?bloginfo("template_url")?>/js/cosmetics.js" type="text/javascript" charset="utf-8"></script>
    
    <link rel="stylesheet" href="<?bloginfo("stylesheet_url")?>" type="text/css" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="<?bloginfo("name")?> RSS Feed" href="<?bloginfo("rss2_url")?>" />
    <link rel="alternate" type="application/atom+xml" title="<?bloginfo("name")?> Atom Feed" href="<?bloginfo("atom_url")?>" />
  </head>
  <body>
    <div id="wrapper">
      <div id="header">
        <h1><a href="http://www.nasa.gov/">Nasa</a></h1>
        <ul id="nav">
          <li><a href="http://www.nasa.gov/home/index.html">Home</a></li>
          <li><a href="http://www.nasa.gov/news/index.html">News</a></li>
          <li><a href="http://www.nasa.gov/missions/index.html">Missions</a></li>
          <li><a href="http://www.nasa.gov/multimedia/index.html">Multimedia</a></li>
          <li><a href="http://www.nasa.gov/about/index.html">About</a></li>
          <li><a href="http://www.nasa.gov/connect/index.html">Connect</a></li>
        </ul>
        <div id="search_bar">
          <form action="<?php bloginfo('home'); ?>" method="get" accept-charset="utf-8">
            <fieldset>
              <input type="text" name="s" value="" id="search">
              <input type="submit" value="Search">          
            </fieldset>
          </form>
        </div>
        <div id="bread_crumbs">
          <ul>
            <li><a href="http://www.nasa.gov/index.html">NASA Home</a></li>
            <li><a href="http://www.nasa.gov/centers/index.html">Centers</a></li>
            <? $center = explode(",", get_option("nasa_center")) ?>
            <li><a href="<?=$center[1]?>"><?=$center[0]?></a></li>
            <li><a href="<?=bloginfo("url")?>"><?=bloginfo("name")?></a></li>
          </ul>
        </div>
      </div>
