<?php
	$dir = base_url().'assets/';
?>

	<div class='row'>
	<?php
	foreach ($seccion as $libro) {
		printf("
			<div class='eternal-carrousel__slide'>
				<div
					class='portada-libro col-md-5'
					style='background-image: url(\"%s%s\")'
				>						
				</div>
				<div class='container-libro col-md-7'>
					<h4 class='libro__subtitulo'>%s</h4>
					<p>%s</p>
					<p>%s</p>
					<p>%s</p>
					<p 	class='container-libro__precio'
						style='background-color: %s'
					>Bs. %s</p>
				</div>
			</div>",
			$dir, $libro['portada'],
			$libro['titulo'],
			$libro['autor'],
			$libro['descripcion'],
			$libro['categoria'],
			$color,
			$libro['precio']
		);
	}
	?>
	</div>
