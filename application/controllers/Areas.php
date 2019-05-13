<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Galeria_area_model");
		$this->load->model("Areas_model");
		$this->load->model("Subarea_model");
		$search = $this->input->post('buscar', TRUE);
		$data['active'] = $this->input->get('area', TRUE);
		$data['search'] = $search;
		$area_id = $this->Areas_model->get_area_id($data['active']);
		if (!$area_id) {
			$area_id = $this->Areas_model->get_first_id();
		}
		$data['area_id'] = $area_id;
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();		

		$data['color'] = $this->Paginas_model->get_page_color(1)['color'];		
		$data['next_area'] = $this->Areas_model->get_next_area($area_id)->result_object();
		$data['prev_area'] = $this->Areas_model->get_prev_area($area_id)->result_object();
		$data['area'] = $this->Areas_model->get_area($area_id)->result_object()[0];
		$data['galeria_areas'] = $this->Galeria_area_model->get_galeria($area_id)->result_array();
		$data['area_data'] = $this->Paginas_model->get_pagina(2)->result_array()[0];
		$data['all_areas'] = $this->Areas_model->get_valid_areas()->result_array();
		$data['subareas'] = $this->Subarea_model->get_area_subareas($area_id)->result_array();
		
		$this->load->view('areas', $data);
	}
}
