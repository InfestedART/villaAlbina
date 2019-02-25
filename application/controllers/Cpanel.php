<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel extends MY_Controller {
	public function index() {
		$data['header'] = $this->load->view('templates/admin_header', NULL, true);
		$data['sidebar'] = $this->load->view('templates/admin_sidebar', NULL, true);
		$data['footer'] = $this->load->view('templates/admin_footer', NULL, true);
		$this->load->view('cpanel', $data);
	}

	public function nuevo_usuario() {
		$this->load->view('nuevo_usuario');
	}

	public function insert_usuario() {
		$this->load->model("usuarios_model");
		
		$usuario = $this->input->post('usuario',TRUE);
		$password = $this->input->post('password',TRUE);				
		$hashed_password = md5($password);

		$usuario_existe = $this->usuarios_model->get_usuario($usuario);
		if ($usuario_existe->num_rows() > 0) {
			$this->session->set_flashdata(
		 		'error',
		 		'El nombre de usuario ya existe'
		 	);
		 	redirect('cpanel/nuevo_usuario');
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

	public function close_session() {
		$this->session->sess_destroy();
		redirect('/');
	}

}
