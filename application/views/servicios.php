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
	$calendar->label = 'Agenda la fecha para la sesión:';	
	$calendar->name = 'fecha';

	$input_motivo = new Field();
	$input_motivo->type = 'input';
	$input_motivo->column = 1;
	$input_motivo->label = 'Motivo (recién casados, 15 años, otros):';
	$input_motivo->name = 'motivo';

	$input_contacto = new Field();
	$input_contacto->type = 'input';
	$input_contacto->column = 1;
	$input_contacto->label = 'Nombre de contacto:';
	$input_contacto->name = 'contacto';

	$input_direccion = new Field();
	$input_direccion->type = 'input';
	$input_direccion->column = 1;
	$input_direccion->label = 'Dirección y país de origen:';
	$input_direccion->name = 'pais';

	$input_email = new Field();
	$input_email->type = 'input';
	$input_email->column = 1;
	$input_email->label = 'Email:';
	$input_email->name = 'email';

	$input_telefono = new Field();
	$input_telefono->type = 'input';
	$input_telefono->column = 2;
	$input_telefono->label = 'Teléfono:';
	$input_telefono->name = 'telefono';

	$textarea = new Field();
	$textarea->type = 'textarea';
	$textarea->column = 2;
	$textarea->rows = 6;
	$textarea->label = 'Comentario:';
	$textarea->name = 'comentario';

	$note = new Field();
	$note->type = 'note';
	$note->column = 2;
	$note->text = 'Le recordamos que la reserva se hace efectiva con la formalización del pago 48 horas antes de la actividad. <br>
Una vez envíe el formulario, se le remitirá por correo la información de precios y forma de pago.';	

	$form_fields = [
		$calendar,
		$input_motivo,
		$input_contacto,
		$input_direccion,
		$input_email,
		$input_telefono,
		$textarea,
		$note
	];

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
		$navbar_data['areas'] = $areas;
		$navbar_data['selected_pagina'] = $servicio_data;
		$this->load->view('templates/navbar', $navbar_data);

		$subpagina_data['selected_pagina'] = $servicio_data;
		$subpagina_data['form_fields'] = $form_fields;
		$this->load->view('templates/subpagina', $subpagina_data);

		$footer_data['areas'] = $areas;
		$this->load->view('templates/footer', $footer_data);
	?>
	<script src=<?php  echo $dir."js/slider.js"; ?> ></script>
	<script src=<?php  echo $dir."js/subp_slider.js"; ?> ></script>
</body>

</html>