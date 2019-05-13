<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libreria extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Libro_model");
		$limit = 6;
		$search = $this->input->post('buscar', TRUE);
		$step = $this->input->get('step', TRUE);
		if (!$step) { $step = 0; }	
		$data['search'] = $search;
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['libro_data'] = $this->Paginas_model->get_pagina(6)->result_array()[0];
		$data['step'] = $step;
		$data['limit'] = $limit;
		$data['cant_libros'] = sizeof(
			$this->Libro_model->get_valid_libros(100)->result_array()
		);
		$data['libros'] = $this->Libro_model->get_valid_libros(
			$limit, $search, $step
		)->result_array();
		$data['color'] = $this->Paginas_model->get_page_color(6)['color'];
		$this->load->view('libreria', $data);
	}
}