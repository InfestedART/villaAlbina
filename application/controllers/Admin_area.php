<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_area extends MY_Controller {
	public function index() {
		$this->load->model("Areas_model");
		$this->load->model("Subarea_model");

		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['open_subareas'] = $this->input->get('open_subareas', TRUE);
		$data['areas'] = $this->Areas_model->get_all_areas();
		$data['subareas'] = $this->Subarea_model->get_all_subareas();
		$this->load->view('admin_area', $data);
	}

	public function nueva_area() {
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$this->load->view('nueva_area', $data);
	}

	public function nueva_subarea() {
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Areas_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas();
		$data['get_area'] = $this->input->get('area', TRUE);

		$this->load->view('nueva_subarea', $data);
	}

	public function editar_area() {
		$this->load->model("Areas_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$id = $this->uri->segment(3);

		$data['area'] = $this->Areas_model->get_area($id);
		$this->load->view('editar_area', $data);
	}

	public function editar_subarea() {
		$this->load->model("Areas_model");
		$this->load->model("Subarea_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$id = $this->uri->segment(3);

		$data['areas'] = $this->Areas_model->get_all_areas();
		$data['subarea'] = $this->Subarea_model->get_subarea($id);
		$this->load->view('editar_subarea', $data);
	}


	public function insertar_area() {
		$this->load->model("Areas_model");
		$area = $this->input->post('area', TRUE);
		$color = $this->input->post('color', TRUE);

		$area_data = array(
			'area' => $area,
			'color_area' => $color ? $color : ''
		);

		$this->Areas_model->insertar_area($area_data);
		redirect('admin_area');
	}

	public function insertar_subarea() {
		// $this->load->model("Areas_model");
		$this->load->model("Subarea_model");
		$subarea = $this->input->post('subarea', TRUE);
		$area = $this->input->post('area', TRUE);

		$subarea_data = array(
			'id_area' => $area,
			'subarea' => $subarea
		);

		$this->Subarea_model->insertar_subarea($subarea_data);
		redirect('admin_area');
	}

	public function update_area() {
		$this->load->model("Areas_model");
		$area = $this->input->post('area', TRUE);
		$color = $this->input->post('color', TRUE);
		$color_switch = $this->input->post('color_switch', TRUE);
		$id = $this->uri->segment(3);

		$area_data = array(
			'area' => $area,
			'color_area' => $color,
		);

		$this->Areas_model->update_area($id, $area_data);
		redirect('admin_area');
	}

	public function update_subarea() {
		$this->load->model("Subarea_model");
		$area = $this->input->post('area', TRUE);
		$subarea = $this->input->post('subarea', TRUE);
		$id = $this->uri->segment(3);

		$subarea_data = array(
			'id_area' => $area,
			'subarea' => $subarea
		);
		$this->Subarea_model->update_subarea($id, $subarea_data);
		redirect('admin_area');
	}

	public function toggle_area() {
      $this->load->model("Areas_model");
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$area_data = array(
			'status' => $toggle
		);
		$this->Areas_model->update_area($id, $area_data);
		redirect('admin_area');	
	}

	public function toggle_subarea() {
		$this->load->model("Areas_model");
      $this->load->model("Subarea_model");
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$subarea_data = array(
			'status' => $toggle
		);

		$subarea = $this->Subarea_model->get_subarea($id)->result_array()[0];
		$id_area = $subarea['id_area'];
		$this->Subarea_model->update_subarea($id, $subarea_data);
		$this->session->set_flashdata('open_subareas', $id_area);
		redirect('admin_area');	
	}

}