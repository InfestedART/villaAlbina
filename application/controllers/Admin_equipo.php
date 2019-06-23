<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_equipo extends Admin_Controller {
	// views
	public function index() {
		$this->load->model("Equipo_model");
		$this->load->model("Cat_equipo_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this
			->Visitas_model
			->get_visitas_count()
			->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$orderby = $this->input->get('orderby', TRUE);
		if (!$orderby) {
			$orderby = 'orden';
		}
		$direction = $this->input->get('direction', TRUE);
		$step = $this->input->get('step', TRUE);
		if (!$step) { $step = 0; }	
		$limit = 25;
		$search = $this->input->post('buscar_equipo', TRUE);
		$data['search'] = $search;
		$data['step'] = $step;
		$data['limit'] = $limit;
		$data['cant_miembros'] = sizeof(
			$this->Equipo_model->get_all_miembros(
				$search, $orderby, $direction, 0, 150
			)->result_array()
		);
		$data['miembros'] = $this->Equipo_model->get_all_miembros(
			$search, $orderby, $direction, $step, $limit
		);
		$data['categorias'] = $this->Cat_equipo_model->get_all_categorias();
		$this->load->view('admin_equipo', $data);
	}

	public function categorias_equipo() {
		$this->load->model("Cat_equipo_model");
		$id_categoria = $this->uri->segment(3);
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

	    $data['categorias'] = $this->Cat_equipo_model->get_all_categorias();
	    $data['selected_categoria'] = $this->Cat_equipo_model->get_categoria($id_categoria);
	    $this->load->view('categorias_equipo', $data);
	}

	public function nuevo_equipo() {
		$this->load->model("Cat_equipo_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['categorias'] = $this->Cat_equipo_model->get_all_categorias();
		$this->load->view('nuevo_equipo', $data);
	}

	public function editar_equipo() {
		$this->load->model("Cat_equipo_model");
		$this->load->model("Equipo_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$id = $this->uri->segment(3);

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

	private function set_img_config() {
		$img_config['upload_path'] = './assets/uploads/equipo/';
      $img_config['allowed_types'] = 'gif|jpg|png|jpeg';
      $img_config['max_size'] = 0;
      $img_config['max_width'] = 0;
      $img_config['max_height'] = 0;
      return $img_config;
	}

	private function translate($str) {
		$trans = array(
			"ñ" => "n", "Ñ" => "N",
			"á" => "a", "Á" => "A",
			"é" => "e", "É" => "E",
			"í" => "i", "Í" => "I",
			"ó" => "o", "Ó" => "O",
			"ú" => "u", "Ú" => "U",
			"ü" => "u", "Ü" => "U"
		);	
		return strtr($str, $trans);
	}

	public function insertar_equipo() {
		$this->load->model('Equipo_model');
		$this->load->model("Publicacion_model");
		$this->load->model("Cat_equipo_model");
	   	$this->load->library('upload');

		$_FILES['imagen']['name']= $this->translate($_FILES['imagen']['name']); 
      	$this->upload->initialize($this->set_img_config());
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
		$orden = $this->Equipo_model->get_cant_miembros();

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
			'descripcion' => $descripcion,
			'orden' => $orden+1
		);
		$this->Equipo_model->insert_miembro($miembro_data);

      redirect('admin_equipo');
	}

	public function update_equipo() {
		$this->load->model('Equipo_model');
		$this->load->model("Publicacion_model");
		$this->load->model("Cat_equipo_model");
		$this->load->library('upload');
		$id = $this->uri->segment(3);   

		$_FILES['imagen']['name']= $this->translate($_FILES['imagen']['name']); 
		$this->upload->initialize($this->set_img_config());
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
     		if(file_exists($updated_imagen)) {
     			unlink($updated_imagen);
     		} 
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
			if(file_exists($updated_imagen)) {
				unlink($deleted_imagen);
			}
		}		
		$this->Equipo_model->delete_miembro($id);
     	redirect('admin_equipo');
	}

	public function subir_equipo() {
      $this->load->model("Equipo_model");
      $id = $this->uri->segment(3);
      $miembros = $this->Equipo_model->get_valid_miembros()->result_array();
		$selected_miembro = $this->Equipo_model->get_miembro($id)->result_array()[0];
		$orden_inicial = $selected_miembro['orden'];

		if ($orden_inicial == 1) {
			redirect('admin_equipo');				
		}

		foreach ($miembros as $miembro) {
			if($miembro['orden'] == $orden_inicial) {
				$miembro_up_data['orden'] = $miembro['orden']-1;
				$this->Equipo_model->update_miembro($miembro['id_post'], $miembro_up_data);
			}
			if($miembro['orden'] == $orden_inicial-1) {
				$miembro_down_data['orden'] = $miembro['orden']+1;
				$this->Equipo_model->update_miembro($miembro['id_post'], $miembro_down_data);
			}
		}
		redirect('admin_equipo');	
	}

	public function bajar_equipo() {
      $this->load->model("Equipo_model");
      $id = $this->uri->segment(3);
      $miembros = $this->Equipo_model->get_valid_miembros()->result_array();
		$selected_miembro = $this->Equipo_model->get_miembro($id)->result_array()[0];
		$orden_inicial = $selected_miembro['orden'];
      
      if ($orden_inicial == sizeof($miembros)) {
			redirect('admin_equipo');				
		}

		foreach ($miembros as $miembro) {
			if($miembro['orden'] == $orden_inicial) {
				$miembro_up_data['orden'] = $miembro['orden']+1;
				$this->Equipo_model->update_miembro($miembro['id_post'], $miembro_up_data);
			}
			if($miembro['orden'] == $orden_inicial+1) {
				$miembro_down_data['orden'] = $miembro['orden']-1;
				$this->Equipo_model->update_miembro($miembro['id_post'], $miembro_down_data);
			}
		}
		redirect('admin_equipo');	
	}

}