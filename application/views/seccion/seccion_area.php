<?php
	$dir = base_url().'assets/';
?>

	<?php
	foreach ($seccion as $index => $area) {
		printf("
			<div class='slide_container col-12 col-sm-6 col-lg-4 mb-3'>
				<div class='publicacion__slide'>
					<div class='subarea__container'>
						<a href='%s'>
						<img src='%s%s' class='subarea__imagen'>
						<a href='%s'>
					</div>					
					<h5 class='subarea__titulo'>%s</h5>
				</a>
				</div>
			</div>",
			base_url().$enlace."?area=".$area['enlace'],
			$dir,
			$area['imagen'] ? $area['imagen'] : 'img/placeholder.jpg',
			base_url().$enlace."?area=".$area['enlace'],
			$area['area']
		);	
	
	}
	?>

