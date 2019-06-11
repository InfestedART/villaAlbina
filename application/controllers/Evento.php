<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends MY_Controller {
	public function index()	{
		$this->load->model("Eventos_model");
		$this->load->model("Paginas_model");
		$this->load->model("Galeria_model");
		$this->load->model("Areas_model");

		$id = $this->input->get('id', TRUE);
		$search = $this->input->post('buscar', TRUE);
		$data['search'] = $search;
		$data['search_cat'] = '';
		$data['agenda_data'] = $this->Paginas_model->get_pagina(3)->result_array()[0];
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['evento'] = $this->Eventos_model->get_evento($id)->result_object();
		$today = date('Y-m-d');
		$fecha_ini = $this->Eventos_model->get_fecha_ini($id);
		$data['next_evento'] = $this
			->Eventos_model
			->get_next_evento($id, $fecha_ini)
			->result_object();
		$data['prev_evento'] = $this
			->Eventos_model
			->get_prev_evento($id, $fecha_ini)
			->result_object();
		$data['galeria_evento'] = $this->Galeria_model->get_galeria($id)->result_array();
		$data['fechas'] = $this->Eventos_model->get_fechas($id)->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas();
		$data['color'] = $this->Paginas_model->get_page_color(3)['color'];
		$this->load->view('evento', $data);
	}
}
?>