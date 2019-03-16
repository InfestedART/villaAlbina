<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
echo $_SERVER['SERVER_NAME']." ".base_url();
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

	<div
		class="portada"
		style="background-image: url(<?php  echo $dir.'img/portada1.jpg'; ?>)"
	></div>

	<div class='main'>

		<div class='main__fixed-header'>
		</div>

		<div class="logo d-none d-md-block">
			<img src=<?php echo $dir.'img/logo2.png'; ?> />
		</div>

		<div class="logo d-xs-block d-md-none">
			<img src=<?php echo $dir.'img/logo_mobile.png'; ?> />
		</div>

		<div class="main__icono">
			<a href=# id="abrir-puerta">
				<img src=<?php echo $dir.'img/abrir_puerta.png'; ?> />
			</a>
		</div>

		<div class="navbar main__navbar" id='navbar'>
			<a href='#' class='navbar__logo' id='navbar_logo'>
				<img src='<?php echo $dir.'img/logo.png'; ?>' />
	      </a>
	      <div class='nav__item-container'>
			<?php
			 	$paginas_array = $paginas->result_array();
			 	foreach ($paginas_array as $pagina) {
			 		printf(
			 			"<a href='%s' class='nav__item d-none d-md-inline-block'>
			 				<p class='nav__label'>%s</p>
			 			</a>",
			 			base_url().$pagina['enlace'],
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
			<a href='#seccion_noticias' id="flecha-abajo">
				<img src=<?php echo $dir.'img/flecha_abajo.png'; ?> />
			</a>
		</div>

	</div>

	<div class='seccion seccion__noticias' id='seccion_noticias'>
		<div class="container">
			<h3 class='seccion__titulo'>NOTICIAS</h3>			

			<div class='row'>
			<?php			
			$noticias_array = $noticias->result_array();
			foreach ($noticias_array as $noticia) {
				printf(
					"<div class='noticia col-12 col-sm-6 col-md-4'>
						<div
							class='noticia__imagen'
							style='background-image: url(\"%s%s\")'
							>
							<span class='noticia__tipo'>%s</span>
							<span class='noticia__fecha'>%s</span>
						</div>
						<h5 class='noticia__titulo'>%s</h5>
						<p class='noticia__descripcion'>%s</p>
						<a href='%s' class='noticia__btn'> Leer Mas </a>
					</div>",
						$dir,
						$noticia['imagen_destacada'],
						$noticia['tipo'],
						date("d.m.Y", strtotime($noticia['fecha'])),
						$noticia['titulo'],
						$noticia['resumen'],
						base_url().'noticia/?id='.$noticia['id_post']
					);
				}
			?>
			</div>
		</div>
	</div>

	<?php
		$this->load->view('templates/footer');
	?>
	</div>

	<script src=<?php  echo $dir."js/main_app.js"; ?> ></script>
</body>

</html>