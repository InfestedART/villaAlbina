<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = 'Teatro';
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>

	<?php
		$navbar_data['paginas'] = $paginas;
		$navbar_data['selected_pagina'] = $teatro_data;
		$this->load->view('templates/navbar', $navbar_data);
	?>

	<div class="seccion container seccion__last px-4 pt-0 pt-md-3">
		<div class='row pt-2 pb-4'>

			<div class='col-md-6'>
				<h3 class='titulo-pagina' style="color: <?php echo $teatro_data['color']; ?>">
					<? echo $teatro_data['titulo']; ?>		
				</h3>	
			</div>

		</div>
		<?php $show_no_results = sizeof($obras) < 1 ? '' : 'd-none'; ?>
		<div class='no-results <?php echo $show_no_results; ?>'>
			<p>No se encontraron resultados </p>
			<a class='no-result__volver' href=''>
				Ver todos las obras
			</a>
		</div>

		<div class='row'>
		<?php
			foreach ($obras as $obra) {
				printf(
				"<div class='slide_container noticia col-12 col-sm-6 col-lg-4'>
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
					>",
				base_url().'obra?id='.$obra['id_post'],
				$dir,
				$obra['imagen'] ? $obra['imagen'] : 'img/placeholder.jpg',
				$teatro_data['color']
				);
				if ($obra['rango']) {
					echo "Del ".strftime('%d de %B', strtotime($obra['fecha_ini']));
					echo " al ".strftime('%d de %B', strtotime($obra['fecha_fin']));
				} else {
					foreach($fechas as $index => $fecha) {
						if ($fecha['id_post'] == $obra['id_post']) {
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
				}
				printf("</p>
					<a href='%s' class='noticia__btn'>
						<h5 class='noticia__titulo'>%s</h5>
					</a>
					<p class='noticia__descripcion'>%s</p>
					</div>
				</div>",
				base_url().'obra?id='.$obra['id_post'],
				$obra['titulo'],
				$obra['descripcion']
				);
			}
		?>
		</div>

		<?php			
			echo "<div class='col-12 text-center'>";			
			printf("
				<a  href='%s'
					class='archivo__btn'
					style='background-color: %s'
				>  %s </a>",
				$pasados ? base_url().'teatro' : base_url().'teatro?obras_pasadas=1',
				$teatro_data['color'],
				$pasados ? 'Eventos Futuros' : 'Eventos Pasados'
			);				
			echo "</div>";	
			$units = ['bytes', 'Kb', 'Mb', 'Gb'];
			echo "<div class='col-12 text-center'>";	
			foreach ($carteleras as $cartelera) {
				$filesize = $cartelera['size'];
				$i=0;
				while (floor($filesize / 1024) > 1) {
					$filesize = floor($filesize / 1024);
					$i++;
				}
			printf("			
				<a href='%s'
					class='archivo__btn ml-3'	
					style='background-color: %s'
					target='_blank'
				>	%s %s (%s) </a>",
				base_url().'assets/'.$cartelera['enlace'],
				$teatro_data['color'],
				'Descargar Cartelera',
				$cartelera['fecha'],
				$filesize." ".$units[$i]
			);	
			}		
			echo "</div>";

		?>

		<div class='publicacion__nav row'>
			<div class='col-12 text-center'>
				<?php
					$noti_dir = base_url()."teatro";
					$nav_size = ceil($cant_obras/$limit);	

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