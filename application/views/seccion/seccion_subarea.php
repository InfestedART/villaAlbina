<?php
	$dir = base_url().'assets/';
?>

	<?php

	foreach ($seccion as $index => $subarea) {
		if ($id_pagina == $subarea['id_pagina']) {
			$imagen = 'img/placeholder.png';
			$contain = false;
			if ($subarea['id_modelo'] == 4) {
				$imagen = 'img/paraformularios.png';
				$contain = true;
			} else if ($subarea['id_modelo'] == 5) {
				$imagen = 'img/brujulaparadirección.png';
				$contain = true;
			} else if ($subarea['imagen']) {
				$imagen = $subarea['imagen'];
			}

			printf("
				<div class='slide_container col-12 col-sm-6 col-lg-4 mb-3'>
					<div class='publicacion__slide'>
						<div class='subarea__container'>
							<a href='%s'>
							<div
								class='area__imagen'
								style='background-image: url(\"%s%s\")%s'
							></div>
							</a>
						</div>
						<a href='%s'>				
						<h5 class='subarea__titulo'>%s</h5>
						</a>
					</div>
				</div>",
				base_url().$enlace."?active=".$subarea['enlace'],
				$dir,
				$imagen,
				$subarea['id_subpagina'] == '6' || $contain ? '; background-size: contain' : '',
				base_url().$enlace."?active=".$subarea['enlace'],
				$subarea['subpagina']
			);	
		}		
	}
	?>

