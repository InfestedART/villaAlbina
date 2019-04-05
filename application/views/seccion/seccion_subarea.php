<?php
	$dir = base_url().'assets/';
?>

	<div class='row no-gutters'>
	<?php
	foreach ($seccion as $subarea) {
		printf("
			<div class='col-sm-6 col-md-4 mb-3'>
				<a href='%s'>
					<div class='subarea__container'>
						<img src='%s%s' class='subarea__imagen'>
					</div>
				<a href='%s'>
					<h5 class='subarea__titulo'>%s</h5>
				</a>
			</div>",
			base_url().$enlace."?active=".$subarea['enlace'],
			$dir, $subarea['imagen'],
			base_url().$enlace."?active=".$subarea['enlace'],
			$subarea['subpagina']
		);
	}
	?>
	</div>
