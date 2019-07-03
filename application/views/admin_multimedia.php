<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $assets_dir = base_url().'assets/';
   $admin_dir = base_url().'admin_media/';

   $orderby = $this->input->get('orderby', TRUE);
   $direction = $this->input->get('direction', TRUE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Archivos Multimedia';
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
            <h2>Multimedia</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12"> 
            <a class='nav-btn' href='<?php echo $admin_dir."nuevo_media"; ?>'>
               <i class="fa fa-plus mr-1"></i>
               Nuevo Archivo Multimedia
            </a>
            </div>
         </div>
      </div>        

      <div class='card admin-content'>
         <div class='row no-gutters'>
         <div class="col-12">

            <div class="admin-buscador"><?php
               echo form_open(
                  'admin_media',
                  array('id' => 'form_buscar_media')
               ); ?>
               <input
                  class='buscador__input'
                  name='buscar_media'
                  id='buscar_media'
                  value='<?php echo $search; ?>'
               />
               <button class='buscador__button' type='submit' id='buscar_media_btn'>
                  <i class="fa fa-search"></i>
               </button>
               <span class="<?php if(!$search) { echo 'd-none'; } ?>">
                  <a href=''>Limpiar Busqueda</a>
               </span>
               <?php echo form_close(); ?>
            </div>

            <?php
               $media_array = $multimedia->result_array();
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
               <th>
                  <a href='<?php
                  $order_direction = (
                     !$direction || $direction == 'desc' || $orderby !== 'id_tipo_media'
                  ) ? 'asc'
                    : 'desc';                  
                  echo $admin_dir."?orderby=id_tipo_media&direction=".$order_direction;
                  ?>'
                  class='admin-table__title admin_order'>
                     Tipo de Media
                     <?php
                        $tipo_sort = 'sort';
                        if ($orderby == 'id_tipo_media' && $direction == 'asc') {
                           $tipo_sort .= '-up';
                        } elseif ($orderby == 'id_tipo_media' && $direction == 'desc') {
                           $tipo_sort .= '-down';
                        }
                     ?>
                     <i class='ml-2 fa fa-<?php echo $tipo_sort; ?>'></i>
                  </a>
               </th>
               <th>Enlace</th>
               <th>Órden</th>
               <th>Status</th>
               <th class='text-center' colspan="4">Acciones</th>
            </tr>
            </thead>

           <tbody><?php
               foreach ($media_array as $media) {
                  printf("
                     <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td><a href='%s' target='_blank'>
                           %s
                        </a></td>
                        <td class='text-center'>%s</td>",
                     $media['titulo'],
                     $media['area'],
                     $media['tipo_media'],
                     $media['enlace'], $media['enlace'],
                     $media['orden']
                  );
                  $toggle = $media['status'] ? '0' : '1';
                  printf("
                        <td class='text-center'>
                           <a href='%s' class='status %s'>
                              <span class='slider %s'/>
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
                        <td class
                         <td class='text-center'><a href='%seditar_media/%s'>
                           <i class='fa fa-edit'></i>
                        </a></td>
                        <td class='text-center'><a href='%sdelete_media/%s'>
                           <i class='fa fa-trash-alt'></i>
                        </a></td>
                     </tr>",
                     $admin_dir.'toggle_media/'.$media['id_post'].'?toggle='.$toggle,
                     $media['status'] ? 'status__on' : 'status__off',
                     $media['status'] ? 'slider__on' : 'slider__off',
                     $media['status'] ? $admin_dir.'subir_media/'.$media['id_post'] : '#',
                     $media['status'] ? $admin_dir.'bajar_media/'.$media['id_post'] : '#',
                     $admin_dir, $media['id_post'],
                     $admin_dir, $media['id_post']
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
