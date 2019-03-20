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
      $data['title'] = 'Panel de Control - Nuevo Libro';
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
            <h3>INSERTAR LIBRO</h3>
            <?php
               $categorias_array = $categorias->result_array();
               echo form_open_multipart(
                  'admin_libreria/insertar_libro',
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
                  /> 
               </div>

                <div class='form-group'>
                  <label class='form-label'>Categoria</label>
                  <select
                     id='categoria'
                     name='categoria'
                     class="form-control form-input
                     <?php echo $categoria_alert ? 'alert' : ''; ?>"
                  > 
                     <option value=''> Seleccione una opción</option>
                     <?php
                        foreach ($categorias_array as $cat) {
                           printf("<option value='%s'>%s</option>",
                                 $cat['id_categoriaLibro'],
                                 $cat['categoria']
                           );
                        }
                     ?>
                  </select>
               </div>

                <div class='form-group'>
                  <label class='form-label'>Autor(es) / Editorial</label>
                  <input
                     id='autor'
                     name='autor'
                     class="form-control form-input
                     <?php echo $autor_alert ? 'alert' : ''; ?>"
                     type='text'
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
                  /> 
               </div>

               <div class='form-group'>
                  <label class='form-label'>Paginas</label>
                  <input
                     id='paginas'
                     name='paginas'
                     class="form-control form-input"
                     type='number'                     
                  /> 
               </div>

                <div class='form-group'>
                  <label class='form-label'>Lugar</label>
                  <input
                     id='lugar'
                     name='lugar'
                     class="form-control form-input"
                     type='text'
                  /> 
               </div>

               <div class='form-group'>
                  <label class='form-label'>Año</label>
                  <input
                     id='year'
                     name='year'
                     class="form-control form-input"
                     type='number'                     
                  /> 
               </div>

               <div class='form-group'>
                  <label class='form-label'>Portada</label>
                  <input
                     id='portada'
                     name='portada'
                     class="form-control form-input"
                     type='file'
                  /> 
               </div>

               <div class="form-group">
                  <button type="button" id='libro_btn' class="btn btn-primary">
                     AGREGAR LIBRO
                  </button>
               </div>

            <?php echo form_close(); ?>
         </div>

      </div>      
   </div>
   </div>

   <script src=<?php  echo $assets_dir."js/admin_libreria_app.js"; ?> ></script>
   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
