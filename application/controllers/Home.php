<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Noticias_model");
		$this->load->model("Portada_model");

		$data['portadas'] = $this->Portada_model->get_valid_portadas();
		$data['paginas'] = $this->Paginas_model->get_all_paginas();
		$data['noticias'] = $this->Noticias_model->get_ultimas_noticias();
		$this->load->view('home', $data);
	}
}
