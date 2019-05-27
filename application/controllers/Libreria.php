<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libreria extends MY_Controller {
	public function index()	{
		$this->load->model("Cat_libro_model");
		$this->load->model("Paginas_model");
		$this->load->model("Areas_model");
		$this->load->model("Libro_model");
		$limit = 6;
		$search = $this->input->post('buscar', TRUE);
		$search_cat = $this->input->post('buscar_cat', TRUE);
		$step = $this->input->get('step', TRUE);
		if (!$step) { $step = 0; }	
		$data['search'] = $search;
		$data['search_cat'] = $search_cat;
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['libro_data'] = $this->Paginas_model->get_pagina(6)->result_array()[0];
		$data['step'] = $step;
		$data['limit'] = $limit;
		$data['cant_libros'] = sizeof(
			$this->Libro_model->get_valid_libros(
				100, $search, $search_cat
			)->result_array()
		);
		$data['libros'] = $this->Libro_model->get_valid_libros(
			$limit, $search, $search_cat, $step
		)->result_array();
		$data['color'] = $this->Paginas_model->get_page_color(6)['color'];
		$data['categorias'] = $this->Cat_libro_model->get_all_categorias();
		$data['areas'] = $this->Areas_model->get_all_areas()->result_array();
		$this->load->view('libreria', $data);
	}
}
