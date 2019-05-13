<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'cpanel/';

   $error = $msg = '';
   $area_alert = $nombre_alert = $fuente_alert = $resumen_alert = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Noticia Nueva';
      $this->load->view('templates/meta', $data);
   ?>
   <link rel="stylesheet" href=<?php  echo $assets_dir."css/color-picker.min.css"; ?> />
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
            <h2>Nueva Área</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">     
            <a class='nav-btn' href='<?php echo base_url()."admin_area"; ?>'>
               <i class="fa fa-arrow-left mr-1"></i>
               Volver
            </a>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">
            <h5 class='form-title'>Insertar Area</h5>
            <?php
               echo form_open_multipart(
                  'admin_area/insertar_area',
                  array('id' => 'form_area')
               );
            ?>
               <span id='area_alert' class='form-alert'>
                  <?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>

               <span id='area_msg' class='form-success'>
                  <?php echo $msg;?>
               </span>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Nombre del Área:</label>
                  <div class='col-sm-9'>
                     <input
                        id='area'
                        name='area'
                        class="form-control
                        <?php echo $nombre_alert ? 'alert' : ''; ?>"
                        type='text'
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label
                     class="form-label col-sm-3"
                     id='color__input_label'
                  >
                     <div class=''>
                        Color:
                     </div>                   
                     <div class='checkbox mt-2'>
                        <label>
                           <input
                              name='color_switch'
                              id='color_switch'
                              type="checkbox"
                           />
                           <span id='color_switch_label'>
                              Sin Color 
                           </span>
                        </label> 
                     </div>
                  </label>
                  <div class='col-sm-9'>
                      <input
                        type="text"
                        name="real_color"
                        id='real_color'
                        class='hidden'
                        value=""
                     />
                     <input
                        id='color'
                        name='color'
                        class="form-control color_picker-input"
                        type='text'
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Imagen Destacada:</label>
                  <div class='col-sm-9'>
                     <input
                        id='imagen'
                        name='imagen'
                        class="form-control p-0"
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

               <div id='cont_container' class="form-group row">
                  <label class='form-label col-12'>Contenido:</label>
                  <div class='col-sm-12'>
                     <textarea
                        id='contenido'
                        name='contenido'
                        class="form-control fd-none"
                        rows=15                     
                     /></textarea>
                  </div>
               </div>

               <div class='form-group row'>
                  <div class='col-sm-9 offset-3 text-right'>
                     <button type="button" id='area_btn' class="btn btn-primary">
                        AGREGAR AREA
                     </button>
                  </div>
               </div>

            <?php echo form_close(); ?>

            </div>
         </div>
      </div>


   </div>
   </div>

   <?php
      $contenido_src = "https://cloud.tinymce.com/5/tinymce.min.js?apiKey=".$api_key;
   ?> 
   <script src=<?php echo $assets_dir."js/contenido.js"; ?> ></script>
   <script src=<?php echo $contenido_src; ?> ></script>
   <script src=<?php  echo $assets_dir."js/color-picker.min.js"; ?> ></script>
   <script src=<?php echo $assets_dir."js/galeria_app.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/admin_area_app.js"; ?> ></script>
<?php
   $this->load->view('templates/admin_footer'); 
?>

