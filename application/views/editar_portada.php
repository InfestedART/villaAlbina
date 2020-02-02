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
      $data['title'] = 'Panel de Control - Editar Imagen de Portada';
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
            <h3>Editar Imagen de Portada</h3>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12"> 
            <a class='nav-btn' href='<?php echo base_url()."admin_portada"; ?>'>
               <i class="fa fa-arrow-left mr-1"></i>
               Volver
            </a>
            </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">
            <h5 class='form-title'>Editar Imagen</h5>
            <?php
               $portada = $imagen_portada->result_array()[0];
               $color_padre = '';
               echo form_open_multipart(
                  'admin_portada/update_portada/'.$id,
                  array('id' => 'form_portada')
               );
            ?>
               <span id='portada_alert' class='form-alert'>
                  <?php echo $this->session->flashdata('error');?>
               </span>
               <span id='noticia_msg' class='form-success'>
                  <?php echo $msg;?>
               </span>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Imagen</label>
                  <div class='col-sm-9'>
                     <img
                        id='preview_img'
                        class='form-show-img'
                        src="<?php echo $assets_dir.'uploads/'.$portada['imagen']; ?>"
                     />
                  </div>
               </div>

               <div class='form-group row'>
                  <label
                     class="form-label col-sm-3"
                     id='color__input_label'
                  > Color del Degradado:
                  </label>
                  <div class='col-sm-9'>
                     <?php
                        $color = $default_color;
                        $helper = 'Color por Defecto';
                        if ($portada['color']) {
                           $color = $portada['color'];
                           $helper = 'Color Personalizado';
                        } 
                     ?>
                     <input
                        type="text"
                        name="real_color"
                        id='real_color'
                        class='hidden'
                        value="<?php echo $color; ?>"
                     />
                     <input
                        id='color'
                        name='color'
                        class="form-control color_picker-input"
                        type='text'
                        style='background-color: <? echo $color; ?>'
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <div class='col-sm-12'>
                     <button type="submit" id='new_portada_btn' class="btn btn-primary">
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
   <script src=<?php  echo $assets_dir."js/admin_portada_app.js"; ?> ></script>
<?php
   $this->load->view('templates/admin_footer'); 
?>
