<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'cpanel/';

   $error = $msg = '';
   $titulo_alert = $fecha_alert = $fuente_alert = $resumen_alert = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Espacio Simon I Patiño - Nuevo Usuario</title>

	<link rel="stylesheet" href=<?php  echo $assets_dir."css/bootstrap.css"; ?> />
   <link rel="stylesheet" href=<?php  echo $assets_dir."css/fa_all.min.css"; ?> />
	<link rel="stylesheet" href=<?php  echo $assets_dir."css/admin_style.css"; ?> />
   <link rel="stylesheet" href=<?php  echo $assets_dir."css/style.css"; ?> />

   <link rel="stylesheet" href=<?php  echo $assets_dir."css/pickaday.css"; ?> />
</head>

<body>

<div>
  	<?php
   	$this->load->view('templates/admin_header'); 
    	$this->load->view('templates/admin_sidebar');
   ?>

   <div class='admin-container'>
      <div class="container">
      <div class='row justify-content-md-center'>

         <div class='card col-12 col-md-11 p-2 mt-0 mt-md-5'>
            <div>
            <a class='nav-btn' href='<?php echo base_url()."cpanel/noticia_nueva"; ?>'>
               + Noticia Nueva
            </a>
            </div>
         </div>         

         <div class='card col-12 col-md-11 p-2 mt-0 mt-md-4'>
         <?php
            $noticias_array = $noticias->result_array();
            if (sizeof($noticias_array) > 0) {  ?>
               <h4>Noticias</h3>
               <table class='admin-table'>
                  <thead>
                     <tr>
                        <th>Titulo</th>
                        <th>Fecha</th>
                        <th>Fuente</th>
                        <th colspan="3">Imagen Destacada</th>
                     </tr>
                  </thead>
                  <tbody>
                  <? foreach ($noticias_array as $noticia) {
                        printf("
                           <tr>
                              <td>%s</td>
                              <td>%s</td>
                              <td>%s</td>
                              <td>%s</td>
                              <td><a href='%s/editar_noticia/%s'>
                                 <i class='fa fa-edit'></i>
                              </a></td>
                              <td><a href='%s/delete_noticia/%s'>
                                 <i class='fa fa-trash-alt'></i>
                              </a></td>
                           </tr>",
                           $noticia['titulo'],
                           $noticia['fecha'],
                           $noticia['fuente'],
                           $noticia['imagen_destacada'],
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

   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
