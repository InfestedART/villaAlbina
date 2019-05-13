<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_media/';

   $error = $msg = '';
   $titulo_alert = $fecha_alert = $ifecha_alert = false;
   $id = $this->uri->segment(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Editar Multimedia';
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
            <h2>Editar Archivo Multimedia</h2>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">     
            <a class='nav-btn' href='<?php echo base_url()."admin_media"; ?>'>
               <i class="fa fa-arrow-left mr-1"></i>
               Volver
            </a>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">
            <h5 class='form-title'>Editar Archivo Multimedia</h5>

            <?php
               $edit_media = $media->result_array()[0];
               echo form_open_multipart(
                  'admin_media/update_media/'.$id,
                  array('id' => 'form_media')
               );
            ?>
            <span id='media_alert' class='form-alert'>
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
                     value="<?php echo $edit_media['titulo'] ?>"
                  /> 
               </div>
            </div>

            <div class='form-group row'>
               <label class='form-label col-sm-3'>Enlace:</label>
               <div class='col-sm-9'>
                  <input
                     id='enlace'
                     name='enlace'
                     class="form-control"
                     type='text'
                     value="<?php echo $edit_media['enlace'] ?>"
                  /> 
               </div>
            </div>

             <div class='form-group row'>
               <div class='col-sm-12 text-right'>
                  <button type="button" id='media_btn' class="btn btn-primary">
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
   <script src=<?php echo $assets_dir."js/admin_media_app.js"; ?> ></script>

<?php
   $this->load->view('templates/admin_footer'); 
?>
