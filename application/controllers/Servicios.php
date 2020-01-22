<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends MY_Controller {

	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Areas_model");
		$this->load->model("Subpaginas_model");
			$this->load->model("Galeria_subpagina_model");

		$search = $this->input->post('buscar', TRUE);	

		$data['active'] = $this->input->get('active', TRUE);
		$data['color'] = $this->Paginas_model->get_page_color(1)['color'];
		$data['search'] = $search;
		$data['search_cat'] = '';
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas()->result_array();
		$data['servicio_data'] = $this->Paginas_model->get_pagina(6)->result_array()[0];
		$data['subpaginas'] = $this->Subpaginas_model->get_valid_subpaginas(6)->result_array();

		$subpaginas_ids = $this->Subpaginas_model->get_subpaginas_id(6);
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
		$data['galeria_subpags'] = $galerias;

		$this->load->view('servicios', $data);
	}
}

?>