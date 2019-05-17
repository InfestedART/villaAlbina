<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conocenos extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Subpaginas_model");
		$this->load->model("Equipo_model");
		$search = $this->input->post('buscar', TRUE);
		$data['search'] = $search;
		$data['search_cat'] = '';
		$data['active'] = $this->input->get('active', TRUE);
		$data['color'] = $this->Paginas_model->get_page_color(1)['color'];
		$data['conocenos_data'] = $this->Paginas_model->get_pagina(1)->result_array()[0];
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['subareas'] = $this->Subpaginas_model->get_valid_subpaginas()->result_array();
		$data['equipo'] = $this->Equipo_model->get_valid_miembros()->result_array();
		$this->load->view('conocenos', $data);
	}
}
