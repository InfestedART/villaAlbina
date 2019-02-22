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
	<title>Espacio Simon I Patiño - Cpanel</title>

	<link rel="stylesheet" href=<?php  echo $dir."css/bootstrap.css"; ?> />
	<link rel="stylesheet" href=<?php  echo $dir."css/admin_style.css"; ?> />
   <link rel="stylesheet" href=<?php  echo $dir."css/style.css"; ?> />
</head>
<body>

<div id="container">

   <div class='admin-header'>
      <div>CPANEL</div>
      <div>Welcome <?php echo $this->session->userdata('usuario') ?></div>
   </div>

   <div class='admin-sidebar'>
      <a href=#> Usuarios </a>
   </div>
   <div class='container admin-container'>
      <div  class='row justify-content-md-center'>
         <h1>CPANEL</h1>
          
         </p>
      </div>
   </div>

</div>

</body>
</html>