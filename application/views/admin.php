<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$dir = base_url().'assets/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Espacio Simon I Patiño - Ingresar</title>

	<link rel="stylesheet" href=<?php  echo $dir."css/bootstrap.css"; ?> />
	<link rel="stylesheet" href=<?php  echo $dir."css/style.css"; ?> />
</head>
<body>

<div id="container">

	<div class='row justify-content-center no-gutters'>
      <div class='col-12 col-md-5'>
         <div class='card p-4 mt-5'>
            <h3>INGRESAR</h3>
            <form
            	id="login_form"
            	method="post"
            	action="<?php            	
            		echo site_url('admin/login');
            	?>"
            >
               <span class='alert' id='login_alert'></span>
               <div class='form-group'>
                  <label>Nombre de Usuario</label>
                  <input class="form-control" type='text' name="usuario" id="login_username"/>               
               </div>
               <div class='form-group'>
                  <label>Contraseña</label>
                  <input  class="form-control" type="password" name="password" id="login_password" />
               </div>
               <div class="form-group">
                  <button type='button' id="login_btn" class="btn btn-primary"> INGRESAR </button>
               </div>
            </form>
         </div>
      </div>
   </div>

</div>

</div>

 <script src=<?php  echo $dir."js/login_app.js"; ?> ></script>
</body>
</html>