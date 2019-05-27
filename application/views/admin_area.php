<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $assets_dir = base_url().'assets/';
   $admin_dir = base_url().'admin_area/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Áreas';
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
            <h2>Áreas</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12"> 
            <a class='nav-btn' href='<?php echo $admin_dir."nueva_area"; ?>'>
               <i class="fa fa-plus mr-1"></i>
               Nueva Área
            </a>
            <a class='nav-btn' href='<?php echo $admin_dir."nueva_subarea"; ?>'>
               <i class="fa fa-plus mr-1"></i>
               Nueva Subárea
            </a>
            </div>
         </div>
      </div>        


      <div class='card admin-content'>
         <div class='row no-gutters'>
         <div class="col-12">         

         <?php
            $areas_array = $areas->result_array();
            $subareas_array = $subareas->result_array();
            $open_subareas = $this->session->flashdata('open_subareas');
         ?>          
            <table class='admin-table'>

            <thead>
            <tr>
               <th></th>
               <th>Área</th>
               <th>Color</th>
               <th class='text-center'>Status</th>
               <th colspan="4" class='text-center'>Acciones</th>
            </tr>
            </thead>

            <tbody><?php
               foreach ($areas_array as $area) {
                  $tiene_hijos = array_search(
                     $area['id_area'],
                     array_column($subareas_array, 'id_area')
                  );
                  printf("
                     <tr>
                        <td class='text-center'>"
                  );
                  if (strlen($tiene_hijos) > 0) {
                     printf("
                        <a href='#' class='expand_btn %s' id='area_%s'>
                           <i class='fa fa-%s' id='%s'></i>
                        </a>",
                        $open_subareas === $area['id_area'] ? 'open' : 'closed',
                        $area['id_area'],
                        $open_subareas === $area['id_area'] ? 'minus' : 'plus',
                        $area['id_area']
                     ); 
                  }
                  printf("
                        </td>
                        <td>%s</td>
                        <td>
                           <span
                              class='color-preview %s'
                              style='background-color: %s'
                           ></span>
                           <span>%s</span>
                        </td>",                     
                     $area['area'],
                     $area['color_area'] ? '' : 'd-none',
                     $area['color_area'], $area['color_area']
                  );
                  $toggle = $area['status'] ? '0' : '1';
                  printf("
                        <td class='text-center'>
                           <a href='%s' class='status %s'>
                              <span class='slider %s'/>
                           </a>
                        </td>
                        <td class='text-center'>
                           <a href='%seditar_area/%s' title='EDITAR'>
                            <i class='fa fa-edit'></i>
                           </a>
                        </td>
                        <td class='text-center'>
                           <a href='%snueva_subarea?area=%s' title='AÑADIR SUBAREA'>
                              <i class='fa fa-plus-square'
                                 style='font-size: 16px;'></i>
                           </a>
                        </td>
                     </tr>",
                     $admin_dir.'/toggle_area/'.$area['id_area'].'?toggle='.$toggle,
                     $area['status'] ? 'status__on' : 'status__off',
                     $area['status'] ? 'slider__on' : 'slider__off',
                     $admin_dir, $area['id_area'],
                     $admin_dir, $area['id_area']
                  );
                  foreach ($subareas_array as $subarea) {
                  if ($subarea['id_area'] == $area['id_area']) {
                     printf("
                        <tr id='subarea_%s' class='subarea %s %s'>
                           <td></td>
                           <td class='pl-4'>%s</td>
                           <td>-</td>",
                        $area['id_area'], $area['id_area'],
                        $open_subareas == $area['id_area'] ? '' : 'hidden',
                        $subarea['subarea']
                        );
                     $sub_toggle = $subarea['status'] ? '0' : '1';
                     printf("
                           <td class='text-center'>
                              <a href='%s' class='status %s'>
                              <span class='slider %s'/>
                              </a>
                           </td>
                           <td colspan='2'>
                              <a class='%s' href='%seditar_subarea/%s' title='EDITAR'>
                              <i class='ml-2 fa fa-edit'></i>
                              </a>
                              %s
                           </td>
                        </tr>",                        
                        $admin_dir.'/toggle_subarea/'.$subarea['id_subarea'].'?toggle='.$sub_toggle,
                        $subarea['status'] ? 'status__on' : 'status__off',
                        $subarea['status'] ? 'slider__on' : 'slider__off',
                        $subarea['mostrar_componente'] ? 'hidden' : '',
                        $admin_dir, $subarea['id_subarea'],
                        $subarea['mostrar_componente']
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
    
</div>

   <script src=<?php  echo $assets_dir."js/admin_area.js"; ?> ></script>
   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
