<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'cpanel/';

   $error = $msg = '';
   $titulo_alert = $precio_alert = $categoria_alert = $autor_alert = $precio_alert =false;
   $id = $this->uri->segment(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Editar Libro';
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
      <div class="container">
      <div  class='row justify-content-md-center'>

        <div class='card col-12 col-md-11 p-2 mt-0 mt-md-5'>
         <div>
            <a class='nav-btn' href='<?php echo base_url()."admin_libreria"; ?>'>
               <i class="fa fa-arrow-left mr-1"></i>
               Volver
            </a>
            <a
               class='nav-btn'
               href='<?php echo base_url()."admin_libreria/categorias_libro"; ?>'
            >
               <i class="fa fa-tags mr-1"></i>
               Categorias
            </a>
         </div>
         </div>

         <div class='card col-12 col-md-11 p-4 mt-0 mt-md-5'>
            <h3>EDITAR LIBRO</h3>
            <?php
               $edit_libro = $libro->result_array()[0];
               $categorias_array = $categorias->result_array();
               echo form_open_multipart(
                  'admin_libreria/update_libro/'.$id,
                  array('id' => 'form_libro')
               );
            ?>
               <span id='libro_alert' class='form-alert'>
               	<?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>

               <span id='noticia_msg' class='form-success'>
                  <?php echo $msg;?>
               </span>

               <div class='form-group'>
                  <label class='form-label'>Titulo</label>
                  <input
                     id='titulo'
                     name='titulo'
                     class="form-control form-input
                     <?php echo $titulo_alert ? 'alert' : ''; ?>"
                     type='text'
                     value="<?php echo $edit_libro['titulo']; ?>"
                  /> 
               </div>

                <div class='form-group'>
                  <label class='form-label'>
                     Categoria
                     <? echo $edit_libro['id_categoriaLibro']." ".gettype($edit_libro['id_categoriaLibro']) ?>
                  </label>
                  <select
                     id='categoria'
                     name='categoria'
                     class="form-control form-input
                     <?php echo $categoria_alert ? 'alert' : ''; ?>"
                  > 
                     <option value=''> Seleccione una opción</option>
                     <?php
                        foreach ($categorias_array as $cat) {
                           $is_selected =
                              $cat['id_categoriaLibro'] === $edit_libro['id_categoriaLibro']
                                 ? 'selected'
                                 : '';
                           printf(
                              "<option value='%s' %s>%s</option>",
                              $cat['id_categoriaLibro'],
                              $is_selected,
                              $cat['categoria']
                           );
                        }
                     ?>
                  </select>
               </div>

                <div class='form-group'>
                  <label class='form-label'>Autor</label>
                  <input
                     id='autor'
                     name='autor'
                     class="form-control form-input
                     <?php echo $autor_alert ? 'alert' : ''; ?>"
                     type='text'
                     value="<?php echo $edit_libro['autor']; ?>"
                  /> 
               </div>

               <div class='form-group'>
                  <label class='form-label'>Precio (Bs.)</label>
                  <input
                     id='precio'
                     name='precio'
                     class="form-control form-input
                     <?php echo $precio_alert ? 'alert' : ''; ?>"
                     type='number'
                     value=<?php echo $edit_libro['precio']; ?>      
                  /> 
               </div>

               <div class='form-group'>
                  <label class='form-label'>Descripción</label>
                  <textarea
                     id='descripcion'
                     name='descripcion'
                     class="form-control form-input"
                     ><?php
                        echo $edit_libro['descripcion']; 
                     ?></textarea>
               </div>

               <div class='form-group'>
                  <label class='form-label'>Portada</label>
                  <?php $hayImagen = trim($edit_libro['portada'])!==''; ?>                  
                  <input
                     id='delete_imagen_libro'
                     name='delete_imagen_libro'
                     value='<?php echo $hayImagen ? '0' : '1'; ?>'
                     readonly
                  /><?php                  
                  if($hayImagen) {     ?>
                     <img
                        id='preview_img'
                        class='form-show-img'
                        src="<?php echo $assets_dir.$edit_libro['portada']; ?>"
                     />
                     <span class='form-change-img' id='hide_preview_btn'>
                        Quitar Imagen
                     </span>
                  <?php } ?>
                     <input
                        id='portada'
                        name='portada'
                        class="form-control form-input 
                           <?php if ($hayImagen) { echo 'hidden'; } ?>"
                        style="<?php if ($hayImagen) { echo 'width:calc(70% - 100px)'; } ?>"
                        type='file'
                     /> 
                     <span class='form-change-img hidden' id='show_preview_btn'>
                        Cancelar
                     </span>
               </div>

               <div class="form-group">
                  <button type="button" id='libro_btn' class="btn btn-primary">
                     GUARDAR CAMBIOS
                  </button>
               </div>

            <?php echo form_close(); ?>
         </div>

      </div>      
   </div>
   </div>

   <script src=<?php  echo $assets_dir."js/editar_libro_app.js"; ?> ></script>
   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
