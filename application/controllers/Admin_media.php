<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_media extends Admin_Controller {
	public function index()	{
		$this->load->model("Media_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$orderby = $this->input->get('orderby', TRUE);
		$direction = $this->input->get('direction', TRUE);
		$search = $this->input->post('buscar_media', TRUE);
		$data['search'] = $search;
		$data['multimedia'] = $this->Media_model->get_all_media(
			$search, $orderby, $direction
		);
		$this->load->view('admin_multimedia', $data);
	}

	public function nuevo_media() {
		$this->load->model("Media_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['tipos'] = $this->Media_model->get_all_tipos();
		$this->load->view('nuevo_media', $data);
	}

	public function editar_media() {
		$this->load->model("Media_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$id = $this->uri->segment(3);
		$data['media'] = $this->Media_model->get_media($id);
		$this->load->view('editar_media', $data);
	}

	public function insertar_media() {
   	$this->load->model("Media_model");
    	$this->load->model("Publicacion_model");
		$titulo = $this->input->post('titulo', TRUE);
		$enlace = $this->input->post('enlace', TRUE);

		if (strrpos($enlace, 'youtube')) {
			$id_tipo_media = 1;
		} else if(strrpos($enlace, 'issuu')) {
			$id_tipo_media = 2;
		} else {
			$id_tipo_media = 3;
		}

		$post_data = array(
			'titulo' => $titulo,
			'tipo' => 6
		);

		$this->Publicacion_model->insert_publicacion($post_data);
		$last_id = $this->Publicacion_model->get_last_post();

		$media_data = array(
			'id_post' => $last_id,
			'enlace' => $enlace,
			'id_tipo_media' => $id_tipo_media
		);

		$this->Media_model->insert_media($media_data);
		redirect('admin_media');
	}

	public function update_media() {
   	$this->load->model("Media_model");
    	$this->load->model("Publicacion_model");
  	  	$id = $this->uri->segment(3);

		$titulo = $this->input->post('titulo', TRUE);
		$enlace = $this->input->post('enlace', TRUE);

		$post_data = array(
			'titulo' => $titulo,
			'tipo' => 6
		);

		if (strrpos($enlace, 'youtube')) {
			$id_tipo_media = 1;
		} else if(strrpos($enlace, 'issuu')) {
			$id_tipo_media = 2;
		} else {
			$id_tipo_media = 3;
		}
		$media_data = array(
			'enlace' => $enlace,
			'id_tipo_media' => $id_tipo_media
		);
		$this->Publicacion_model->update_publicacion($id, $post_data);
		$this->Media_model->update_media($id, $media_data);
		redirect('admin_media');
	}

	public function toggle_media() {
      $this->load->model("Publicacion_model");
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$post_data = array(
			'status' => $toggle
		);
		$this->Publicacion_model->update_publicacion($id, $post_data);
		redirect('admin_media');	
	}

	public function delete_media() {
   	$this->load->model("Media_model");
		$id = $this->uri->segment(3);

		$this->Media_model->delete_media($id);
		redirect('admin_media');
	}


}
