<?php
	$dir = base_url().'assets/';
?>

	<?php
	foreach ($seccion as $index => $subarea) {
		if ($id_pagina == $subarea['id_pagina']) {
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
				base_url().$enlace."?active=".$subarea['enlace'],
				$dir,
				$subarea['imagen'] ? $subarea['imagen'] : 'img/placeholder.jpg',
				base_url().$enlace."?active=".$subarea['enlace'],
				$subarea['subpagina']
			);	
		}		
	}
	?>

