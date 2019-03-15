<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {
	public function index()	{
		$this->load->model("paginas_model");
		$this->load->model("noticias_model");	

		$data['paginas'] = $this->paginas_model->get_all_paginas()->result_array();
		$data['noticias'] = $this->noticias_model->get_all_noticias()->result_array();;
		$this->load->view('noticias', $data);
	}
}
