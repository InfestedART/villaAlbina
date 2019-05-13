<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_noticia/';

   $error = $msg = '';
   $titulo_alert = $fecha_alert = $fuente_alert = $resumen_alert = false;
   $orderby = $this->input->get('orderby', TRUE);
   $direction = $this->input->get('direction', TRUE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Noticias';
      $this->load->view('templates/meta', $data);
   ?>
   <link rel="stylesheet" href=<?php  echo $assets_dir."css/pickaday.css"; ?> />
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
            <h2>Noticias</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12"> 
            <a class='nav-btn' href='<?php echo $admin_dir."noticia_nueva"; ?>'>
               <i class="fa fa-plus mr-1"></i>
               Noticia Nueva
            </a>
            </div>
         </div>
      </div>        

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">        

            <div class="admin-buscador"><?php
               echo form_open(
                  'admin_noticia',
                  array('id' => 'form_buscar_noticia')
               ); ?>
               <input
                  class='buscador__input'
                  name='buscar_noticia'
                  id='buscar_noticia'
                  value='<?php echo $search; ?>'
               />
               <button class='buscador__button' type='submit' id='buscar_noticia_btn'>
                  <i class="fa fa-search"></i>
               </button>
               <span class="<?php if(!$search) { echo 'd-none'; } ?>">
                  <a href=''>Limpiar Busqueda</a>
               </span>
               <?php echo form_close(); ?>
            </div>

         <?php
            $noticias_array = $noticias->result_array();
            if (sizeof($noticias_array) > 0) {  ?>
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
                     !$direction || $direction == 'desc' || $orderby !== 'fecha'
                  ) ? 'asc'
                    : 'desc';
                  echo $admin_dir."?orderby=fecha&direction=".$order_direction;
                  ?>'
                  class='admin-table__title admin_order'>
                     Fecha
                     <?php
                        $fecha_sort = 'sort';
                        if ($orderby == 'fecha' && $direction == 'asc') {
                           $fecha_sort .= '-up';
                        } elseif ($orderby == 'fecha' && $direction == 'desc') {
                           $fecha_sort .= '-down';
                        }
                     ?>
                     <i class='ml-2 fa fa-<?php echo $fecha_sort; ?>'></i>
                  </a>
                  </th>
                  <th>
                  <a href='<?php
                  $order_direction = (
                     !$direction || $direction == 'desc' || $orderby !== 'fuente'
                  ) ? 'asc'
                    : 'desc';
                  echo $admin_dir."?orderby=fuente&direction=".$order_direction;
                  ?>'
                  class='admin-table__title admin_order'>
                     Fuente
                     <?php
                        $fuente_sort = 'sort';
                        if ($orderby == 'fuente' && $direction == 'asc') {
                           $fuente_sort .= '-up';
                        } elseif ($orderby == 'fuente' && $direction == 'desc') {
                           $fuente_sort .= '-down';
                        }
                     ?>
                     <i class='ml-2 fa fa-<?php echo $fuente_sort; ?>'></i>
                  </a>
                  </th>
                  <th>Resumen</th>
                  <th>Imagen Destacada</th>
                  <th>Status</th>
                  <th colspan="2">Acciones</th>
               </tr>
               </thead>
               <tbody>
               <? foreach ($noticias_array as $noticia) {
                     printf("
                        <tr>
                           <td>%s</td>
                           <td class='text-center'>%s</td>
                           <td>%s</td>
                           <td>%s</td>",
                           $noticia['titulo'],
                           $noticia['fecha'],
                           $noticia['fuente'],
                           $noticia['resumen']
                     );
                     if($noticia['imagen'] !== '') {
                        printf("
                           <td class='text-center'><img src='%s' class='img-small'></td>",
                           $assets_dir.$noticia['imagen']
                        );
                     } else { echo "
                           <td></td>";
                     }
                     $toggle = $noticia['status'] ? '0' : '1';
                     printf("
                        <td class='text-center'>
                           <a href='%s' class='status %s'>
                              <span class='slider %s'/>
                           </a>
                        </td>",
                        $admin_dir.'/toggle_noticia/'.$noticia['id_post'].'?toggle='.$toggle,
                        $noticia['status'] ? 'status__on' : 'status__off',
                        $noticia['status'] ? 'slider__on' : 'slider__off'
                     );                       
                     printf("
                           <td class='text-center'><a href='%seditar_noticia/%s'>
                              <i class='fa fa-edit'></i>
                           </a></td>
                           <td class='text-center'><a href='%sdelete_noticia/%s'>
                              <i class='fa fa-trash-alt'></i>
                           </a></td>
                        </tr>",
                        $admin_dir, $noticia['id_post'],
                        $admin_dir, $noticia['id_post']
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
   </div>

   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
