<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Convocatorias extends MY_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Convocatorias_model");
		$this->load->model("Areas_model");
		$limit = 6;
		$post_search = $this->input->post('buscar', TRUE);
		$get_search = $this->input->get('buscar', TRUE);
		$search = $post_search ? $post_search : $get_search;
		$post_search_cat = $this->input->post('buscar_cat', TRUE);
		$get_search_cat = $this->input->get('search_cat', TRUE);
		$search_cat = $post_search_cat ? $post_search_cat : $get_search_cat;
		$step = $this->input->get('step', TRUE);
		if (!$step) { $step = 0; }	
		$today = date('Y-m-d');
		$data['search'] = $search;
		$data['search_cat'] = $search_cat;		
		$data['convo_data'] = $this->Paginas_model->get_pagina(8)->result_array()[0];
		$data['cant_convo'] = sizeof(
			$this->Convocatorias_model->get_valid_convocatorias(
				$today, 100, $search, $search_cat, $step
			)->result_array()
		);
		$data['step'] = $step;
		$data['limit'] = $limit;
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas()->result_array();
		$data['color'] = $this->Paginas_model->get_page_color(8)['color'];
		$data['convocatorias'] = $this->Convocatorias_model->get_valid_convocatorias(
			$today, $limit, $search, $search_cat, $step
		)->result_array();
		$this->load->view('convocatorias', $data);
	}
}

