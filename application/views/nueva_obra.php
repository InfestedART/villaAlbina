<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $assets_dir = base_url().'assets/';
   $admin_dir = base_url().'admin_obras/';

   $error = $msg = '';
   $titulo_alert = $fecha_alert = $ifecha_alert = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Obras de Teatro';
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
            <h2>Obra de Teatro Nueva</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">     
            <a class='nav-btn' href='<?php echo base_url()."admin_obras"; ?>'>
               <i class="fa fa-arrow-left mr-1"></i>
               Volver
            </a>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">
            <h5 class='form-title'>Insertar Obra</h5>
            <?php
               echo form_open_multipart(
                  'admin_obras/insertar_obra',
                  array('id' => 'form_obra')
               );
            ?>
            <span id='obra_alert' class='form-alert'>
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

            <!-- div class='row mt-3' id='repetir_div'>
               <div class='col-12'>
               <label class='form-label-inline'>
                  <span> ¿Mostrar en Agenda? </span>
                  <input class='ml-3' name='repetir' id='repetir' type="checkbox" />
               </label>
               </div>   
            </div -->

            <div class='form-group row'>
               <label class='form-label col-sm-3'>Organiza:</label>
               <div class='col-sm-9'>
                  <input
                     id='organizador'
                     name='organizador'
                     class="form-control"
                     type='text'
                  /> 
               </div>
            </div>

            <div class='form-group row'>

               <div class='col-sm-3'>
                  <label class='form-label'> Fecha(s): </label>
                  <div class="checkbox">
                     <label>
                        <input
                           name='rango'
                           id='rango'
                           type="checkbox"
                           checked
                        />
                        <span> Rango </span>
                     </label>
                  </div> 
               </div>

               <div class='col-sm-9'>
                  <div id='fecha_rango'>
                     <span class='label_short'>Del</span>
                     <input
                        id='fecha_ini'
                        name='fecha_ini'
                        class="form-control input_short
                        <?php echo $ifecha_alert ? 'alert' : ''; ?>"
                        type='text'
                     /> 
                     <span class='label_short'>al</span>
                     <input
                        id='fecha_fin'
                        name='fecha_fin'
                        class="form-control input_short"
                        type='text'
                     /> 
                  </div>
               
                  <div id='fecha_array' class='hidden'>
                     <div id='fecha_div0'>
                        <input
                           id='fecha0'
                           name='fecha[]'
                           class="form-control input_dinamic mb-2
                           <?php echo $fecha_alert ? 'alert' : ''; ?>"
                           type='text'
                        /> 
                        <a href='#' id='add_fecha'>
                           <i id='i_0' class='button_add fa fa-plus'></i>
                        </a>
                     </div>
                  </div>
               </div>
            </div>

            <div class='form-group row'>
               <label class='form-label col-sm-3'>Hora:</label>
               <div class='col-sm-9'>
                  <input
                     id='hora'
                     name='hora'
                     class="form-control"
                     type='text'
                  /> 
               </div>
            </div>

            <div class='form-group row'>
               <label class='form-label col-sm-3'>Lugar:</label>
               <div class='col-sm-9'>
                  <input
                     id='lugar'
                     name='lugar'
                     class="form-control"
                     type='text'
                  /> 
               </div>
            </div>

           <div class='form-group row'>
               <label class='form-label col-sm-3'>Descripción:</label>
               <div class='col-sm-9'>
                  <textarea
                     id='descripcion'
                     name='descripcion'
                     class="form-control"
                     ></textarea>
               </div>
            </div>

           <div class='form-group row'>
               <label class='form-label col-sm-3'>Información Destacada:</label>
               <div class='col-sm-9'>
                  <textarea
                     id='info'
                     name='info'
                     class="form-control"
                     ></textarea>
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
               <label class='form-label col-12'>Contenido</label>
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
                  <button type="button" id='obra_btn' class="btn btn-primary">
                     AGREGAR EVENTO
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
   <script src=<?php echo $assets_dir."js/pickaday.js"; ?> ></script>
   <script src=<?php echo $assets_dir."js/admin_obra_app.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/galeria_app.js"; ?> ></script>
   <script src=<?php echo $assets_dir."js/contenido.js"; ?> ></script>
   <script src=<?php echo $contenido_src; ?> ></script>

<?php
   $this->load->view('templates/admin_footer'); 
?>
