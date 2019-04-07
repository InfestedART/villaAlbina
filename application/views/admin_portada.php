<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_portada/';

   $error = $msg = '';
	$insertar_alert = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Portada';
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
            <h2>Imagenes de Portada</h2>
            </div>
         </div>
      </div>

     <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">
            	<span>Color del degradado por defecto: </span>
					<span
						class='color-preview'
						style='background-color: <?php echo $default_color; ?>'
         		></span>
            	<span><?php
            	echo $default_color;
            	?></span>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12"> 
            <a class='nav-btn' href='<?php echo $admin_dir."nueva_portada"; ?>'>
               <i class="fa fa-plus mr-1"></i>
               Agregar Imagen
            </a>
            </div>
         </div>
      </div>   

     <div class='card admin-content'>
         <div class='row no-gutters'>
         <div class="col-12"> 

			<h5 class='form-title'>Carrusel de Imagenes</h5>
         <table class='admin-table'>
            <thead>
               <tr>
               	<th>Orden</th>
               	<th>Imagen</th>
               	<th>Color del degradado</th>
               	<th>Area</th>
               	<th colspan='4'>Acciones</th>
               </tr>
         	</thead>
            <tbody><?php
         		foreach ($valid_portadas as $portada) {
         			$color = $default_color;
         			if (!$portada['color'] && $portada['id_area'] && $portada['color_area']) {
         				$color = $portada['color_area'];
         			} elseif ($portada['color']) {
         				$color = $portada['color'];
         			}
         			printf("
         				<tr>
         					<td class='text-center'>%s - %s</td>
         					<td>
         						<img src='%suploads/%s' class='img-medium_small' />
         					</td>
         					<td>
         						<span
         							class='color-preview'
         							style='background-color: %s'
         						></span>
         						<span>%s</span>
         					</td>
         					<td>%s</td>
         					<td class='text-center'>
         						<a href='%seditar_portada/%s'>
                           <i class='fa fa-edit' title='EDITAR'></i>
                        </td>
                        <td class='text-center'>
         						<a href='%ssubir_portada/%s'>
                           <i class='fa fa-chevron-up' title='MOVER ARRIBA'></i>
                        </td>
                        <td class='text-center'>
         						<a href='%sbajar_portada/%s'>
                           <i class='fa fa-chevron-down' title='MOVER ABAJO'></i>
                        </td>
                        <td class='text-center'><a href='%squitar_portada/%s'>
                           <i class='fa fa-times' title='QUITAR'></i>
                        </a></td>
         				</tr>",
         				$portada['orden'], $portada['id_portada'],
         				$assets_dir, $portada['imagen'],
         				$color, $color,
         				$portada['area'] ? $portada['area'] : '-',
         				$admin_dir, $portada['id_portada'],
         				$admin_dir, $portada['id_portada'],
         				$admin_dir, $portada['id_portada'],
         				$admin_dir, $portada['id_portada']
         			);           			
         		}               		
           	?></tbody>
         </table>

         </div>
         </div>
      </div>

<div class='card admin-content'>
         <div class='row no-gutters'>
         <div class="col-12"> 

			<h5 class='form-title'>Imagenes sin Usar</h5>
         <table class='admin-table'>
            <thead>
               <tr>
               	<th>Orden</th>
               	<th>Imagen</th>
               	<th>Color del degradado</th>
               	<th>Area</th>
               	<th colspan='2'>Acciones</th>
               </tr>
         	</thead>
            <tbody><?php
         		foreach ($other_portadas as $portada) {
         			$color = $default_color;
         			if (!$portada['color'] && $portada['id_area'] && $portada['color_area']) {
         				$color = $portada['color_area'];
         			} elseif ($portada['color']) {
         				$color = $portada['color'];
         			}
         			printf("
         				<tr>
         					<td class='text-center'>%s - %s</td>
         					<td>
         						<img src='%suploads/%s' class='img-medium_small' />
         					</td>
         					<td>
         						<span
         							class='color-preview'
         							style='background-color: %s'
         						></span>
         						<span>%s</span>
         					</td>
         					<td>%s</td>
         					<td class='text-center'>
         						<a href='%sadd_portada/%s'>
                           <i class='fa fa-plus' title='AÑADIR'></i>
                        </td>
                        <td class='text-center'>
         						<a href='%sdelete_portada/%s'>
                           <i class='fa fa-trash-alt' title='ELIMINAR'></i>
                        </td>
         				</tr>",
         				$portada['orden'], $portada['id_portada'],
         				$assets_dir, $portada['imagen'],
         				$color, $color,
         				$portada['area'] ? $portada['area'] : '-',
         				$admin_dir, $portada['id_portada'],
         				$admin_dir, $portada['id_portada']
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
