<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
$next_id = $next_subarea ? $next_subarea[0]->enlace : '';
$prev_id = $prev_subarea ? $prev_subarea[0]->enlace : '';
?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = $subarea->subarea;
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>
	<?php
		$navbar_data['paginas'] = $paginas;
		$navbar_data['selected_pagina'] = $area_data;
		$this->load->view('templates/navbar', $navbar_data);
	?>

	<div class="seccion seccion__last container px-4 pt-0 pt-md-3">
		<?php
		if ($prev_subarea) {
			printf("
				<div class='flecha izquierda d-none d-md-block'>
					<a href='%s'>
					<img src='%s' />
					</a>
				</div>",
				base_url().'subarea?subarea='.$prev_id.'&area='.$id_area,
				$dir.'img/flecha_izquierda_2.png'
			);
		}		
		if ($next_subarea) {
			printf("
				<div class='flecha derecha d-none d-md-block'>
					<a href='%s'>
					<img src='%s' />
					</a>
				</div>",
				base_url().'subarea?subarea='.$next_id.'&area='.$id_area,
				$dir.'img/flecha_derecha_2.png'
			);
		}		
		?>

		<div class='row'>
			<div class='col-md-8'>
				<h3
					class='titulo-pagina titulo__small'
					style="color: <?php echo $color; ?>" >
					<?php echo $subarea->subarea; ?>
				</h3>
			</div>
		</div>

		<div class="row">
			<div class="publicacion__container col-12 col-sm-6 col-md-4">
				<div class='publicacion__slider' id='slider'>
					<?php
						$galeria = [];
						$galeria[0] = $subarea->imagen ? $subarea->imagen : 'img/placeholder.jpg';
						for ($i=1; $i<=sizeof($galeria_subareas); $i++) {
							$galeria[$i] = $galeria_subareas[$i-1]['imagen'];
						}

						foreach ($galeria as $index => $img_galeria) {
							printf("
								<div class='publicacion__slide'>
									<img
										src='%s'
										class='publicacion__imagen galeria-slide'
									>",
								 $dir.$img_galeria
							);
							if($index > 0) {
								printf(
									"<p> %s </p>",
									$galeria_subareas[$index-1]['leyenda']
								);	
							}
							echo "</div>";
						}
					?>
				</div>
				<?php
				if(sizeof($galeria) > 1) {
					printf("
						<ul class='publicacion__slider-dots pt-1'>
							<li class='slider_arrow'>
								<a href='#' id='izquierda'> < </a>
							</li>"
					);
						$dots_active=true;
						foreach ($galeria as $index => $img_galeria) {
							printf("
								<li
									class='slider_dot %s'
									id='%s'
								></li>",
								$dots_active ? 'active' : '',
								$index
							);
							$dots_active = false;
						}
					printf("
							<li class='slider_arrow'>
								<a href='#' id='derecha'> > </a>
							</li>
						</ul>"
					);
				}
				?>
			</div>
			<div class="col-12 col-sm-6 col-md-8">
				<div class='publicacion__column'>
					<?php echo $subarea->html ?>
				</div>
			</div>
		</div>

		<div class='row no-gutters text-center mt-2'>
			<div class='col-12'>
				<div class='timeline'>
				<?php			
				foreach ($all_subareas as $index => $osubarea) {
					printf("
						<a class='timeline__punto %s' href='%s'>
							<span>%s</span>
						</a>",
						$osubarea['enlace'] == $active ? 'timeline__active' : '',
						base_url().'subarea?subarea='.$osubarea['enlace'].'&area='.$osubarea['id_area'],
						$osubarea['subarea']
					);
					if ($index+1 < sizeof($all_subareas)) {
						echo "<span class='timeline__linea'></span>";	
					}						
				}
				?>
				</div>
			</div>
		</div>

	</div>

	<?php
		$footer_data['areas'] = $areas;
		$this->load->view('templates/footer', $footer_data);
	?>
	<script src=<?php  echo $dir."js/slider.js"; ?> ></script>
</body>

</html>