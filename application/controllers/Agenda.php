<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends MY_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Areas_model");
		$this->load->model("Eventos_model");
		$this->load->model("Modelo_model");
		$this->load->model("Agenda_model");

		$limit = $this->Modelo_model->get_limit(5);
		$step = $this->input->get('step', TRUE);
		if (!$step) { $step = 0; }		
		$search = $this->input->post('buscar', TRUE);
		$post_search_cat = $this->input->post('buscar_cat', TRUE);
		$get_search_cat = $this->input->get('search_cat', TRUE);
		$pasados = $this->input->get('eventos_pasados', TRUE);
		$method = $pasados 
			? 'get_valid_eventos_pasados'
			: 'get_valid_eventos_futuros';
		$method_fechas = $pasados 
			? 'get_valid_fechas_pasadas'
			: 'get_valid_fechas';
		$search_cat = $post_search_cat ? $post_search_cat : $get_search_cat;
		$today = date('Y-m-d');
		$data['search'] = $search;
		$data['search_cat'] = $search_cat;
		$data['agenda_data'] = $this->Paginas_model->get_pagina(3)->result_array()[0];	
		$data['cant_eventos'] = sizeof(
			$this->Eventos_model->{$method}(
				$today, 50, $search, $search_cat
			)->result_array()
		);
		$data['step'] = $step;
		$data['limit'] = $limit;
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['color'] = $this->Paginas_model->get_page_color(3)['color'];
		$data['areas'] = $this->Areas_model->get_all_areas();
		$data['agenda'] = $this->Agenda_model->get_active_agenda()->result_array()[0];
		$data['eventos'] = $this->Eventos_model->{$method}(
			$today, $limit, $search, $search_cat, $step
		)->result_array();
		$data['fechas'] = $this->Eventos_model->{$method_fechas}(
			$today, $limit, $search, $search_cat, $step
		);
		$data['pasados'] = $pasados;
		$this->load->view('agenda', $data);
	}
}
