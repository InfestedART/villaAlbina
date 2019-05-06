<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $assets_dir = base_url().'assets/';
   $admin_dir = base_url().'admin_pagina/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Páginas';
      $this->load->view('templates/meta', $data);
   ?>
</head>

<body>

<div class="admin-body">
   <?php
      $this->load->view('templates/admin_header'); 
      $this->load->view('templates/admin_sidebar');
   ?>

   <div class='admin-container'>
   <div class="admin-wrapper">

      <div class='admin-title'>
         <div class='row no-gutters'>
            <div class="col-12">         
            <h2>Páginas</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12"> 
            <a class='nav-btn' href='<?php echo $admin_dir."nueva_pagina"; ?>'>
               <i class="fa fa-plus mr-1"></i>
               Nueva Página
            </a>
            <a class='nav-btn' href='<?php echo $admin_dir."nueva_subpagina"; ?>'>
               <i class="fa fa-plus mr-1"></i>
               Nueva SubPágina
            </a>
            </div>
         </div>
      </div>        

      <div class='card admin-content'>
         <div class='row no-gutters'>
         <div class="col-12">
         <?php
            $paginas_array = $paginas->result_array();
            $subpaginas_array = $subpaginas->result_array();
            $open_subpaginas = $this->session->flashdata('open_subpaginas');
         ?>          
            <table class='admin-table'>

            <thead>
            <tr>
               <th></th>
               <th>Página</th>
               <th class='text-center'>Tipo de <br /> contenido</th>
               <th>Color</th>
               <th class='text-center'>Órden</th>
               <th class='text-center'>Mostrar en barra <br /> de Navegación</th>
               <th class='text-center'>Status</th>
               <th class='text-center' colspan="4">Acciones</th>
            </tr>
            </thead>

            <tbody><?php
               foreach ($paginas_array as $pagina) {
                  $tiene_hijos = array_search(
                     $pagina['id_pagina'],
                     array_column($subpaginas_array, 'id_pagina')
                  );
                  printf("
                     <tr>
                        <td class='text-center'>"
                     );
                  if (strlen($tiene_hijos) > 0) {
                     printf("
                        <a href='#' class='expand_btn %s' id='pagina_%s'>
                           <i class='fa fa-%s' id='%s'></i>
                        </a>",
                        $open_subpaginas === $pagina['id_pagina'] ? 'open' : 'closed',
                        $pagina['id_pagina'],
                        $open_subpaginas === $pagina['id_pagina'] ? 'minus' : 'plus',
                        $pagina['id_pagina']
                     ); 
                  }                  
                  printf(
                       "</td>
                        <td>%s</td>
                        <td class='text-center capitalize'>%s</td>
                        <td>
                           <span
                              class='color-preview %s'
                              style='background-color: %s'
                           ></span>
                           <span>%s</span>
                        </td>
                        <td class='text-center'>%s</td>
                        <td class='text-center'>
                           <i class='fa fa-%s'></i>                           
                        </td>",
                     $pagina['titulo'],  
                     $pagina['nombre_modelo'],
                     $pagina['color'] ? '' : 'd-none',
                     $pagina['color'], $pagina['color'],
                     $pagina['orden'],
                     $pagina['mostrar_navbar'] ? 'check' : 'times'
                  );
                  $toggle = $pagina['status'] ? '0' : '1';
                  printf("
                        <td class='text-center'>
                           <a href='%s' class='status %s'>
                              <span class='slider %s'/>
                           </a>
                        </td>
                        <td class='text-center'>
                           <a href='%seditar_pagina/%s' title='EDITAR'>
                            <i class='fa fa-edit'></i>
                           </a>
                        </td>
                        <td class='text-center'>
                           <a href='%s'>
                           <i class='fa fa-chevron-up' title='MOVER ARRIBA'></i>
                        </td>
                        <td class='text-center'>
                           <a href='%s'>
                           <i class='fa fa-chevron-down' title='MOVER ABAJO'></i>
                        </td>
                        <td class='text-center'>
                           <a href='%snueva_subpagina?pagina=%s' title='NUEVA PAGINA'>
                              <i class='fa fa-plus-square'
                                 style='font-size: 16px;'></i>
                           </a>
                     </tr>",                     
                     $admin_dir.'/toggle_pagina/'.$pagina['id_pagina'].'?toggle='.$toggle,
                     $pagina['status'] ? 'status__on' : 'status__off',
                     $pagina['status'] ? 'slider__on' : 'slider__off',
                     $admin_dir, $pagina['id_pagina'],
                     $pagina['status'] ? $admin_dir.'subir_pagina/'.$pagina['id_pagina'] : '#',
                     $pagina['status'] ? $admin_dir.'bajar_pagina/'.$pagina['id_pagina'] : '#',
                     $admin_dir, $pagina['id_pagina']
                  );

                  foreach ($subpaginas_array as $subpagina) {
                  if ($subpagina['id_pagina'] == $pagina['id_pagina']) {
                     printf("
                        <tr id='subpagina_%s' class='subpagina %s %s'>
                           <td></td>
                           <td class='pl-4'>%s</td>
                           <td class='text-center capitalize'>%s</td>
                           <td>-</td>
                           <td class='text-center'>-</td>
                           <td class='text-center'>-</td>",
                        $pagina['id_pagina'], $pagina['id_pagina'],
                        $open_subpaginas == $pagina['id_pagina'] ? '' : 'hidden',
                        $subpagina['subpagina'],
                        $subpagina['nombre_modelo']
                        );
                     $sub_toggle = $subpagina['status'] ? '0' : '1';
                     printf("
                           <td class='text-center'>
                              <a href='%s' class='status %s'>
                              <span class='slider %s'/>
                              </a>
                           </td>
                           <td class='' colspan='3'>
                              <a href='%seditar_subpagina/%s' title='EDITAR'>
                              <i class='fa fa-edit'></i>
                              </a>
                           </td>
                        </tr>",                        
                        $admin_dir.'toggle_subpagina/'.$subpagina['id_subpagina'].'?toggle='.$sub_toggle,
                        $subpagina['status'] ? 'status__on' : 'status__off',
                        $subpagina['status'] ? 'slider__on' : 'slider__off',
                        $admin_dir, $subpagina['id_subpagina']
                     );
                  }}

               }
            ?></tbody>

            </table>
         </div>
         </div>
      </div>

   </div>
   </div>
   <script src=<?php  echo $assets_dir."js/admin_pagina.js"; ?> ></script>
   <?php
      $this->load->view('templates/admin_footer'); 
   ?>

