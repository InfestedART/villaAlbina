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
				<div class='flecha izquierda d-none d-md-block'>
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
				<div class='flecha derecha d-none d-md-block'>
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

		<div class="row">

			<div class="publicacion__container col-12 col-sm-6 col-md-4">
				<div class='publicacion__slider' id='slider'>
					<?php
						$galeria = [];
						$galeria[0] = $noticia->imagen;
						for ($i=1; $i<=sizeof($galeria_noticias); $i++) {
							$galeria[$i] = $galeria_noticias[$i-1]['imagen'];
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
									$galeria_noticias[$index-1]['leyenda']
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
	<script src=<?php  echo $dir."js/slider.js"; ?> ></script>
</body>

</html>