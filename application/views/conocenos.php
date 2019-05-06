<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
// $dir = $dir_assets.'uploads/';
setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = 'Conocenos';
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>
	<?php
		$navbar_data['paginas'] = $paginas;
		$navbar_data['selected_pagina'] = $conocenos_data;
		$this->load->view('templates/navbar', $navbar_data);
	?>
	
	<div class="seccion pt-0 pt-md-3">		
		<?
		if (!$active) {
			$active = $subareas[0]['enlace'];
		}
		foreach ($subareas as $subarea) {
			if ($subarea['mostrar']) {
			printf("
				<div class='container %s'>
					<div class='row mt-3 mb-4'>
						<div class='col-12' style='color:%s'>
							<h3 class='titulo-pagina titulo__small'>%s</h3>
						</div>				
					</div>
					<div class='row'>
						<div class='col-sm-6 col-md-4'>
							<img src='%s' class='publicacion__imagen'/>
						</div>
						<div class='col-sm-6 col-md-8'>
							<div class='publicacion__column'>
							<p>%s</p>
							</div>
						</div>				
					</div>
				</div>",
				$active === $subarea['enlace'] ? 'subarea__active' : 'd-none',
				$color,
				$subarea['subpagina'],
				$dir.$subarea['imagen'],
				$subarea['html']
			);
			}			
		}
		?>

		<div class="container <?php
			echo $active == 'equipo_trabajo' ? 'subarea__active' : 'd-none'
		 ?>">
		<div class='row mt-3 mb-4'>
			<div class='col-12' style='color:<?php echo $color; ?>'>
				<h3 class='titulo-pagina titulo__small'>
				NUESTRO EQUIPO DE TRABAJO
				</h3>
			</div>
		</div>
		</div>

		<div class="publicacion__container <?php
			echo $active === 'equipo_trabajo' ? 'subarea__active' : 'd-none'
		 ?>">
			<div class="flecha izquierda">
				<a href='#' id='izquierda'>
				<img src="<?php echo $dir.'img/flecha_izquierda_2.png'; ?>" />
				</a>
			</div>
			<div class="flecha derecha">
				<a href='#' id='derecha'>
				<img src="<?php echo $dir.'img/flecha_derecha_2.png'; ?>" />
				</a>
			</div>

			<div class='container'>
				<div class='publicacion__slider' id='slider'>
				<?php					
					foreach ($equipo as $miembro) {
						printf("
							<div class='publicacion__slide'>
								<div>
								<div class='row no-gutters'>
									<div class='col-md-5 my-2'>
										<div class='text-center text-md-right'>
										<img src='%s' class='equipo__imagen'/>
										</div>
									</div>
									<div class='col-md-7'>
										<div class='equipo__container'>
											<h5 class='equipo__categoria'>%s</h5>
											<p class='equipo__nombre'>%s</p>
											<p class='equipo__cargo'>%s</p>
											<p class='equipo__descripcion'>%s&lrm;</p>
										</div>
									</div>
								</div>
								</div>
							</div>",
							$dir.$miembro['imagen'],
							$miembro['categoria'],
							$miembro['nombre'],
							$miembro['cargo'],
							$miembro['descripcion']
						);
					}					
				?>
				</div>
			</div>	

			<ul class='publicacion__slider-dots'>
				<?php
					$dots_active=true;
					foreach ($equipo as $index => $miembro) {
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
				?>	
			</ul>

		</div>

	</div>	

	<div class='row no-gutters text-center seccion__last'>
		<div class='col-12'>
			<div class='timeline'>
			<?php			
			foreach ($subareas as $index => $subarea) {
				printf("
					<a class='timeline__punto %s' href='%s'>
						<span>%s</span>
					</a>",
					$subarea['enlace'] == $active ? 'timeline__active' : '',
					base_url()."conocenos?active=".$subarea['enlace'],
					$subarea['titulo']
				);
				if ($index+1 < sizeof($subareas)) {
					echo "<span class='timeline__linea'></span>";	
				}						
			}
			?>
			</div>
		</div>
	</div>

	</div>

<?php
	$this->load->view('templates/footer'); 
?>
	<script src=<?php  echo $dir."js/slider.js"; ?> ></script>
</body>

</html>