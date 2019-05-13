<?php
	// header('X-Frame-Options: SAMEORIGIN');
	$dir = base_url().'assets/';
?>

	<?php
		foreach ($seccion as $media) {
			printf("
				<div class='slide_container noticia col-12 col-md-6'>
					<div class='publicacion__slide'>
						<iframe src='%s'
							width='500' height='300'							
							allowfullscreen></iframe>
						<h5 class='noticia__titulo'>%s</h5>
					</div>
				</div>
				",
				$media['enlace'],
				$media['titulo']
			);
		};
	?>