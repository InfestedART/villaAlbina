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
      <div  class='row justify-content-md-center'>

        <div class='card col-12 col-md-11 p-2 mt-0 mt-md-5'>
         <div>
            <a class='nav-btn' href='<?php echo base_url()."cpanel/admin_noticia"; ?>'> 
               <- Volver
            </a>
         </div>
         </div>

         <div class='card col-12 col-md-11 p-4 mt-0 mt-md-5'>
            <h3>INSERTAR NOTICIA</h3>
            <?php
               echo form_open_multipart(
                  'cpanel/insertar_noticia',
                  array('id' => 'form_noticia')
               );
            ?>
               <span id='noticia_alert' class='form-alert'>
               	<?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>

               <span id='noticia_msg' class='form-success'>
                  <?php echo $msg;?>
               </span>

               <div class='form-group'>
                  <label>Titulo</label>
                  <input
                     id='titulo'
                     name='titulo'
                     class="form-control <?php echo $titulo_alert ? 'alert' : ''; ?>"
                     type='text'
                  /> 
               </div>

               <div class='form-group'>
                  <label>Fecha</label>
                  <input
                     id='fecha'
                     name='fecha'
                     class="form-control <?php echo $fecha_alert ? 'alert' : ''; ?>"
                     type='text'
                  /> 
               </div>

                <div class='form-group'>
                  <label>Fuente</label>
                  <input
                     id='fuente'
                     name='fuente'
                     class="form-control <?php echo $fuente_alert ? 'alert' : ''; ?>"
                     type='text'
                  /> 
               </div>

               <!-- div class='form-group'>
                  <label>Enlace</label>
                  <input
                     id='enlace'
                     name='enlace'
                     class="form-control"
                     type='text'
                  /> 
               </div -->

               <div class='form-group'>
                  <label>Resumen</label>
                  <textarea
                     id='resumen'
                     name='resumen'
                     class="form-control <?php echo $resumen_alert ? 'alert' : ''; ?>"
                  /> 
                  </textarea>
               </div>

               <div class='form-group'>
                  <label>Imagen Destacada</label>
                  <input
                     id='imagen'
                     name='imagen'
                     class="form-control"
                     type='file'
                  /> 
               </div>

               <div class="form-group">
                  <button type="button" id='noticia_btn' class="btn btn-primary">
                     AGREGAR NOTICIA
                  </button>
               </div>

            </form>
         </div>

      </div>      
   </div>
   </div>

   <script src=<?php  echo $assets_dir."js/pickaday.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/admin_noticia_app.js"; ?> ></script>
   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
