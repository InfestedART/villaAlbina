<?php
	$admin_dir = base_url().'cpanel/';
?>

  <div class='admin-sidebar' id='sidebar'>
    <a	href='<?php echo $admin_dir."nuevo_usuario" ?>'
    	  class="<?php if ($this->uri->segment(2) == 'nuevo_usuario')
          { echo 'active'; } ?>" >
    	<i class="fa fa-user"></i>
      	<span>Usuarios</span>
  	</a>

    <a  href='<?php echo $admin_dir."admin_noticia" ?>'
        class="<?php if (strpos($this->uri->segment(2), 'noticia') > -1)
          { echo 'active'; } ?>" >
      <i class="fa fa-user"></i>
        <span>Noticias</span>
    </a>

  </div>
