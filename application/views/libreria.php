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
			<div class='col-md-3'>
			<h3 class='titulo-pagina'> LIBRERIA </h3>	
			</div>
			<div class='col-md-6 text-left'>
				<p>
				Bienvenidos al catálogo de publicaciones de la Fundación Simón I. Patiño,  que reúne los títulos de su producción intelectual (impresa y audiovisual), tanto de las Editions Patiño de Ginebra, como de los distintos Centros que desarrollan su actividad en Bolivia. 
				</p>
				<p>Adquiere las publicaciones en el CEDOAL. </p>
			</div>
		</div>

		<div class='row pt-2 pb-4'>
			<div class="buscador col-md-6 offset-3"><?php
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
					<div class='eternal-carrousel__slide'>
						<div
							class='portada-libro col-md-5'
							style='background-image: url(\"%s%s\")'
						>						
						</div>
						<div class='container-libro col-md-7'>
							<h4>%s</h4>
							<p>%s</p>
							<p>%s</p>
							<p>%s</p>
							<p class='container-libro__precio'>Bs. %s</p>",
					$dir, $libro['portada'],
					$libro['titulo'],					
					$libro['autor'],
					$libro['descripcion'],
					$libro['categoria'],
					$libro['precio']
				);
				$this->load->view('templates/libro_footer', $data);
				echo "</div>
					</div>";
			}
			?>
			</div>
		</div>

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
	
<?php
	$this->load->view('templates/footer'); 
?>

</body>

</html>