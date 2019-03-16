<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Noticias_model");	

		$data['paginas'] = $this->Paginas_model->get_all_paginas()->result_array();
		$data['noticias'] = $this->Noticias_model->get_all_noticias()->result_array();;
		$this->load->view('noticias', $data);
	}
}
