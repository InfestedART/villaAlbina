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
		$this->load->model("Areas_model");
		$this->load->model("Media_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas();
		$data['tipos'] = $this->Media_model->get_all_tipos();
		$this->load->view('nuevo_media', $data);
	}

	public function editar_media() {
		$this->load->model("Areas_model");
		$this->load->model("Media_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas();
		$id = $this->uri->segment(3);
		$data['media'] = $this->Media_model->get_media($id);
		$this->load->view('editar_media', $data);
	}

	public function insertar_media() {
   		$this->load->model("Media_model");
    	$this->load->model("Publicacion_model");
		$titulo = $this->input->post('titulo', TRUE);
		$area = $this->input->post('area', TRUE);
		$enlace = $this->input->post('enlace', TRUE);
		$orden = $this->Media_model->get_cant_media();

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
			'id_area' => $area,
			'orden' => $orden+1, 
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
		$area = $this->input->post('area', TRUE);
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
			'id_area' => $area,
			'id_tipo_media' => $id_tipo_media
		);
		$this->Publicacion_model->update_publicacion($id, $post_data);
		$this->Media_model->update_media($id, $media_data);
		redirect('admin_media');
	}

	public function toggle_media() {
      $this->load->model("Publicacion_model");
      $this->load->model("Media_model");
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$orden = $toggle
			? $this->Media_model->get_cant_media()+1
			: 0;
		$selected_media = $this->Media_model->get_media($id)->result_array()[0];
		$orden_inicial = $selected_media['orden'];
		$multimedia = $this->Media_model->get_valid_media()->result_array();
		if (!$toggle) {
			foreach ($multimedia as $media) {
				if($media['orden'] > $orden_inicial) {
					$media_data['orden'] = $media['orden']-1;
					$this->Media_model->update_media($media['id_post'], $media_data);
				}
			}
		}
		$post_data = array(
			'status' => $toggle			
		);
		$this->Publicacion_model->update_publicacion($id, $post_data);
		$multimedia_data = array(
			'orden' => $orden			
		);
		$this->Media_model->update_media($id, $multimedia_data);
		redirect('admin_media');	
	}

	public function delete_media() {
   	$this->load->model("Media_model");
		$id = $this->uri->segment(3);

		$this->Media_model->delete_media($id);
		redirect('admin_media');
	}

	public function subir_media() {
      $this->load->model("Media_model");
      $id = $this->uri->segment(3);
      $multimedia = $this->Media_model->get_valid_media()->result_array();
		$selected_media = $this->Media_model->get_media($id)->result_array()[0];
		$orden_inicial = $selected_media['orden'];
		if ($orden_inicial == 1) {
			redirect('admin_media');				
		} else {
			foreach ($multimedia as $media) {
				echo $media['titulo'].": ".$media['orden']."==".$orden_inicial."<br/>";
				if($media['orden'] == $orden_inicial-1) {
					$media_down_data['orden'] = $media['orden']+1;
					$this->Media_model->update_media($media['id_post'], $media_down_data);
				}
				if($media['orden'] == $orden_inicial) {
					$media_up_data['orden'] = $media['orden']-1;
					$this->Media_model->update_media($media['id_post'], $media_up_data);
				}
			}
		redirect('admin_media');
		}
	}

	public function bajar_media() {
      $this->load->model("Media_model");
      $id = $this->uri->segment(3);
      $multimedia = $this->Media_model->get_valid_media()->result_array();
		$selected_media = $this->Media_model->get_media($id)->result_array()[0];
		$orden_inicial = $selected_media['orden'];
      
      if ($orden_inicial == sizeof($multimedia)) {
			redirect('admin_media');				
		}

		foreach ($multimedia as $media) {
			if($media['orden'] == $orden_inicial) {
				$media_up_data['orden'] = $media['orden']+1;
				$this->Media_model->update_media($media['id_post'], $media_up_data);
			}
			if($media['orden'] == $orden_inicial+1) {
				$media_down_data['orden'] = $media['orden']-1;
				$this->Media_model->update_media($media['id_post'], $media_down_data);
			}
		}
		redirect('admin_media');	
	}

}
