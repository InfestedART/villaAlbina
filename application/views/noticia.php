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

		<div class="flecha izquierda d-none d-md-block">
			<a href='#'>
				<img src="<?php echo $dir.'img/flecha_izquierda_2.png'; ?>" />
			</a>
		</div>

		<div class="flecha derecha d-none d-md-block">
			<a href='#'>
				<img src="<?php echo $dir.'img/flecha_derecha_2.png'; ?>" />
			</a>
		</div>

		<div class='row'>
			<div class='col-md-8'>
			<h3 class='titulo-pagina titulo__small'><?php echo $noticia->titulo ?> </h3>
			</div>
		</div>
				
		<div class="row">
			<div class="col-md-8 text-left mb-4">
			<p> <?php echo $noticia->resumen ?></p>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-sm-6 col-md-4">
				<img
					src='<?php echo $dir.$noticia->imagen ?>'
					class='publicacion__imagen'
				>
			</div>

			<div class="col-12 col-sm-6 col-md-8">
				<div class='publicacion__column'>
					<p class='publicacion__fuente  mb-2'>
						<?php echo $noticia->fuente ?>
					</p>
					<p class='publicacion__fuente'>
						<?php echo $noticia->fecha ?>
					</p>
					<p> <?php echo $noticia->contenido ?> </p>

				</div>
			</div>
		</div>	
	</div>
	
<?php
	$this->load->view('templates/footer'); 
?>

</body>

</html>