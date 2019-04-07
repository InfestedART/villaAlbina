<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'cpanel/';

   $error = $msg = '';
   $portada_alert = $area_alert = false;
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
            <h2>Nueva Imagen de Portada</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">     
            <a class='nav-btn' href='<?php echo base_url()."admin_portada"; ?>'>
               <i class="fa fa-arrow-left mr-1"></i>
               Volver
            </a>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">
            <h5 class='form-title'>Insertar Imagen</h5>
            <?php
               echo form_open_multipart(
                  'admin_portada/insertar_portada',
                  array('id' => 'form_portada')
               );
            ?>
               <span id='portada_alert' class='form-alert'>
                  <?php echo $this->session->flashdata('error');?>
               </span>
               <span id='noticia_msg' class='form-success'>
                  <?php echo $msg;?>
               </span>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Imagen</label>
                  <div class='col-sm-9'>
                     <input
                        id='portada'
                        name='portada'
                        class="form-control"
                        type='file'
                     /> 
                  </div>
               </div>

                <div class='form-group row'>
                  <label class='form-label col-sm-3'>Area</label>
                  <div class='col-sm-9'>
                     <select
                        id='area'
                        name='area'
                        class="form-control
                        <?php echo $area_alert ? 'alert' : ''; ?>"
                     > 
                        <option value='0'> Seleccione una opción</option>
                        <?php
                           foreach ($areas as $area) {
                              printf("<option value='%s'>%s</option>",
                                    $area['id_area'],
                                    $area['area']
                              );
                           }
                        ?>
                     </select>
                  </div>

                  <div class='col-sm-9 offset-3'>
                     <select
                        id='area_hidden'
                        name='area_hidden'
                        disabled
                        class="form-control d-none"
                     > 
                        <option value='0'> Seleccione una opción</option>
                        <?php
                           foreach ($areas as $area) {
                              printf("<option value='%s'>%s</option>",
                                    $area['id_area'],
                                    $area['color_area']
                              );
                           }
                        ?>
                     </select>
                  </div>
               </div>

               <div class='form-group row'>
                  <div class='col-sm-9 offset-3'> 
                     <div class="checkbox">
                        <label>
                           <input
                              name='color_switch'
                              id='color_switch'
                              type="checkbox"
                              disabled
                           />
                           <span
                              id='color_switch_label'
                              class='form-label--disabled'
                           > Usar color del Area</span>
                           <span
                              class='color-preview ml-3 hidden'
                              id ='color_preview'
                           ></span>
                        </label>
                     </div>                    
                  </div>
               </div>

               <div class='form-group row'>
                  <label
                     class='form-label col-sm-3'
                     id='color__input_label'
                  > Color del Degradado
                  </label>
                  <div class='col-sm-9'>
                      <input
                        type="text"
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
                  <div class='col-sm-12'>
                     <button type="button" id='new_portada_btn' class="btn btn-primary">
                        AGREGAR IMAGEN
                     </button>
                  </div>
               </div>

            <?php echo form_close(); ?>
            </div>
         </div>
      </div>

   </div>
   </div>

   <script src=<?php  echo $assets_dir."js/color-picker.min.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/admin_portada_app.js"; ?> ></script>
   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
