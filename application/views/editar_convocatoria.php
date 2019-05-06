<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_convocatoria/';

   $error = $msg = '';
   $titulo_alert = $fecha_alert  = false;
   $id = $this->uri->segment(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Editar Convocatoria';
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
            <h2>Editar Convocatoria</h2>
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
            <h5 class='form-title'>Editar Convocatoria</h5>

               <?php
                  $edit_convo = $convocatoria->result_array()[0];
                  $galeria_array = $galeria->result_array();
                  $archivos_array = $archivos->result_array();

                  echo form_open_multipart(
                     'admin_convocatoria/update_convocatoria/'.$id,
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
                        value="<?php echo $edit_convo['titulo']; ?>"
                     /> 
                  </div>
               </div>       
   
              <div class='form-group row'>
                  <label class='form-label col-sm-3'>Fecha:</label>
                  <div class='col-sm-9'>
                     <input
                        id='fecha_limite'
                        name='fecha_limite'
                        class="form-control
                        <?php echo $fecha_alert ? 'alert' : ''; ?>"
                        type='text'
                        value="<?php echo $edit_convo['fecha_limite']; ?>"
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
                        rows=4
                     /><?php
                        echo $edit_convo['descripcion'];
                     ?></textarea>
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Imagen Destacada:</label>
                  <div class='col-sm-9'>
                  <?php $hayImagen = trim($edit_convo['imagen'])!==''; ?>   
                  <input
                     id='delete_imagen'
                     name='delete_imagen'
                     value='<?php echo $hayImagen ? '0' : '1'; ?>'
                     type='hidden'
                     readonly
                  /><?php  
                  if($hayImagen) {     ?>
                     <img
                        id='preview_img'
                        class='form-show-img'
                        src="<?php echo $assets_dir.$edit_convo['imagen']; ?>"
                     />
                     <span class='form-change-img' id='hide_preview_btn'>
                        Quitar Imagen
                     </span>
                  <?php } ?>
                     <input
                        id='imagen'
                        name='imagen'
                        class="form-control d-inline-block
                           <?php if ($hayImagen) { echo 'hidden'; } ?>"
                        style="<?php if ($hayImagen) { echo 'width:calc(70% - 100px)'; } ?>"
                        type='file'
                     /> 
                     <span class='form-change-img hidden' id='show_preview_btn'>
                        Cancelar
                     </span>
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

                  <div id='galeria_preview' class='mb-2'>
                     <?php
                        foreach ($galeria_array as $index => $img) {
                           printf("
                              <div id='img_preview%s' class='galeria_img'>
                                 <input
                                    type='text'
                                    name='delete_img[]'
                                    id='delete_img_%s'
                                    class='hidden'
                                    value=0
                                    readonly
                                 >
                                 <img
                                    id='preview_img'
                                    class='form-show-img d-block mb-2'
                                    src='%s'
                                 />                                 
                                 <span class='form-change-img hide_img' id='hideImg_%s'>
                                    Quitar
                                 </span>                                 
                              </div>
                              <div class='galeria_img hidden' id='restoreImg_div%s'>
                                 <span class='form-change-img restaurar_img' id='restoreImg_%s'>
                                 Restaurar
                                 </span>
                              </div>",
                              $index, $index,
                              $assets_dir.$img['imagen'],
                              $index, $index, $index
                              );  
                        }
                     ?>
                  </div>

                  <div id='img_array' class='hidden'>
                     <div id='img_div0' class='mb-2'>
                     </div>
                  </div> 

                  </div>
               </div>

               <div class='form-group row'>

                   <label class='form-label col-sm-3'>
                     <div class=''>
                       Archivo(s) Adjunto(s):
                     </div>
                     <div class='mt-2'>
                        <span class='form-change-img ml-0' id='add_file'>
                        Añadir
                        </span>
                     </div>
                  </label>

                  <div class='col-sm-9'>
                     <div id='archivos_preview'>
                      <?php
                        foreach ($archivos_array as $index => $adjunto) {
                           printf("
                              <div id='file_preview%s' class='archivo_span'>
                                 <input
                                    type='text'
                                    name='delete_file[]'
                                    id='delete_file_%s'
                                    class='hidden'
                                    readonly
                                    value=0
                                 >
                                 <span class='archivo_name'>%s</span>                              
                                 <span class='form-change-img hide_file' id='hideFile_%s'>
                                    Quitar
                                 </span>                                 
                              </div>
                              <div class='archivo_span hidden' id='restoreFile_div%s'>
                                 <span class='form-change-img restaurar_file' id='restoreFile_%s'>
                                 Restaurar
                                 </span>
                              </div>",
                              $index, $index,
                              substr(strrchr($adjunto['archivo'], "/"), 1),
                              $index, $index, $index
                              );  
                        }
                     ?>
                     </div>
                     <div id='file_array' class='hidden'>
                        <div id='file_div0'>
                        </div>
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
                     /><?php
                        echo $edit_convo['contenido'];
                     ?></textarea>
                  </div>
               </div>

               <div class='form-group row'>
                  <div class='col-sm-12 text-right'>
                     <button type="button" id='convocatoria_btn' class="btn btn-primary">
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

   <script src=<?php  echo $assets_dir."js/pickaday.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/admin_convocatoria_app.js"; ?> ></script>
<?php
   $this->load->view('templates/admin_footer'); 
?>
