<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_noticia extends MY_Controller {
	public function index() {
		$this->load->model("Noticias_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$orderby = $this->input->get('orderby', TRUE);
		$direction = $this->input->get('direction', TRUE);
		$search = $this->input->post('buscar_noticia', TRUE);
		$data['search'] = $search;
		$data['noticias'] = $this->Noticias_model->get_all_noticias(
			$search, $orderby, $direction
		);
		$this->load->view('admin_noticia', $data);
	}

	public function noticia_nueva() {
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$this->load->view('noticia_nueva', $data);
	}

	public function editar_noticia() {
		$this->load->model("Noticias_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$id = $this->uri->segment(3);
		$data['noticia'] = $this->Noticias_model->get_noticia($id);
		$this->load->view('editar_noticia', $data);
	}

	public function insertar_noticia() {
		$config['upload_path'] = './assets/uploads/noticias/';
      	$config['allowed_types'] = 'gif|jpg|png|jpeg';
      	$config['max_size'] = 0;
      	$config['max_width'] = 0;
      	$config['max_height'] = 0;

      	$this->load->model("Noticias_model");
      	$this->load->model("Publicacion_model");
      	$this->load->model("Contenido_model");
      	$this->load->library('upload', $config);

		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_noticia');
			}
		}
      	$titulo = $this->input->post('titulo', TRUE);
		$fecha = $this->input->post('fecha', TRUE);
		$fuente = $this->input->post('fuente', TRUE);
		$enlace = 'noticia/'.$titulo;
		$resumen = $this->input->post('resumen', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$imagen_destacada = $imagen == '' ? '' : 'uploads/noticias/'.$imagen;
		$contenido = $this->input->post('contenido', TRUE);

		$post_data = array(
			'titulo' => $titulo,
			'imagen' => $imagen_destacada,
			'tipo' => 1
		);
		$this->Publicacion_model->insert_publicacion($post_data);
		$last_id = $this->Publicacion_model->get_last_post();
		$post_noticia = array(
			'id_post' => $last_id,
			'fuente' => $fuente,
			'fecha' => $fecha,
			'resumen' => $resumen,
			'url' => $enlace
		);
		$this->Noticias_model->insert_noticia($post_noticia);
		$post_contenido = array(
			'id_post' => $last_id,
			'contenido' => $contenido,
		);
		$this->Contenido_model->insert_contenido($post_contenido);

		redirect('admin_noticia');
	}

	public function delete_noticia() {
		$this->load->model("Noticias_model");

		$id = $this->uri->segment(3);
		$deleted_noticia = $this->Noticias_model->get_noticia($id)->result_object()[0];
		$deleted_imagen = realpath('assets/'.$deleted_noticia->imagen);
		if ($deleted_imagen) {
			unlink($deleted_imagen);	
		}		
		$this->Noticias_model->delete_noticia($id);
		redirect('admin_noticia');
	}

	public function update_noticia() {
      $this->load->model("Noticias_model");
      $this->load->model("Publicacion_model");
      $this->load->model("Contenido_model");
	  $id = $this->uri->segment(3);

	  $config['upload_path'] = './assets/uploads/noticias/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = 0;
      $config['max_width'] = 0;
      $config['max_height'] = 0;
      $this->load->library('upload', $config);

		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$data = array('error' => $error);
				$data['noticias'] = $this->Noticias_model->get_all_noticias();	
				$this->load->view('admin_noticia', $data);
			}
		}
		$updated_noticia = $this->Noticias_model->get_noticia($id)->result_object()[0];
		$updated_imagen = realpath('assets/'.$updated_noticia->imagen);
		$delete_noticia = boolval($this->input->post('delete_noticia', TRUE));

     	$titulo = $this->input->post('titulo', TRUE);
		$fecha = $this->input->post('fecha', TRUE);
		$fuente = $this->input->post('fuente', TRUE);
		$enlace = 'noticia/'.$titulo;
		$resumen = $this->input->post('resumen', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$imagen_destacada = $imagen == '' ? '' : 'uploads/noticias/'.$imagen;
		$contenido = $this->input->post('contenido', TRUE);

		$post_data = array(
			'titulo' => $titulo,
			'tipo' => 1
		);
		if ($imagen_destacada) {
			$post_data['imagen'] = $imagen_destacada;
		} elseif ($updated_noticia->imagen && $delete_noticia) {
			$post_data['imagen'] = '';
		}

		$post_noticia = array(
			'fuente' => $fuente,
			'fecha' => $fecha,
			'resumen' => $resumen,
			'url' => $enlace
		);

		$post_contenido = array(
			'contenido' => $contenido
		);
     	if ($updated_noticia->imagen && $delete_noticia) {
     		unlink($updated_imagen);
     	}

		$this->Publicacion_model->update_publicacion($id, $post_data);
		$this->Noticias_model->update_noticia($id, $post_noticia);
		$this->Contenido_model->update_contenido($id, $post_contenido);
		redirect('admin_noticia');
	}

	public function toggle_noticia() {
      $this->load->model("Noticias_model");
      $this->load->model("Publicacion_model");
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$post_data = array(
			'status' => $toggle
		);
		$this->Publicacion_model->update_publicacion($id, $post_data);
		redirect('admin_noticia');	
	}
}
