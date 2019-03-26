<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'cpanel/';

	$error = '';
	$user_alert = $pass_alert = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Panel de Control - Usuarios';
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
         <div class='card col-md-6 p-4 mt-5'>
            <h3>NUEVO USUARIO</h3>
            <form
            	id='newUser_form'            	
            	method="post"
	         	action="<?php
            		echo site_url('admin_usuario/insert_usuario');
            	?>"
            >
               <span  id='newUser_alert' class='form-alert'>
               	<?php echo $this->session->flashdata('error');?>
               </span>
               <div class='form-group'>
                  <label>Nombre de Usuario</label>
                  <input
                     id='newUser_username'
                     name='usuario'
                     class="form-control <?php echo $user_alert ? 'alert' : '' ?>"
                     type='text'
                     name="usuario"
                  /> 
               </div>
               <div class='form-group'>
                  <label>Contraseña</label>
                  <input 
                     id='newUser_password'
                     name="password"
                     class="form-control <?php echo $pass_alert ? 'alert' : '' ?>"
                     type="password"
                  />
               </div>
               <div class='form-group'>
                  <label>Confirmar Contraseña</label>
                  <input 
                     id='newUser_confirmPass'
                     name='confirmPass'
                     class="form-control <?php echo $pass_alert ? 'alert' : '' ?>"
                     type="password" 
                     name="confirm_password"
                  />
               </div>
               <div class="form-group">
                  <button type="button" id='newUser_btn' class="btn btn-primary">INGRESAR</button>
               </div>
            </form>
         </div>
      </div>      
   </div>
   </div>

   <script src=<?php  echo $assets_dir."js/nuevo_usuario_app.js"; ?> ></script>
   <?php
      $this->load->view('templates/admin_footer'); 
   ?>
