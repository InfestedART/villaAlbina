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
	<div class="container">
		<div class="top-nav">
			BARRA DE NAVEGACION
		</div>
		<div class="bread-crumb">
			Espacio Patiño > Noticia > <?php echo $noticia->titulo ?>
		</div>

		<img src='<?php echo $dir.$noticia->imagen_destacada ?>'>	
		<h3> <?php echo $noticia->titulo ?></h4>
		<!-- p> <?php var_dump($noticia); ?></p -->
		<p><?php echo $noticia->fuente ?></p>
		<p><?php echo $noticia->resumen ?></p>
	
	</div>
	
</body>

</html>