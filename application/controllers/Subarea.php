<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subarea extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Galeria_subarea_model");
		$this->load->model("Areas_model");
		$this->load->model("Subarea_model");
		$search = $this->input->post('buscar', TRUE);
		$data['active'] = $this->input->get('subarea', TRUE);
		$data['id_area'] = $this->input->get('area', TRUE);
		$data['search'] = $search;
		$data['search_cat'] = '';
		$subarea_id = $this->Subarea_model->get_subarea_id($data['active'], $data['id_area']);
		if (!$subarea_id) {
			$subarea_id = $this->Subarea_model->get_first_id();
		}
		$data['subarea_id'] = $subarea_id;
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();		
		$data['area_data'] = $this->Paginas_model->get_pagina(2)->result_array()[0];
		$data['color'] = $this->Paginas_model->get_page_color(1)['color'];		
		$data['areas'] = $this->Areas_model->get_all_areas()->result_array();
		$data['subarea'] = $this->Subarea_model->get_subarea($subarea_id)->result_object()[0];
		$data['galeria_subareas'] = $this
											->Galeria_subarea_model
											->get_galeria($subarea_id)
											->result_array();
		$data['next_subarea'] = $this
											->Subarea_model
											->get_next_subarea($subarea_id, $data['id_area'])
											->result_object();
		$data['prev_subarea'] = $this
											->Subarea_model
											->get_prev_subarea($subarea_id, $data['id_area'])
											->result_object();		
		$data['all_subareas'] = $this
											->Subarea_model
											->get_area_subareas($data['id_area'])
											->result_array();
		
		$this->load->view('subarea', $data);
	}
}
