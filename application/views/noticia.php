<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
$noticia = $news[0];
$next_id = $next_noticia ? $next_noticia[0]->id_post : '';
$prev_id = $prev_noticia ? $prev_noticia[0]->id_post : '';
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
		$navbar_data['paginas'] = $paginas;
		$navbar_data['selected_pagina'] = $noticias_data;		
		$this->load->view('templates/navbar', $navbar_data);
	?>
	<div class="seccion seccion__last container px-4 pt-0 pt-md-3">

		<?php
		if ($prev_noticia) {
			printf("
				<div class='flecha izquierda'>
					<a href='%s'>
					<img src='%s' />
					</a>
				</div>",
				base_url().'noticia?id='.$prev_id,
				$dir.'img/flecha_izquierda_2.png'
			);
		}		
		if ($next_noticia) {
			printf("
				<div class='flecha derecha'>
					<a href='%s'>
					<img src='%s' />
					</a>
				</div>",
				base_url().'noticia?id='.$next_id,
				$dir.'img/flecha_derecha_2.png'
			);
		}		
		?>

		<div class='row'>
			<a	class="back-button"
				style="color: <?php echo $color; ?>"
				href="#"
				onclick="javascript: window.history.back(); return false;" > 
					<i class="fas fa-arrow-left"></i>
					<span>VOLVER</span>
			</a>
		</div>

		<div class='row'>
			<div class='col-md-8'>
				<h3 class='titulo-pagina titulo__small' style="color: <?php echo $color; ?>">
					<?php echo $noticia->titulo ?>
				</h3>
			</div>
		</div>
				
		<div class="row">
			<div class="col-md-12 text-left mb-4">
			<p> <?php echo $noticia->resumen ?></p>
			</div>
		</div>

		<?php
			$galeria = [];
			$leyenda[0] = $noticia->leyenda ? $noticia->leyenda : '';
			$galeria[0] = $noticia->imagen ? $noticia->imagen : '';
			$j = 1;
			for ($i=0; $i<sizeof($galeria_noticias); $i++) {
				if ($galeria_noticias[$i]['id_post'] == $noticia->id_post) {
					$galeria[$j] = $galeria_noticias[$i]['imagen'];
					$leyenda[$j] =$galeria_noticias[$i]['leyenda'];
					if (sizeof($galeria_noticias[$i]) > 0 && !$noticia->imagen) {
						array_shift($galeria);
						array_shift($leyenda);
					}
					$j++;
				}
			}
		?>

		<div class="row">

			<?php
			$size = $galeria[0] ? 6 : 4;
			printf(
				"<div class='publicacion__container col-md-%s col-xl-%s offset-xl-1' >",
				$size,
				$size - 1
			);
			?>
				<div class='galeria__slider galeria__slider_0' id='slider'>
				<?php
				foreach ($galeria as $index => $img_galeria) {
					printf(
						"<div class='galeria__slide galeria__slide_%s'>
							<input type='hidden' id='galeria_active' value='0' />
							<div class='galeria__img-container %s'>
							<img
								class='galeria__imagen galeria-slide'
								src='%s'
							/>
							</div>",
						'0',
						$img_galeria ? '' : 'hidden',
						$img_galeria ? $dir.$img_galeria : ''
					);

					if(sizeof($galeria) > 1) {
						echo "<ul class='publicacion__slider-dots pt-1'>";
						foreach ($galeria as $img_index => $img_galeria) {
							printf("										
								<li
									class='slider_dot galeria_dot_%s %s'
									id='dot_%s'
								></li>",
								'0',
								$img_index == $index ? 'active' : '',								
								$img_index										
							);
							$dots_active = false;
						}
						echo "</ul>";
					}	

					printf(
						"<p class='publicacion__leyenda'> %s </p>",
						sizeof($leyenda) > 0 
							? $leyenda[$index]
							: ''
					);	
					echo "</div>";
				}
				?>
					</div>
				</div>

				<div class="col-md-<?php echo 12 - $size ?>">
					<div class='publicacion__column'>
						<h5 class='publicacion__subtitulo'><?php echo $noticia->titulo ?> </h5>
						<p class='publicacion__fuente  mb-2'>
							<?php echo $noticia->fuente ?>
						</p>
						<p class='publicacion__fuente' style="color: <?php echo $color; ?>">
							<?php echo strftime('%d de %B de %Y', strtotime($noticia->fecha)) ?>
						</p>
						<p class='publicacion__contenido'><?php echo $noticia->contenido ?></p>

					</div>
				</div>
		</div>	
	</div>
	
	<?php
		$this->load->view('templates/footer');
	?>
	<script src=<?php  echo $dir."js/subp_slider.js"; ?> ></script>
</body>

</html>