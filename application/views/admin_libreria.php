<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_libreria';

   $error = $msg = '';
   $titulo_alert = $fecha_alert = $fuente_alert = $resumen_alert = false;
   $orderby = $this->input->get('orderby', TRUE);
   $direction = $this->input->get('direction', TRUE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Libreria';
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
      <div class="container">
      <div class='row justify-content-md-center'>

         <div class='card col-12 col-md-11 p-2 mt-0 mt-md-5'>
            <div>
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

         <div class='card col-12 col-md-11 p-2 mt-0 mt-md-4'>
            <div>
               <input class='buscador__input' type="text" name='buscar_noticia'/>
               <button class='buscador__button' type='submit'>
                  <i class="fa fa-search"></i>
               </button>
            </div>
         </div>

         <div class='card col-12 col-md-11 p-2 mt-0 mt-md-4'>
         <?php
            $libros_array = $libros->result_array();
            $cat_array = $categorias->result_array();
            if (sizeof($libros_array) > 0) {  ?>
            <h3>Libros</h3>
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
                        Titulo
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
                        Autor
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
                     class='admin-table__title'>
                        Precio
                     </a>
                  </th>
                  <th class='text-center'>
                  <a href='<?php
                     $order_direction = (
                        !$direction || $direction == 'desc' || $orderby !== 'paginas'
                     ) ? 'asc'
                       : 'desc';
                     echo $admin_dir."?orderby=paginas&direction=".$order_direction;
                     ?>'
                     class='admin-table__title'>
                        Paginas
                     </a>
                  </th>
                  <th>
                  <a href='<?php
                     $order_direction = (
                        !$direction || $direction == 'desc' || $orderby !== 'lugar'
                     ) ? 'asc'
                       : 'desc';
                     echo $admin_dir."?orderby=lugar&direction=".$order_direction;
                     ?>'
                     class='admin-table__title'>
                        Lugar
                     </a>
                  </th>
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
                        <td class='text-center'>%s</td>
                        <td>%s</td>",
                        $libro['titulo'],
                        $cat_array[$cat_index]['categoria'],
                        $libro['autor'],
                        $libro['precio'],
                        $libro['paginas'],
                        $libro['lugar']
                  );
                  if($libro['portada'] !== '') {
                     printf("
                        <td class='text-center'><img src='%s' class='img-small'></td>",
                        $assets_dir.$libro['portada']
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
                     $admin_dir.'/toggle_libro/'.$libro['id_libro'].'?toggle='.$toggle,
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
                     $admin_dir, $libro['id_libro'],
                     $admin_dir, $libro['id_libro']
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
   </div>

   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
