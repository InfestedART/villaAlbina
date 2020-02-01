<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_pagina/';

   $error = $msg = '';
   $subpagina_alert = $nombre_alert = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Nueva SubPágina';
      $this->load->view('templates/meta', $data);
   ?>
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
            <h2>Nueva SubPágina</h2>
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
            <h5 class='form-title'>Insertar SubPágina</h5>
            <?php
               $subpaginas_array = $subpaginas->result_array();
               $paginas_array = $paginas->result_array();
               $modelos_array = $modelos->result_array();
               echo form_open_multipart(
                  'admin_pagina/insertar_subpagina',
                  array('id' => 'form_subpagina')
               );
            ?>
               <span id='subpagina_alert' class='form-alert'>
                  <?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Título:</label>
                  <div class='col-sm-9'>
                     <input
                        id='subpagina'
                        name='subpagina'
                        class="form-control
                        <?php echo $subpagina_alert ? 'alert' : ''; ?>"
                        type='text'
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Página Padre:</label>
                  <div class='col-sm-9'>
                     <select
                        id='pagina'
                        name='pagina'
                        class="form-control capitalize
                        <?php echo $pagina_alert ? 'alert' : ''; ?>"
                     > 
                        <option value=''>Seleccione una Opción</option>
                        <?php
                        foreach ($paginas_array as $pagina_parent) {
                           $isSelected = $pagina_parent['id_pagina'] == $get_pagina ? 'selected' : '';
                           printf("<option value='%s' %s>%s</option>",
                                 $pagina_parent['id_pagina'],
                                 $isSelected,
                                 $pagina_parent['titulo']
                           );
                        }
                        ?>
                     </select>
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Componente Mostrado:</label>
                  <div class='col-sm-9'>
                     <select
                        id='modelo'
                        name='modelo'
                        class="form-control capitalize"
                     > 
                        <option value='-1'>No mostrar ningún componente</option>
                        <option value='0' selected>Componente Personalizado</option>
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

               <div id='vertical_container' class='form-group row'>
                  <label class='form-label col-sm-3'>Orientación:</label>
                  <div class='col-sm-9'>
                     <div class='form-check form-check-inline'>
                        <label class='admin__vertical form-check-label' for='orientacion_horizontal'>
                           Horizontal  
                        </label>
                        <input
                           id='orientacion_horizontal'
                           name='orientacion'
                           class="form-check"
                           type='radio'
                           value='horizontal'
                           checked
                        />
                     </div>
                     <div class='form-check form-check-inline'>
                        <label class='admin__vertical form-check-label' for='orientacion_vertical'>
                           Vertical  
                        </label>
                        <input
                           id='orientacion_vertical'
                           name='orientacion'
                           class="form-check"
                           type='radio'
                           value='vertical'
                        />
                     </div>
                  </div>
               </div>

               <div id='imagen_container' class='form-group row'>
                  <label class='form-label col-sm-3'>Imagen Destacada: </label>
                  <div class='col-sm-9'>
                     <input
                        id='imagen'
                        name='imagen'
                        class="form-control"
                        type='file'
                     /> 
                  </div>
                  <div class='mt-1 col-sm-9 offset-sm-3'>
                     <input
                        id='img_leyenda'
                        name='img_leyenda'
                        class="form-control"
                        type='text'
                        placeholder='Leyenda (opcional)'
                     /> 
                  </div>
               </div>

               <div id='galeria_container' class='form-group row'>
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

               <div id='cont_container' class='form-group row'>
                  <label class='form-label col-12'>Contenido</label>
                  <div class='col-sm-12'>
                     <textarea
                        id='contenido'
                        name='contenido'
                        class="form-control fd-none"                      
                     /></textarea>
                  </div>
               </div>

               <div class='form-group row'>
                  <div class='col-sm-9 offset-3 text-right'>
                     <button type="button" id='subpagina_btn' class="btn btn-primary">
                        AGREGAR SUBPAGINA
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

   <script src=<?php  echo $assets_dir."js/admin_subpagina_app.js"; ?> ></script>
   <script src=<?php echo $assets_dir."js/contenido.js"; ?> ></script>
   <script src=<?php echo $assets_dir."js/galeria_app.js"; ?> ></script>
   <script src=<?php echo $contenido_src; ?> ></script>
<?php
   $this->load->view('templates/admin_footer'); 
?>

