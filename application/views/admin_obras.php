<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $assets_dir = base_url().'assets/';
   $admin_dir = base_url().'admin_obras/';

   $orderby = $this->input->get('orderby', TRUE);
   $direction = $this->input->get('direction', TRUE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Obras de Teatro';
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
            <h2>Obras de Teatro</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12"> 
            <a class='nav-btn' href='<?php echo $admin_dir."nueva_obra"; ?>'>
               <i class="fa fa-plus mr-1"></i>
               Nueva Obra de Teatro
            </a>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
         <div class="col-12">

            <div class="admin-buscador">
               <div class='buscador__container'><?php
               echo form_open(
                  'admin_obras',
                  array('id' => 'form_buscar_obra')
               ); ?>
               <input
                  class='buscador__input'
                  name='buscar'
                  id='buscar'
                  placeholder='Buscar...'
                  value='<?php echo $search; ?>'
               />
               <button class='buscador__button' type='submit' id='buscar_obra_btn'>
                  <i class="fa fa-search"></i>
               </button>
               <span class="<?php if(!$search) { echo 'd-none'; } ?>">
                  <a href=''>Limpiar Busqueda</a>
               </span>
               <?php echo form_close(); ?>
               </div>
            </div>

            <?php
               $obras_array = $obras->result_array();
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
                     !$direction || $direction == 'desc' || $orderby !== 'organizador'
                  ) ? 'asc'
                    : 'desc';                  
                  echo $admin_dir."?orderby=organizador&direction=".$order_direction;
                  ?>'
                  class='admin-table__title admin_order'>
                  Organizador
                     <?php
                        $organizador_sort = 'sort';
                        if ($orderby == 'organizador' && $direction == 'asc') {
                           $organizador_sort .= '-up';
                        } elseif ($orderby == 'organizador' && $direction == 'desc') {
                           $organizador_sort .= '-down';
                        }
                     ?>
                     <i class='ml-2 fa fa-<?php echo $organizador_sort; ?>'></i>
                  </a>
               </th>
               <th class='text-center'>
                  <a href='<?php
                     $order_direction = (
                        !$direction || $direction == 'desc' || $orderby !== 'fecha_ini'
                     ) ? 'asc'
                       : 'desc';                  
                     echo $admin_dir."?orderby=fecha_ini&direction=".$order_direction;
                     ?>'
                     class='admin-table__title admin_order'>
                     Fecha
                     <?php
                        $fecha_sort = 'sort';
                        if ($orderby == 'fecha_ini' && $direction == 'asc') {
                           $fecha_sort .= '-up';
                        } elseif ($orderby == 'fecha_ini' && $direction == 'desc') {
                           $fecha_sort .= '-down';
                        }
                     ?>
                     <i class='ml-2 fa fa-<?php echo $fecha_sort; ?>'></i>
                  </a>
               </th>
               <th class='text-center'>
                  <a href='<?php
                     $order_direction = (
                        !$direction || $direction == 'desc' || $orderby !== 'hora'
                     ) ? 'asc'
                       : 'desc';                  
                     echo $admin_dir."?orderby=hora&direction=".$order_direction;
                     ?>'
                     class='admin-table__title admin_order'>
                  Lugar
                  <?php
                        $hora_sort = 'sort';
                        if ($orderby == 'hora' && $direction == 'asc') {
                           $hora_sort .= '-up';
                        } elseif ($orderby == 'hora' && $direction == 'desc') {
                           $hora_sort .= '-down';
                        }
                     ?>
                     <i class='ml-2 fa fa-<?php echo $hora_sort; ?>'></i>
                  </a>
               </th>
               <th class='text-center'>Hora</th>
               <th class='text-center'>Información</th>
               <th>Imagen</th>
               <th>Status</th>
               <th class='text-center' colspan="4">Acciones</th>
            </tr>
            </thead>

            <tbody><?php
               foreach ($obras_array as $obra) {
                  printf("
                     <tr>
                        <td>%s</td>
                        <td>%s</td>",
                     $obra['titulo'],
                     $obra['organizador']
                  );
                  printf("
                        <td>%s %s %s %s</td>",
                        $obra['rango'] ? 'Del' : '',
                        $obra['fecha_ini'],
                        $obra['rango'] ? 'Al' : '',
                        $obra['rango'] ? $obra['fecha_fin'] : ''
                     );
                  printf("
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>",                     
                     $obra['lugar'],
                     $obra['hora'],
                     $obra['info']
                  );
                  if($obra['imagen']) {
                     printf("
                        <td class='text-center'><img src='%s' class='img-small'></td>",
                        $assets_dir.$obra['imagen']
                     );
                  } else { echo "
                        <td></td>";
                  }
                  $toggle = $obra['status'] ? '0' : '1';
                  printf("
                        <td class='text-center'>
                           <a href='%s' class='status %s'>
                              <span class='slider %s'/>
                           </a>
                        </td>
                         <td class='text-center'><a href='%seditar_obra/%s'>
                           <i class='fa fa-edit'></i>
                        </a></td>
                        <td class='text-center'><a href='%sdelete_obra/%s'>
                           <i class='fa fa-trash-alt'></i>
                        </a></td>
                     </tr>",
                     $admin_dir.'toggle_obra/'.$obra['id_post'].'?toggle='.$toggle,
                     $obra['status'] ? 'status__on' : 'status__off',
                     $obra['status'] ? 'slider__on' : 'slider__off',
                     $admin_dir, $obra['id_post'],
                     $admin_dir, $obra['id_post']
                  );
               }
            ?></tbody>

            </table>


         </div>
         </div>
      </div>

   </div>
   </div>
<?php
   $this->load->view('templates/admin_footer'); 
?>
