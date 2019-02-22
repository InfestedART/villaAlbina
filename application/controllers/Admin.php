<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		$this->load->view('admin');
	}

	public function login() {
		$this->load->model("login_model");

		$usuario = $this->input->post('usuario',TRUE);
		$password = $this->input->post('password',TRUE);
		$hashed_password = md5($password);
		//$validate=$this->login_model->get_usuarios($usuario, $hashed_password); 
		$validate=$this->login_model->get_usuarios($usuario, $password); 

		echo $usuario.", ".$password.", ".$hashed_password."<br / >";
		 if($validate->num_rows() > 0){
		 	$sesdata = array(
           		'usuario'  => $usuario,
           		'logged_in' => TRUE
        	);
        	$this->session->set_userdata($sesdata);
		 	redirect('cpanel');
		 } else {
		 	echo $this->session->set_flashdata('error','El nombre de usuario o la contraseña son incorrectos');
		 	redirect('admin/');
		 }		
	}
}
