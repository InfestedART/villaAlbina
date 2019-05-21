<?php
	// header('X-Frame-Options: SAMEORIGIN');
	$dir = base_url().'assets/';
?>

	<?php
		foreach ($seccion as $media) {
			printf("
				<div class='slide_container noticia col-12 col-md-6'>
					<div class='publicacion__slide'>
					<div class='iframe__container'>
						<iframe src='%s'
							width='%s'
							height='%s'
							allowfullscreen></iframe>
						<h5 class='noticia__titulo'>%s</h5>
					</div>
					</div>
				</div>
				",
				$media['enlace'],
				'100%', '100%',
				$media['titulo']
			);
		};
	?>