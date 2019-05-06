<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()	{
		$this->load->model("Paginas_model");
		$this->load->model("Portada_model");
		$this->load->model("Defaults_model");
		$data['portadas'] = $this->Portada_model->get_valid_portadas();
		$data['nav_paginas'] = $this->Paginas_model->get_navbar_paginas();
		$data['paginas'] = $this->Paginas_model->get_home_paginas();
		$pages = $data['paginas']->result_array();
		$today = date('Y-m-d');

		foreach ($pages as $index => $pagina) {
			$this->load->model($pagina['model']);			
			$seccion[$index] = $pagina['uses_date'] 
				? $this->{$pagina['model']}->{$pagina['metodo']}(
						$today,
						$pagina['default_limit']
					)->result_array()
				: $this->{$pagina['model']}->{$pagina['metodo']}(
						$pagina['default_limit']
					)->result_array();
		}
		$data['default_color'] = $this->Defaults_model->get_value('primary_color');
		$data['seccion'] = $seccion;
		$this->load->view('home', $data);
	}
}
