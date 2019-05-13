<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multimedia extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Media_model");	
		$limit = 6;
		$search = $this->input->post('buscar', TRUE);
		$step = $this->input->get('step', TRUE);
		if (!$step) { $step = 0; }		
		$data['search'] = $search;
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['media_data'] = $this->Paginas_model->get_pagina(10)->result_array()[0];
		$data['cant_media'] = sizeof(
			$this->Media_model->get_valid_media(100)->result_array()
		);
		$data['step'] = $step;
		$data['limit'] = $limit;
		$data['multimedia'] = $this->Media_model->get_valid_media(
			$limit, $search, $step
		)->result_array();
		$this->load->view('multimedia', $data);
	}
}