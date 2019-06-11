<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $assets_dir = base_url().'assets/';
   $admin_dir = base_url().'admin_convocatoria/';

   $orderby = $this->input->get('orderby', TRUE);
   $direction = $this->input->get('direction', TRUE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Convocatorias';
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
            <h2>Convocatorias</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12"> 
            <a class='nav-btn' href='<?php echo $admin_dir."nueva_convocatoria"; ?>'>
               <i class="fa fa-plus mr-1"></i>
               Nueva Convocatoria
            </a>
            </div>
         </div>
      </div>        

      <div class='card admin-content'>
         <div class='row no-gutters'>
         <div class="col-12">

            <div class="admin-buscador"><?php
               echo form_open(
                  'admin_convocatoria',
                  array('id' => 'form_buscar_convocatoria')
               ); ?>
               <input
                  class='buscador__input'
                  name='buscar_convocatoria'
                  id='buscar_convocatoria'
                  value='<?php echo $search; ?>'
               />
               <div class='buscador__container'>
                  <select
                     class='buscador__input'
                     name='buscar_cat'
                     id='buscar_cat'
                     style='width: 250px'
                  >
                     <option value=''>Todas las áreas</option>
                     <?php
                     $areas_array = $areas->result_array();
                     foreach ($areas_array as $area) {
                        printf("
                           <option value='%s' %s>%s</option>
                           ",
                           $area['id_area'],
                           $area['id_area'] == $search_cat ? 'selected': '',
                           $area['area']
                        );
                     }
                     ?>
                  </select>
                  <button class='buscador__button' type='submit' id='buscar_convo_btn'>
                     <i class="fa fa-search"></i>
                  </button>
                  <span class="<?php if(!$search) { echo 'd-none'; } ?>">
                     <a href=''>Limpiar Busqueda</a>
                  </span>
               <?php echo form_close(); ?>
               </div>
            </div>

            <?php
               $convo_array = $convocatorias->result_array(); 
            ?> 
            <table class='admin-table'>

            <thead>
            <tr>
               <th>
                  <a href='<?php
                  $order_direction = (
                     !$direction || $direction == 'desc' || $orderby !== 'titulo'
                  ) ? 'asc'
                    : 'desc';                  
                  echo $admin_dir."?orderby=titulo&direction=".$order_direction;
                  ?>'
                  class='admin-table__title admin_order'>
                     Título
                     <?php
                        $titulo_sort = 'sort';
                        if ($orderby == 'titulo' && $direction == 'asc') {
                           $titulo_sort .= '-up';
                        } elseif ($orderby == 'titulo' && $direction == 'desc') {
                           $titulo_sort .= '-down';
                        }
                     ?>
                     <i class='ml-2 fa fa-<?php echo $titulo_sort; ?>'></i>
                  </a>
               </th>
                <th>
                  <a href='<?php
                  $order_direction = (
                     !$direction || $direction == 'desc' || $orderby !== 'id_area'
                  ) ? 'asc'
                    : 'desc';                  
                  echo $admin_dir."?orderby=id_area&direction=".$order_direction;
                  ?>'
                  class='admin-table__title admin_order'>
                     Área
                     <?php
                        $area_sort = 'sort';
                        if ($orderby == 'id_area' && $direction == 'asc') {
                           $area_sort .= '-up';
                        } elseif ($orderby == 'id_area' && $direction == 'desc') {
                           $area_sort .= '-down';
                        }
                     ?>
                     <i class='ml-2 fa fa-<?php echo $area_sort; ?>'></i>
                  </a>
               </th>
               <th class='text-center'>
                  <a href='<?php
                     $order_direction = (
                        !$direction || $direction == 'desc' || $orderby !== 'fecha_limite'
                     ) ? 'asc'
                       : 'desc';                  
                     echo $admin_dir."?orderby=fecha_limite&direction=".$order_direction;
                     ?>'
                     class='admin-table__title admin_order'>
                     Fecha Limite
                     <?php
                        $fecha_sort = 'sort';
                        if ($orderby == 'fecha_limite' && $direction == 'asc') {
                           $fecha_sort .= '-up';
                        } elseif ($orderby == 'fecha_limite' && $direction == 'desc') {
                           $fecha_sort .= '-down';
                        }
                     ?>
                     <i class='ml-2 fa fa-<?php echo $fecha_sort; ?>'></i>
                  </a>
               </th>
               <th>Descripción</th>
               <th>Imagen Destacada</th>
               <th>Status</th>
               <th class='text-center' colspan="4">Acciones</th>
            </tr>
            </thead>

            <tbody><?php
               foreach ($convo_array as $conv) {
                  printf("
                     <tr>
                        <td>%s</td>
                        <td class='text-center'>%s</td>
                        <td>%s</td>",
                     $conv['titulo'],
                     $conv['area'],
                     $conv['fecha_limite'],
                     $conv['descripcion']
                  );                  
                  if($conv['imagen']) {
                     printf("
                        <td class='text-center'><img src='%s' class='img-small'></td>",
                        $assets_dir.$conv['imagen']
                     );
                  } else { echo "
                        <td></td>";
                  }
                  $toggle = $conv['status'] ? '0' : '1';
                  printf("
                        <td class='text-center'>
                           <a href='%s' class='status %s'>
                              <span class='slider %s'/>
                           </a>
                        </td>
                         <td class='text-center'><a href='%seditar_convocatoria/%s'>
                           <i class='fa fa-edit'></i>
                        </a></td>
                        <td class='text-center'><a href='%sdelete_convocatoria/%s'>
                           <i class='fa fa-trash-alt'></i>
                        </a></td>
                     </tr>",
                     $admin_dir.'toggle_convocatoria/'.$conv['id_post'].'?toggle='.$toggle,
                     $conv['status'] ? 'status__on' : 'status__off',
                     $conv['status'] ? 'slider__on' : 'slider__off',
                     $admin_dir, $conv['id_post'],
                     $admin_dir, $conv['id_post']
                  );
               }
            ?></tbody>
         </table>

         <div class='admin__page_nav'>
            <?php
               $nav_dir = base_url()."admin_convocatoria";
               $nav_size = ceil($cant_convocatorias/$limit);
               $q_params = '';
               if ($orderby) { $q_params .= '&orderby='.$orderby; }
               if ($direction) { $q_params .= '&direction='.$direction; }

                if ($nav_size > 1) {
                  if ($step > 0) {
                     $prev = $step - 1;
                     printf("
                        <a href='%s' class='showing_nav'> << </a>",
                        $nav_dir."?step=".$prev.$q_params
                     );
                  }
                  for($i=0; $i<$nav_size; $i++) {
                     printf(
                        "<a href='%s' class='showing_nav %s'> %s </a>",
                        $i == 0 ? $nav_dir : $nav_dir."?step=".$i.$q_params,
                        $step == $i ? 'active' : '',
                        $i+1
                     );
                  }
                   if ($step+1 < $nav_size) {
                     $next = $step + 1;
                     printf("
                        <a href='%s' class='showing_nav'> >> </a>",
                        $nav_dir."?step=".$next.$q_params
                     );
                  }  
               }
            ?>               
            </div>

         </div>
         </div>
      </div>

   </div>
   </div>
<?php
   $this->load->view('templates/admin_footer'); 
?>

