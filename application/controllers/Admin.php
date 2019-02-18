<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		$this->load->model("usuarios_model"); // we load the model that we saved in the application/models folder, so that the controller will know where to get the methods from
    	$data["usuarios"]=$this->usuarios_model->get_usuarios(); // we will load the result of the query inside
		$this->load->view('admin', $data);
	}
}
