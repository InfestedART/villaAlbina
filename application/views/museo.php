<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';
// $dir = $dir_assets.'uploads/';
setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
?>


<!DOCTYPE html>
<head>
	<?php
		$data['title'] = 'Museo';
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>
	<?php
		$navbar_data['paginas'] = $paginas;
		// $navbar_data['areas'] = $areas;
		$navbar_data['selected_pagina'] = $museo_data;
		$this->load->view('templates/navbar', $navbar_data);

		$subpagina_data['selected_pagina'] = $museo_data;
		$subpagina_data['libros'] = $libros;
		$this->load->view('templates/subpagina', $subpagina_data);

		// $footer_data['areas'] = $areas;
		$this->load->view('templates/footer' /* , $footer_data */);
	?>
	<script src=<?php  echo $dir."js/slider.js"; ?> ></script>
	<script src=<?php  echo $dir."js/subp_slider.js"; ?> ></script>
</body>


</html>