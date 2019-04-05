<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_equipo';

   $error = $msg = '';
   $titulo_alert = $fecha_alert = $fuente_alert = $resumen_alert = false;
   $orderby = $this->input->get('orderby', TRUE);
   $direction = $this->input->get('direction', TRUE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Equipo de Trabajo';
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
            <h2>Equipo de Trabajo</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">         
               <a class='nav-btn' href='<?php echo $admin_dir."/nuevo_equipo"; ?>'>
                  <i class="fa fa-plus mr-1"></i>
                  Nuevo miembro
               </a>
               <a
                  class='nav-btn'
                  href='<?php echo $admin_dir."/categorias_equipo"; ?>'
               >
                  <i class="fa fa-tags mr-1"></i>
                  Categorias
               </a>
            </div>
         </div>
      </div>

     <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">         

               <div class="admin-buscador"><?php
                  echo form_open(
                     'admin_equipo',
                     array('id' => 'form_buscar_libreria')
                  ); ?>
                  <input
                     class='buscador__input'
                     name='buscar_equipo'
                     id='buscar_equipo'
                     value='<?php echo $search; ?>'
                  />
                  <button class='buscador__button' type='submit' id='buscar_equipo_btn'>
                     <i class="fa fa-search"></i>
                  </button>
                  <span class="<?php if(!$search) { echo 'd-none'; } ?>">
                     <a href=''>Limpiar Busqueda</a>
                  </span>
                  <?php echo form_close(); ?>
               </div>

            </div>
         </div>

         <?php
            $miembros_array = $miembros->result_array();
            $cat_array = $categorias->result_array();
            if (sizeof($miembros_array) > 0) {  ?>
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
                     class='admin-table__title'>
                        Nombre
                  </a>
                  </th>
                  <th>
                  <a href='<?php
                     $order_direction = (
                       !$direction || $direction == 'desc' || $orderby !== 'id_categoriaLibro'
                     ) ? 'asc'
                       : 'desc';
                     echo $admin_dir."?orderby=id_categoriaLibro&direction=".$order_direction;
                     ?>'
                     class='admin-table__title'>
                        Categoria
                     </a>
                  </th>
                  <th>
                  <a href='<?php
                     $order_direction = (
                        !$direction || $direction == 'desc' || $orderby !== 'autor'
                     ) ? 'asc'
                       : 'desc';
                     echo $admin_dir."?orderby=autor&direction=".$order_direction;
                     ?>'
                     class='admin-table__title'>
                        Cargo
                     </a>
                  </th>
                  <th>Descripción</th>
                  <th>Imagen</th>
                  <th>Status</th>
                  <th colspan="2">Opciones</th>
               </tr>
               </thead>
               <tbody>
               <? foreach ($miembros_array as $miembro) {
                  $cat_index = array_search(
                     $miembro['id_categoria_equipo'],
                     array_column($cat_array, 'id_categoria_equipo')
                  );
                  printf("
                     <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>",
                        $miembro['nombre'],
                        $cat_array[$cat_index]['categoria'],
                        $miembro['cargo'],
                        $miembro['descripcion']                        
                  );
                  if($miembro['imagen'] !== '') {
                     printf("
                        <td class='text-center'><img src='%s' class='img-small'></td>",
                        $assets_dir.$miembro['imagen']
                     );
                  } else { echo "
                        <td></td>";
                  }
                  $toggle = $miembro['status'] ? '0' : '1';
                  printf("
                     <td class='text-center'>
                        <a href='%s' class='status %s'>
                           <span class='slider %s'/>
                        </a>
                     </td>",
                     $admin_dir.'/toggle_equipo/'.$miembro['id_post'].'?toggle='.$toggle,
                     $miembro['status'] ? 'status__on' : 'status__off',
                     $miembro['status'] ? 'slider__on' : 'slider__off'
                  );                
                  printf("
                        <td class='text-center'><a href='%s/editar_equipo/%s'>
                           <i class='fa fa-edit'></i>
                        </a></td>
                        <td class='text-center'><a href='%s/delete_equipo/%s'>
                           <i class='fa fa-trash-alt'></i>
                        </a></td>
                     </tr>",
                     $admin_dir, $miembro['id_post'],
                     $admin_dir, $miembro['id_post']
                  );
               }  
               ?> 
               </tbody>
            </table>
            <?
            }
            ?>   
         </div>

   </div>      
   </div>

   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
