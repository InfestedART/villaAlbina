<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libreria extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Libro_model");
		$search = $this->input->post('search_libro', TRUE);

		$data['search'] = $search;
		$data['paginas'] = $this->Paginas_model->get_all_paginas()->result_array();
		$data['libros'] = $this->Libro_model->get_valid_libros($search)->result_array();;
		$this->load->view('libreria', $data);
	}
}
