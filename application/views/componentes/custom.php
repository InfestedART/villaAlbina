<?php
	$dir = base_url().'assets/';
?>
	<div class='row'>
		<?
		$size = $galeria[0] ? 6 : 4;
		printf(
			"<div class='publicacion__container col-md-%s col-xl-%s %s' >",
			$size,
			$size - 1,
			$subpag['vertical'] == '1' ? 'offset-md-3' : 'offset-xl-1'
		);
		
		printf("
			<div class='galeria__slider galeria__slider_%s'>",
			$subpag['id_subpagina']
		);

		$first = false;
		if (!$active) {
			$first = true;
		}

		foreach ($galeria as $index => $img_galeria) {
			$img_type = $img_galeria ? substr($img_galeria, -3) : '';
			printf(
				"<input type='hidden' id='%s' value='%s' />
				 <div class='galeria__slide galeria__slide_%s'>
					<div class='galeria__img-container %s %s'>
					<img
						class='galeria__imagen galeria-slide'
						src='%s'
					/>
					</div>",
			$first || ($active === $subpag['enlace']) ? 'galeria_active' : '',
			$subpag['id_subpagina'],
			$subpag['id_subpagina'],
			$img_galeria ? '' : 'hidden',
			$img_type === 'png' ? 'galeria_transparent' : '',
			$img_galeria ? $dir.$img_galeria : ''
		);
		$first = false;
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
			"<p class='publicacion__leyenda'> %s </p>",
			sizeof($leyenda) > 0 ? $leyenda[$index]	: ''
		);	
		echo "</div>";
	}

	echo "</div>";

	printf(	
		"	</div>
		%s
			<div class='col-md-%s %s'>
				<h3 class='publicacion__sub-titulo' style='color:%s'>%s</h3>
				<div class='publicacion__column' %s>%s</div>
			</div>",
		$subpag['vertical'] == '1' ? "</div><div class='row'> " : '',
		12 - $size,
		$subpag['vertical'] == '1' ? 'offset-md-3' : '',
		$color,
		$subpag['titulo'],
		$subpag['vertical'] == '1' ? 'style="height: auto"' : '',
		$subpag['html']
	);

	?>

</div>
