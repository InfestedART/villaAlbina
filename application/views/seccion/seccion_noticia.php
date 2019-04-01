<?php
	$dir = base_url().'assets/';
?>

	<div class='row'>
	<?php
		setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
		foreach ($seccion as $noticia) {
			printf(
				"<div class='noticia col-12 col-sm-6 col-md-4'>
					<a href='%s' class='noticia__btn'>
						<div
							class='noticia__imagen'
							style='background-image: url(\"%s%s\")'
							>
						</div>
					</a>
					<p class='noticia__fecha'>
						%s
					</p>
					<a href='%s' class='noticia__btn'>
						<h5 class='noticia__titulo'>%s</h5>
					</a>
					<p class='noticia__descripcion'>%s</p>
				</div>",
				base_url().'noticia/?id='.$noticia['id_post'],
				$dir,
				$noticia['imagen'],
				strftime('%A %d de %B de %Y', strtotime($noticia['fecha'])),
				base_url().'noticia/?id='.$noticia['id_post'],
				$noticia['titulo'],
				$noticia['resumen']
			);
		}
	?>
	</div>
