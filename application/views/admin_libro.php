<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_libro';

   $error = $msg = '';
   $titulo_alert = $fecha_alert = $fuente_alert = $resumen_alert = false;
   $orderby = $this->input->get('orderby', TRUE);
   $direction = $this->input->get('direction', TRUE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Librería';
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
            <h2>Librería</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">         
               <a class='nav-btn' href='<?php echo $admin_dir."/nuevo_libro"; ?>'>
                  <i class="fa fa-plus mr-1"></i>
                  Libro nuevo
               </a>
               <a
                  class='nav-btn'
                  href='<?php echo $admin_dir."/categorias_libro"; ?>'
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

               <div class="admin-buscador">
                  <div class='buscador__container'><?php
                  echo form_open(
                     'admin_libro',
                     array('id' => 'form_buscar_libreria')
                  ); ?>
                     <input
                        class='buscador__input'
                        name='buscar_libreria'
                        id='buscar_libreria'
                        placeholder='Buscar...'
                        value='<?php echo $search; ?>'
                     />
                  </div>

                  <div class='buscador__container'>
                     <select
                        class='buscador__input'
                        name='buscar_categoria'
                        id='buscar_categoria'
                     >
                        <option value=''>Todas las áreas</option>
                        <?php
                        $cat_array = $categorias->result_array();
                        foreach ($cat_array as $cat_libro) {
                           printf("
                              <option value='%s' %s>%s</option>
                              ",
                              $cat_libro['id_categoriaLibro'],
                              $search_cat == $cat_libro['id_categoriaLibro'] ? 'selected' : '',
                              $cat_libro['categoria']
                           );
                        }
                        ?>
                     </select>
                  <button class='buscador__button' type='submit' id='buscar_libreria_btn'>
                     <i class="fa fa-search"></i>
                  </button>
                  <span class="<?php if(!$search) { echo 'd-none'; } ?>">
                     <a href=''>Limpiar Busqueda</a>
                  </span>
                  <?php echo form_close(); ?>
                  </div>
               </div>

            </div>
         </div>

         <?php
            $libros_array = $libros->result_array();
            if (sizeof($libros_array) > 0) {  ?>
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
                       !$direction || $direction == 'desc' || $orderby !== 'id_categoriaLibro'
                     ) ? 'asc'
                       : 'desc';
                     echo $admin_dir."?orderby=id_categoriaLibro&direction=".$order_direction;
                     ?>'
                     class='admin-table__title admin_order'>
                        Categoria
                        <?php
                           $catLibro_sort = 'sort';
                           if ($orderby == 'id_categoriaLibro' && $direction == 'asc') {
                              $catLibro_sort .= '-up';
                           } elseif ($orderby == 'id_categoriaLibro' && $direction == 'desc') {
                              $catLibro_sort .= '-down';
                           }
                        ?>
                        <i class='ml-2 fa fa-<?php echo $catLibro_sort; ?>'></i>
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
                     class='admin-table__title admin_order'>
                        Autor
                        <?php
                           $autor_sort = 'sort';
                           if ($orderby == 'autor' && $direction == 'asc') {
                              $autor_sort .= '-up';
                           } elseif ($orderby == 'autor' && $direction == 'desc') {
                              $autor_sort .= '-down';
                           }
                        ?>
                        <i class='ml-2 fa fa-<?php echo $autor_sort; ?>'></i>
                     </a>
                  </th>
                  <th class='text-center'>
                  <a href='<?php
                     $order_direction = (
                        !$direction || $direction == 'desc' || $orderby !== 'precio'
                     ) ? 'asc'
                       : 'desc';
                     echo $admin_dir."?orderby=precio&direction=".$order_direction;
                     ?>'
                     class='admin-table__title admin_order'>
                        Precio
                        <?php
                           $precio_sort = 'sort';
                           if ($orderby == 'precio' && $direction == 'asc') {
                              $precio_sort .= '-up';
                           } elseif ($orderby == 'precio' && $direction == 'desc') {
                              $precio_sort .= '-down';
                           }
                        ?>
                        <i class='ml-2 fa fa-<?php echo $precio_sort; ?>'></i>
                     </a>
                  </th>
                  <th>Descripción</th>
                  <th>Portada</th>
                  <th>Status</th>
                  <th colspan="2">Opciones</th>
               </tr>
               </thead>
               <tbody>
               <? foreach ($libros_array as $libro) {
                  $cat_index = array_search(
                     $libro['id_categoriaLibro'],
                     array_column($cat_array, 'id_categoriaLibro')
                  );
                  printf("
                     <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td class='text-center'>%s</td>
                        <td>%s</td>",
                        $libro['titulo'],
                        $cat_array[$cat_index]['categoria'],
                        $libro['autor'],
                        $libro['precio'],
                        $libro['descripcion']                        
                  );
                  if($libro['imagen'] !== '') {
                     printf("
                        <td class='text-center'><img src='%s' class='img-small'></td>",
                        $assets_dir.$libro['imagen']
                     );
                  } else { echo "
                        <td></td>";
                  }
                  $toggle = $libro['status'] ? '0' : '1';
                  printf("
                     <td class='text-center'>
                        <a href='%s' class='status %s'>
                           <span class='slider %s'/>
                        </a>
                     </td>",
                     $admin_dir.'/toggle_libro/'.$libro['id_post'].'?toggle='.$toggle,
                     $libro['status'] ? 'status__on' : 'status__off',
                     $libro['status'] ? 'slider__on' : 'slider__off'
                  );                
                  printf("
                        <td class='text-center'><a href='%s/editar_libro/%s'>
                           <i class='fa fa-edit'></i>
                        </a></td>
                        <td class='text-center'><a href='%s/delete_libro/%s'>
                           <i class='fa fa-trash-alt'></i>
                        </a></td>
                     </tr>",
                     $admin_dir, $libro['id_post'],
                     $admin_dir, $libro['id_post']
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
