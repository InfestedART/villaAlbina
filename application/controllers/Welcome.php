<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->model("Usuarios_model"); 
    	$data["usuarios"]=$this->Usuarios_model->get_usuarios(); 
		$data['page_title'] = 'Espacio Simon I Patiño';
		$this->load->view('welcome_message', $data);
	}
}
