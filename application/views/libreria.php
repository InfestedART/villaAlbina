<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';

?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = 'Noticias';
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>

	<?php
		$data['paginas'] = $paginas;
		$this->load->view('templates/navbar', $data);
	?>
	<div class="seccion container seccion__last px-4 pt-0 pt-md-3">

		<div class='row mt-4'>

			<div class='col-md-6'>
				<h3 class='titulo-pagina'> LIBRERIA </h3>
				<p class='text-left'>
				Bienvenidos al catálogo de publicaciones de la Fundación Simón I. Patiño,  que reúne los títulos de su producción intelectual (impresa y audiovisual), tanto de las Editions Patiño de Ginebra, como de los distintos Centros que desarrollan su actividad en Bolivia. Puedes adquirir todas estas publicaciones en el CEDOAL. </p>
			</div>

			<div class="buscador mt-3 col-md-6 text-right"><?php
					echo form_open(
	               'libreria',
	               array('id' => 'form_buscar_libro')
	            ); ?>
					<input class='buscador__input' name='search_libro' id='search_libro'/>
					<button class='buscador__button' type='submit' id='search_libro_btn'>
						<i class="fa fa-search"></i>
					</button><?php
					echo form_close(); ?>
			</div>

		</div>

		<?php $show_no_results = sizeof($libros) < 1 ? '' : 'd-none'; ?>
		<div class='no-results <?php echo $show_no_results; ?>'>
			<p>No se encontraron resultados con esos parametros de busqueda</p>
			<a class='no-result__volver' href=''>
				Ver todas los Libros
			</a>
		</div>

		<div class='eternal-carrousel mt-4'>
			<div class='row'>
			<?php
			foreach ($libros as $libro) {
				printf("
					<div class='col-md-6 mb-3'>
						<div class='portada-libro'>
							<img src='%s%s'>
						</div>
						<div class='container-libro'>
							<h4 class='libro__subtitulo'>%s</h4>
							<p>%s</p>
							<p>%s</p>
							<p>%s</p>
							<p 	class='container-libro__precio'
								style='background-color: %s'
							>Bs. %s</p>
						</div>
					</div>",
					$dir, $libro['imagen'],
					$libro['titulo'],
					$libro['autor'],
					$libro['descripcion'],
					$libro['categoria'],
					$color,
					$libro['precio']
				);
				// $this->load->view('templates/libro_footer', $data);
			}
			?>
			</div>
		</div>

		<div class='publicacion__nav row'>
			<div class='col-12 text-center'>
				<a href='#' class='showing_nav'> << </a>
				<?php
					$nav=[1, 2, 3, 4, 5];
					foreach ($nav as $page) {
						printf("<a href='#' class='showing_nav'>%s</a>", $page);
					}
				?>
				<a href='#' class='showing_nav'> >> </a>
			</div>
		</div>

	</div>
	
<?php
	$this->load->view('templates/footer'); 
?>

</body>

</html>