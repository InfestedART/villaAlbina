<?php
	$dir = base_url().'assets/';
?>

	<div class='row no-gutters'>
	<?php
	foreach ($seccion as $libro) {
		printf("
			<div class='col-md-6 mb-3'>
				<div class='portada-libro'>
					<img src='%s%s'>
				</div>
				<div class='container-libro'>
					<h4 class='libro__subtitulo'>%s</h4>
					<p>%s</p>
					<p>%s</p>
					<p>%s</p>
					<p 	class='container-libro__precio'
						style='background-color: %s'
					>Bs. %s</p>
				</div>
			</div>",
			$dir, $libro['imagen'],
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
