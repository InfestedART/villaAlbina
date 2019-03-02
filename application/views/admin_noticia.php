<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'cpanel/';


   $error = '';
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

   <link rel="stylesheet" href=<?php  echo $assets_dir."css/hotel-datepicker.css"; ?> />
   <script src=<?php  echo $assets_dir."js/fecha.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/hotel-datepicker.min.js"; ?> ></script>
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

         <div class='card col-12 col-md-8 p-4 mt-0 mt-md-5'>
            <h3>INSERTAR NOTICIA</h3>
            <form
            	id='form_noticia'            	
            	method="post"
	         	action="<?php
            		echo site_url('cpanel/insertar_noticia');
            	?>"
            >
               <span  id='noticia_error' class='form-alert'>
               	<?php echo $this->session->flashdata('error');?>
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
                     name='titulo'
                     class="form-control <?php echo $fecha_alert ? 'alert' : ''; ?>"
                     type='text'
                  /> 
               </div>

                <div class='form-group'>
                  <label>Fuente</label>
                  <input
                     id='fecha'
                     name='titulo'
                     class="form-control <?php echo $fuente_alert ? 'alert' : ''; ?>"
                     type='text'
                  /> 
               </div>

               <div class='form-group'>
                  <label>Enlace</label>
                  <input
                     id='fecha'
                     name='titulo'
                     class="form-control"
                     type='text'
                  /> 
               </div>

               <div class='form-group'>
                  <label>Resumen</label>
                  <input
                     id='fecha'
                     name='titulo'
                     class="form-control <?php echo $resumen_alert ? 'alert' : ''; ?>"
                     type='text'
                  /> 
               </div>

               <div class='form-group'>
                  <label>Imagen Destacada</label>
                  <input
                     id='fecha'
                     name='titulo'
                     class="form-control"
                     type='text'
                  /> 
               </div>

               <div class="form-group">
                  <button type="button" id='newUser_btn' class="btn btn-primary">
                     AGREGAR NOTICIA
                  </button>
               </div>

            </form>
         </div>

      </div>      
   </div>
   </div>

   <script src=<?php  echo $assets_dir."js/admin_noticia_app.js"; ?> ></script>
   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
