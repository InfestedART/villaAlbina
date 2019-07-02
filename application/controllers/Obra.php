<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obra extends MY_Controller {
	public function index()	{
		$this->load->model("Obras_model");
		$this->load->model("Paginas_model");
		$this->load->model("Galeria_model");
		$this->load->model("Areas_model");

		$id = $this->input->get('id', TRUE);
		$search = $this->input->post('buscar', TRUE);
		$data['search'] = $search;
		$data['search_cat'] = '';
		$data['agenda_data'] = $this->Paginas_model->get_pagina(11)->result_array()[0];
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['evento'] = $this->Obras_model->get_obra($id)->result_object();
		$today = date('Y-m-d');
		$fecha_ini = $this->Obras_model->get_fecha_ini($id);
		$data['next_obra'] = $this
			->Obras_model
			->get_next_obra($id, $fecha_ini)
			->result_object();
		$data['prev_obra'] = $this
			->Obras_model
			->get_prev_obra($id, $fecha_ini)
			->result_object();
		$data['galeria_obra'] = $this->Galeria_model->get_galeria($id)->result_array();
		$data['fechas'] = $this->Obras_model->get_fechas($id)->result_array();
		$data['color'] = $this->Paginas_model->get_page_color(11)['color'];
		$data['areas'] = $this->Areas_model->get_all_areas();
		$this->load->view('obra', $data);
	}
}
?>