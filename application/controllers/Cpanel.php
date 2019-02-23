<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel extends MY_Controller {
	public function index()
	{
		$this->load->view('cpanel');
	}

		public function nuevo_usuario()
	{
		$this->load->view('nuevo_usuario');
	}

}
