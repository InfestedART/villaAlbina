<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->model("paginas_model");	

		$data['title'] = 'prueba';
		$data['paginas'] = $this->paginas_model->get_all_paginas();
		$this->load->view('home', $data);
	}
}
