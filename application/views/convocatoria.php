<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
$convo = $convocatoria[0];
$next_id = $next_convo ? $next_convo[0]->id_post : '';
$prev_id = $prev_convo ? $prev_convo[0]->id_post : '';

?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = $convo->titulo;
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>

	<?php
		$navbar_data['paginas'] = $paginas;
		$navbar_data['selected_pagina'] = $convo_data;
		$this->load->view('templates/navbar', $navbar_data);
	?>
	<div class="seccion seccion__last container px-4 pt-0 pt-md-3">

		<?php
		if ($prev_convo) {
			printf("
				<div class='flecha izquierda d-none d-md-block'>
					<a href='%s'>
					<img src='%s' />
					</a>
				</div>",
				base_url().'convocatoria?id='.$prev_id,
				$dir.'img/flecha_izquierda_2.png'
			);
		}		
		if ($next_convo) {
			printf("
				<div class='flecha derecha d-none d-md-block'>
					<a href='%s'>
					<img src='%s' />
					</a>
				</div>",
				base_url().'convocatoria?id='.$next_id,
				$dir.'img/flecha_derecha_2.png'
			);
		}		
		?>

		<div class='row'>
			<div class='col-md-8'>
			<h3 class='titulo-pagina titulo__small' style="color: <?php echo $color; ?>">
				<?php echo $convo->titulo ?> 
			</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-left mb-4">
			<p class='publicacion__contenido'> <?php echo $convo->descripcion ?></p>
			</div>
		</div>

		<div class="row">
			<div class="publicacion__container col-md-4">
				<div class='publicacion__slider' id='slider'>
					<?php
						$galeria = [];
						if ($convo->imagen || sizeof($galeria_convo) > 0) {
							$galeria[0] = $convo->imagen;
						if (sizeof($galeria_convo) > 1 && !$convo->imagen) {
							array_shift($galeria);
						}
							for ($i=1; $i<=sizeof($galeria_convo); $i++) {
								$galeria[$i] = $galeria_convo[$i-1]['imagen'];
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
										$galeria_convo[$index-1]['leyenda']
									);	
								}
								echo "</div>";							
							}	
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
				<h5 class='publicacion__subtitulo'><?php echo $convo->titulo ?> </h5>
				<p class='publicacion__fecha' style="color: <?php echo $color; ?>">
					<?php echo 'Hasta el '.$convo->fecha_limite; ?>
				</p>
				<p class='publicacion__contenido'><?php echo $convo->contenido ?></p>
			</div>
			</div>

			<?php
				if (sizeof($archivos_convo) > 0) {
					echo "<div class='col-12 text-center'>";
					echo "<label>Descargar Archivos:</label><br />";
					foreach ($archivos_convo as $i => $archivo) {
						$filename = substr(strrchr($archivo['archivo'], "/"), 1);
						$units = ['bytes', 'Kb', 'Mb', 'Gb'];
						$filesize = $archivo['size'];
						$i=0;
						while (floor($filesize / 1024) > 1) {
							$filesize = floor($filesize / 1024);
							$i++;
						}
						printf("
							<a 	href='%s'
								class='archivo__btn'
								style='background-color: %s'
								target='_blank'
								>
								%s (%s)
							</a>",
							$dir.$archivo['archivo'],
							$color,
							$filename,
							$filesize." ".$units[$i]
						);
					}
					echo "</div>";
				}				
			?>
			
		</div>

	</div>	
		
	<?php
		$footer_data['areas'] = $areas;
		$this->load->view('templates/footer', $footer_data);
	?>
	<script src=<?php  echo $dir."js/slider.js"; ?> ></script>
</body>
</html>