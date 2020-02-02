<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$dir = base_url().'assets/';
	setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = 'Servicios';
		$this->load->view('templates/meta', $data);
	?>
	<link rel="stylesheet" href=<?php  echo $dir."css/pickaday.css"; ?> />
</head>

<body>
	<?php
		$navbar_data['paginas'] = $paginas;
		$navbar_data['selected_pagina'] = $servicio_data;
		$this->load->view('templates/navbar', $navbar_data);

		$subpagina_data['selected_pagina'] = $servicio_data;
		$subpagina_data['form_fields'] = $form_fields;
		$subpagina_data['target'] = 'servicio';
		$this->load->view('templates/subpagina', $subpagina_data);

		$this->load->view('templates/footer');
	?>
	<script src=<?php  echo $dir."js/slider.js"; ?> ></script>
	<script src=<?php  echo $dir."js/subp_slider.js"; ?> ></script>
</body>

</html>