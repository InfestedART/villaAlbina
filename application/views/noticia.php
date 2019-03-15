<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';

$noticia = $news[0];
?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = $noticia->titulo;
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>

	<?php
		$data['paginas'] = $paginas;
		$this->load->view('templates/navbar', $data);
	?>
	<div class="seccion seccion__last container px-4 pt-0 pt-md-3">

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

		<div class='row'>
			<div class='timeline'>
				<a class='timeline__punto'>
					<span></span>
				</a>
				<span class='timeline__linea'></span>
				<a class='timeline__punto'>
					<span></span>
				</a>
				<span class='timeline__linea'></span>
				<a class='timeline__punto'>
					<span></span>
				</a>
			</div>
		</div>
	
	</div>
	
<?php
	$this->load->view('templates/footer'); 
?>

</body>

</html>