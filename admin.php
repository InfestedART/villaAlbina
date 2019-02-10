<!DOCTYPE html>
<?php
   include('config.php');
   session_start();
?>
<head>
	<meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Espacio Simon I Patiño</title>

   <link rel="stylesheet" href="css/bootstrap.css" />
</head>

<body>
	<div class='container'>
		<h1>ADMIN</h1>
      <div class='row justify-content-md-center'>
         <div class='col-md-5'>
            <div class='card p-4 mt-4'>
               <form>
                  <h4> INGRESAR </h4>
                  <div class='form-group'>
                     <label>Nombre de Usuario</label>
                     <input class="form-control" />
                  </div>
                  <div class='form-group'>
                     <label>Contraseña</label>
                     <input  class="form-control" type="password" />
                  </div>
                  <div class="form-group">
                     <input class="btn btn-primary" type='submit' value='INGRESAR' />
                  </div>
               </form>
            </div>
         </div>
      </div>

	<div />
</body>

</html>