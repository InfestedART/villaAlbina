<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
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
		$navbar_data['selected_pagina'] = $noticias_data;
		$this->load->view('templates/navbar', $navbar_data);
	?>

	<div class="seccion container seccion__last px-4 pt-0 pt-md-3">
		<div class='row'>
			<a	class="back-button"
				style="color: <?php echo $noticias_data['color']; ?>"
				href="#"
				onclick="javascript: window.history.back(); return false;" > 
					<i class="fas fa-arrow-left"></i>
					<span>VOLVER</span>
			</a>
		</div>

		<div class='row py-2'>

			<div class='col-md-6'>
				<h3 class='titulo-pagina' style="color: <?php echo $noticias_data['color']; ?>">
					<? echo $noticias_data['titulo']; ?>		
				</h3>	
			</div>

		</div>
		<?php $show_no_results = sizeof($noticias) < 1 ? '' : 'd-none'; ?>
		<div class='no-results <?php echo $show_no_results; ?>'>
			<p>No se encontraron resultados con esos parámetros de busqueda</p>
			<a class='no-result__volver' href=''>
				Ver todas las Noticias
			</a>
		</div>

		<div class='row'>
		<?php			
		foreach ($noticias as $noticia) {
			printf(
				"<div class='noticia col-12 col-sm-6 col-lg-4'>
					<a href='%s' class='noticia__btn'>
						<div
							class='noticia__imagen'
							style='background-image: url(\"%s%s\")'
							>
						</div>
					</a>
					<p class='publicacion__fecha' style='color: %s'>
						%s
					</p>
					<a href='%s' class='noticia__btn'>
						<h5 class='noticia__titulo'>%s</h5>
					</a>
					<p class='noticia__descripcion'>%s</p>
				</div>",
				base_url().'noticia/?id='.$noticia['id_post'],
				$dir,
				$noticia['imagen'] ? $noticia['imagen'] : 'img/placeholder.png',
				$noticias_data['color'],
				strftime('%A %d de %B de %Y', strtotime($noticia['fecha'])),
				base_url().'noticia/?id='.$noticia['id_post'],
				$noticia['titulo'],
				$noticia['resumen']
				);
			}
		?>
		</div>
 
		<div class='publicacion__nav row'>
			<div class='col-12 text-center'>
				<?php
					$noti_dir = base_url()."noticias";
					$nav_size = ceil($cant_noticias/$limit);	

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
	
   <script src=<?php  echo $dir."js/clamp.min.js"; ?> ></script>
   <script src=<?php  echo $dir."js/clamp_app.js"; ?> ></script>
	
	<?php
		$this->load->view('templates/footer');
	?>

</body>

</html>