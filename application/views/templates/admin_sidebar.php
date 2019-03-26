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

    <ul class="sidemenu">
      <li><a href="#">
        <i class="fa fa-scroll" aria-hidden="true"></i>
        <span>Paginas</span>
      </a></li>
      <li>
        <?php
        $noticia_active = (
          strpos($this->uri->segment(2), 'noticia') > -1
            || strpos($this->uri->segment(1), 'noticia') > -1
          ) ? 'sidemenu--active' : '' 
         ?>
        <a
          href='<?php echo $admin_dir."admin_noticia"; ?>'
          class='<?php echo $noticia_active; ?>'
          >
         <i class="fa fa-newspaper" aria-hidden="true"></i>
         <span>Noticias</span>
        </a></li>
      <li><?php
        $libreria_active = (
          strpos($this->uri->segment(2), 'libreria') > -1
            || strpos($this->uri->segment(1), 'libreria') > -1
          ) ? 'sidemenu--active' : '' 
         ?>
        <a
          href='<?php echo $admin_dir."admin_libreria" ?>'
          class='<?php echo $libreria_active; ?>' >
          <i class="fa fa-book" aria-hidden="true"></i>
          <span>Libreria</span>
        </a>
        <ul class="submenu">
          <li><a href='<?php echo $admin_dir."admin_libreria/categorias_libro" ?>'>
            <i class="fa fa-tag" aria-hidden="true"></i>
            <span>Categorias</span>
          </a></li>
        </ul>
      </li>
      <li><?php
         $usuario_active = (
           strpos($this->uri->segment(1), 'usuario') > -1
          ) ? 'sidemenu--active' : '' 
         ?>
        <a
          href='<?php echo $admin_dir."admin_usuario" ?>'
          class='<?php echo $usuario_active; ?>' >
          <i class="fa fa-user" aria-hidden="true"></i>
          <span>Usuarios</span>
      </a></li>
    </ul>

   <script src='<?php  echo $assets_dir."js/admin_sidebar_app.js"; ?>' ></script>

  </div>
