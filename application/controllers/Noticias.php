<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Noticias_model");	
		$search = $this->input->post('buscar_noticia', TRUE);
		$data['search'] = $search;
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['noticias'] = $this->Noticias_model->get_valid_noticias(
			6, $search
		)->result_array();
		$this->load->view('noticias', $data);
	}
}
