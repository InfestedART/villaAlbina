<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$assets_dir = base_url().'assets/';
	$admin_dir = base_url().'cpanel/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Espacio Simon I Patiño - Nuevo Usuario</title>

	<link rel="stylesheet" href=<?php  echo $assets_dir."css/bootstrap.css"; ?> />
	<link rel="stylesheet" href=<?php  echo $assets_dir."css/admin_style.css"; ?> />
   	<link rel="stylesheet" href=<?php  echo $assets_dir."css/style.css"; ?> />
</head>

<body>

<div id="container">

   <div class='admin-header'>
      <div>CPANEL</div>
      <div>Welcome <?php echo $this->session->userdata('usuario') ?></div>
   </div>

   <div class='admin-sidebar'>
      <a href='<?php echo $admin_dir."nuevo_usuario" ?>'> Usuarios </a>
   </div>

   <div class='container admin-container'>
      <div  class='row justify-content-md-center'>
         <h1>NUEVO USUARIO</h1>
      </div>
   </div>

</div>

</body>
</html>