<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->library('calendar');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'admin_libreria/';

   $error = $msg = '';
   $categoria_alert = $edit_categoria_alert = false;
   $id_categoria = $this->uri->segment(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Libreria';
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
      <div class='row justify-content-md-center'>

         <div class='card col-12 col-md-11 p-2 mt-0 mt-md-5'>
            <div>
            <a class='nav-btn' href='<?php echo $admin_dir."nuevo_libro"; ?>'>
               <i class="fa fa-plus mr-1"></i>
               Libro nuevo
            </a>
            </div>
         </div>         

         <div class='card col-12 col-md-11 p-2 mt-0 mt-md-4'>
            <h4>Categorias</h4>
            <table class='admin-table'>
               <thead>
                  <tr>
                     <th class='w-50'>Categoria</th>
                     <th>Status</th>
                     <th>Opciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $categorias_array = $categorias->result_array();
                     foreach ($categorias_array as $categoria) {
                        printf("
                           <tr>
                              <td>%s</td>",
                              $categoria['categoria']                              
                        );
                        if($categoria['status']) {
                           printf("
                              <td class='text-center'>
                                 <i class='fa fa-check'></i>
                              </td>"
                           );
                        } else {                           
                            printf("
                              <td class='text-center'>
                                 <i class='fa fa-times'></i>
                              </td>"
                           );
                        }                      
                        printf("
                              <td class='text-center'><a href='%scategorias_libro/%s'>
                                 <i class='fa fa-edit'></i>
                              </a></td>
                           </tr>",
                           $admin_dir, $categoria['id_categoriaLibro']
                        );
                     }  
                  ?> 
               </tbody>
            </table> 
         </div>

         <div class="card col-12 col-md-11 p-2 mt-0 mt-md-4 <?php 
            if (!$id_categoria) { echo 'd-none'; }
         ?>">
            <h5>Editar Categoria</h5>
            <?php
               if ($selected_categoria) {
                  $curr_cat = $selected_categoria->result_array()[0];
            ?>
            <span id='edit_categoria_alert' class='form-alert'>
                  <?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>
             <?php
               echo form_open(
                  'admin_libreria/editar_categoria',
                  array('id' => 'form_edit_categoria')
               );
            ?>
            <label for='edit_categoria' class='form-label-inline'>
               Nombre de la Categoria:
            </label>
            <input
               id='edit_id_categoria'
               name='edit_id_categoria'               
               type='hidden'
               value="<?php echo $id_categoria; ?>"
            />
            <input
               id='edit_categoria'
               name='edit_categoria'
               class="form-control form-input-inline
               <?php echo $edit_categoria_alert ? 'alert' : ''; ?>"
               type='text'
               value="<?php echo $curr_cat['categoria']; ?>"
            /> 
            <button type="button" id='edit_categoria_btn' class="btn btn-primary btn-inline">
               ACTUALIZAR
            </button>
            <?php
               echo form_close();
               }
            ?>
         </div>

         <div class="card col-12 col-md-11 p-2 mt-0 mt-md-4 ">
            <h5>Categoria Nueva</h5>
               <span id='categoria_alert' class='form-alert'>
                  <?php echo $this->session->flashdata('error');?>
                  <?php echo $error;?>
               </span>
             <?php
               echo form_open(
                  'admin_libreria/insertar_categoria',
                  array('id' => 'form_categoria')
               );
            ?>
            <label class='form-label-inline'>Nombre de la Categoria:</label>
            <input
               id='categoria'
               name='categoria'
               class="form-control form-input-inline
               <?php echo $categoria_alert ? 'alert' : ''; ?>"
               type='text'               
            /> 
            <button type="button" id='categoria_btn' class="btn btn-primary btn-inline">
               AGREGAR
             </button>
         </div>

      </div>      
   </div>
   </div>
   <script src=<?php  echo $assets_dir."js/admin_cat_libro.js"; ?> ></script>

   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
