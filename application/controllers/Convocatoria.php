<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Convocatoria extends CI_Controller {
	public function index()	{
		$this->load->model("Convocatorias_model");
		$this->load->model("Paginas_model");
		$this->load->model("Galeria_model");
		$this->load->model("Archivo_model");

		$id = $this->input->get('id', TRUE);
		$search = $this->input->post('buscar', TRUE);
		$data['search'] = $search;
		$data['convo_data'] = $this->Paginas_model->get_pagina(8)->result_array()[0];
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['convocatoria'] = $this->Convocatorias_model->get_convocatoria($id)->result_object();
		$data['next_convo'] = $this->Convocatorias_model->get_next_convo($id)->result_object();
		$data['prev_convo'] = $this->Convocatorias_model->get_prev_convo($id)->result_object();
		$data['galeria_convo'] = $this->Galeria_model->get_galeria($id)->result_array();
		$data['archivos_convo'] = $this->Archivo_model->get_archivos($id)->result_array();
		$data['color'] = $this->Paginas_model->get_page_color(8)['color'];
		$this->load->view('convocatoria', $data);
	}
}
?>