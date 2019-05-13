<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $assets_dir = base_url().'assets/';
   $admin_dir = base_url().'admin_evento/';

   $orderby = $this->input->get('orderby', TRUE);
   $direction = $this->input->get('direction', TRUE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Eventos';
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
            <h2>Eventos</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12"> 
            <a class='nav-btn' href='<?php echo $admin_dir."nuevo_evento"; ?>'>
               <i class="fa fa-plus mr-1"></i>
               Nuevo Evento
            </a>
            </div>
         </div>
      </div>        

      <div class='card admin-content'>
         <div class='row no-gutters'>
         <div class="col-12">

            <div class="admin-buscador"><?php
               echo form_open(
                  'admin_evento',
                  array('id' => 'form_buscar_evento')
               ); ?>
               <input
                  class='buscador__input'
                  name='buscar_evento'
                  id='buscar_evento'
                  value='<?php echo $search; ?>'
               />
               <button class='buscador__button' type='submit' id='buscar_evento_btn'>
                  <i class="fa fa-search"></i>
               </button>
               <span class="<?php if(!$search) { echo 'd-none'; } ?>">
                  <a href=''>Limpiar Busqueda</a>
               </span>
               <?php echo form_close(); ?>
            </div>

            <?php
               $eventos_array = $eventos->result_array();
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
                     Titulo
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
               foreach ($eventos_array as $evento) {
                  printf("
                     <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>",
                     $evento['titulo'],
                     $evento['area'],
                     $evento['organizador']
                  );
                  printf("
                        <td>%s %s %s %s</td>",
                        $evento['rango'] ? 'Del' : '',
                        $evento['fecha_ini'],
                        $evento['rango'] ? 'Al' : '',
                        $evento['rango'] ? $evento['fecha_fin'] : ''
                     );
                  printf("
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>",                     
                     $evento['lugar'],
                     $evento['hora'],
                     $evento['info']
                  );
                  if($evento['imagen'] !== '') {
                     printf("
                        <td class='text-center'><img src='%s' class='img-small'></td>",
                        $assets_dir.$evento['imagen']
                     );
                  } else { echo "
                        <td></td>";
                  }
                  $toggle = $evento['status'] ? '0' : '1';
                  printf("
                        <td class='text-center'>
                           <a href='%s' class='status %s'>
                              <span class='slider %s'/>
                           </a>
                        </td>
                         <td class='text-center'><a href='%seditar_evento/%s'>
                           <i class='fa fa-edit'></i>
                        </a></td>
                        <td class='text-center'><a href='%sdelete_evento/%s'>
                           <i class='fa fa-trash-alt'></i>
                        </a></td>
                     </tr>",
                     $admin_dir.'toggle_evento/'.$evento['id_post'].'?toggle='.$toggle,
                     $evento['status'] ? 'status__on' : 'status__off',
                     $evento['status'] ? 'slider__on' : 'slider__off',
                     $admin_dir, $evento['id_post'],
                     $admin_dir, $evento['id_post']
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
