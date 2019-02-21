<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		$this->load->model("usuarios_model"); 
		$this->load->view('admin');
	}

	public function login() {
		$this->load->model("usuarios_model");

		$usuario = $this->input->post('usuario',TRUE);
		$password = $this->input->post('password',TRUE);
		// TODO: change logic to md5
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$validate=$this->usuarios_model->get_usuarios($usuario, $hashed_password); 

		echo $usuario.", ".$hashed_password."<br / >";
		 if($validate->num_rows() > 0){
		 	echo "Access granted";
		 } else {
		 	echo "Access denied";
		 }		
	}
}
