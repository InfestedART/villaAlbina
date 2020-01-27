<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_form extends MY_Controller {
	public function index()	{
		redirect('/');
	}

	private function send_email($fields, $form) {
		$this->load->library('email');

		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';

		$msg = '';
		foreach ($fields as $item) {
			$msg .= "<p><b>".$item->label."</b><br>";
			$msg .= $form[$item->name]."</p>";
		}

		echo $msg;
		$this->email->initialize($config);
		$this->email->from('your@example.com', 'example');
		$this->email->to('hitako13@gmail.com');
		$this->email->subject('Formulario de Contacto');
		$this->email->message($msg);
		$this->email->send();
	}

	public function contacto() {
		$this->load->model("Paginas_model");
		$this->load->model("Areas_model");
		$this->load->model("Subpaginas_model");
		$this->load->model("Galeria_subpagina_model");
		$this->load->helper('contact');

		$data['form_fields'] = get_contacto_fields();		
		$data['color'] = $this->Paginas_model->get_page_color(1)['color'];
		$data['search'] = '';
		$data['search_cat'] = '';
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas()->result_array();
		$data['contacto_data'] = $this->Paginas_model->get_pagina(7)->result_array()[0];
		$data['subpaginas'] = $this->Subpaginas_model->get_valid_subpaginas(7)->result_array();

		$subpaginas_ids = $this->Subpaginas_model->get_subpaginas_id(7);
		$galerias = [];
		foreach ($subpaginas_ids as $index => $subpagina_id) {
			$galeria_temp = $this->Galeria_subpagina_model->get_galeria(
				$subpagina_id['id_subpagina']
			)->result_array();

			$galerias[$index] = array(
				'id_subpagina' => $subpagina_id['id_subpagina'],
				'galeria' => $galeria_temp
			);
		}
		$data['galeria_subpags'] = $galerias;

		$fields = get_contacto_fields();
		$form['nombre'] = $this->input->post('nombre', TRUE); 
		$form['email'] = $this->input->post('email', TRUE); 
		$form['telefono'] = $this->input->post('telefono', TRUE); 
		$form['comentario'] = $this->input->post('comentario', TRUE);

		// $this->send_email($fields, $form);
		$data['alert'] = 1;
		$active = $this->Subpaginas_model->get_subpagina_contact(7)->result_array();		
		$data['active'] = sizeof($active) > 0 ? $active[0]['enlace'] : '';
				
		$this->load->view('contacto', $data);
	}

	public function visitas() {
		$this->load->model("Paginas_model");
		$this->load->model("Areas_model");
		$this->load->model("Subpaginas_model");
		$this->load->model("Galeria_subpagina_model");
		$this->load->helper('contact');
		$data['form_fields'] = get_visitas_fields();
		$data['active'] = $this->input->get('active', TRUE);
		$data['color'] = $this->Paginas_model->get_page_color(1)['color'];
		$data['search'] = '';
		$data['search_cat'] = '';
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas()->result_array();
		$data['museo_data'] = $this->Paginas_model->get_pagina(4)->result_array()[0];
		$data['subpaginas'] = $this->Subpaginas_model->get_valid_subpaginas(4)->result_array();

		$subpaginas_ids = $this->Subpaginas_model->get_subpaginas_id(4);	
		$galerias = [];
		foreach ($subpaginas_ids as $index => $subpagina_id) {
			$galeria_temp = $this->Galeria_subpagina_model->get_galeria(
				$subpagina_id['id_subpagina']
			)->result_array();

			$galerias[$index] = array(
				'id_subpagina' => $subpagina_id['id_subpagina'],
				'galeria' => $galeria_temp
			);
		}
		$data['galeria_subpags'] = $galerias;


		$fields = get_visitas_fields();
		$form['fecha'] = $this->input->post('fecha', TRUE); 
		$form['tipo_inst'] = $this->input->post('tipo_inst', TRUE); 
		$form['institucion'] = $this->input->post('institucion', TRUE); 
		$form['num_personas'] = $this->input->post('num_personas', TRUE); 
		$form['pais'] = $this->input->post('pais', TRUE); 
		$form['encargado'] = $this->input->post('encargado', TRUE); 
		$form['telefono'] = $this->input->post('telefono', TRUE); 
		$form['email'] = $this->input->post('email', TRUE); 
		$form['comentario'] = $this->input->post('comentario', TRUE);

		// $this->send_email($fields, $form);
		$data['alert'] = 1;
		$active = $this->Subpaginas_model->get_subpagina_contact(4)->result_array();		
		$data['active'] = sizeof($active) > 0 ? $active[0]['enlace'] : '';
				
		$this->load->view('visitas_guiadas', $data);
	}

	public function servicio() {
		$this->load->model("Paginas_model");
		$this->load->model("Areas_model");
		$this->load->model("Subpaginas_model");
		$this->load->model("Galeria_subpagina_model");
		$this->load->helper('contact');
		$data['form_fields'] = get_servicios_fields();
		$data['active'] = $this->input->get('active', TRUE);
		$data['color'] = $this->Paginas_model->get_page_color(1)['color'];
		$data['search'] = '';
		$data['search_cat'] = '';
		$data['paginas'] = $this->Paginas_model->get_navbar_paginas()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas()->result_array();
		$data['servicio_data'] = $this->Paginas_model->get_pagina(6)->result_array()[0];
		$data['subpaginas'] = $this->Subpaginas_model->get_valid_subpaginas(6)->result_array();
		$data['alert'] = 0;
		$subpaginas_ids = $this->Subpaginas_model->get_subpaginas_id(6);
		$galerias = [];
		foreach ($subpaginas_ids as $index => $subpagina_id) {
			$galeria_temp = $this->Galeria_subpagina_model->get_galeria(
				$subpagina_id['id_subpagina']
			)->result_array();

			$galerias[$index] = array(
				'id_subpagina' => $subpagina_id['id_subpagina'],
				'galeria' => $galeria_temp
			);
		}
		$data['galeria_subpags'] = $galerias;

		$fields = get_servicios_fields();
		$form['fecha'] = $this->input->post('fecha', TRUE); 
		$form['motivo'] = $this->input->post('motivo', TRUE); 
		$form['contacto'] = $this->input->post('contacto', TRUE); 
		$form['pais'] = $this->input->post('pais', TRUE); 
		$form['email'] = $this->input->post('email', TRUE); 
		$form['telefono'] = $this->input->post('telefono', TRUE); 
		$form['comentario'] = $this->input->post('comentario', TRUE);
		$form['note'] = '';

		// $this->send_email($fields, $form);
		$data['alert'] = 1;
		$active = $this->Subpaginas_model->get_subpagina_contact(6)->result_array();		
		$data['active'] = sizeof($active) > 0 ? $active[0]['enlace'] : '';
				
		$this->load->view('servicios', $data);

	}


}
?>