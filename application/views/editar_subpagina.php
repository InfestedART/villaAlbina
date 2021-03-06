<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_pagina/';

   $error = $msg = '';
   $subpagina_alert = $nombre_alert = false;
   $id = $this->uri->segment(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Editar SubPágina';
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
            <h2>Editar SubPágina</h2>
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
            <h5 class='form-title'>Editar SubPágina</h5>
            <?php
               $edited_subpagina = $subpagina->result_array()[0];
               $paginas_array = $paginas->result_array();
               $modelos_array = $modelos->result_array();
               $galeria_array = $galeria->result_array();
               echo form_open_multipart(
                  'admin_pagina/update_subpagina/'.$id,
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
                        value="<?php echo $edited_subpagina['subpagina']; ?>"
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
                              $is_selected =
                                 $edited_subpagina['id_pagina'] === $pagina_parent['id_pagina']
                                    ? 'selected'
                                    : '';
                              printf("<option value='%s' %s>%s</option>",
                                 $pagina_parent['id_pagina'],
                                 $is_selected,
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
                        <option value='-1' <?php
                           echo $edited_subpagina['id_modelo'] == '-1' ? 'selected' : '';
                        ?> >
                           No mostrar ningún componente
                        </option>
                        <option
                           value='0' <?php
                           echo $edited_subpagina['id_modelo'] == '0' ? 'selected' : '';
                        ?> >
                           Componente Personalizado
                        </option>
                        <?php
                           foreach ($modelos_array as $modelo) {
                               $is_selected =
                                 $edited_subpagina['id_modelo'] === $modelo['id_modelo']
                                    ? 'selected'
                                    : '';
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
                           <?php echo $edited_subpagina['vertical'] == 0 ? "checked" : ""; ?>
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
                           <?php echo $edited_subpagina['vertical'] == 1 ? "checked" : ""; ?>
                        />
                     </div>
                  </div>
               </div>

               <div
                  id='imagen_container'
                  class="form-group row <?php echo $edited_subpagina['id_modelo'] == '0' ? '' : 'd-none' ?>"
               >
                  <label class='form-label col-sm-3'>Imagen Destacada: </label>
                  <div class='col-sm-9'>
                  <?php $hayImagen = trim($edited_subpagina['imagen']) !== ''; ?>
                      <input
                        id='delete_subpagina'
                        name='delete_subpagina'
                        value='<?php echo $hayImagen ? '0' : '1'; ?>'
                        type='hidden'
                        readonly
                     />
                  <?php                  
                  if($hayImagen) {     ?>
                     <img
                        id='preview_img'
                        class='form-show-img'
                        src="<?php echo $assets_dir.$edited_subpagina['imagen']; ?>"
                     />
                     <span class='form-change-img' id='hide_preview_btn'>
                        Quitar Imagen
                     </span>
                  <?php } ?>
                     <input
                        id='imagen'
                        name='imagen'
                        class="form-control d-inline-block align-top
                           <?php if ($hayImagen) { echo 'hidden'; } ?>"
                        style="<?php if ($hayImagen) { echo 'width:calc(70% - 100px)'; } ?>"
                        type='file'
                     />
                     <span class='form-change-img hidden' id='show_preview_btn'>
                        Cancelar
                     </span>
                      <input                                    
                        name='img_leyenda'
                        class='form-control mt-1'
                        type='text'
                        value='<?php echo $edited_subpagina["leyenda"]; ?>'
                        placeholder='Leyenda (opcional)'
                     />
                  </div>
               </div>

               <div
                  id='galeria_container'
                  class='form-group row <?php echo $edited_subpagina['id_modelo'] == '0' ? '' : 'd-none' ?>'
               >
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
                     <div id='galeria_preview' class='mb-2'>
                        <?php
                           foreach ($galeria_array as $index => $img) {
                              printf(
                              "<div class='galeria__item' id='galeriaItem_%s'>
                                 <div id='img_preview%s' class='galeria_img'>
                                    <input
                                       type='text'
                                       name='delete_img[]'
                                       id='delete_img_%s'
                                       class='hidden'
                                       value=0
                                       readonly
                                    >
                                    <input
                                       type='text'
                                       name='id_img[]'
                                       id='id_img_%s'
                                       class='hidden'
                                       value='%s'
                                       readonly
                                       style='width: 40px; height: 40px'
                                    >
                                    <img
                                       class='form-show-img mb-2'
                                       src='%s'
                                    />
                                    <input                                    
                                       name='leyenda[]'
                                       class='form-control galeria_input'
                                       type='text'
                                       value='%s'
                                    />
                                    <span
                                       class='form-change-img moveUp_img'
                                       id='subirImg_%s'
                                       title='SUBIR'
                                    > 
                                       <i class='fa fa-chevron-up' id='iconUp_%s'></i>
                                    </span>
                                    <span
                                       class='form-change-img moveDown_img'
                                       id='bajarImg_%s'
                                       title='BAJAR'
                                    > 
                                       <i class='fa fa-chevron-down' id='iconDown_%s'></i>
                                    </span>
                                    <span
                                       class='form-change-img hide_img'
                                       id='hideImg_%s'
                                    > Quitar
                                    </span>                                 
                                 </div>
                                 <div class='galeria_img hidden' id='restoreImg_div%s'>
                                    <span class='form-change-img restaurar_img' id='restoreImg_%s'>
                                    Restaurar
                                    </span>
                                 </div>
                              </div>",
                              $index, $index, $index,
                              $index, $img['id_img'],
                              $assets_dir.$img['imagen'],
                              $img['leyenda'],
                              $index, $index, $index, $index, $index, $index, $index
                              );  
                           }
                        ?>
                     </div>

                     <div id='img_array' class='hidden'>
                     </div> 

                     </div>
               </div>

               <div
                  id='cont_container'
                  class="form-group row 
                     <?php
                        echo (
                           $edited_subpagina['id_modelo'] == '0' ||
                           $edited_subpagina['id_modelo'] == '1' ||
                           $edited_subpagina['id_modelo'] == '5'
                        ) ? '' : 'd-none';
                     ?>"
               >
                  <label class='form-label col-12'>Contenido</label>
                  <div class='col-sm-12'>
                     <textarea
                        id='contenido'
                        name='contenido'
                        class="form-control fd-none"
                        rows=12                        
                     /><?php
                     echo $edited_subpagina['html'];
                     ?></textarea>
                  </div>
               </div>


              <div class='form-group row'>
                  <div class='col-sm-9 offset-3 text-right'>
                  <button type="button" id='subpagina_btn' class="btn btn-primary">
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

   <?php
      $contenido_src = "https://cloud.tinymce.com/5/tinymce.min.js?apiKey=".$api_key;
   ?> 
   <script src=<?php echo $assets_dir."js/contenidoe.js"; ?> ></script>
   <script src=<?php echo $assets_dir."js/galeria_app.js"; ?> ></script>
   <script src=<?php echo $contenido_src; ?> ></script>
   <script src=<?php  echo $assets_dir."js/admin_subpagina_app.js"; ?> ></script>
<?php
   $this->load->view('templates/admin_footer'); 
?>