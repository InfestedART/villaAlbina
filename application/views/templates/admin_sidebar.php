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

    <a  href='#'
        class="admin-sidebar__option"
    >
      <i class="fa fa-file" aria-hidden="true"></i>
      <span>Paginas</span>
    </a>

    <a  href='<?php echo $admin_dir."admin_noticia" ?>'
        class="admin-sidebar__option <?php
        if (
          strpos($this->uri->segment(2), 'noticia') > -1
            || strpos($this->uri->segment(1), 'noticia') > -1
          ) { 
          echo 'active'; } ?>"
    >
      <i class="fa fa-newspaper" aria-hidden="true"></i>
      <span>Noticias</span>
    </a>

    <a  href='<?php echo $admin_dir."admin_libreria" ?>'
        class="admin-sidebar__option <?php
        if (
          strpos($this->uri->segment(2), 'libreria') > -1
            || strpos($this->uri->segment(1), 'libreria') > -1
          ) { 
          echo 'active'; } ?>"
    >
      <i class="fa fa-book "></i>
      <span>Libreria</span>
    </a>

      <a href='<?php echo $admin_dir."admin_libreria" ?>'
         class="admin-sidebar__option admin-sidebar__sub-menu" >
        <span>Categorias</span>
      </a>

    <a  href='<?php echo $admin_dir."admin_usuario" ?>'
        class="admin-sidebar__option <?php
          if ($this->uri->segment(1) == 'admin_usuario')
          { echo 'active'; } ?>"
    >
      <i class="fa fa-user" aria-hidden="true"></i>
      <span>Usuarios</span>
    </a>

   <script src='<?php  echo $assets_dir."js/admin_sidebar_app.js"; ?>' ></script>

  </div>
