<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_convocatoria/';

   $error = $msg = '';
   $titulo_alert = $fecha_alert = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Convocatoria Nueva';
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
            <h2>Convocatoria Nueva</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">     
            <a class='nav-btn' href='<?php echo base_url()."admin_convocatoria"; ?>'>
               <i class="fa fa-arrow-left mr-1"></i>
               Volver
            </a>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">
          <h5 class='form-title'>Insertar Convocatoria</h5>
            <?php
               echo form_open_multipart(
                  'admin_convocatoria/insertar_convocatoria',
                  array('id' => 'form_convocatoria')
               );
            ?>
            <span id='convocatoria_alert' class='form-alert'>
               <?php echo $this->session->flashdata('error');?>
               <?php echo $error;?>
            </span>

            <div class='form-group row'>
               <label class='form-label col-sm-3'>Titulo:</label>
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
               <label class='form-label col-sm-3'>Fecha Límite:</label>
               <div class='col-sm-9'>
                  <input
                     id='fecha_limite'
                     name='fecha_limite'
                     class="form-control
                     <?php echo $fecha_alert ? 'alert' : ''; ?>"
                     type='text'
                  /> 
               </div>
            </div>

            <div class='form-group row'>
               <label class='form-label col-3'>Descripción:</label>
               <div class='col-sm-9'>
                  <textarea
                     id='descripcion'
                     name='descripcion'
                     class="form-control"
                     rows=4
                  /></textarea>
               </div>
            </div>

            <div class='form-group row'>
               <label class='form-label col-sm-3'>Imagen Destacada:</label>
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
               <label class='form-label col-sm-3'>
                  <div class=''>
                     Archivo(s) Adjunto(s):
                  </div>
                  <div class='mt-2'>
                     <span class='form-change-img m-0' id='add_file'>
                     Añadir
                     </span>
                  </div>
               </label>
               <div class='col-sm-9'>
                  <div id='file_array'>
                  </div>
               </div>
            </div>

             <div class='form-group row'>
               <label class='form-label col-12'>Contenido:</label>
               <div class='col-sm-12'>
                  <textarea
                     id='contenido'
                     name='contenido'
                     class="form-control"
                     rows=12
                  /></textarea>
               </div>
            </div>

            <div class='form-group row'>
               <div class='col-sm-12 text-right'>
                  <button type="button" id='convocatoria_btn' class="btn btn-primary">
                     AGREGAR CONVOCATORIA
                  </button>
               </div>
            </div>

            <?php echo form_close(); ?>

            </div>
         </div>
      </div>

   </div>
   </div>

   <script src=<?php  echo $assets_dir."js/pickaday.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/admin_convocatoria_app.js"; ?> ></script>
<?php
   $this->load->view('templates/admin_footer'); 
?>
