<?php
  $admin_dir = base_url().'cpanel/';
  $assets_dir = base_url().'assets/';
?>

 <div class='admin-header'>

	<div class='admin-logo'>
    <a href='<?php echo $admin_dir; ?>'>
 		  <img src='<? echo $assets_dir."img/logo_albina.png";?>'/>
    </a>
 	</div>

  <div class='admin-rigth'>
    <img
      class='d-none d-sm-inline-block'
      src='<? echo $assets_dir."img/logo.png";?>'
    />
    <a href='#' class="admin__menu navbar__menu" id='sidebar_btn'>
      <i class='fa fa-bars'> </i>
    </a>
  </div>
 	
 </div>