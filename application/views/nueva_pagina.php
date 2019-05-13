<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_pagina/';

   $error = $msg = '';
   $pagina_alert = $titulo_alert = $modelo_alert = $resumen_alert = false;
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
            <h2>Nueva Página</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">     
            <a class='nav-btn' href='<?php echo base_url()."admin_pagina"; ?>'>
               <i class="fa fa-arrow-left mr-1"></i>
               Volver
            </a>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">

            <h5 class='form-title'>Insertar Página</h5>
            <?php
               $modelos_array = $modelos->result_array();
               echo form_open_multipart(
                  'admin_pagina/insertar_pagina',
                  array('id' => 'form_pagina')
               );
            ?>
               <span id='pagina_alert' class='form-alert'>
                  <?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>

               <span id='area_msg' class='form-success'>
                  <?php echo $msg;?>
               </span>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Título de la Página:</label>
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
                  <label class='form-label col-sm-3'>Componente Mostrado:</label>
                  <div class='col-sm-9'>
                     <select
                        id='modelo'
                        name='modelo'
                        class="form-control capitalize
                        <?php echo $modelo_alert ? 'alert' : ''; ?>"
                     > 
                        <option value=''>No mostrar ningún componente</option>
                        <?php
                           foreach ($modelos_array as $modelo) {
                              printf("<option value='%s'>%s</option>",
                                    $modelo['id_modelo'],
                                    $modelo['nombre_modelo']
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
                           />
                           <span id='color_switch_label'>
                              Sin Color 
                           </span>
                        </label>
                     </div>                    
                  </div>
               </div>

               <div class='form-group row'>
                  <label
                     class='form-label col-sm-3'
                     id='color__input_label'
                  > Color:
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
                  <div class='col-sm-9 offset-3'>
                     <div class="checkbox">
                        <label>
                           <input
                              name='mostrar_navbar'
                              id='mostrar_navbar'
                              type="checkbox"
                              checked
                           />
                           <span>
                             Mostrar en la Barra de Navegación
                           </span>
                        </label>
                     </div>                    
                  </div>
               </div>

               <div class='form-group row'>
                  <div class='col-sm-9 offset-3'>
                     <div class="checkbox">
                        <label>
                           <input
                              name='mostrar_home'
                              id='mostrar_home'
                              type="checkbox"
                              checked
                           />
                           <span>
                             Mostrar en Página Principal
                           </span>
                        </label>
                     </div>                    
                  </div>
               </div>

               <div class='form-group row'>
                  <div class='col-sm-9 offset-3'>
                     <button type="button" id='pagina_btn' class="btn btn-primary">
                        AGREGAR PAGINA
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
   <script src=<?php  echo $assets_dir."js/admin_pagina_app.js"; ?> ></script>
<?php
   $this->load->view('templates/admin_footer'); 
?>

