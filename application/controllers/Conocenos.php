<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conocenos extends MY_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Areas_model");
		$this->load->model("Galeria_subpagina_model");
		$this->load->model("Subpaginas_model");
		$this->load->model("Equipo_model");
		$search = $this->input->post('buscar', TRUE);	
		$data['search'] = $search;
		$data['search_cat'] = '';
		$data['active'] = $this->input->get('active', TRUE);
		$data['color'] = $this->Paginas_model->get_page_color(1)['color'];
		$data['conocenos_data'] = $this->Paginas_model->get_pagina(1)->result_array()[0];
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['subareas'] = $this->Subpaginas_model->get_valid_subpaginas(1)->result_array();
		$data['equipo'] = $this->Equipo_model->get_valid_miembros()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas()->result_array();

		$subpaginas_ids = $this->Subpaginas_model->get_subpaginas_id(1);	
		$galerias = [];
		foreach ($subpaginas_ids as $index => $subpagina_id) {
			$galeria_temp = $this->Galeria_subpagina_model->get_galeria(
				$subpagina_id['id_subpagina']
			)->result_array();

			$galerias[$index] = array(
				'id_subpagina' => $subpagina_id['id_subpagina'],
				'galeria' => $galeria_temp
			);
		}
		$data['galeria_subareas'] = $galerias;

		$this->load->view('conocenos', $data);
	}
}
