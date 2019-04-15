<?php
	$dir = base_url().'assets/';
?>

	<?php
	foreach ($seccion as $index => $subarea) {
		if ($id_pagina == $subarea['id_pagina']) {
			printf("
				<div class='slide_container col-sm-6 col-md-4 mb-3'>
					<div class='publicacion__slide'>
					<a href='%s'>
						<div class='subarea__container'>
							<img src='%s%s' class='subarea__imagen'>
						</div>
					<a href='%s'>
						<h5 class='subarea__titulo'>%s</h5>
					</a>
					</div>
				</div>",
				base_url().$enlace."?active=".$subarea['enlace'],
				$dir, $subarea['imagen'],
				base_url().$enlace."?active=".$subarea['enlace'],
				$subarea['subpagina']
			);	
		}		
	}
	?>

