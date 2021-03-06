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

      <li><?php
         $page_active = (
           strpos($this->uri->segment(1), 'pagina') > -1
          ) ? 'sidemenu--active' : '' 
         ?>
        <a      
          href='<?php echo $admin_dir."admin_pagina" ?>'
          class='<?php echo $page_active; ?>' >
        <i class="fa fa-scroll" aria-hidden="true"></i>
        <span>Páginas</span>
      </a></li>

      <?php 
      foreach ($tipo_posts as $post) {
        $isActive = (
          strpos($this->uri->segment(2), $post['tipo_post']) > -1
            || strpos($this->uri->segment(1), $post['tipo_post']) > -1
          ) ? 'sidemenu--active' : '';
        printf("
          <li>
            <a href='%s' class='%s'>
              <i class='fa fa-%s' aria-hidden='true'></i>
              <span>%s</span>
              %s
            </a>",          
          $admin_dir."admin_".$post['tipo_post'],
          $isActive,
          $post['icono'],
          $post['nombre_sidebar'],
          $post['sub_categoria'] 
            ? "<i class='dropdown fa fa-chevron-down'></i>" 
            : ""
        );
        if ($post['sub_categoria']) {
          printf("
            <ul class='submenu'>
              <li><a href='%s'>
                <i class='fa fa-tag' aria-hidden='true'></i>
                <span>CATEGORIA</span>
              </a></li>
            </ul>",
            $admin_dir."admin_".$post['tipo_post']."/categorias_".$post['tipo_post']
          );
        }
        echo "</li>";
      }        
      ?>
    
      <?php 
      foreach ($complementos as $plugin) {
        $isActive = (
          strpos($this->uri->segment(2), $plugin['complemento']) > -1
            || strpos($this->uri->segment(1), $plugin['complemento']) > -1
          ) ? 'sidemenu--active' : '';
        printf("
          <li>
            <a href='%s' class='%s'>
              <i class='fa fa-%s' aria-hidden='true'></i>
              <span>%s</span>
            </a>
          </li>",          
          $admin_dir."admin_".$plugin['complemento'],
          $isActive,
          $plugin['icono'],
          $plugin['nombre_sidebar']
        );
      }        
      ?>
      
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

      <li><a href='<?php echo $admin_dir; ?>admin/close_session' >
        <i class="fa fa-exit" aria-hidden="true"></i>
        <span>Cerrar Sesión</span>
      </a></li>

    </ul>

    <ul class="sidemenu">
      <li><span class='sidemenu_visitas'>
        N° de Visitas: <?php echo $visitas; ?>
        </span>
      </li>
    </ul>


   <script src='<?php  echo $assets_dir."js/admin_sidebar_app.js"; ?>' ></script>

  </div>
