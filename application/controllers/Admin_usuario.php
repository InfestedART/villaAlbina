<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_usuario extends MY_Controller {
	public function index() {
		$this->load->view('admin_usuario');
	}

	public function insert_usuario() {
		$this->load->model("usuarios_model");
		
		$usuario = $this->input->post('usuario', TRUE);
		$password = $this->input->post('password', TRUE);				
		$hashed_password = md5($password);

		$usuario_existe = $this->usuarios_model->get_usuario($usuario);
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
			$this->usuarios_model->insert_usuario($data);
			$this->session->set_flashdata(
		 		'msg',
		 		'Usuario agregado exitosamente'
		 	);
			redirect('cpanel');
		}
	}

}
