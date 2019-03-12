<?php
  $admin_dir = base_url().'cpanel/';
?>

 <div class='admin-header'>

	<div class='admin-logo'>
    <a href='<?php echo $admin_dir; ?>'>
 		 <h3>LOGO</h3>
    </a>
 	</div>
 	
   <div class='admin-rigth'>
      <div class='d-none d-md-block'>
         <div>Welcome <?php echo $this->session->userdata('usuario') ?></div>
         <a
            href='<?php echo $admin_dir ?>close_session'
            class='admin-header__cerrar-sesion'
         >  Cerrar Sesion
         </a>
      </div>
      <div class='admin-menu__container d-block d-md-none' id='sidebar_btn'>
         <span class='admin-menu'></span>
      </div>
   </div>
    	
 </div>