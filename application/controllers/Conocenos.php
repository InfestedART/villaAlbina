<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conocenos extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Subareas_model");
		$this->load->model("Equipo_model");
		/*
		$this->load->model("Paginas_model");
		$this->load->model("Noticias_model");	
		$search = $this->input->post('buscar_noticia', TRUE);
		$data['search'] = $search;
		$data['paginas'] = $this->Paginas_model->get_all_paginas()->result_array();
		$data['noticias'] = $this->Noticias_model->get_valid_noticias(
			6, $search
		)->result_array();
		*/
		$data['active'] = $this->input->get('active', TRUE);
		$data['color'] = $this->Paginas_model->get_page_color(1)['color'];
		$data['paginas'] = $this->Paginas_model->get_all_paginas()->result_array();
		$data['subareas'] = $this->Subareas_model->get_valid_subareas()->result_array();
		$data['equipo'] = $this->Equipo_model->get_valid_miembros()->result_array();
		$this->load->view('conocenos', $data);
	}
}
