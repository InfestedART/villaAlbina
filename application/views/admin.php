<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$dir = base_url().'assets/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      $data['title'] = 'Ingresar';
      $this->load->view('templates/meta', $data);
   ?>
</head>
<body class='login__body'>

<div id="container">

	<div class='row justify-content-center no-gutters'>
      <div class='login-form card p-4 mt-3 mt-md-5'>
         <h3 class='mb-3'>INGRESAR</h3>
         <form
         	id="login_form"
         	method="post"
         	action="<?php            	
         		echo site_url('admin/login');
         	?>"
         >
            <span class='form-alert' id='login_alert'>
            	 <?php echo $this->session->flashdata('error');?>
            </span>
            <div class='form-group'>
               <label>Nombre de Usuario: </label>
               <input class="form-control" type='text' name="usuario" id="login_username"/>               
            </div>
            <div class='form-group'>
               <label>Contraseña: </label>
               <input  class="form-control" type="password" name="password" id="login_password" />
            </div>
            <div class="form-group">
               <button type='button' id="login_btn" class="btn btn-primary float-right mt-2">
                  INGRESAR
               </button>
            </div>
         </form>

      </div>
   </div>

</div>

</div>

 <script src=<?php  echo $dir."js/login_app.js"; ?> ></script>
</body>
</html>