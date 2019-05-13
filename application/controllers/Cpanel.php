<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel extends MY_Controller {
	public function index() {
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$sidebardata['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$sidebardata['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['sidebar'] = $this->load->view('templates/admin_sidebar', $sidebardata, true);
		$data['header'] = $this->load->view('templates/admin_header', NULL, true);
		$data['footer'] = $this->load->view('templates/admin_footer', NULL, true);

		$this->load->view('cpanel', $data);
	}

	public function close_session() {
		$this->session->sess_destroy();
		redirect('/');
	}
}
