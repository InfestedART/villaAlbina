<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends CI_Controller {
	public function index()	{
		$this->load->model("Noticias_model");
		$this->load->model("Paginas_model");

		$id = $this->input->get('id', TRUE);
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['news'] = $this->Noticias_model->get_noticia($id)->result_object();

		$this->load->view('noticia', $data);
	}
}
?>