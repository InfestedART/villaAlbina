<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_area/';

   $error = $msg = '';
   $subarea_alert = $nombre_alert = false;
   $id = $this->uri->segment(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Editar Subárea';
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
            <h3>Editar Subárea</h3>
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
            <h5 class='form-title'>Editar Subárea</h5>
            <?php
               $edited_subarea = $subarea->result_array()[0];
               $areas_array = $areas->result_array();
               $galeria_array = $galeria->result_array();
               echo form_open_multipart(
                  'admin_area/update_subarea/'.$id,
                  array('id' => 'form_subarea')
               );
            ?>
               <span id='subarea_alert' class='form-alert'>
                  <?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>

               <span id='subarea_msg' class='form-success'>
                  <?php echo $msg;?>
               </span>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Nombre de la Subárea:</label>
                  <div class='col-sm-9'>
                     <input
                        id='subarea'
                        name='subarea'
                        class="form-control
                           <?php echo $nombre_alert ? 'alert' : ''; ?>"
                        type='text'
                        value="<?php echo $edited_subarea['subarea']; ?>"
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
                        <?php echo $categoria_alert ? 'alert' : ''; ?>"
                     > 
                        <option value=''> Seleccione una opción</option>
                        <?php
                           foreach ($areas_array as $area) {
                              $is_selected =
                                 $area['id_area'] === $edited_subarea['id_area']
                                    ? 'selected'
                                    : '';
                              printf(
                                 "<option value='%s' %s>%s</option>",
                                 $area['id_area'],
                                 $is_selected,
                                 $area['area']
                              );
                           }
                        ?>
                     </select>
                  </div>
               </div>

               <div id='imagen_container' class="form-group row">
                  <label class='form-label col-sm-3'>Imagen Destacada</label>
                  <div class='col-sm-9'>
                  <?php $hayImagen = trim($edited_subarea['imagen'])!==''; ?>
                      <input
                        id='delete_imagen'
                        name='delete_imagen'
                        value='<?php echo $hayImagen ? '0' : '1'; ?>'
                        type='hidden'
                        readonly
                     />
                  <?php                  
                  if($hayImagen) {     ?>                     
                     <img
                        id='preview_img'
                        class='form-show-img'
                        src="<?php echo $assets_dir.$edited_subarea['imagen']; ?>"
                     />
                     <span class='form-change-img' id='hide_preview_btn'>
                        Quitar Imagen
                     </span>
                  <?php } ?>
                     <input
                        id='imagen'
                        name='imagen'
                        class="form-control d-inline-block p-0 align-top
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
                           <div class='galeria__item' id='galeriaItem_%s'>
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

               <div id='cont_container' class="form-group row">
                  <label class='form-label col-12'>Contenido:</label>
                  <div class='col-sm-12'>
                     <textarea
                        id='contenido'
                        name='contenido'
                        class="form-control fd-none"
                        rows=15                     
                     /><?php
                     echo $edited_subarea['html'];
                     ?></textarea>
                  </div>
               </div>

              <div class='form-group row'>
                  <div class='col-sm-9 offset-3 text-right'>
                  <button type="button" id='subarea_btn' class="btn btn-primary">
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
   <script src=<?php echo $contenido_src; ?> ></script>
   <script src=<?php echo $assets_dir."js/galeria_app.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/admin_subarea_app.js"; ?> ></script>
<?php
   $this->load->view('templates/admin_footer'); 
?>

