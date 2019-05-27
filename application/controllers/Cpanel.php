<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel extends Admin_Controller {
	public function index() {
		$this->load->model("Paginas_model");
		$this->load->model("Subpaginas_model");

		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$data['open_subpaginas'] = $this->input->get('open_subpaginas', TRUE);
		$data['paginas'] = $this->Paginas_model->get_all_paginas();
		$data['subpaginas'] = $this->Subpaginas_model->get_all_subpaginas();

		$this->load->view('admin_pagina', $data);
	}

	public function close_session() {
		$this->session->sess_destroy();
		redirect('/');
	}
}
