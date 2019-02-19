<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$dir = base_url().'assets/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<title>Espacio Simon I Patiño - Ingresar</title>

	<link rel="stylesheet" href=<?php  echo $dir."css/bootstrap.css"; ?> />
</head>
<body>

<div id="container">

	<div class='row justify-content-md-center'>
      <div class='col-md-5'>
         <div class='card p-4 mt-5'>
            <h3>INGRESAR</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
               <span class='error'></span>
               <div class='form-group'>
                  <label>Nombre de Usuario</label>
                  <input class="form-control" type='text' name="usuario" />               
               </div>
               <div class='form-group'>
                  <label>Contraseña</label>
                  <input  class="form-control" type="password"  name="password" />          
               </div>
               <div class="form-group">
                  <input class="btn btn-primary" type='submit' name='submit' value='INGRESAR' />
               </div>
            </form>
         </div>
      </div>
   </div>

	<div id="body">
		<h4> Usuarios: </h4>
		<?php
		foreach ($usuarios as $usuario) {
			echo "<p>".$usuario['username']."</p>";
		}
		?>
		
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

 <script src=<?php  echo $dir."js/login_app.js"; ?> ></script>
</body>
</html>