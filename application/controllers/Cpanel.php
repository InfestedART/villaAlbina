<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel extends MY_Controller {
	public function index() {
		$data['header'] = $this->load->view('templates/admin_header', NULL, true);
		$data['sidebar'] = $this->load->view('templates/admin_sidebar', NULL, true);
		$data['footer'] = $this->load->view('templates/admin_footer', NULL, true);
		$this->load->view('cpanel', $data);
	}

	public function nuevo_usuario() {
		$this->load->view('nuevo_usuario');
	}

	public function admin_noticia() {
		$this->load->model("noticias_model");
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

	public function insert_usuario() {
		$this->load->model("usuarios_model");
		
		$usuario = $this->input->post('usuario', TRUE);
		$password = $this->input->post('password', TRUE);				
		$hashed_password = md5($password);

		$usuario_existe = $this->usuarios_model->get_usuario($usuario);
		if ($usuario_existe->num_rows() > 0) {
			$this->session->set_flashdata(
		 		'error',
		 		'El nombre de usuario ya existe'
		 	);
		 	redirect('cpanel/nuevo_usuario');
		} else {
			$data = array(
				'username' => $usuario,
				'password' => $hashed_password
			);
			$this->usuarios_model->insert_usuario($data);
			$this->session->set_flashdata(
		 		'msg',
		 		'Usuario agregado exitosamente'
		 	);
			redirect('cpanel');
		}		
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
	      $data = array('error' => $this->upload->display_errors());
      } else {
         $data = array(
         	'upload_data' => $this->upload->data(),
           	'msg' => 'noticia agregada exitosamente'
         );
	      $titulo = $this->input->post('titulo', TRUE);
			$fecha = $this->input->post('fecha', TRUE);
			$fuente = $this->input->post('fuente', TRUE);
			$enlace = 'noticia/'.$titulo;
			$resumen = $this->input->post('resumen', TRUE);
			$imagen = 'uploads/'.$data['upload_data']['file_name'];
			
			$post_data = array(
				'titulo' => $titulo,
				'fecha' => $fecha,
				'resumen' => $resumen,
				'imagen_destacada' => $imagen,
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
      }
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

	public function close_session() {
		$this->session->sess_destroy();
		redirect('/');
	}
}
