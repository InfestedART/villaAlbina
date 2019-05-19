<?php
  $admin_dir = base_url().'cpanel/';
  $assets_dir = base_url().'assets/';
?>

 <div class='admin-header'>

	<div class='admin-logo'>
    <a href='<?php echo $admin_dir; ?>'>
 		  <img src='<? echo $assets_dir."img/logo.png";?>'/>
      <img
        class='d-none d-sm-inline-block'
        style='height: 30px;'
        src='<? echo $assets_dir."img/logo_espacioPatino.png";?>'
      />
    </a>
 	</div>
 	
   <div class='admin-rigth'>
      <div class='d-none d-md-block'>
         <div><?php echo $this->session->userdata('usuario') ?></div>
         <a
            href='<?php echo $admin_dir ?>close_session'
            class='admin-header__cerrar-sesion'
         >  Cerrar Sesion
         </a>
      </div>
        <a href='#' class="admin__menu navbar__menu" id='sidebar_btn'>
          <i class='fa fa-bars'> </i>
        </a>
   </div>
    	
 </div>