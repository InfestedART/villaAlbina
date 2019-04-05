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
				->{$pagina['metodo']}($pagina['default_limit'])
				->result_array();
		}
		$data['seccion'] = $seccion;
		$this->load->view('home', $data);
	}
}
