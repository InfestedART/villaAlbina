<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'cpanel/';

   $error = $msg = '';
   $titulo_alert = $precio_alert = $categoria_alert = $autor_alert = $precio_alert =false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Nuevo Miembro de Equipo';
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
             <h3>Nuevo miembro del equipo</h3>
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
            <h5 class='form-title'>Insertar Nuevo Miembro</h5>

            <span id='equipo_alert' class='form-alert'>
               <?php echo $this->session->flashdata('error');?>
            </span>
            <span id='equipo_msg' class='form-success'>
               <?php echo $msg;?>
            </span>
            
            <?php
               $categorias_array = $categorias->result_array();
               echo form_open_multipart(
                  'admin_equipo/insertar_equipo',
                  array(
                     'id' => 'form_equipo',
                     'class' => 'admin__form'
                  )
               );
            ?>

              <div class='form-group row'>
                  <label class='form-label col-sm-3'>Nombre</label>
                  <div class='col-sm-9'>
                     <input
                        id='nombre'
                        name='nombre'
                        class="form-control
                        <?php echo $titulo_alert ? 'alert' : ''; ?>"
                        type='text'
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Categoria</label>
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
                              printf("<option value='%s'>%s</option>",
                                    $cat['id_categoria_equipo'],
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
                        <?php echo $titulo_alert ? 'alert' : ''; ?>"
                        type='text'
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
                        ></textarea>
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Imagen</label>
                  <div class='col-sm-9'>
                     <input
                        id='imagen'
                        name='imagen'
                        class="form-control"
                        type='file'
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <div class='col-sm-9 offset-3'>
                  <button type="button" id='equipo_btn' class="btn btn-primary">
                     AGREGAR MIEMBRO
                  </button>
                  </div>
               </div>

            <?php echo form_close(); ?>

            </div>
         </div>
      </div>

   </div>      
   </div>

   <script src=<?php  echo $assets_dir."js/admin_equipo_app.js"; ?> ></script>
   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
