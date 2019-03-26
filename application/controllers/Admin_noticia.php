<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_noticia extends MY_Controller {
	public function index() {
		$this->load->model("Noticias_model");

		$data['header'] = $this->load->view('templates/admin_header', NULL, true);
		$data['sidebar'] = $this->load->view('templates/admin_sidebar', NULL, true);
		$data['footer'] = $this->load->view('templates/admin_footer', NULL, true);

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
		$this->load->view('noticia_nueva');
	}

	public function editar_noticia() {
		$this->load->model("Noticias_model");
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
		$imagen_destacada = $imagen == '' ? '' : 'uploads/noticias'.$imagen;
		$contenido = $this->input->post('contenido', TRUE);

		$post_data = array(
			'titulo' => $titulo,
			'fecha' => $fecha,
			'resumen' => $resumen,
			'imagen_destacada' => $imagen_destacada,
			'tipo' => 'noticia'
		);

		$this->Publicacion_model->insert_publicacion($post_data);
		$last_id = $this->Publicacion_model->get_last_post();

		$post_noticia = array(
			'id_post' => $last_id,
			'fuente' => $fuente,
			'url' => $enlace
		);
		$post_contenido = array(
			'id_post' => $last_id,
			'contenido' => $contenido,
		);

		$this->Noticias_model->insert_noticia($post_noticia);
		$this->Contenido_model->insert_contenido($post_contenido);
      $data['noticias'] = $this->Noticias_model->get_all_noticias();
     	$this->load->view('admin_noticia', $data);

	}

	public function delete_noticia() {
		$this->load->model("Noticias_model");

		$id = $this->uri->segment(3);
		$deleted_noticia = $this->Noticias_model->get_noticia($id)->result_object()[0];
		$deleted_imagen = realpath('assets/'.$deleted_noticia->imagen_destacada);
		if ($deleted_imagen) {
			unlink($deleted_imagen);	
		}		
		$this->Noticias_model->delete_noticia($id);
		$data['noticias'] = $this->Noticias_model->get_all_noticias();
		$data['search'] = '';
     	$this->load->view('admin_noticia', $data);
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
		$imagen_destacada = $imagen == '' ? '' : 'uploads/noticias/'.$imagen;
		$contenido = $this->input->post('contenido', TRUE);

		$post_data = array(
			'titulo' => $titulo,
			'fecha' => $fecha,
			'resumen' => $resumen,
			'tipo' => 'noticia'
		);

		if ($imagen_destacada) {
			$post_data['imagen_destacada'] = $imagen_destacada;
		}

		$post_noticia = array(
			'fuente' => $fuente,
			'url' => $enlace
		);

		$post_contenido = array(
			'contenido' => $contenido
		);

		$this->Publicacion_model->update_publicacion($id, $post_data);
		$this->Noticias_model->update_noticia($id, $post_noticia);
		$this->Contenido_model->update_contenido($id, $post_contenido);

     	$data['noticias'] = $this->Noticias_model->get_all_noticias();
     	$this->load->view('admin_noticia', $data);		

		var_dump($post_data);
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
		
     	$data['noticias'] = $this->Noticias_model->get_all_noticias();
     	$this->load->view('admin_noticia', $data);	
	}
}
