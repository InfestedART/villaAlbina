<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends CI_Controller {
	public function index()	{
		$this->load->model("noticias_model");
		$this->load->model("paginas_model");

		$id = $this->input->get('id', TRUE);
		$data['paginas'] = $this->paginas_model->get_all_paginas()->result_array();
		$data['news'] = $this->noticias_model->get_noticia($id)->result_object();

		$this->load->view('noticia', $data);
	}
}
?>