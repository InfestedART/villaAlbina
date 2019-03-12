<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_noticia/';

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
            <a class='nav-btn' href='<?php echo $admin_dir."noticia_nueva"; ?>'>
               <i class="fa fa-plus mr-1"></i>
               Noticia Nueva
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
                        <th>Resumen</th>
                        <th>Imagen Destacada</th>
                        <th>Status</th>
                        <th colspan="2">Opciones</th>
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
                        if($noticia['imagen_destacada'] !== '') {
                           printf("
                              <td class='text-center'><img src='%s' class='img-small'></td>",
                              $assets_dir.$noticia['imagen_destacada']
                           );
                        } else { echo "
                              <td></td>";
                        }
                        if($noticia['status']) {
                           printf("
                              <td class='text-center'>SI</td>"
                           );
                        } else {                           
                            printf("
                              <td class='text-center'>NO</td>"
                           );
                        }                      
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

   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
