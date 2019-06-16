<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $assets_dir = base_url().'assets/';
   $admin_dir = base_url().'admin_cartelera/';
   $error='';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Cartelera PDF';
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
            <h2>Cartelera</h2>
            </div>
         </div>
      </div>    

      <div class='card admin-content'>
         <div class='row no-gutters'>
         <div class="col-12">

            <table class='admin-table'>

            <thead>
            <tr>
               <th>Archivo</th>
               <th>Tamaño</th>
               <th>Fecha</th>
               <th class='text-center'>Status</th>
               <th class='text-center'>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cartelerass_array = $carteleras->result_array();
            foreach ($cartelerass_array as $cartelera) {
               $units = ['bytes', 'Kb', 'Mb', 'Gb'];
               $filesize = $cartelera['size'];
               $i=0;
               while (floor($filesize / 1024) > 1) {
                  $filesize = floor($filesize / 1024);
                  $i++;
               }
               printf("
                  <tr>
                     <td>
                        <a target='_blank' href='%s'>%s</a>
                     </td>
                     <td>%s %s</td>
                     <td>%s</td>",
                  $assets_dir.$cartelera['enlace'],
                  $cartelera['enlace'],
                  $filesize, $units[$i],
                  $cartelera['fecha']
               );
               $sub_toggle = $cartelera['status'] ? '0' : '1';
               printf(
                  "<td class='text-center'>
                     <a href='%s' class='status %s'>
                     <span class='slider %s'/>
                     </a>
                  </td>
                  <td class='text-center''>
                     <a href='%sdelete_cartelera/%s' title='ELIMINAR'>
                     <i class='fa fa-trash'></i>
                     </a>
                  </td>
               </tr>",                        
               $admin_dir.'toggle_cartelera/'.$cartelera['id_cartelera'].'?toggle='.$sub_toggle,
               $cartelera['status'] ? 'status__on' : 'status__off',
               $cartelera['status'] ? 'slider__on' : 'slider__off',
               $admin_dir, $cartelera['id_cartelera']
               );                     
            }
            ?>     
            </tbody>
            </table>

         </div>
         </div>
      </div>

      <div class='card admin-content'>
         <div class='row no-gutters'>
            <div class="col-12">   
               <h5>Insertar Cartelera pdf</h5>
               <span id='agenda_alert' class='form-alert'>
                  <?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>
                <?php
                  echo form_open_multipart(
                     'admin_cartelera/insertar_cartelera',
                     array('id' => 'form_agenda')
                  );
               ?>

               <div class='row mt-3'>
                  <div class='col-12'>
                  <label class='form-label-inline'>
                     <span> ¿Cartelera activa? </span>
                     <input name='activo' id='activo' type="checkbox" />
                  </label>
                  </div>   
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>Archivo PDF:</label>
                  <div class='col-sm-9'>
                     <input
                        id='enlace'
                        name='enlace'
                        class="form-control"
                        type='file'
                     /> 
                  </div>
               </div>

               <div class='form-group row'>
                  <label class='form-label col-sm-3'>
                     Fecha: (Mes - Año)
                  </label>
                  <div class='col-sm-9'>
                     <input
                        id='fecha'
                        name='fecha'
                        class="form-control"
                        type='text'
                     /> 
                  </div>
               </div>

            <div class='form-group row'>
               <div class='col-sm-12 text-right'>
                  <button type="button" id='agenda_btn' class="btn btn-primary">
                     INSERTAR ARCHIVO
                  </button>
               </div>
            </div>

            </div>
         </div>
      </div>      

   </div>
   </div>
   <script src=<?php  echo $assets_dir."js/admin_agenda_app.js"; ?> ></script>
<?php
   $this->load->view('templates/admin_footer'); 
?>

