<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_evento/';

   $error = $msg = '';
   $titulo_alert = $fecha_alert = $ifecha_alert = false;
   $id = $this->uri->segment(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Editar Evento';
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
            <h2>Editar Evento</h2>
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
            <h5 class='form-title'>Editar Evento</h5>
           <?php
               $edit_evento = $evento->result_array()[0];
               $areas_array = $areas->result_array();
               $fechas_array = $fechas->result_array();
               $galeria_array = $galeria->result_array();
               echo form_open_multipart(
                  'admin_evento/update_evento/'.$id,
                  array('id' => 'form_evento')
               );
            ?>

            <span id='evento_alert' class='form-alert'>
               <?php echo $this->session->flashdata('error');?>
               <?php echo $error;?>
            </span>

            <span id='evento_msg' class='form-success'>
               <?php echo $msg;?>
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
                     value="<?php echo $edit_evento['titulo']; ?>"
                  /> 
               </div>
            </div>

           <div class='form-group row'>
               <label class='form-label col-sm-3'>
                  Area
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
                        $is_selected =
                           $area['id_area'] === $edit_evento['id_area']
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

            <?php
               $repetir_hidden = $edit_evento['id_area'] != 5 ? 'hidden' : '';
            ?>
            <div class='row mt-3 <? echo $repetir_hidden; ?>' id='repetir_div'>
               <div class='col-9 offset-3'>
               <label class='form-label-inline'>
                  <span> ¿Mostrar en Eventos y Cartelera? </span>
                  <input
                     name='repetir'
                     id='repetir'
                     type="checkbox"
                     <?php echo $edit_evento['repetir'] ? 'checked' : ''; ?>
                  />
               </label>
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
                     value="<?php echo $edit_evento['organizador']; ?>"
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
                           <?php echo $edit_evento['rango'] ? 'checked' : ''; ?>
                        />
                        <span> Rango </span>
                     </label>
                  </div> 
               </div>

               <div class='col-sm-9'>
                  <div id="fecha_rango" class="<?php echo $edit_evento['rango'] ? '' : 'hidden'; ?>">
                     <span class='label_short'>Del</span>
                     <input
                        id='fecha_ini'
                        name='fecha_ini'
                        class="form-control input_short
                        <?php echo $ifecha_alert ? 'alert' : ''; ?>"
                        type='text'
                        value="<?php echo $edit_evento['fecha_ini']; ?>"
                     /> 
                     <span class='label_short'>al</span>
                     <input
                        id='fecha_fin'
                        name='fecha_fin'
                        class="form-control input_short"
                        type='text'
                        value="<?php echo $edit_evento['fecha_fin']; ?>"
                     /> 
                  </div>

                  <div id='fecha_array' class="<?php echo $edit_evento['rango'] ? 'hidden' : ''; ?>">
                     <div id='fecha_div0'>
                        <input
                           id='fecha0'
                           name='fecha[]'
                           class="form-control input_dinamic mb-2
                           <?php echo $fecha_alert ? 'alert' : ''; ?>"
                           type='text'
                           value="<?php
                              echo $fechas_array ? $fechas_array[0]['fecha'] : '';
                           ?>"
                        /> 
                        <a href='#' id='add_fecha'>
                           <i class='button_add fa fa-plus'></i>
                        </a>
                     </div>
                     <?php
                        foreach ($fechas_array as $index => $fecha) {
                           if ($index > 0) {
                           printf("
                              <div id='fecha_div%s' class='fecha_div'>
                                 <input
                                    id='fecha%s'
                                    name='fecha[]'
                                    class='form-control input_dinamic'                                 
                                    type='text'
                                    value='%s'
                                 /> 
                                 <a href='#' id='%s'>
                                    <i id='i_%s' class='button_add fa fa-minus'></i>
                                 </a>
                              </div>",
                              $index,
                              $index,
                              $fecha['fecha'],
                              'remove_fecha'.$index,
                              $index
                              );                            
                           }
                        }
                     ?>
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
                     value="<?php echo $edit_evento['hora']; ?>"
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
                     value="<?php echo $edit_evento['lugar']; ?>"
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
                     ><?php
                        echo $edit_evento['descripcion'];
                     ?></textarea>
               </div>
            </div>

           <div class='form-group row'>
               <label class='form-label col-sm-3'>Información Destacada:</label>
               <div class='col-sm-9'>
                  <textarea
                     id='info'
                     name='info'
                     class="form-control"
                     ><?php
                        echo $edit_evento['info'];
                     ?></textarea>
               </div>
            </div>

           <div class='form-group row'>
               <label class='form-label col-sm-3'>Imagen Destacada:</label>
               <div class='col-sm-9'>
               <?php $hayImagen = trim($edit_evento['imagen'])!==''; ?>                  
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
                     src="<?php echo $assets_dir.$edit_evento['imagen']; ?>"
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
                              class='form-show-img d-block mb-2'
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
                           >  <i class='fa fa-chevron-up' id='iconUp_%s'></i>
                           </span>
                           <span
                              class='form-change-img moveDown_img'
                              id='bajarImg_%s'
                              title='BAJAR'
                           >  <i class='fa fa-chevron-down' id='iconDown_%s'></i>
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

            <div class='form-group row'>
               <label class='form-label col-12'>Contenido:</label>
               <div class='col-sm-12'>
                  <textarea
                     id='contenido'
                     name='contenido'
                     class="form-control"
                     rows=12
                  /><?php
                     echo $edit_evento['contenido'];
                  ?></textarea>
               </div>
            </div>

            <div class='form-group row'>
               <div class='col-sm-12 text-right'>
                  <button type="button" id='evento_btn' class="btn btn-primary">
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
   <script src=<?php  echo $assets_dir."js/pickaday.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/admin_evento_app.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/galeria_app.js"; ?> ></script>
   <script src=<?php echo $assets_dir."js/contenidoe.js"; ?> ></script>
   <script src=<?php echo $contenido_src; ?> ></script> 

<?php
   $this->load->view('templates/admin_footer'); 
?>
