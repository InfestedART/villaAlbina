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
		$this->load->model("Defaults_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['api_key'] = $this->Defaults_model->get_value('api_key');
		$this->load->view('noticia_nueva', $data);
	}

	public function editar_noticia() {
		$this->load->model("Noticias_model");
		$this->load->model("Galeria_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Defaults_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['api_key'] = $this->Defaults_model->get_value('api_key');
		$this->load->library('ckeditor');
		$this->ckeditor->basePath = base_url().'assets/js/ckeditor/';

		$id = $this->uri->segment(3);
		$data['galeria'] = $this->Galeria_model->get_galeria($id);
		$data['noticia'] = $this->Noticias_model->get_noticia($id);
		$this->load->view('editar_noticia', $data);
	}

	private function set_img_config() {
		$img_config['upload_path'] = './assets/uploads/noticias/';
      $img_config['allowed_types'] = 'gif|jpg|png|jpeg';
      $img_config['max_size'] = 0;
      $img_config['max_width'] = 0;
      $img_config['max_height'] = 0;
      return $img_config;
	}

	public function insertar_noticia() {
      $this->load->model("Noticias_model");
      $this->load->model("Publicacion_model");
      $this->load->model("Contenido_model");
      $this->load->model("Galeria_model");
      $this->load->library('upload');

   	$files = $_FILES;
   	$img_cant = sizeof($_FILES['galeria']['name']);
   	$galeria_array=[];

      for($i=0; $i<$img_cant; $i++) {           
	      $_FILES['img_upload']['name']= $files['galeria']['name'][$i];
	      $_FILES['img_upload']['type']= $files['galeria']['type'][$i];
	      $_FILES['img_upload']['tmp_name']= $files['galeria']['tmp_name'][$i];
	      $_FILES['img_upload']['error']= $files['galeria']['error'][$i];
	      $_FILES['img_upload']['size']= $files['galeria']['size'][$i];  

        $this->upload->initialize($this->set_img_config());
			if (!$this->upload->do_upload('img_upload')) {						
				if ($_FILES['img_upload']['error'] != 4) {				
					$error = $this->upload->display_errors();				
					$this->session->set_flashdata('error', $error);
			 		redirect('admin_noticia');
				}
			}			
			$galeria_array[$i]='uploads/noticias/'
				.str_replace(" ", "_", $_FILES['img_upload']['name']);
	   }
	      
	   $this->upload->initialize($this->set_img_config());
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
		$leyenda = $this->input->post('leyenda', TRUE);

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

		foreach ($galeria_array as $i => $img_galeria) {
			$galeria_data = array(
				'id_post' => $last_id,
				'imagen' => $img_galeria,
				'leyenda' => $leyenda[$i]
			);	
			$this->Galeria_model->insert_imagen($galeria_data);
		}

		redirect('admin_noticia');
	}

	public function update_noticia() {
	   $this->load->model("Noticias_model");
	   $this->load->model("Publicacion_model");
	   $this->load->model("Contenido_model");
	   $this->load->model("Galeria_model");
		$id = $this->uri->segment(3);
	   $this->load->library('upload');

   	$files = $_FILES;   	
   	$img_cant = array_key_exists("galeria", $_FILES) ? sizeof($_FILES['galeria']['name']) : 0;
   	$delete_img = $this->input->post('delete_img', TRUE);
   	$galeria_array=[];
   	$file_array=[];
   	$file_size=[];

	  	$current_galeria = $this->Galeria_model->get_galeria($id)->result_array();
	  	foreach ($current_galeria as $index => $current_img) {
	  		if ($delete_img[$index]) {
	  			$this->Galeria_model->delete_imagen($id, $current_img['imagen']);
	  			unlink(realpath('assets/'.$current_img['imagen']));
	  		}  	  		
	  	}

     	for($i=0; $i<$img_cant; $i++) {           
	      $_FILES['img_upload']['name']= $files['galeria']['name'][$i];
	      $_FILES['img_upload']['type']= $files['galeria']['type'][$i];
	      $_FILES['img_upload']['tmp_name']= $files['galeria']['tmp_name'][$i];
	      $_FILES['img_upload']['error']= $files['galeria']['error'][$i];
	      $_FILES['img_upload']['size']= $files['galeria']['size'][$i];
      	$this->upload->initialize($this->set_img_config());
			if (!$this->upload->do_upload('img_upload')) {						
				if ($_FILES['img_upload']['error'] != 4) {				
					$error = $this->upload->display_errors();				
					$this->session->set_flashdata('error', $error);
			 		redirect('admin_noticia');
				}
			}
			$galeria_array[$i]='uploads/noticias/'
				.str_replace(" ", "_", $_FILES['img_upload']['name']);
	    }

	   $this->upload->initialize($this->set_img_config());
		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$data = array('error' => $error);
				redirect('admin_noticia');
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
		$leyenda = $this->input->post('leyenda', TRUE);

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

		foreach ($galeria_array as $i => $img_galeria) {
			$galeria_data = array(
				'id_post' => $id,
				'imagen' => $img_galeria,
				'leyenda' => $leyenda[$i]
			);	
			$this->Galeria_model->insert_imagen($galeria_data);
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

	public function delete_noticia() {
		$this->load->model("Noticias_model");
		$this->load->model("Galeria_model");

		$id = $this->uri->segment(3);
		$deleted_noticia = $this->Noticias_model->get_noticia($id)->result_object()[0];
		$deleted_imagen = realpath('assets/'.$deleted_noticia->imagen);
		if ($deleted_imagen) {
			unlink($deleted_imagen);	
		}
		$current_galeria = $this->Galeria_model->get_galeria($id)->result_array();
  	  	foreach ($current_galeria as $index => $current_img) {
  	  		$deleted_img = realpath('assets/'.$current_img['imagen']);
			if ($deleted_img) {
				unlink($deleted_img);
			}		
  	  	}
		$this->Noticias_model->delete_noticia($id);
		redirect('admin_noticia');
	}

}