<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Noticias_model");	
		$limit = 6;
		$search = $this->input->post('buscar', TRUE);
		$step = $this->input->get('step', TRUE);
		if (!$step) { $step = 0; }		
		$data['search'] = $search;
		$data['search_cat'] = '';
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['noticias_data'] = $this->Paginas_model->get_pagina(7)->result_array()[0];
		$data['cant_noticias'] = sizeof(
			$this->Noticias_model->get_valid_noticias(100)->result_array()
		);
		$data['step'] = $step;
		$data['limit'] = $limit;
		$data['noticias'] = $this->Noticias_model->get_valid_noticias(
			$limit, $search, $step
		)->result_array();
		$this->load->view('noticias', $data);
	}
}
