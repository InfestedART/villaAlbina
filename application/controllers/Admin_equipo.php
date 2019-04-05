<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_equipo extends MY_Controller {
	// views
	public function index() {
		$this->load->model("Equipo_model");
		$this->load->model("Cat_equipo_model");
		$this->load->model("Tipo_model");
		$sidebar_data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();

		$data['sidebar'] = $this->load->view('templates/admin_sidebar', $sidebar_data, true);
		$search = $this->input->post('buscar_libreria', TRUE);
		$data['search'] = $search;
		$data['miembros'] = $this->Equipo_model->get_all_miembros();
		$data['categorias'] = $this->Cat_equipo_model->get_all_categorias();
		$this->load->view('admin_equipo', $data);
	}

	public function categorias_equipo() {
		$this->load->model("Cat_equipo_model");
		$id_categoria = $this->uri->segment(3);
		$this->load->model("Tipo_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();

	    $data['categorias'] = $this->Cat_equipo_model->get_all_categorias();
	    $data['selected_categoria'] = $this->Cat_equipo_model->get_categoria($id_categoria);
	    $this->load->view('categorias_equipo', $data);
	}

	public function nuevo_equipo() {
		$this->load->model("Cat_equipo_model");
		$this->load->model("Tipo_model");		
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['categorias'] = $this->Cat_equipo_model->get_all_categorias();
		$this->load->view('nuevo_equipo', $data);
	}

	public function editar_libro() {
		$this->load->model("Cat_equipo_model");
		$this->load->model("Equipo_model");
		$this->load->model("Tipo_model");	

		$id = $this->uri->segment(3);
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['miembro'] = $this->Equipo_model->get_miembro($id);
		$data['categorias'] = $this->Cat_equipo_model->get_all_categorias();
		$this->load->view('editar_equipo', $data);
	}

	// db operations
	public function insertar_categoria() {
		$this->load->model('Cat_equipo_model');
		$categoria = $this->input->post('categoria', TRUE);
		$cat_data = array('categoria' => $categoria);
		$this->Cat_equipo_model->insert_categoria($cat_data);
      redirect('admin_equipo/categorias_equipo');
   }

   public function editar_categoria() {
		$this->load->model('Cat_equipo_model');
		$categoria = $this->input->post('edit_categoria', TRUE);
		$id_categoria = $this->input->post('edit_id_categoria', TRUE);		
		$cat_data = array('categoria' => $categoria);
		$this->Cat_equipo_model->update_categoria($id_categoria, $cat_data);
      redirect('admin_equipo/categorias_equipo');
	}

	public function insertar_equipo() {
		$this->load->model('Equipo_model');
		$this->load->model("Publicacion_model");
		$this->load->model("Cat_equipo_model");
	   $this->load->library('upload', $config);

		$config['upload_path'] = './assets/uploads/equipo/';
	   $config['allowed_types'] = 'gif|jpg|png|jpeg';
	   $config['max_size'] = 0;
	   $config['max_width'] = 0;
	   $config['max_height'] = 0;

		if (!$this->upload->do_upload('imagen')) {
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				echo $error;
		 		redirect('admin_equipo');
			}
		}		
	   $nombre = $this->input->post('nombre', TRUE);
		$categoria = $this->input->post('categoria', TRUE);
		$cargo = $this->input->post('cargo', TRUE);		
		$descripcion = $this->input->post('descripcion', TRUE);
		$foto = str_replace(" ", "_", $_FILES['imagen']['name']);
		$imagen = $foto == '' ? '' : 'uploads/equipo/'.$foto;

		$post_data = array(
			'titulo' => $nombre,
			'imagen' => $imagen,
			'tipo' => 3
		);
		$this->Publicacion_model->insert_publicacion($post_data);

		$last_id = $this->Publicacion_model->get_last_post();

		$miembro_data = array(
			'id_post' => $last_id,
			'nombre' => $nombre,
			'id_categoria_equipo' => $categoria,
			'cargo' => $cargo,
			'descripcion' => $descripcion
		);
		$this->Equipo_model->insert_miembro($miembro_data);
      redirect('admin_equipo');
	}

	public function update_equipo() {
		$this->load->model('Equipo_model');
		$this->load->model("Publicacion_model");
		$this->load->model("Cat_equipo_model");
		$id = $this->uri->segment(3);
	   
		$config['upload_path'] = './assets/uploads/equipo/';
	   $config['allowed_types'] = 'gif|jpg|png|jpeg';
	   $config['max_size'] = 0;
	   $config['max_width'] = 0;
	   $config['max_height'] = 0;
	   $this->load->library('upload', $config);

		if (!$this->upload->do_upload('imagen')) {
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
				echo $error;
		 		redirect('admin_equipo');
			}
		}
		$updated_miembro = $this->Equipo_model->get_miembro($id)->result_object()[0];
		$updated_imagen = realpath('assets/'.$updated_miembro->imagen);
		$delete_imagen_equipo = boolval($this->input->post('delete_imagen_equipo', TRUE));

	   $nombre = $this->input->post('nombre', TRUE);
		$categoria = $this->input->post('categoria', TRUE);
		$cargo = $this->input->post('cargo', TRUE);		
		$descripcion = $this->input->post('descripcion', TRUE);
		$foto = str_replace(" ", "_", $_FILES['imagen']['name']);
		$imagen = $foto == '' ? '' : 'uploads/equipo/'.$foto;

		$post_data = array(
			'titulo' => $nombre,
			'tipo' => 3
		);
		if ($imagen) {
			$post_data['imagen'] = $imagen;
		} elseif ($updated_miembro->imagen && $delete_imagen_equipo) {
			$post_data['imagen'] = '';
		}

		$miembro_data = array(
			'nombre' => $nombre,
			'id_categoria_equipo' => $categoria,
			'cargo' => $cargo,
			'descripcion' => $descripcion
		);

     	if ($updated_miembro->imagen && $delete_imagen_equipo) {
     		unlink($updated_imagen);
     	}
		$this->Publicacion_model->update_publicacion($id, $post_data);
		$this->Equipo_model->update_miembro($id, $miembro_data);
      redirect('admin_equipo');
	}

	public function toggle_equipo() {
		$this->load->model('Publicacion_model');
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$post_data = array(
			'status' => $toggle
		);
		$this->Publicacion_model->update_publicacion($id, $post_data);
      redirect('admin_equipo');
	}

	public function delete_equipo() {
		$this->load->model("Equipo_model");
		$id = $this->uri->segment(3);
		$deleted_miembro = $this->Equipo_model->get_miembro($id)->result_object()[0];
		$deleted_imagen = realpath('assets/'.$deleted_miembro->imagen);
		if ($deleted_imagen) {
			unlink($deleted_imagen);	
		}		
		$this->Equipo_model->delete_miembro($id);
     	redirect('admin_equipo');
	}

}