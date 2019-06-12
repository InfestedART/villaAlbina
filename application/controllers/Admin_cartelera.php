<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_cartelera extends Admin_Controller {
	public function index() {
		$this->load->model("Cartelera_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$data['carteleras'] = $this->Cartelera_model->get_all_carteleras();
		$this->load->view('admin_cartelera', $data);
	}

	private function set_file_config() {
		$config['upload_path'] = './assets/uploads/agenda/';
      	$config['allowed_types'] = 'pdf';
      	$config['max_size'] = 0;
      	return $config;
	}

	public function insertar_cartelera() {
   	$this->load->model("Cartelera_model");
   	$this->load->library('upload');

	   $this->upload->initialize($this->set_file_config());
		if (!$this->upload->do_upload('enlace')) {						
			if ($_FILES['enlace']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_cartelera');
			}
		}
		$activo = $this->input->post('activo', TRUE);
		$fecha = $this->input->post('fecha', TRUE);
		$filename='uploads/agenda/'.str_replace(" ", "_", $_FILES['enlace']['name']);
		$filesize=$_FILES['enlace']['size'];

		$cartelera_data = array(
			'enlace' => $filename,
			'size' => $filesize,
			'fecha' => $fecha,
			'status' => $activo ? 1 : 0
		);	
		$this->Cartelera_model->insert_cartelera($cartelera_data);
		redirect('admin_cartelera');
   }

	public function toggle_cartelera() {
		$this->load->model('Cartelera_model');
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$cartelera_data = array(
			'status' => $toggle
		);
		$this->Cartelera_model->update_cartelera($id, $cartelera_data);
      redirect('admin_cartelera');
	}

	public function delete_cartelera() {
		$this->load->model("Cartelera_model");
		$id = $this->uri->segment(3);
		$deleted_cartelera = $this->Cartelera_model->get_cartelera($id)->result_object()[0];
		$deleted_file = realpath('assets/'.$deleted_cartelera->enlace);
		if ($deleted_file && file_exists($deleted_file)) {
			unlink($deleted_file);
		}		
		$this->Cartelera_model->delete_cartelera($id);
		redirect('admin_cartelera');
	}
}
