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

              <div class='form-group row'>
                  <div class='col-sm-9 offset-3'>
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

   <script src=<?php  echo $assets_dir."js/admin_subarea_app.js"; ?> ></script>
<?php
   $this->load->view('templates/admin_footer'); 
?>

