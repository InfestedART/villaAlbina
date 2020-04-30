<?php
	$dir = base_url().'assets/';
?>
	<?php
		/*
		echo "<pre>";
		print_r($libros);  
		echo "</pre>";
		*/
	?>

<div class='row'>
<?php
	printf("
		<div class='col-md-8 offset-md-1'>
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
			Ver todos los Libros
		</a>
	</div>

	<div class='eternal-carrousel mt-4'>
		<div class='row'>
		<?php
		foreach ($libros as $libro) {
			printf("
				<div class='col-md-6 mb-3'>
					<div class='portada-libro'>
						<img src='%s%s'>
					</div>
					<div class='container-libro mb-4 mb-md-0'>
						<h4 class='libro__subtitulo'>%s</h4>
						<p class='libro__categoria'>%s </p>
						%s
						%s
						<p>%s</p>
						<p>%s</p>
						<p>%s</p>
						<p class='container-libro__precio'>Bs. %s</p>
					</div>
				</div>",
				$dir, $libro['imagen'],
				$libro['titulo'],
				$libro['categoria'],
				$libro['autor'],
				$libro['editorial'] ? '<p>'.$libro['editorial'].'</p>' : '',
				$libro['year'] ? '<p>'.$libro['year'].'</p>' : '',
				$libro['descripcion'],
				$libro['paginas'] ? '<p>'.$libro['paginas'].' páginas</p>' : '',
				$libro['precio']
			);
		}
		?>
		</div>
	</div>


</div>