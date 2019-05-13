 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = 'Pagina Principal';
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>
<div class='main__wrapper' id='wrapper'>

	<div class='portada slider' id='slider'>
		<div class='slider-wrapper'>
		<?php		
			$portadas_array = $portadas->result_array();			
			foreach ($portadas_array as  $portada) {								
				$color = $default_color.' 0%';
				if ($portada['color']) {
					$color = $portada['color'].' 0%';
				} elseif ($portada['heredar_color']) {
					$color = $portada['color_area'].' 0%';
				}
				printf(
					"<div class='slide' style='background-image: url(%suploads/%s)'>
						<div class='gradient' style='
							  background: -moz-linear-gradient(top, %s, %s);
							  background: -webkit-linear-gradient(top, %s, %s);
							  background: linear-gradient(to bottom, %s, %s);'>
						</div>
					</div>",
					$dir, $portada['imagen'],
					$color, 'transparent 100%',
					$color, 'transparent 100%',
					$color, 'transparent 100%'
				);				
			}
		?>
		</div>
	</div>

	<div class='main'>

		<div class='main__fixed-header'>
		</div>

		<div class="logo d-none d-md-block">
			<img src=<?php echo $dir.'img/logo.png'; ?> />
			<img src=<?php echo $dir.'img/logo_espacioPatino.png'; ?> />
		</div>

		<div class="logo d-xs-block d-md-none text-center">
			<img src=<?php echo $dir.'img/logo_mobile.png'; ?> />
		</div>

		<div class="navbar main__navbar" id='navbar'>
			<a href='#' class='navbar__logo' id='navbar_logo'>
				<img src='<?php echo $dir.'img/logo.png'; ?>' />
	      </a>
	      <div class='nav__item-container' id='nav_item_container'>
			<?php
			 	$paginas_array = $paginas->result_array();
			 	$nav_paginas_array = $nav_paginas->result_array();
			 	foreach ($nav_paginas_array as $pagina) {
			 		$link = $pagina['external_url']
			 			? $pagina['enlace']
			 			: base_url()."#seccion_".$pagina['id_pagina'];
			 		printf("
			 			<div class='nav__container'>
			 			<a href='%s' class='nav__item d-none d-md-inline-block' %s>
			 				<p class='nav__label'>%s</p>
			 			</a>
			 			</div>
			 			",
			 			$link,
			 			$pagina['external_url'] ? "target='_blank'" : "",
			 			$pagina['titulo']
			 		);
			 	}			
			?>
			</div>
			<a class='menu__container d-block d-md-none' id='navbar_btn'>
	         	<span class='menu mr-4'></span>
	      </a>
		</div>

		<div class='main__flecha'>
			<a
				href="#seccion_<?php echo $paginas_array[0]['id_pagina'] ?>"
				id="flecha-abajo"
			>
				<img src=<?php echo $dir.'img/flecha_abajo.png'; ?> />
			</a>
		</div>

	</div>

<?php	
	foreach ($seccion as $index => $row) {
		$page_seccion = $paginas_array[$index]['seccion'];
		$page_color = $paginas_array[$index]['color'];
		$prev_page_id = $index-1 < 0 ? "" : "seccion_".$paginas_array[$index-1]['id_pagina'];
		$page_id = "seccion_".$paginas_array[$index]['id_pagina'];
		$next_page_id = $index+1 >= sizeof($paginas_array)
			? "footer"
			: "seccion_".$paginas_array[$index+1]['id_pagina'];		
		printf("
			<div class='seccion slider__container' id='%s'>
				<div class='flecha izquierda'>
					<a href='#%s' class='flecha_izquierda' id='izquierda'>
					<img src='%s' id='flechaI_%s' />
					</a>
				</div>
				<div class='flecha derecha'>
					<a href='#%s'class='flecha_derecha' id='derecha'>
					<img src='%s' id='flechaD_%s'/>
					</a>
				</div>

				<div class='container'>
					<h3 class='seccion__titulo'	style='color: %s'> %s </h3>
				</div>

				<div class='container'>
					<div class='row no-gutters'>
					<div class='publicacion__slider' id='homeSlider_%s'>
				",
			$page_id,
			$page_id,
			$dir.'img/flecha_izquierda_2.png', $paginas_array[$index]['id_pagina'],
			$page_id,
			$dir.'img/flecha_derecha_2.png', $paginas_array[$index]['id_pagina'],
			$page_color,
			$paginas_array[$index]['titulo'],
			$paginas_array[$index]['id_pagina']
		);
		$data['enlace'] = $paginas_array[$index]['enlace'];
		$data['color'] = $paginas_array[$index]['color'];
		$data['id_pagina'] = $paginas_array[$index]['id_pagina'];
		$data['seccion'] = $row;
		$this->load->view('seccion/'.$page_seccion, $data);
		$enlace =  base_url().$paginas_array[$index]['enlace'];

		echo "		</div>
					</div>
				</div>
				<div class='row no-gutters text-center'>
					<div class='col-12 my-3'>
						<a
							href='$enlace'
							class='seccion__conoce_mas'
							style='background-color: $page_color'
						>
							conoce más...
						</a>";
		if($paginas_array[$index]['btn_adicional']) {			
			$units = ['bytes', 'Kb', 'Mb', 'Gb'];
			$filesize = $agenda['size'];
			$i=0;
			while (floor($filesize / 1024) > 1) {
				$filesize = floor($filesize / 1024);
				$i++;
			}
			printf("			
				<a 	href='%s'
					class='seccion__conoce_mas ml-3'	
					style='background-color: %s'
					target='_blank'
				>	%s (%s) </a>",
				base_url().'assets/'.$agenda['enlace'],
				$page_color,
				'Descargar Agenda',
				$filesize." ".$units[$i]
			);
		}
		echo		"</div>
					<div class='col-12 mt-3'>
						<span class='seccion__linea'></span>
					</div>
				</div>

			</div>";
	}
?>

	<?php
		$this->load->view('templates/footer');
	?>
	</div>

	<script src=<?php  echo $dir."js/home_slider.js"; ?> ></script>
	<script src=<?php  echo $dir."js/main_app.js"; ?> ></script>
</body>

</html>