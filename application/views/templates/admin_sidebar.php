<?php
	$admin_dir = base_url();
  $assets_dir = base_url().'assets/';
?>

  <div class='admin-sidebar' id='sidebar'>
    
    <span class='admin-sidebar__title'>
      <span>Menu</span>
      <a href='#' class='collapse-btn' id='collapse_btn'>
        <i class="fa fa-chevron-left"></i>
      </a>
            <a href='#' class='collapse-btn hidden' id='expand_btn'>
        <i class="fa fa-chevron-right"></i>
      </a>
    </span>

    <a	href='<?php echo $admin_dir."admin_usuario" ?>'
    	  class="admin-sidebar__option <?php
          if ($this->uri->segment(1) == 'admin_usuario')
          { echo 'active'; } ?>"
    >
    	<i class="fa fa-user"></i>
      <span>Usuarios</span>
  	</a>

    <a  href='<?php echo $admin_dir."admin_noticia" ?>'
        class="admin-sidebar__option <?php
        if (
          strpos($this->uri->segment(2), 'noticia') > -1
            || strpos($this->uri->segment(1), 'noticia') > -1
          ) { 
          echo 'active'; } ?>"
    >
      <i class="fa fa-file"></i>
      <span>Noticias</span>
    </a>
   <script src='<?php  echo $assets_dir."js/admin_sidebar_app.js"; ?>' ></script>
  </div>
