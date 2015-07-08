<?php
// $Id: page.tpl.php,v 1.28.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <?php print $head ?>
  <title><?php print $head_title ?></title>
  <?php print $styles ?>
  <?php print $scripts ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
  <script type="text/javascript" src="/sites/all/themes/molsim/js/brous.js?S"></script>
</head>

<body>
<?php
        if (substr_replace($_SERVER['REQUEST_URI'], null, 3) == "/ru"){
        $link_en='/en'.substr($_SERVER['REQUEST_URI'], 3);
        $link_ru=$_SERVER['REQUEST_URI'];
        $link_logo="/sites/all/themes/molsim/images/logo_ru.png";
        }elseif (substr_replace($_SERVER['REQUEST_URI'],null,3) == "/en"){
		$link_en=$_SERVER['REQUEST_URI'];
		$link_ru='/ru'.substr($_SERVER['REQUEST_URI'],3);
		$link_logo="/sites/all/themes/molsim/images/logo_en.png";
		}
	else{
	$link_en='/en'.$_SERVER['REQUEST_URI'];
	$link_ru='/ru'.$_SERVER['REQUEST_URI'];
	$link_logo="/sites/all/themes/molsim/images/logo_en.png";
	};
		if ($is_front):
		$link_en="/en"; // modif 26.01.12
        $link_ru="/ru";
        endif;

?>
<div id="main">
  <div id="header">
  <div id="header_top"><?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>" id="logo">
        <img src="<?php print $link_logo; ?>" alt="<?php if ($site_name): print $site_name;  endif; ?>" />
        </a>
        <?php endif; ?>
        
        
        <div id="ru_en"><a href="<?php print $link_ru;?>"><img src="/sites/all/themes/molsim/images/ru.png" alt="" width="60" height="29" /></a><a href="<?php print $link_en;?>"><img src="/sites/all/themes/molsim/images/en.png" alt="" width="56" height="29" /></a></div>
  </div>
  <div id="top_menu">
  
  <?php print $menu;?>
  	<div id="navigation">
  	<?php if (isset($primary_links)) { ?>
  	<?php 
  			print $primary_links;
  			#print theme('links', $primary_links, array('class' => 'links', 'id' => 'navlist'))
  			?>
  	<?php } ?>
  	</div>
  </div>
  </div>
  <div id="middle">
    <div id="cont">
        
  <?php if ($mission) { ?><div id="mission"><?php print $mission ?></div><?php } ?>
        <h1><?php print $title ?></h1>
        <div class="tabs"><?php print $tabs ?></div>
        <?php if ($show_messages) { print $messages; } ?>
        <?php print $help ?>
        <?php print $content; ?>
        <?php print $left ?>
        <?php print $front;?>
        <?php print $feed_icons; ?>
  
  </div>
    <div id="right"><?php if ($right) { ?>
      <?php print $right ?>
    <?php } ?></div>
  </div>
  <div id="clear"></div>
</div>
<div id="footer">
  <div class="bor"><div class="bor"><?php print t('&nbsp; &nbsp; &nbsp; &copy; 2015, Molecular Simulations Group, Faculty of Biology, Moscow State Lomonosov University'); ?>
  <?php print $footer ?></div></div>
  </div>

<?php print $closure ?>
</body>
</html>
