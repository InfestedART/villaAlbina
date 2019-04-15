<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_pagina/';

   $error = $msg = '';
   $pagina_alert = $titulo_alert  = false;
   $id = $this->uri->segment(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Editar Página';
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
            <h3>Editar Página</h3>
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

            <h5 class='form-title'>Editar Página</h5>
            <?php
               $modelos_array = $modelos->result_array();
               $edited_pagina = $pagina->result_array()[0];
               echo form_open_multipart(
                  'admin_pagina/update_pagina/'.$id,
                  array('id' => 'form_pagina')
               );
            ?>
               <span id='pagina_alert' class='form-alert'>
                  <?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>

               <span id='pagina_msg' class='form-success'>
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
                        value="<?php echo $edited_pagina['titulo']; ?>"
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
                              $is_selected = $modelo['id_modelo'] === $edited_pagina['id_modelo']
                                 ? 'selected' : '';
                               printf("<option value='%s' %s>%s</option>",
                                    $modelo['id_modelo'],
                                    $is_selected,
                                    $modelo['nombre_modelo']
                              );
                           }
                        ?>
                     </select>
                  </div>
               </div>

               <div class='form-group row'>
                  <div class='col-sm-9 offset-3'> 
                     <div class="checkbox"><?php                           
                           $checked = !$edited_pagina['color'];
                        ?>
                        <label>
                           <input
                              name='color_switch'
                              id='color_switch'
                              type="checkbox"
                              <?php echo $checked ? 'checked' : '' ?>
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
                     <?php $color = $edited_pagina['color'] ? $edited_pagina['color'] : $default_color; ?>
                      <input
                        type="text"
                        name="real_color"
                        id='real_color'
                        class='hidden'
                        value="<?php echo $color; ?>"
                     />
                     <input
                        id='color'
                        name='color'
                        class="form-control color_picker-input"
                        type='text'
                        style='background-color: <? echo $color; ?>'
                        <?php echo $checked ? 'disabled' : ''; ?>
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
                              <?php echo $edited_pagina['mostrar_navbar'] ? 'checked' : '' ?>
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
                              <?php echo $edited_pagina['mostrar_home'] ? 'checked' : '' ?>
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
                        GUARDAR CAMBIOS
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

