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
   <?php
      $data['title'] = 'Panel de Control - Noticia Nueva';
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
            <h2>Noticia Nueva</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">     
            <a class='nav-btn' href='<?php echo base_url()."admin_noticia"; ?>'>
               <i class="fa fa-arrow-left mr-1"></i>
               Volver
            </a>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">
            <h5 class='form-title'>Insertar Noticia</h5>
            <?php
               echo form_open_multipart(
                  'admin_noticia/insertar_noticia',
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

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Titulo</label>
                  <div class='col-sm-9'>
                     <input
                        id='titulo'
                        name='titulo'
                        class="form-control
                        <?php echo $titulo_alert ? 'alert' : ''; ?>"
                        type='text'
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Fecha</label>
                  <div class='col-sm-9'>
                     <input
                        id='fecha'
                        name='fecha'
                        class="form-control
                        <?php echo $fecha_alert ? 'alert' : ''; ?>"
                        type='text'
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Fuente</label>
                  <div class='col-sm-9'>
                     <input
                        id='fuente'
                        name='fuente'
                        class="form-control
                        <?php echo $fuente_alert ? 'alert' : ''; ?>"
                        type='text'
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Resumen</label>
                  <div class='col-sm-9'>
                     <textarea
                        id='resumen'
                        name='resumen'
                        class="form-control
                        <?php echo $resumen_alert ? 'alert' : ''; ?>"
                     /></textarea>
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Imagen Destacada</label>
                  <div class='col-sm-9'>
                     <input
                        id='imagen'
                        name='imagen'
                        class="form-control"
                        type='file'
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>
                     <div class=''>
                        Galeria de Imágenes:
                     </div>
                     <div class='mt-2'>
                        <span class='form-change-img m-0' id='add_img'>
                        Añadir
                        </span>
                     </div>
                  </label>

                  <div class='col-sm-9'>
                     <div id='img_array'>
                     </div> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-12'>Contenido</label>
                  <div class='col-sm-12'>
                     <?php 
                        echo $this->ckeditor->editor("contenido");
                     ?>
                  </div>
               </div>

               <div class='form-group row'>
                  <div class='col-sm-12'>
                     <button type="button" id='noticia_btn' class="btn btn-primary">
                        AGREGAR NOTICIA
                     </button>
                  </div>
               </div>

            </form>
            </div>
         </div>
      </div>
    
   </div>
   </div>

   <script src=<?php  echo $assets_dir."js/pickaday.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/admin_noticia_app.js"; ?> ></script>
   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
