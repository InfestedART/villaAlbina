<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_evento/';

   $error = $msg = '';
   $titulo_alert = $fecha_alert = $ifecha_alert = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Evento Nuevo';
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
            <h2>Evento Nuevo</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">     
            <a class='nav-btn' href='<?php echo base_url()."admin_evento"; ?>'>
               <i class="fa fa-arrow-left mr-1"></i>
               Volver
            </a>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">
            <h5 class='form-title'>Insertar Evento</h5>
            <?php
               $areas_array = $areas->result_array();
               echo form_open_multipart(
                  'admin_evento/insertar_evento',
                  array('id' => 'form_evento')
               );
            ?>
            <span id='evento_alert' class='form-alert'>
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
               <label class='form-label col-sm-3'>
                  Área:
               </label>
               <div class='col-sm-9'>
               <select
                  id='area'
                  name='area'
                  class="form-control
                  <?php echo $categoria_alert ? 'alert' : ''; ?>"
               > 
                  <option value=''> Seleccione una opción</option>
                  <?php
                     foreach ($areas_array as $area) {
                        printf(
                           "<option value='%s'>%s</option>",
                           $area['id_area'],
                           $area['area']
                        );
                     }
                  ?>
               </select>
               </div>
            </div>

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
                  <button type="button" id='evento_btn' class="btn btn-primary">
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
   <script src=<?php echo $assets_dir."js/admin_evento_app.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/galeria_app.js"; ?> ></script>
   <script src=<?php echo $assets_dir."js/contenido.js"; ?> ></script>
   <script src=<?php echo $contenido_src; ?> ></script>

<?php
   $this->load->view('templates/admin_footer'); 
?>
