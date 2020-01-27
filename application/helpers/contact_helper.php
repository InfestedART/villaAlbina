<?php

	class Field {
		public $type;
		public $column;
		public $label;
	}

	if ( ! function_exists('get_contacto_fields')){
	   	function get_contacto_fields(){

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

		return $form_fields;
	}}

	if ( ! function_exists('get_servicios_fields')){
	   	function get_servicios_fields(){

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
		$note->name = 'note';

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

		return $form_fields;
	}}

if ( ! function_exists('get_visitas_fields')){
	   	function get_visitas_fields(){

		$calendar = new Field();
		$calendar->type = 'calendar';
		$calendar->column = 1;
		$calendar->label = 'Agenda la fecha y horario de su visita:';	
		$calendar->name = 'fecha';

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

		return $form_fields;
	}}


?>