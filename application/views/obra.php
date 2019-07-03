<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
$obra = $evento[0];
$next_id = $next_obra ? $next_obra[0]->id_post : '';
$prev_id = $prev_obra ? $prev_obra[0]->id_post : '';

?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = $obra->titulo;
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>

	<?php
		$navbar_data['paginas'] = $paginas;
		$navbar_data['areas'] = $areas->result_array();
		$navbar_data['selected_pagina'] = $agenda_data;
		$this->load->view('templates/navbar', $navbar_data);
	?>
	<div class="seccion seccion__last container px-4 pt-0 pt-md-3">

		<?php
		if ($prev_obra) {
			printf("
				<div class='flecha izquierda d-none d-md-block'>
					<a href='%s'>
					<img src='%s' />
					</a>
				</div>",
				base_url().'obra?id='.$prev_id,
				$dir.'img/flecha_izquierda_2.png'
			);
		}		
		if ($next_obra) {
			printf("
				<div class='flecha derecha d-none d-md-block'>
					<a href='%s'>
					<img src='%s' />
					</a>
				</div>",
				base_url().'obra?id='.$next_id,
				$dir.'img/flecha_derecha_2.png'
			);
		}		
		?>

		<div class='row'>
			<div class='col-md-8'>
			<h3 class='titulo-pagina titulo__small' style="color: <?php echo $color; ?>">
				<?php echo $obra->titulo ?> 
			</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-left mb-4">
			<p class='publicacion__contenido'> <?php echo $obra->descripcion ?></p>
			</div>
		</div>

		<div class="row">
			<div class="publicacion__container col-md-4">
				<div class='publicacion__slider' id='slider'>
					<?php
						$galeria = [];
						$leyenda[0] = '';
						$galeria[0] = $obra->imagen ? $obra->imagen : 'img/placeholder.jpg';
						for ($i=1; $i<=sizeof($galeria_obra); $i++) {
							$galeria[$i] = $galeria_obra[$i-1]['imagen'];
							$leyenda[$i] = $galeria_obra[$i-1]['leyenda'];
						}
						if (sizeof($galeria_obra) > 1 && !$obra->imagen) {
							array_shift($galeria);
							array_shift($leyenda);
						}
						foreach ($galeria as $index => $img_galeria) {
							printf("
								<div class='publicacion__slide'>
								<div
									class='galeria__imagen galeria-slide'
									style='background-image: url(\"%s\")'
								></div>",
								$dir.$img_galeria
							);
						printf(
							"<p> %s </p>",
							sizeof($leyenda) > 0 
								? $leyenda[$index]
								: ''
						);	
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

			<div class="col-md-8">
			<div class='publicacion__column'>
				<h5 class='publicacion__subtitulo'><?php echo $obra->titulo ?> </h5>
				<p class='publicacion__fecha' style="color: <?php echo $color; ?>">
				<?php
					if ($obra->rango) {
						echo 'Del '.strftime('%d de %B', strtotime($obra->fecha_ini));
						echo ' al '.strftime('%d de %B', strtotime($obra->fecha_fin));	
					} else {
						foreach($fechas as $index => $fecha) {
							$coma = '';
							if ($index < sizeof($fechas)-2) {
								$coma = ', ';
							}
							if ($index == sizeof($fechas)-2) {
								$coma = ' y ';	
							}
							echo strftime('%d de %B', strtotime($fecha['fecha'])).$coma;
						}
					}
				?>
				</p>
				<p class='publicacion__data'>
					Organizan: <?php echo $obra->organizador ?>						
				</p>
				<p class='publicacion__data'>
					Lugar: <?php echo $obra->lugar ?>						
				</p>
				<p class='publicacion__data mb-2'>
					Horario: <?php echo $obra->hora ?>						
				</p>
				<p class='publicacion__contenido'><?php
					 echo $obra->contenido 
				?></p>

				<?php
				if ($obra->info) {
					printf("
						<div class='pubicacion__info publicacion__contenido'> %s </div>",
						$obra->info
					);
				}
				?>				
			</div>
			</div>
		</div>	

	</div>	
	
	
	<?php
		$footer_data['areas'] = $areas->result_array();
		$this->load->view('templates/footer', $footer_data);
	?>
	<script src=<?php  echo $dir."js/slider.js"; ?> ></script>
</body>

</html>