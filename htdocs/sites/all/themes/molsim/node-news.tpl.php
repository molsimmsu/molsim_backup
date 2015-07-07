<?php
// $Id: node.tpl.php,v 1.7 2007/08/07 08:39:36 goba Exp $
?>
  <div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
<?php
foreach ($node->taxonomy as $arTerm) {
$pic_number=$arTerm->tid;
};
?>
 
    <?php if ($page == 0) { ?>
    <img width="20" height="20" class="ico_news" src="http://molsim.org/sites/all/themes/molsim/images/news_<?php print $pic_number;?>.png">
    <?php print date("d.m.Y", $node->created);?>
    <a href="<?php print $node_url?>"><?php print $node->field_title_front[0][value];?></a>

    <?php }else{; ?>
 
    <span class="submitted"><?php print $submitted?></span>
    <div class="content"><?php print $content?></div>
    <?php if ($links) { ?><div class="links"><?php print $links?></div><?php }; ?>
	<?php };?>  
  </div>
