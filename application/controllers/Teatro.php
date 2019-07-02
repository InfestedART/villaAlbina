<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teatro extends MY_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Areas_model");
		$this->load->model("Obras_model");
		$this->load->model("Modelo_model");	
		$this->load->model("Cartelera_model");
		
		$limit = $this->Modelo_model->get_limit(6);
		$step = $this->input->get('step', TRUE);
		if (!$step) { $step = 0; }	
		$search = $this->input->post('buscar', TRUE);
		$pasados = $this->input->get('obras_pasadas', TRUE);
		$method = $pasados 
			? 'get_valid_obras_pasadas'
			: 'get_valid_obras';
		$method_fechas = $pasados 
			? 'get_valid_fechas_pasadas'
			: 'get_valid_fechas';
		$today = date('Y-m-d');
		$data['search'] = $search;
		$data['search_cat'] = '';
		$data['teatro_data'] = $this->Paginas_model->get_pagina(11)->result_array()[0];
		$data['cant_obras'] = sizeof($this->Obras_model->get_valid_obras(
			$today, 60, $search)->result_array()
		);
		$data['step'] = $step;
		$data['limit'] = $limit;
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas()->result_array();
		$data['color'] = $this->Paginas_model->get_page_color(11)['color'];
		$data['carteleras'] = $this->Cartelera_model->get_all_carteleras()->result_array();
		$data['obras'] = $this->Obras_model->{$method}(
			$today, $limit, $search
		)->result_array();
		$data['fechas'] = $this->Obras_model->{$method_fechas}(
			$today, $limit, $search, $step
		);
		$data['pasados'] = $pasados;
		$this->load->view('teatro', $data);
	}
}
