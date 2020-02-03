<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = $media_data['titulo'];
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>

	<?php
		$navbar_data['paginas'] = $paginas;
		$navbar_data['selected_pagina'] = $media_data;
		$this->load->view('templates/navbar', $navbar_data);
	?>

	<div class="seccion container seccion__last px-4 pt-0 pt-md-3">
		<div class='row pt-2 pb-4'>

			<div class='col-md-6'>
				<h3 class='titulo-pagina' style="color: <?php echo $media_data['color']; ?>">
					<? echo $media_data['titulo']; ?>		
				</h3>	
			</div>

		</div>
		<?php $show_no_results = sizeof($multimedia) < 1 ? '' : 'd-none'; ?>
		<div class='no-results <?php echo $show_no_results; ?>'>
			<p>No se encontraron resultados con esos parámetros de busqueda</p>
			<a class='no-result__volver' href=''>
				Ver todas Los Archivos Multimedia
			</a>
		</div>

		<div class='row'>
		<?php			
		foreach ($multimedia as $media) {
			printf("
				<div class='noticia col-12 col-md-6'>
				<div class='iframe__container'>
					<iframe src='%s'
						width='%s'
						height='%s'						
						allowfullscreen></iframe>
				</div>
				<h5 class='subarea__titulo'>%s</h5>
				</div>",
				$media['enlace'],
				'100%', '100%',
				$media['titulo']
				);
			}
		?>
		</div>
		<div  class='publicacion__nav row'>
			<div class='col-12 text-center'>
				<?php
					$media_dir = base_url()."multimedia";
					$nav_size = ceil($cant_media/$limit);	

					if ($nav_size > 1) {
						if ($step > 0) {
							$prev = $step - 1;
							printf("
								<a href='%s' class='showing_nav'>
									<<
								</a>",
								$media_dir."?step=".$prev
							);
						}

						for($i=0; $i<$nav_size; $i++) {
							printf("
								<a href='%s' class='showing_nav'>
									%s
								</a>",
								$i == 0 ? $media_dir : $media_dir."?step=".$i,
								$i+1
							);
						}

						if ($step+1 < $nav_size) {
							$next = $step + 1;
							printf("
								<a href='%s' class='showing_nav'>
									>>
								</a>",
								$media_dir."?step=".$next
							);
						}						
					}					
				?>
			</div>
		</div>

	</div>
	
	<?php
		$this->load->view('templates/footer');
	?>

</body>

</html>