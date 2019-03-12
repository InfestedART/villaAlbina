<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_noticia extends MY_Controller {
	public function index() {
		$this->load->model("noticias_model");

		$data['header'] = $this->load->view('templates/admin_header', NULL, true);
		$data['sidebar'] = $this->load->view('templates/admin_sidebar', NULL, true);
		$data['footer'] = $this->load->view('templates/admin_footer', NULL, true);
		$data['noticias'] = $this->noticias_model->get_all_noticias();
		$this->load->view('admin_noticia', $data);
	}

	public function noticia_nueva() {
		$this->load->view('noticia_nueva');
	}

	public function editar_noticia() {
		$this->load->model("noticias_model");
		$id = $this->uri->segment(3);
		$data['noticia'] = $this->noticias_model->get_noticia($id);
		$this->load->view('editar_noticia', $data);
	}

	public function insertar_noticia() {
		$config['upload_path'] = './assets/uploads/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = 0;
      $config['max_width'] = 0;
      $config['max_height'] = 0;

      $this->load->model("noticias_model");
      $this->load->model("publicacion_model");
      $this->load->library('upload', $config);

		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$data = array('error' => $error);	
				$this->load->view('admin_noticia', $data);
			}
		}
      $data = array(
      	'upload_data' => $this->upload->data(),
        	'msg' => 'noticia agregada exitosamente'
      );

      $titulo = $this->input->post('titulo', TRUE);
		$fecha = $this->input->post('fecha', TRUE);
		$fuente = $this->input->post('fuente', TRUE);
		$enlace = 'noticia/'.$titulo;
		$resumen = $this->input->post('resumen', TRUE);
		$imagen = $_FILES['imagen']['name'];
		$imagen_destacada = $imagen == '' ? '' : 'uploads/'.$imagen;

		$post_data = array(
			'titulo' => $titulo,
			'fecha' => $fecha,
			'resumen' => $resumen,
			'imagen_destacada' => $imagen_destacada,
			'tipo' => 'noticia'
		);

		$this->publicacion_model->insert_publicacion($post_data);
		$last_id = $this->publicacion_model->get_last_post();

		$post_noticia = array(
			'id_post' => $last_id,
			'fuente' => $fuente,
			'url' => $enlace
		);
		$this->noticias_model->insert_noticia($post_noticia);
      $data['noticias'] = $this->noticias_model->get_all_noticias();
     	$this->load->view('admin_noticia', $data);

	}

	public function delete_noticia() {
		$this->load->model("noticias_model");

		$id = $this->uri->segment(3);
		$this->noticias_model->delete_noticia($id);
		echo "deleting noticia ".$id;
		$data['noticias'] = $this->noticias_model->get_all_noticias();
     	$this->load->view('admin_noticia', $data);
	}

	public function update_noticia() {
      $this->load->model("noticias_model");
      $this->load->model("publicacion_model");
		$id = $this->uri->segment(3);

		$config['upload_path'] = './assets/uploads/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = 0;
      $config['max_width'] = 0;
      $config['max_height'] = 0;
      $this->load->library('upload', $config);

		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$data = array('error' => $error);
				$data['noticias'] = $this->noticias_model->get_all_noticias();	
				$this->load->view('admin_noticia', $data);
			}
		}
      $data = array(
      	'upload_data' => $this->upload->data(),
        	'msg' => 'noticia agregada exitosamente'
      );

      $titulo = $this->input->post('titulo', TRUE);
		$fecha = $this->input->post('fecha', TRUE);
		$fuente = $this->input->post('fuente', TRUE);
		$enlace = 'noticia/'.$titulo;
		$resumen = $this->input->post('resumen', TRUE);
		$imagen = $_FILES['imagen']['name'];
		$imagen_destacada = $imagen == '' ? '' : 'uploads/'.$imagen;

		$post_data = array(
			'titulo' => $titulo,
			'fecha' => $fecha,
			'resumen' => $resumen,
			'imagen_destacada' => $imagen_destacada,
			'tipo' => 'noticia'
		);

		$post_noticia = array(
			'fuente' => $fuente,
			'url' => $enlace
		);

		$this->publicacion_model->update_publicacion($id, $post_data);
		$this->noticias_model->update_noticia($id, $post_noticia);
      $data['noticias'] = $this->noticias_model->get_all_noticias();
     	$this->load->view('admin_noticia', $data);		

		var_dump($post_data);
	}

}
