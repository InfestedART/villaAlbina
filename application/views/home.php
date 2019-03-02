<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Espacio Simon I Patiño</title>

   <link rel="stylesheet" href=<?php  echo $dir."css/bootstrap.css"; ?> />
   <link rel="stylesheet" href=<?php  echo $dir."css/style.css"; ?> />
</head>

<body>
	<div
		class="portada"
		style="background-image: url(<?php  echo $dir.'img/portada1.jpg'; ?>)"
	/>		

	<div class='main'>

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

		<div class="nav">
			<?php
			 	$paginas_array = $paginas->result_array();
			 	foreach ($paginas_array as $pagina) {
			 		printf(
			 			"<a href='#' class='nav__item'>
			 				<p class='nav__label'>%s</p>
			 			</a>",
			 			$pagina['titulo']
			 		);
			 	}
			 ?>
		</div>

		<div class='main__flecha'>
			<a href=# id="flecha-abajo">
				<img src=<?php echo $dir.'img/flecha_abajo.png'; ?> />
			</a>
		</div>

	</div>

	<div class='seccion seccion__noticias'>
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
							<p class='noticia__descripcion'>
								%s
							</p>
							<a href=# class='noticia__btn'> Leer Mas </a>
						</div>",
						$dir,
						$noticia['imagen_destacada'],
						$noticia['tipo'],
						date("d.m.Y", strtotime($noticia['fecha'])),
						$noticia['titulo'],
						$noticia['resumen']
					);
				}
			?>	


				<div class='noticia col-12 col-sm-6 col-md-4'>
					<div
						class="noticia__imagen"
						style="background-image: url('<?php echo $dir; ?>img/noticias/expo1.jpg')"
						>
						<span class='noticia__tipo'>TITULO</span>
						<span class='noticia__fecha'>DD.MM.YYYY</span>
					</div>
					<p class='noticia__descripcion'>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					<a href=# class='noticia__btn'> Leer Mas </a>
				</div>
				<div class='noticia col-12 col-sm-6 col-md-4'>
					<div
						class="noticia__imagen"
						style="background-image: url('<?php echo $dir; ?>img/noticias/teatro1.jpg')"
						>
						<span class='noticia__tipo'>TITULO</span>
						<span class='noticia__fecha'>DD.MM.YYYY</span>
					</div>
					<p class='noticia__descripcion'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis nisl nec nibh vestibulum pharetra eu ac velit. Nullam lacinia sem vel metus bibendum, id pulvinar ligula dapibus. Vivamus ac urna a velit lobortis rutrum eu in orci. Sed vehicula sagittis ante, quis tincidunt elit rhoncus non. Fusce fringilla lobortis nulla molestie rhoncus. Etiam metus tellus, ornare sagittis volutpat quis, vulputate vitae augue. Fusce eu lacus erat.</p>
					<a href=# class='noticia__btn'> Leer Mas </a>
				</div>
				<div class='noticia col-12 col-sm-6 col-md-4'>
					<div
						class="noticia__imagen"
						style="background-image: url('<?php echo $dir; ?>img/noticias/expo2.jpg')"
						>
						<span class='noticia__tipo'>TITULO</span>
						<span class='noticia__fecha'>DD.MM.YYYY</span>
					</div>
					<p class='noticia__descripcion'>Suspendisse eget ante ultrices, auctor eros at, finibus eros. Suspendisse varius viverra laoreet. Duis vulputate at nulla in tincidunt. Aenean eget lacus sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in elementum risus, quis congue arcu. Curabitur maximus pharetra justo, sit amet blandit arcu feugiat ut.</p>
					<a href=# class='noticia__btn'> Leer Mas </a>
				</div>
			</div>
		</div>
	</div>

</body>

</html>