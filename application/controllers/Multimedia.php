<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multimedia extends MY_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Media_model");	
		$this->load->model("Modelo_model");	
		$limit = $this->Modelo_model->get_limit(6);
		$search = $this->input->post('buscar', TRUE);
		$step = $this->input->get('step', TRUE);
		if (!$step) { $step = 0; }		
		$data['search'] = $search;
		$post_search_cat = $this->input->post('buscar_cat', TRUE);
		$get_search_cat = $this->input->get('search_cat', TRUE);
		$search_cat = $post_search_cat ? $post_search_cat : $get_search_cat;
		$data['search_cat'] = $search_cat;
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['media_data'] = $this->Paginas_model->get_pagina(9)->result_array()[0];
		$data['cant_media'] = sizeof(
			$this->Media_model->get_valid_media(100)->result_array()
		);
		$data['step'] = $step;
		$data['limit'] = $limit;
		$data['multimedia'] = $this->Media_model->get_valid_media(
			$limit, $search, $search_cat, $step
		)->result_array();
		$this->load->view('multimedia', $data);
	}
}
