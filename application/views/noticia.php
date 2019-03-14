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

	<?php
		$data['paginas'] = $paginas;
		$this->load->view('templates/navbar', $data);
	?>
	<div class="seccion container px-4 p-md-0 pt-0 pt-md-3 mb-4">

		<div class="publicacion__flecha izquierda d-none d-md-block">
			<a href='#'>
				<img src="<?php echo $dir.'img/flecha_izquierda_2.png'; ?>" />
			</a>
		</div>

		<div class="publicacion__flecha derecha d-none d-md-block">
			<a href='#'>
				<img src="<?php echo $dir.'img/flecha_derecha_2.png'; ?>" />
			</a>
		</div>

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
				<p class='publicacion__fuente'> <?php echo $noticia->fecha ?> </p>
			</div>

			<div class="col-12 col-sm-6 col-md-9">
			<div class='publicacion__column'>
				<p> <?php echo $noticia->resumen ?> </p>
				<p> <?php echo $noticia->contenido ?> </p>
				<p class='publicacion__fuente'>
					<?php echo $noticia->fuente ?>
				</p>
			</div>
		</div>

		</div>
	
	</div>
	
<?php
	$this->load->view('templates/footer'); 
?>

</body>

</html>