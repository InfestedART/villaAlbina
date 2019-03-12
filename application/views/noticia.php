<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';

$noticia = $news[0];
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Espacio Simon I Patiño - Noticia</title>

   <link rel="stylesheet" href=<?php  echo $dir."css/bootstrap.css"; ?> />
   <link rel="stylesheet" href=<?php  echo $dir."css/style.css"; ?> />
</head>

<body>

	<div class='top-nav'>
		<a href=# id="flecha-abajo">
			<img src=<?php echo $dir.'img/flecha_abajo.png'; ?> />
		</a>
	</div>

	<div class="container">

		<!-- div class="bread-crumb">
			Espacio Patiño > Noticia > <?php echo $noticia->titulo ?>
		</div -->

		<div class='row'>
			<h3 class='titulo-pagina'> NOTICIA </h3>
		</div>
				
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h3 class='publicacion__titulo'> <?php echo $noticia->titulo ?></h3>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-sm-6 col-md-3">
				<img
					src='<?php echo $dir.$noticia->imagen_destacada ?>'
					class='publicacion__imagen'
				>	
			</div>
			<div class="col-12 col-sm-6 col-md-3">
				<p class='publicacion__resumen'><?php echo $noticia->resumen ?></p>
			</div>
			<div class="col-12 col-md-3">
				3
			</div>		
			<div class="col-12 col-md-3">
				<p class='publicacion__fuente'>
					<?php echo $noticia->fuente ?>
				</p>
			</div>
		</div>
	
	</div>
	
</body>

</html>