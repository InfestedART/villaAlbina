<?php
	$dir = base_url().'assets/';
	if (!$active) {
		$active = $subpaginas[0]['enlace'];
	}
?>

	<div class="seccion pt-0 pt-md-3">

		<?php		
		foreach ($subpaginas as $subpag) {

			if ($subpag['mostrar']) {
				$galeria = [];
				$galeria[0] = $subpag['imagen'];
				$leyenda[0] = $subpag['leyenda'] ? $subpag['leyenda'] : '';
				for ($i=0; $i<sizeof($galeria_subpags); $i++) {
					if ($galeria_subpags[$i]['id_subpagina'] == $subpag['id_subpagina']) {
						$galery = $galeria_subpags[$i]['galeria'];						
						for($j=1; $j<=sizeof($galery); $j++) {
							$galeria[$j] = $galery[$j-1]['imagen'];
							$leyenda[$j] = $galery[$j-1]['leyenda'];							
						}
						if (sizeof($galery) > 0 && !$subpag['imagen']) {
							array_shift($galeria);
							array_shift($leyenda);
						}					
					}					
				}
				printf("
					<div class='container %s'>
						<div class='row my-3'>
							<div class='col-12'>
								<h3 class='titulo-pagina' style='color:%s'>%s</h3>
							</div>				
						</div>",
					$active === $subpag['enlace'] ? 'subarea__active' : 'd-none',
					$color,
					$selected_pagina['titulo']
				);

				$subpag_data['subpag'] = $subpag;
				$subpag_data['galeria'] = $galeria;
				$subpag_data['leyenda'] = $leyenda;



				switch ($subpag['id_modelo']) {
					case '0':
						$this->load->view('componentes/custom', $subpag_data);
						break;
					case '1':
						$subpag_data['libros'] = $libros;
						$this->load->view('componentes/libreria', $subpag_data);
						break;	
					case '4':
						$subpag_data['form_fields'] = $form_fields;
						$this->load->view('componentes/formulario', $subpag_data);
						break;
					case '5':
						$subpag_data['form_fields'] = $form_fields;
						$this->load->view('componentes/direccion', $subpag_data);
						break;		
					default:
						$this->load->view('componentes/custom', $subpag_data);
						break;
				}

				echo "</div>";
			}			
		}
		?>
	</div>	

	<div class='row no-gutters text-center seccion__last'>
		<div class='col-12'>
			<div class='timeline'>
			<?php			
			if (sizeof($subpaginas) > 1 ) {
				foreach ($subpaginas as $index => $subpag) {
					printf("
						<a class='timeline__punto %s' href='%s'>
							<span>%s</span>
						</a>",
						$subpag['enlace'] == $active ? 'timeline__active' : '',
						base_url().$selected_pagina['enlace']."?active=".$subpag['enlace'],
						$subpag['titulo']
					);
					if ($index+1 < sizeof($subpaginas)) {
						echo "<span class='timeline__linea'></span>";	
					}						
				}
			}			
			?>
			</div>
		</div>
	</div>