<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = $convo_data['titulo'];
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>

	<?php
		$navbar_data['paginas'] = $paginas;
		$navbar_data['selected_pagina'] = $convo_data;
		$this->load->view('templates/navbar', $navbar_data);
	?>

	<div class="seccion container seccion__last px-4 pt-0 pt-md-3">

		<div class='row pt-2 pb-4'>
			<div class='col-md-6'>
				<h3 class='titulo-pagina' style="color: <?php echo $convo_data['color']; ?>">
					<? echo $convo_data['titulo']; ?>		
				</h3>	
			</div>
		</div>
		<?php $show_no_results = sizeof($convocatorias) < 1 ? '' : 'd-none'; ?>
		<div class='no-results <?php echo $show_no_results; ?>'>
			<p>No se encontraron resultados </p>
			<a class='no-result__volver' href=''>
				Ver todas las convocatorias
			</a>
		</div>

		<div class='row'>
		<?php
			foreach ($convocatorias as $convo) {
				printf(
				"<div class='slide_container noticia col-12 col-sm-6 col-md-4'>
					<div class='publicacion__slide'>
					<a href='%s' class='noticia__btn'>
						<div
							class='noticia__imagen'
							style='background-image: url(\"%s%s\")'
							>
						</div>
					</a>
					<p	class='publicacion__fecha'
						style='color: %s'
					> Hasta el %s
					</p>
					<a href='%s' class='noticia__btn'>
						<h5 class='noticia__titulo'>%s</h5>
					</a>
					<p class='noticia__descripcion'>%s</p>
					</div>
				</div>",
				base_url().'convocatoria?id='.$convo['id_post'],
				$dir,
				$convo['imagen'] ? $convo['imagen'] : 'img/placeholder.jpg',
				$convo_data['color'],
				strftime('%d de %B', strtotime($convo['fecha_limite'])),
				base_url().'convocatoria?id='.$convo['id_post'],
				$convo['titulo'],
				$convo['descripcion']
			);
			}
		?>
		</div>

		<div class='publicacion__nav row'>
			<div class='col-12 text-center'>
				<?php
					$convo_dir = base_url()."convocatorias";
					$nav_size = ceil($cant_convo/$limit);	

					if ($nav_size > 1) {
						if ($step > 0) {
							$prev = $step - 1;
							printf("
								<a href='%s' class='showing_nav'>
									<<
								</a>",
								$noti_dir."?step=".$prev
							);
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
							printf("
								<a href='%s' class='showing_nav'>
									>>
								</a>",
								$noti_dir."?step=".$next
							);
						}						
					}					
				?>
			</div>
		</div>

	</div>

   <script src=<?php  echo $dir."js/shave.js"; ?> ></script>
     <script src=<?php  echo $dir."js/clamp.min.js"; ?> ></script>
   <script src=<?php  echo $dir."js/clamp_app.js"; ?> ></script>
	<?php
		$footer_data['areas'] = $areas;
		$this->load->view('templates/footer', $footer_data);
	?>
</body>
</html>