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
		$navbar_data['paginas'] = $paginas;
		$navbar_data['selected_pagina'] = $libro_data;
		$navbar_data['search'] = $search;
		$navbar_data['search_cat'] = $search_cat;
		$this->load->view('templates/navbar', $navbar_data);
	?>
	<div class="seccion container seccion__last px-4 pt-0 pt-md-3">

		<div class='row mt-4'>

			<div class='col-md-8'>
				<h3 class='titulo-pagina' style="color: <?php echo $color; ?>">
					LIBRERÍA
				</h3>
				<p class='text-left'>
				Bienvenidos al catálogo de publicaciones de la Fundación Simón I. Patiño,  que reúne los títulos de su producción intelectual (impresa y audiovisual), tanto de las Editions Patiño de Ginebra, como de los distintos Centros que desarrollan su actividad en Bolivia. Puedes adquirir todas estas publicaciones en el CEDOAL. </p>
			</div>

		</div>

		<?php $show_no_results = sizeof($libros) < 1 ? '' : 'd-none'; ?>
		<div class='no-results <?php echo $show_no_results; ?>'>
			<p>No se encontraron resultados con esos parámetros de busqueda</p>
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
						<div class='container-libro mb-4 mb-md-0'>
							<h4 class='libro__subtitulo'>%s</h4>
							<p class='libro__categoria'>%s</p>
							%s
							%s
							<p>%s</p>
							%s
							<p>%s</p>
							<p 	class='container-libro__precio'
								style='background-color: %s'
							>Bs. %s</p>
						</div>
					</div>",
					$dir, $libro['imagen'],
					$libro['titulo'],
					$libro['categoria'],
					$libro['autor'],
					$libro['editorial'] ? '<p>'.$libro['editorial'].'</p>' : '',
					$libro['year'] ? '<p>'.$libro['year'].'</p>' : '',
					$libro['paginas'] ? '<p>'.$libro['paginas'].' páginas</p>' : '',
					$libro['descripcion'],
					$color,
					$libro['precio']
				);
			}
			?>
			</div>
		</div>

		<div class='publicacion__nav row'>
			<div class='col-12 text-center'>
				<?php
					$noti_dir = base_url()."libreria";
					$nav_size = ceil($cant_libros/$limit);					

					if ($nav_size > 1) {
						if ($step > 0) {
							$prev = $step - 1;							
							echo form_open(
				               $noti_dir."?step=".$prev, array(
				               	'id' => 'form_prev',
				               	'class' => 'd-inline-block'
				            	));  
							printf("
								<input name='buscar' id='buscar' value='%s' type='hidden' />
								<input name='buscar_cat' id='buscar_cat' value='%s' type='hidden' />
								<input type='submit' class='showing_nav' value='<<' />",
								$search,
								$search_cat
							);
							echo form_close();
						}

						for($i=0; $i<$nav_size; $i++) {
							printf("
								<a href='%s' class='showing_nav'>
									%s
								</a>",
								$i == 0 ? $noti_dir : $noti_dir."?step=".$i,
								$i+1
							);
						}

						if ($step+1 < $nav_size) {
							$next = $step + 1;
							echo form_open(
				               $noti_dir."?step=".$next, array(
				               	'id' => 'form_prev',
				               	'class' => 'd-inline-block'
				               ));  
							printf("
								<input name='buscar' id='buscar' value='%s' type='hidden' />
								<input name='buscar_cat' id='buscar_cat' value='%s' type='hidden' />
								<input type='submit' class='showing_nav'value='>>'	/>",
								$search,
								$search_cat
							);
							echo form_close();
						}						
					}					
				?>
			</div>
		</div>

	</div>
	
	<?php
		$footer_data['areas'] = $areas;
		$this->load->view('templates/footer', $footer_data);
	?>

</body>

</html>