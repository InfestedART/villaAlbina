<?php
	$dir = base_url().'assets/';
?>

	<?php
		setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
		foreach ($seccion as $index => $evento) {
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
					<p class='noticia__fecha'>
						Del %s al %s
					</p>
					<a href='%s' class='noticia__btn'>
						<h5 class='noticia__titulo'>%s %s</h5>
					</a>
					<p class='noticia__descripcion'>%s</p>
					</div>
				</div>",
				base_url().'agenda/?id='.$evento['id_post'],
				$dir,
				$evento['imagen'],
				strftime('%d de %B', strtotime($evento['fecha_ini'])),
				strftime('%d de %B', strtotime($evento['fecha_fin'])),
				base_url().'agenda/?id='.$evento['id_post'],
				$evento['titulo'], $index,
				$evento['info']
			);
		}
	?>
