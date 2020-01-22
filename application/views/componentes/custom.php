<?php
	$dir = base_url().'assets/';
?>
	<div class='row'>
		<div class='publicacion__container col-md-6 col-xl-5 offset-xl-1'>
		<?
		printf("
			<div class='galeria__slider galeria__slider_%s'>",
			$subpag['id_subpagina']
		);

		foreach ($galeria as $index => $img_galeria) {
			printf(
				"<input type='hidden' id='%s' value='%s' />
				 <div class='galeria__slide galeria__slide_%s'>
					<div class='galeria__img-container'>
					<img
						class='galeria__imagen galeria-slide'
						src='%s'
					/>
					</div>",
			$active === $subpag['enlace'] ? 'galeria_active' : '',
			$subpag['id_subpagina'],
			$subpag['id_subpagina'],
			$dir.$img_galeria
		);
		if(sizeof($galeria) > 1) {
			echo "<ul class='publicacion__slider-dots pt-1'>";
			foreach ($galeria as $img_index => $img_galeria) {
				printf("										
					<li
						class='slider_dot galeria_dot_%s %s'
						id='dot_%s'
					></li>",
					$subpag['id_subpagina'],
					$img_index == $index ? 'active' : '',								
					$img_index										
				);
				$dots_active = false;
			}
			echo "</ul>";
		}							
		printf(
			"<p> %s </p>",
			sizeof($leyenda) > 0 ? $leyenda[$index]	: ''
		);	
		echo "</div>";
	}

	echo "</div>";

	printf(	
		"	</div>
			<div class='col-md-6'>
				<h3 class='publicacion__sub-titulo' style='color:%s'>%s</h3>
				<div class='publicacion__column'>%s</div>
			</div>",
		$color,
		$subpag['titulo'],
		$subpag['html']
	);

	?>

</div>
