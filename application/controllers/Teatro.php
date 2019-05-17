<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teatro extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Eventos_model");
		$limit = 6;
		$step = $this->input->get('step', TRUE);
		if (!$step) { $step = 0; }	
		$search = $this->input->post('buscar', TRUE);
		$today = date('Y-m-d');
		$data['search'] = $search;
		$data['search_cat'] = '';
		$data['teatro_data'] = $this->Paginas_model->get_pagina(11)->result_array()[0];
		$data['cant_eventos'] = sizeof($this->Eventos_model->get_valid_obras(
			$today, 60)->result_array()
		);
		$data['step'] = $step;
		$data['limit'] = $limit;
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['color'] = $this->Paginas_model->get_page_color(11)['color'];
		$data['eventos'] = $this->Eventos_model->get_valid_obras(
			$today, 6, $search
		)->result_array();
		$this->load->view('teatro', $data);
	}
}
