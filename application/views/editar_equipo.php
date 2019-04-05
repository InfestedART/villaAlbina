<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'cpanel/';

   $error = $msg = '';
   $nombre_alert = $cargo_alert = $categoria_alert  = false;
   $id = $this->uri->segment(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Editar Miembro del Equipo';
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
            <h2>Editar Miembro del Equipo</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">   
            <a class='nav-btn' href='<?php echo base_url()."admin_equipo"; ?>'>
               <i class="fa fa-arrow-left mr-1"></i>
               Volver
            </a>
            <a
               class='nav-btn'
               href='<?php echo base_url()."admin_equipo/categorias_equipo"; ?>'
            >
               <i class="fa fa-tags mr-1"></i>
               Categorias
            </a>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">

            <h5 class='form-title'>Editar Miembro</h5>
            <?php
               $edit_equipo = $miembro->result_array()[0];
               $categorias_array = $categorias->result_array();
               echo form_open_multipart(
                  'admin_equipo/update_equipo/'.$id,
                  array('id' => 'form_equipo')
               );
            ?>
               <span id='equipo_alert' class='form-alert'>
                  <?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>

               <span id='equipo_msg' class='form-success'>
                  <?php echo $msg;?>
               </span>

              <div class='form-group row'>
                  <label class='form-label col-sm-3'>Nombre</label>
                  <div class='col-sm-9'>
                     <input
                        id='nombre'
                        name='nombre'
                        class="form-control
                        <?php echo $nombre_alert ? 'alert' : ''; ?>"
                        type='text'
                        value="<?php echo $edit_equipo['nombre']; ?>"
                     /> 
                  </div>
               </div>

                <div class='form-group row'>
                  <label class='form-label col-sm-3'>
                     Categoria
                  </label>
                  <div class='col-sm-9'>
                  <select
                     id='categoria'
                     name='categoria'
                     class="form-control
                     <?php echo $categoria_alert ? 'alert' : ''; ?>"
                  > 
                     <option value=''> Seleccione una opción</option>
                     <?php
                        foreach ($categorias_array as $cat) {
                           $is_selected =
                              $cat['id_categoria_equipo'] === $edit_equipo['id_categoria_equipo']
                                 ? 'selected'
                                 : '';
                           printf(
                              "<option value='%s' %s>%s</option>",
                              $cat['id_categoria_equipo'],
                              $is_selected,
                              $cat['categoria']
                           );
                        }
                     ?>
                  </select>
                  </div>
               </div>

              <div class='form-group row'>
                  <label class='form-label col-sm-3'>Cargo</label>
                  <div class='col-sm-9'>
                     <input
                        id='cargo'
                        name='cargo'
                        class="form-control
                        <?php echo $cargo_alert ? 'alert' : ''; ?>"
                        type='text'
                        value="<?php echo $edit_equipo['cargo']; ?>"
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>
                     Descripción
                  </label>
                  <div class='col-sm-9'>
                     <textarea
                        id='descripcion'
                        name='descripcion'
                        class="form-control"
                        ><?php
                           echo $edit_equipo['descripcion'];
                        ?></textarea>
                  </div>
               </div>

              <div class='form-group row'>
                  <label class='form-label col-sm-3'>Imagen</label>
                  <div class='col-sm-9'>
                  <?php $hayImagen = trim($edit_equipo['imagen'])!==''; ?>                  
                  <input
                     id='delete_imagen_equipo'
                     name='delete_imagen_equipo'
                     value='<?php echo $hayImagen ? '0' : '1'; ?>'
                     type='hidden'
                     readonly
                  /><?php                  
                  if($hayImagen) {     ?>
                     <img
                        id='preview_img'
                        class='form-show-img'
                        src="<?php echo $assets_dir.$edit_equipo['imagen']; ?>"
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
                  <div class='col-sm-9 offset-3'>
                  <button type="button" id='equipo_btn' class="btn btn-primary">
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

   <script src=<?php  echo $assets_dir."js/editar_equipo_app.js"; ?> ></script>
<?php
   $this->load->view('templates/admin_footer'); 
?>
