<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Espacio Simon I Patiño</title>

   <link rel="stylesheet" href=<?php  echo $dir."css/bootstrap.css"; ?> />
   <link rel="stylesheet" href=<?php  echo $dir."css/style.css"; ?> />
</head>

<body>
	<div class="portada" style="background-image: url(<?php  echo $dir.'img/portada1.jpg'; ?>)" />		

	<div class='container'>
		<div class="logo d-none d-md-block">
			<img src=<?php echo $dir.'img/logo2.png'; ?> />
		</div>

		<div class="logo d-xs-block d-md-none">
			<img src=<?php echo $dir.'img/logo_mobile.png'; ?> />
		</div>

		<div class="nav">
		</div>
	<div />
</body>

</html>