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

	<div class='macro'>
		<div class="logo d-none d-md-block">
			<img src=<?php echo $dir.'img/logo2.png'; ?> />
		</div>

		<div class="logo d-xs-block d-md-none">
			<img src=<?php echo $dir.'img/logo_mobile.png'; ?> />
		</div>

		<div class="puerta">
			<a href=# id="abrir-puerta">
				<img src=<?php echo $dir.'img/abrir_puerta.png'; ?> />
			</a>
		</div>

		<div class="nav">
			<?php
			 	$paginas_array = $paginas->result_array();
			 	foreach ($paginas_array as $pagina) {
			 		printf(
			 			"<a href='#' class='nav__item'>
			 				<p class='nav__label'>%s</p>
			 			</a>",
			 			$pagina['titulo']
			 		);
			 	}
			 ?>
		</div>
	<div />
</body>

</html>