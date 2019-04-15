<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Pagina extends MY_Controller {
	public function index() {
		$this->load->model("Paginas_model");
		$this->load->model("Subpaginas_model");

		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$data['open_subpaginas'] = $this->input->get('open_subpaginas', TRUE);
		$data['paginas'] = $this->Paginas_model->get_all_paginas();
		$data['subpaginas'] = $this->Subpaginas_model->get_all_subpaginas();

		$this->load->view('admin_pagina', $data);
	}

	public function nueva_pagina() {
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Modelo_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['modelos'] = $this->Modelo_model->get_all_modelos();
		$this->load->view('nueva_pagina', $data);
	}

	public function editar_pagina() {
		$this->load->model("Paginas_model");
		$this->load->model("Modelo_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Defaults_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['modelos'] = $this->Modelo_model->get_all_modelos();
		$data['default_color'] = $this->Defaults_model->get_value('primary_color');
		$id = $this->uri->segment(3);

		$data['pagina'] = $this->Paginas_model->get_pagina($id);
		$this->load->view('editar_pagina', $data);
	}	

	public function nueva_subpagina() {
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Subpaginas_model");
		$this->load->model("Paginas_model");
		$this->load->model("Modelo_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['modelos'] = $this->Modelo_model->get_all_modelos();
		$data['paginas'] = $this->Paginas_model->get_all_paginas();
		$data['subpaginas'] = $this->Subpaginas_model->get_all_subpaginas();

		$this->load->view('nueva_subpagina', $data);
	}

	public function editar_subpagina() {
		$this->load->model("Paginas_model");
		$this->load->model("Subpaginas_model");
		$this->load->model("Modelo_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Defaults_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$id = $this->uri->segment(3);

		$data['modelos'] = $this->Modelo_model->get_all_modelos();
		$data['paginas'] = $this->Paginas_model->get_all_paginas();
		$data['subpagina'] = $this->Subpaginas_model->get_subpagina($id);
		$data['default_color'] = $this->Defaults_model->get_value('primary_color');
		$this->load->view('editar_subpagina', $data);
	}

	public function insertar_pagina() {
		$this->load->model("Paginas_model");

		$titulo = $this->input->post('titulo', TRUE);
		$color = $this->input->post('color', TRUE);
		$modelo = $this->input->post('modelo', TRUE);
		$mostrar_navbar = $this->input->post('mostrar_navbar', TRUE);
		$mostrar_home = $this->input->post('mostrar_home', TRUE);
		$enlace = str_replace(" ", "_", strtolower($titulo));
		$paginas = $this->Paginas_model->get_valid_paginas()->result_array();

		$pagina_data = array(
			'titulo' => $titulo,
			'color' => $color ? $color : '',
			'id_modelo' => $modelo,
			'enlace' => $enlace,
			'mostrar_navbar' => !!$mostrar_navbar,
			'mostrar_home' => !!$mostrar_home,
			'orden' => sizeof($paginas)+1
		);

		$this->Paginas_model->insertar_pagina($pagina_data);
		redirect('admin_pagina');
	}

	public function update_pagina() {
		$this->load->model("Paginas_model");

		$titulo = $this->input->post('titulo', TRUE);
		$color = $this->input->post('color', TRUE);
		$modelo = $this->input->post('modelo', TRUE);
		$mostrar_navbar = $this->input->post('mostrar_navbar', TRUE);
		$mostrar_home = $this->input->post('mostrar_home', TRUE);
		$id = $this->uri->segment(3);

		$pagina_data = array(
			'titulo' => $titulo,
			'color' => $color ? $color : '',
			'id_modelo' => $modelo,
			'mostrar_navbar' => !!$mostrar_navbar,
			'mostrar_home' => !!$mostrar_home,
		);

		$this->Paginas_model->update_pagina($id, $pagina_data);
		redirect('admin_pagina');
	}


	public function insertar_subpagina() {
		$this->load->model("Subpaginas_model");
		$this->load->model("Content_model");

		$config['upload_path'] = './assets/uploads/subpagina/';
   	$config['allowed_types'] = 'gif|jpg|png|jpeg';
   	$config['max_size'] = 0;
   	$config['max_width'] = 0;
   	$config['max_height'] = 0;
      $this->load->library('upload', $config);

		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_pagina');
			}
		}
		$pagina = $this->input->post('pagina', TRUE);
		$subpagina = $this->input->post('subpagina', TRUE);
		$enlace = str_replace(" ", "_", strtolower($subpagina));
		$modelo = $this->input->post('modelo', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$img = $imagen == '' ? '' : 'uploads/subpagina/'.$imagen;
		$contenido = $this->input->post('contenido', TRUE);

		if ($modelo == '0') {
			$contenido_data = array(
				'titulo' => $subpagina,
				'imagen' => $img,
				'html' => $contenido
			);
			$this->Content_model->insertar_contenido($contenido_data);	
		}
		$last_id = $modelo == '0' 
			? $this->Content_model->get_last_post()
			: NULL;

		$subpagina_data = array(
			'subpagina' => $subpagina,
			'id_pagina' => $pagina,
			'id_modelo' => $modelo,
			'enlace' => $enlace,
			'id_content' => $last_id
		);
		$this->Subpaginas_model->insertar_subpagina($subpagina_data);		
		redirect('admin_pagina');
	}


	public function update_subpagina() {
		$this->load->model("Subpaginas_model");
		$this->load->model("Content_model");
	 	$id = $this->uri->segment(3);

	  	$config['upload_path'] = './assets/uploads/subpagina/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = 0;
      $config['max_width'] = 0;
      $config['max_height'] = 0;
      $this->load->library('upload', $config);
		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_pagina');
			}
		}
		$updated_subpagina = $this->Subpaginas_model->get_subpagina($id)->result_object()[0];
		$updated_imagen = realpath('assets/'.$updated_subpagina->imagen);
		$delete_subpagina = boolval($this->input->post('delete_subpagina', TRUE));
		$id_content = $updated_subpagina->id_content;

		$pagina = $this->input->post('pagina', TRUE);
		$subpagina = $this->input->post('subpagina', TRUE);
		$modelo = $this->input->post('modelo', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$img = $imagen == '' ? '' : 'uploads/subpagina/'.$imagen;
		$contenido = $this->input->post('contenido', TRUE);

		if ($modelo == '0') {
			echo $id_content."<br />";
			$contenido_data = array(
				'html' => $contenido
			);
			if ($img) {
				$contenido_data['imagen'] = $img;
			} elseif ($updated_subpagina->imagen && $delete_subpagina) {
				$contenido_data['imagen'] = '';
			}
	     	if ($updated_subpagina->imagen && $delete_subpagina) {
	     		unlink($updated_imagen);
	     	}
			$this->Content_model->update_contenido($id_content, $contenido_data);	
		}

		$last_id = $modelo == '0' ? $id_content : NULL;
		$subpagina_data = array(
			'subpagina' => $subpagina,
			'id_pagina' => $pagina,
			'id_modelo' => $modelo,
			'id_content' => $last_id
		);
		$this->Subpaginas_model->update_subpagina($id, $subpagina_data);
		redirect('admin_pagina');
	}

	public function toggle_pagina() {
      $this->load->model("Paginas_model");
		$id = $this->uri->segment(3);
		$paginas = $this->Paginas_model->get_valid_paginas()->result_array();
		$toggle = $this->input->get('toggle', TRUE);

		$pagina_data = array(
			'status' => $toggle,
			'orden' => $toggle ? sizeof($paginas)+1 : 0
		);
		
		$this->Paginas_model->update_pagina($id, $pagina_data);
		redirect('admin_pagina');	
	}

	public function toggle_subpagina() {
      $this->load->model("Subpaginas_model");
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$subpagina_data = array(
			'status' => $toggle
		);
		$subpagina = $this->Subpaginas_model->get_subpagina($id)->result_array()[0];
		$id_subpagina = $subpagina['id_pagina'];

		$this->Subpaginas_model->update_subpagina($id, $subpagina_data);
		$this->session->set_flashdata('open_subpaginas', $id_subpagina);
		redirect('admin_pagina');	
	}

	public function subir_pagina() {
      $this->load->model("Paginas_model");
      $id = $this->uri->segment(3);
      $paginas = $this->Paginas_model->get_valid_paginas()->result_array();
		$selected_pagina = $this->Paginas_model->get_pagina($id)->result_array()[0];
		$orden_inicial = $selected_pagina['orden'];

		if ($orden_inicial == 1) {
			redirect('admin_pagina');				
		}

		foreach ($paginas as $pagina) {
			if($pagina['orden'] == $orden_inicial) {
				$pagina_up_data['orden'] = $pagina['orden']-1;
				$this->Paginas_model->update_pagina($pagina['id_pagina'], $pagina_up_data);
			}
			if($pagina['orden'] == $orden_inicial-1) {
				$pagina_down_data['orden'] = $pagina['orden']+1;
				$this->Paginas_model->update_pagina($pagina['id_pagina'], $pagina_down_data);
			}
		}
		redirect('admin_pagina');	
	}

	public function bajar_pagina() {
      $this->load->model("Paginas_model");
      $id = $this->uri->segment(3);
      $paginas = $this->Paginas_model->get_valid_paginas()->result_array();
		$selected_pagina = $this->Paginas_model->get_pagina($id)->result_array()[0];
		$orden_inicial = $selected_pagina['orden'];
      
      if ($orden_inicial == sizeof($paginas)) {
			redirect('admin_pagina');				
		}

		foreach ($paginas as $pagina) {
			if($pagina['orden'] == $orden_inicial) {
				$pagina_up_data['orden'] = $pagina['orden']+1;
				$this->Paginas_model->update_pagina($pagina['id_pagina'], $pagina_up_data);
			}
			if($pagina['orden'] == $orden_inicial+1) {
				$pagina_down_data['orden'] = $pagina['orden']-1;
				$this->Paginas_model->update_pagina($pagina['id_pagina'], $pagina_down_data);
			}
		}
		redirect('admin_pagina');	
	}

}
