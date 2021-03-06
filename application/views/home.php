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
<div class='giant__logo' id='giant_logo'>
	<img src="<?php echo $dir.'img/giant_logo.png'; ?>" />
</div>
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

		<div class="logo d-none d-md-flex">
			<div class="logo__container">
			   <img class='logo__img logo_img--albina' src=<?php echo $dir.'img/logo_albina.png'; ?> />
			   <img class='logo__img' src=<?php echo $dir.'img/logo.png'; ?> />
			</div>
		</div>

		<div class="logo d-xs-flex d-md-none text-center">
			<div class="logo__container">
			<img class='logo__img' src=<?php echo $dir.'img/logo.png'; ?> />
			</div>
		</div>

		<div class="navbar main__navbar" id='navbar'>
			<a href='#' class='navbar__logo main__logo'>
				<img src='<?php echo $dir.'img/logo_albina.png'; ?>' />
	      	</a>

			<a href='javascript:void(0);' class="navbar__menu" id='navbar_menu'>
	         	<i class='fa fa-bars'> </i>
	      	</a>

	      	<div class='nav__item-container' id='nav_item_container'>
		      	<div class='nav__container d-none' id='inicio'>
		      		<a href='#' class='nav__item d-none d-md-inline-block'>
		      			<p class='nav__label'>INICIO</p>
		      		</a>
		      	</div>
			<?php
			 	$paginas_array = $paginas->result_array();
			 	$nav_paginas_array = $nav_paginas->result_array();
			 	foreach ($nav_paginas_array as $pagina) {
			 		$link = $pagina['external_url']
			 			? $pagina['enlace']
			 			: base_url()."#seccion_".$pagina['id_pagina'];
			 		if ($pagina['id_pagina'] == 2) {
			 			printf("
			 				<div class='nav__container navbar__dropdown'>
							   	<a
							   		href='%s'
							   		class='dropbtn nav__item'
							   	>	<p class='nav__label'> %s 
							      		<i class='fa fa-caret-down ml-1'></i>
							      	</p>
							    </a>
						    <div class='navbar__dropdown--content'>",
						    $link,
						    $pagina['titulo']
						);
						foreach ($areas as $area) {
							printf("
						      <a href='%s' class='navbar__dropdown__item'>
						      	%s
						      </a>",
						      base_url().'areas?area='.$area['enlace'],
						      $area['area']
							);
						}
			 			
						printf("
						    </div>
						  </div>"
			 			);
				 	} else {		 			
				 		printf("
				 			<div class='nav__container'>
				 			<a href='%s' class='nav__item' %s>
				 				<p class='nav__label'>%s</p>
				 			</a>
				 			</div>
				 			",
				 			$link,
				 			$pagina['new_window'] ? "target='_blank'" : "",
				 			$pagina['titulo']
				 		);
				 	}
			 	}			
			?>
			</div>
		</div>

		<div class='main__flecha'>
			<a
				href="#seccion_<?php echo $paginas_array[0]['id_pagina'] ?>"
				id="flecha-abajo"
			> <img src=<?php echo $dir.'img/flecha_abajo.png'; ?> />
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
		$last_seccion = $index + 1  >= sizeof($paginas_array) ? 'seccion__last' : '';
		printf("
			<div class='seccion slider__container %s' id='%s'>
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
					<h3 class='seccion__titulo' style='color: %s'> %s</h3>
				</div>

				<div class='container'>
					<div class='row no-gutters'>
					<div class='publicacion__slider' id='homeSlider_%s'>
				",
				$last_seccion ? 'seccion__last' : '',
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
						<div class='btn_mas_container'>
						<a
							href='$enlace'
							class='seccion__conoce_mas'
							style='background-color: $page_color'
						> Conoce Más...
						</a>
						</div>";
		if($paginas_array[$index]['id_modelo'] == 5) {
			printf(
				"<a 
					href='%s'
					class='seccion__conoce_mas ml-3'	
					style='background-color: %s'					
				> Eventos Pasados </a>",
				$enlace.'?eventos_pasados=1',
				$page_color
			);
		}
		printf("
					</div>
					<div class='col-12 mt-3 %s'>
						<span class='seccion__linea'></span>
					</div>
				</div>

			</div>",
			$last_seccion ? 'd-none' : ''
		);
	}
?>

	<?php
		$this->load->view('templates/footer');
	?>
	</div>

	<script src=<?php  echo $dir."js/home_slider.js"; ?> ></script>
	<script src=<?php  echo $dir."js/main_app.js"; ?> ></script>
	<script src=<?php  echo $dir."js/clamp.min.js"; ?> ></script>
  	<script src=<?php  echo $dir."js/clamp_app.js"; ?> ></script>
</body>

</html>