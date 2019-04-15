<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_area/';

   $error = $msg = '';
   $nombre_alert  = false;
   $id = $this->uri->segment(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Editar Area';
      $this->load->view('templates/meta', $data);
   ?>
   <link rel="stylesheet" href=<?php  echo $assets_dir."css/color-picker.min.css"; ?> />
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
            <h3>Editar Area</h3>
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
            <h5 class='form-title'>Editar Área</h5>
            <?php
               $edited_area = $area->result_array()[0];
               echo form_open_multipart(
                  'admin_area/update_area/'.$id,
                  array('id' => 'form_area')
               );
            ?>
               <span id='area_alert' class='form-alert'>
                  <?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>

               <span id='area_msg' class='form-success'>
                  <?php echo $msg;?>
               </span>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Nombre del Área:</label>
                  <div class='col-sm-9'>
                     <input
                        id='area'
                        name='area'
                        class="form-control
                        <?php echo $nombre_alert ? 'alert' : ''; ?>"
                        type='text'
                        value="<?php echo $edited_area['area']; ?>"
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <div class='col-sm-9 offset-3'> 
                     <div class="checkbox">
                        <?php                     
                           $checked = !$edited_area['color_area'];
                        ?>
                        <label>
                           <input
                              name='color_switch'
                              id='color_switch'
                              type="checkbox"
                              <?php
                                 echo $checked ? 'checked' : '';
                              ?>
                           />
                           <span id='color_switch_label'>
                              Sin Color 
                           </span>
                        </label>
                     </div>                    
                  </div>
               </div>

               <div class='form-group row'>
                  <label
                     class="form-label col-sm-3 <?php
                        echo $checked ? 'form-label--disabled' : ''; ?>"
                     id='color__input_label'
                  > Color:
                  </label>
                  <div class='col-sm-9'>
                      <input
                        type="text"
                        name="real_color"
                        id='real_color'
                        class='hidden'
                        value="<?php echo $edited_area['color_area']; ?>"
                     />
                     <input
                        id='color'
                        name='color'
                        class="form-control color_picker-input"
                        type='text'
                        <?php echo $checked ? 'disabled' : ''; ?>
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <div class='col-sm-9 offset-3'>
                     <button type="button" id='area_btn' class="btn btn-primary">
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

   <script src=<?php  echo $assets_dir."js/color-picker.min.js"; ?> ></script>
   <script src=<?php  echo $assets_dir."js/admin_area_app.js"; ?> ></script>
<?php
   $this->load->view('templates/admin_footer'); 
?>

