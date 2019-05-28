<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_usuario extends Admin_Controller {
	public function index() {
		$this->load->model("Tipo_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		
		$this->load->view('admin_usuario', $data);
	}

	public function insert_usuario() {
		$this->load->model("Usuarios_model");
		
		$usuario = $this->input->post('usuario', TRUE);
		$password = $this->input->post('password', TRUE);				
		$hashed_password = md5($password);

		$usuario_existe = $this->Usuarios_model->get_usuario($usuario);
		if ($usuario_existe->num_rows() > 0) {
			$this->session->set_flashdata(
		 		'error',
		 		'El nombre de usuario ya existe'
		 	);
		 	redirect('admin_usuario');
		 	echo 'El nombre de usuario ya existe';
		} else {
			$data = array(
				'username' => $usuario,
				'password' => $hashed_password
			);
			$this->Usuarios_model->insert_usuario($data);
			$this->session->set_flashdata(
		 		'msg',
		 		'Usuario agregado exitosamente'
		 	);
			redirect('cpanel');
		}
	}

}
