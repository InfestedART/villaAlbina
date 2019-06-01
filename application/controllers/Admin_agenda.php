<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_agenda extends Admin_Controller {
	public function index() {
		$this->load->model("Agenda_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$data['agendas'] = $this->Agenda_model->get_all_agendas();
		$this->load->view('admin_agenda', $data);
	}

	private function set_file_config() {
		$config['upload_path'] = './assets/uploads/agenda/';
      	$config['allowed_types'] = 'pdf';
      	$config['max_size'] = 0;
      	return $config;
	}

	public function insertar_agenda() {
   	$this->load->model("Agenda_model");
   	$this->load->library('upload');

	   $this->upload->initialize($this->set_file_config());
		if (!$this->upload->do_upload('enlace')) {						
			if ($_FILES['enlace']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_agenda');
			}
		}
		$activo = $this->input->post('activo', TRUE);
		$fecha = $this->input->post('fecha', TRUE);
		$filename='uploads/agenda/'.str_replace(" ", "_", $_FILES['enlace']['name']);
		$filesize=$_FILES['enlace']['size'];
		if($activo) {
			$this->Agenda_model->deactivate_all_agendas();		
		}

		$agenda_data = array(
			'enlace' => $filename,
			'size' => $filesize,
			'fecha' => $fecha,
			'status' => $activo ? 1 : 0
		);	
		$this->Agenda_model->insert_agenda($agenda_data);
		redirect('admin_agenda');
   }

	public function toggle_agenda() {
		$this->load->model('Agenda_model');
		$id = $this->uri->segment(3);
		$this->Agenda_model->deactivate_all_agendas();	
		$agenda_data = array(
			'status' => 1
		);
		$this->Agenda_model->update_agenda($id, $agenda_data);
      redirect('admin_agenda');
	}

	public function delete_agenda() {
		$this->load->model("Agenda_model");
		$id = $this->uri->segment(3);
		$deleted_agenda = $this->Agenda_model->get_agenda($id)->result_object()[0];
		$deleted_file = realpath('assets/'.$deleted_agenda->enlace);
		if ($deleted_file && file_exists($deleted_file)) {
			unlink($deleted_file);
		}		
		$this->Agenda_model->delete_agenda($id);
		redirect('admin_agenda');
	}


}
