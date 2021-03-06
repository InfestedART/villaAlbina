<?php
	$dir = base_url().'assets/';
?>

	<?php
		setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
		foreach ($seccion as $noticia) {
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
					> %s </p>
					<a href='%s' class='noticia__btn'>
						<h5 class='noticia__titulo'>%s</h5>
					</a>
					<p class='noticia__descripcion'>%s</p>
					</div>
				</div>",
				base_url().'noticia/?id='.$noticia['id_post'],
				$dir,
				$noticia['imagen'] ? $noticia['imagen'] : 'img/placeholder.png',
				$color,
				strftime('%d de %B de %Y', strtotime($noticia['fecha'])),
				base_url().'noticia/?id='.$noticia['id_post'],
				$noticia['titulo'],
				$noticia['resumen']
			);
		}
	?>

