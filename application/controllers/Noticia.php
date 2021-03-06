<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends MY_Controller {
	public function index()	{
		$this->load->model("Noticias_model");
		$this->load->model("Galeria_model");
		$this->load->model("Paginas_model");
		$search = $this->input->post('buscar', TRUE);
		$data['search'] = $search;
		$data['search_cat'] = '';
		$id = $this->input->get('id', TRUE);
		$data['news'] = $this->Noticias_model->get_noticia($id)->result_object();
		$fecha = $data['news'][0]->fecha;
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['noticias_data'] = $this->Paginas_model->get_pagina(8)->result_array()[0];		
		$data['galeria_noticias'] = $this->Galeria_model->get_galeria($id)->result_array();
		$data['prev_noticia'] = $this->Noticias_model->get_prev_noticia($id)->result_object();
		$data['next_noticia'] = $this->Noticias_model->get_next_noticia($id)->result_object();	
		$data['color'] = $this->Paginas_model->get_page_color(8)['color'];
		$this->load->view('noticia', $data);
	}
}
?>