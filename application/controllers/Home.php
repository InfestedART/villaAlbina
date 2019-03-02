<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->model("paginas_model");
		$this->load->model("noticias_model");	

		$data['paginas'] = $this->paginas_model->get_all_paginas();
		$data['noticias'] = $this->noticias_model->get_ultimas_noticias();
		$this->load->view('home', $data);
	}
}
