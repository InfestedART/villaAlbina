<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'cpanel/';

   $error = $msg = '';
   $titulo_alert = $fecha_alert = $fuente_alert = $resumen_alert = false;
   $id = $this->uri->segment(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Editar Noticia';
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
            <h3>Editar Noticia</h3>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12"> 
            <a class='nav-btn' href='<?php echo base_url()."admin_noticia"; ?>'>
               <i class="fa fa-arrow-left mr-1"></i>
               Volver
            </a>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">
            <h5 class='form-title'>Editar Noticia</h5>
            <?php
               $news = $noticia->result_array()[0];
               $galeria_array = $galeria->result_array();
               echo form_open_multipart(
                  'admin_noticia/update_noticia/'.$id,
                  array('id' => 'form_noticia')
               );
            ?>
               <span id='noticia_alert' class='form-alert'>
               	<?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>

               <span id='noticia_msg' class='form-success'>
                  <?php echo $msg;?>
               </span>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Titulo</label>
                  <div class='col-sm-9'>
                     <input
                        id='titulo'
                        name='titulo'
                        class="form-control
                           <?php echo $titulo_alert ? 'alert' : ''; ?>"
                        type='text'
                        value="<?php echo $news['titulo']; ?>"
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Fecha</label>
                  <div class='col-sm-9'>
                     <input
                        id='fecha'
                        name='fecha'
                        class="form-control
                           <?php echo $fecha_alert ? 'alert' : ''; ?>"
                        type='text'
                        value="<?php echo $news['fecha']; ?>"
                     /> 
                  </div>
               </div>

                <div class='form-group row'>
                  <label class='form-label col-sm-3'>Fuente</label>
                  <div class='col-sm-9'>
                     <input
                        id='fuente'
                        name='fuente'
                        class="form-control
                           <?php echo $fuente_alert ? 'alert' : ''; ?>"
                        type='text'
                        value="<?php echo $news['fuente']; ?>"
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Resumen</label>
                  <div class='col-sm-9'>
                     <textarea
                        id='resumen'
                        name='resumen'
                        class="form-control
                           <?php echo $resumen_alert ? 'alert' : ''; ?>"
                     /><?php echo trim($news['resumen']); ?></textarea>
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Imagen Destacada</label>
                  <div class='col-sm-9'>
                  <?php $hayImagen = trim($news['imagen'])!==''; ?>
                  <input
                     id='delete_noticia'
                     name='delete_noticia'
                     value='<?php echo $hayImagen ? '0' : '1'; ?>'
                     type='hidden'
                     readonly
                  />
                  <?php                  
                  if($hayImagen) {     ?>                     
                     <img
                        id='preview_img'
                        class='form-show-img'
                        src="<?php echo $assets_dir.$news['imagen']; ?>"
                     />
                     <span class='form-change-img' id='hide_preview_btn'>
                        Quitar Imagen
                     </span>
                  <?php } ?>
                     <input
                        id='imagen'
                        name='imagen'
                        class="form-control
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
                  <label class='form-label col-12'>Contenido</label>
                  <div class='col-12'>
                     <textarea
                        id='contenido'
                        name='contenido'
                        class="form-control"
                        rows=12
                     /><?php echo trim($news['contenido']); ?></textarea>
                  </div>
               </div>

               <div class='form-group row'>
                  <button type="button" id='noticia_btn' class="btn btn-primary">
                     GUARDAR CAMBIOS
                  </button>
               </div>

            </form>
            </div>
         </div>
      </div>
  
   </div>
   </div>

   <script src=<?php  echo $assets_dir."js/pickaday.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/admin_noticia_app.js"; ?> ></script>
   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
