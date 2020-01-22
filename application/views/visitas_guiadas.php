<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$dir = base_url().'assets/';
	setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');

	class Field {
		public $type;
		public $column;
		public $label;
	}

	$calendar = new Field();
	$calendar->type = 'calendar';
	$calendar->column = 1;
	$calendar->label = 'Agenda la fecha y horario de su visita:';	
	$calendar->name = 'calendario';

	$input_tipo_inst = new Field();
	$input_tipo_inst->type = 'radio';
	$input_tipo_inst->column = 1;
	$input_tipo_inst->label = 'Tipo de Institución:';
	$input_tipo_inst->name = 'tipo_inst';

	$input_inst = new Field();
	$input_inst->type = 'input';
	$input_inst->column = 1;
	$input_inst->label = 'Nombre de la Institución o Grupo:';
	$input_inst->name = 'institucion';

	$input_cant = new Field();
	$input_cant->type = 'input';
	$input_cant->column = 1;
	$input_cant->label = 'Número de personas:';
	$input_cant->name = 'num_personas';

	$input_direccion = new Field();
	$input_direccion->type = 'input';
	$input_direccion->column = 1;
	$input_direccion->label = 'Dirección y país de origen:';
	$input_direccion->name = 'pais';

	$input_encargado = new Field();
	$input_encargado->type = 'input';
	$input_encargado->column = 2;
	$input_encargado->label = 'Nombre del encargado:';
	$input_encargado->name = 'encargado';

	$input_telefono = new Field();
	$input_telefono->type = 'input';
	$input_telefono->column = 2;
	$input_telefono->label = 'Teléfono:';
	$input_telefono->name = 'telefono';

	$input_email = new Field();
	$input_email->type = 'input';
	$input_email->column = 2;
	$input_email->label = 'Email:';
	$input_email->name = 'email';

	$textarea = new Field();
	$textarea->type = 'textarea';
	$textarea->column = 2;
	$textarea->rows = 8;
	$textarea->label = 'Comentario:';
	$textarea->name = 'comentario';

	$form_fields = [
		$calendar,
		$input_tipo_inst,
		$input_inst,
		$input_cant,
		$input_direccion,
		$input_encargado,
		$input_telefono,
		$input_email,
		$textarea
	];

?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = 'Visitas';
		$this->load->view('templates/meta', $data);
	?>
	<link rel="stylesheet" href=<?php  echo $dir."css/pickaday.css"; ?> />
</head>

<body>
	<?php
		$navbar_data['paginas'] = $paginas;
		$navbar_data['selected_pagina'] = $museo_data;
		$this->load->view('templates/navbar', $navbar_data);

		$subpagina_data['selected_pagina'] = $museo_data;
		$subpagina_data['form_fields'] = $form_fields;
		$this->load->view('templates/subpagina', $subpagina_data);

		$footer_data['areas'] = $areas;
		$this->load->view('templates/footer', $footer_data);
	?>
	<script src=<?php  echo $dir."js/slider.js"; ?> ></script>
	<script src=<?php  echo $dir."js/subp_slider.js"; ?> ></script>
</body>

</html>