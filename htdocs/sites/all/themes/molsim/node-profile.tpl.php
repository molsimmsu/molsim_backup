<?php
// $Id: node.tpl.php,v 1.7 2007/08/07 08:39:36 goba Exp $
?>
  <div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
     <?php if($node->language == 'en'){
     $acad_text= "Academic degree";
     $posit_text= "Position";
     $about_text= "";
	 $ri_text= "Research interests";
     $prodj_text= "Projects";
     $material_text= "Materials";
     $public_text= "Selected publications";
     $cv_file_text= "CV";
     }else{
     $acad_text= "Ученая степень";
     $posit_text= "Должность";
     $about_text= "Общая информация";
	 $ri_text= "Научные интересы";
     $prodj_text= "Projects";
     $prodj_text= "Проекты";
     $material_text= "Материалы";
     $public_text= "Избранные публикации";
     $cv_file_text= "Резюме";
     };
     ?>
     
     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="user_pag">
  <tr>
    <td class="user_left">
    <?php print $node->field_avatar[0][view]; ?>
    <div class="rez">
    <span class="grey"><?php print $cv_file_text;?>:</span>
    <?php foreach ($node->field_cv_file_en as $field_cv_file_en){ 
    print $field_cv_file_en[view];
    };
    ?></div>
    <span class="tel"><?php print $node->field_tel[0][view];?></span>
    <span class="fax"><?php print $node->field_fax[0][view];?></span>
    <?php print $node->field_email[0][view];?>
    <?php print $node->field_skype_status[0][view];?>
    <?php print $node->field_skype[0][view];?>
    
    </td>
    <td>
    <span class="grey"><?php print $acad_text;?>:</span>
    <?php print $node->field_acad_degr[0][view];?><br/>
    <span class="grey"><?php print $posit_text;?>:</span>
    <?php print $node->field_posit[0][view];?>
    <h2><?php print $about_text;?></h2>
    <?php print $node->field_about[0][view];?>
	<h2><?php print $ri_text;?></h2>
    <?php print $node->field_ri[0][view];?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="proje">
    <h2><?php print $prodj_text;?></h2>
    <div class="user_bord">
    <?php print $node->field_projects[0][view];?>
    <?php print $node->field_past_proj[0][view];?></div>
    </td>
    <td class="material">
    <h2><?php print $material_text;?></h2>
    <?php foreach ($node->field_mat_files as $field_mat_files){ 
    print $field_mat_files[view];
    };
    ?>
    </td>
  </tr>
</table>
    </td>
  </tr>
</table>
<div class="user_publ">
    <h2><?php print $public_text;?></h2>
    <?php print $node->field_sel_pub[0][view];?>
    <?php  $node->field_publ_list[0][view];?>
</div>
  </div>