<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {
	public function index()	{
		$this->load->model("Eventos_model");
		$this->load->model("Paginas_model");
		$this->load->model("Galeria_model");

		$id = $this->input->get('id', TRUE);
		$search = $this->input->post('buscar', TRUE);
		$data['search'] = $search;
		$data['agenda_data'] = $this->Paginas_model->get_pagina(3)->result_array()[0];
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['evento'] = $this->Eventos_model->get_evento($id)->result_object();
		$data['next_evento'] = $this->Eventos_model->get_next_evento($id)->result_object();
		$data['prev_evento'] = $this->Eventos_model->get_prev_evento($id)->result_object();
		$data['galeria_evento'] = $this->Galeria_model->get_galeria($id)->result_array();
		$data['fechas'] = $this->Eventos_model->get_fechas($id)->result_array();
		$data['color'] = $this->Paginas_model->get_page_color(3)['color'];
		$this->load->view('evento', $data);
	}
}
?>