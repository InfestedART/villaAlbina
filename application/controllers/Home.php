<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Portada_model");

		$data['portadas'] = $this->Portada_model->get_valid_portadas();
		$data['paginas'] = $this->Paginas_model->get_valid_paginas();
		$pages = $data['paginas']->result_array();

		foreach ($pages as $index => $pagina) {
			$this->load->model($pagina['model']);
			$seccion[$index] = $this
				->{$pagina['model']}
				->{$pagina['get_all_valid']}($pagina['default_limit'])
				->result_array();
		}
		
		$this->load->model("Noticias_model");
		$test_model = 'Noticias_model';
		$test_method = 'get_valid_noticias';
		$data['noticias'] = $this->$test_model->{$test_method}(6);
		$data['seccion'] = $seccion;
		$this->load->view('home', $data);
	}
}
