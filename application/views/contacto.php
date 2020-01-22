<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$dir = base_url().'assets/';
	setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');

	class Field {
		public $type;
		public $column;
		public $label;
	}

	$input_nombre = new Field();
	$input_nombre->type = 'input';
	$input_nombre->column = 1;
	$input_nombre->label = 'Nombre y Apellido:';
	$input_nombre->name = 'nombre';

	$input_email = new Field();
	$input_email->type = 'input';
	$input_email->column = 1;
	$input_email->label = 'Email:';
	$input_email->name = 'email';

	$input_telefono = new Field();
	$input_telefono->type = 'input';
	$input_telefono->column = 1;
	$input_telefono->label = 'Teléfono:';
	$input_telefono->name = 'telefono';

	$textarea = new Field();
	$textarea->type = 'textarea';
	$textarea->column = 2;
	$textarea->rows = 7;
	$textarea->label = 'Comentario:';
	$textarea->name = 'comentario';

	$form_fields = [
		$input_nombre,
		$input_email,
		$input_telefono,
		$textarea
	];

	$target='contacto';
?>


<!DOCTYPE html>
<head>
	<?php
		$data['title'] = 'Contacto';
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>
	<?php
		$navbar_data['paginas'] = $paginas;
		$navbar_data['areas'] = $areas;
		$navbar_data['selected_pagina'] = $contacto_data;
		$this->load->view('templates/navbar', $navbar_data);

		$subpagina_data['selected_pagina'] = $contacto_data;
		$subpagina_data['form_fields'] = $form_fields;
		$subpagina_data['target'] = 'contacto';
		$this->load->view('templates/subpagina', $subpagina_data);

		$footer_data['areas'] = $areas;
		$this->load->view('templates/footer', $footer_data);
	?>
	<script src=<?php  echo $dir."js/slider.js"; ?> ></script>
	<script src=<?php  echo $dir."js/subp_slider.js"; ?> ></script>
</body>

</html>