<?php
	$dir = base_url().'assets/';
?>
<div class='row'>
<?php
	printf("
		<div class='col-md-10'>
			<h3 class='publicacion__sub-titulo' style='color:%s'>%s</h3>
			<div class='text-left'>%s</div>
		</div>",
		$color,
		$subpag['titulo'],
		$subpag['html']
	);

	$show_no_results = sizeof($libros) < 1 ? '' : 'd-none';
?>	
	<div class='no-results <?php echo $show_no_results; ?>'>
		<p>No se encontraron resultados con esos parámetros de busqueda</p>
		<a class='no-result__volver' href=''>
			Ver todos los archivos multimedia
		</a>
	</div>

	<div class='eternal-carrousel mt-2 w-100'>
		<div class='row'>
		<?php			
		foreach ($multimedia as $media) {
			printf("
				<div class='noticia col-12 col-md-6'>
				<div class='iframe__container'>
					<iframe src='%s'
						width='%s'
						height='%s'						
						allowfullscreen></iframe>
				</div>
				<h5 class='subarea__titulo'>%s</h5>
				</div>",
				$media['enlace'],
				'100%', '100%',
				$media['titulo']
				);
			}
		?>
		</div>
	</div>


</div>