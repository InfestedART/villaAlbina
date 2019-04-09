<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_portada extends MY_Controller {
	public function index() {
		$this->load->model("Portada_model");
		$this->load->model("Defaults_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['valid_portadas'] = $this->Portada_model->get_valid_portadas()->result_array();
		$data['other_portadas'] = $this->Portada_model->get_other_portadas()->result_array();
		$data['default_color'] = $this->Defaults_model->get_value('primary_color');
		$this->load->view('admin_portada', $data);
	}

	public function nueva_portada() {
		$this->load->model("Areas_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas()->result_array();

		$this->load->view('nueva_portada', $data);		
	}

	public function editar_portada() {
		$this->load->model("Portada_model");
		$this->load->model("Defaults_model");
		$this->load->model("Areas_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$id = $this->uri->segment(3);
		$data['imagen_portada'] = $this->Portada_model->get_portada($id);
		$data['areas'] = $this->Areas_model->get_all_areas()->result_array();
		$data['default_color'] = $this->Defaults_model->get_value('primary_color');
		$this->load->view('editar_portada', $data);
	}

	public function insertar_portada() {
		$this->load->model("Portada_model");
		$this->load->model("Areas_model");

		$config['upload_path'] = './assets/uploads/portadas/';
   	$config['allowed_types'] = 'gif|jpg|png|jpeg';
   	$config['max_size'] = 0;
   	$config['max_width'] = 0;
   	$config['max_height'] = 0;
   	$this->load->library('upload', $config);
		if (!$this->upload->do_upload('portada')) {						
			if ($_FILES['portada']['error'] != 4) {				
				$error = $this->upload->display_errors();
				echo $error;
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_portada/nueva_portada');
			}
		}

		$portada = str_replace(" ", "_", $_FILES['portada']['name']);
		$imagen = $portada == '' ? '' : 'portadas/'.$portada;
		$area = $this->input->post('area', TRUE);
		$color = $this->input->post('color', TRUE);
		$color_switch = $this->input->post('color_switch', TRUE);
		$heredar = $color_switch == 'on' ? 1 : 0;
		$orden = $this->Portada_model->get_last_portada()['orden'];

		if ($area) {
			$color = $this->Areas_model->get_area_color($area);
		}

		$portada_data = array(
			'imagen' => $imagen,
			'id_area' => $area,
			'color' => $color,
			'heredar_color' => $heredar,
			'orden' => $orden + 1
		);
		$this->Portada_model->insertar_portada($portada_data);
		redirect('admin_portada');
	}

	public function update_portada() {
		$this->load->model("Portada_model");
		$this->load->model("Areas_model");
		$id = $this->uri->segment(3);
		$area = $this->input->post('area', TRUE);
		$color = $this->input->post('color', TRUE);
		$color_switch = $this->input->post('color_switch', TRUE);
		$heredar = $color_switch == 'on' ? 1 : 0;
		if ($area && $color_switch) {
			$color = $this->Areas_model->get_area_color($area);
		}

		$portada_data = array(
			'id_area' => $area,
			'heredar_color' => $heredar,
			'color' => $color,
		);
		var_dump($portada_data);

		$this->Portada_model->update_portada($id, $portada_data);
		redirect('admin_portada');
	}

	public function quitar_portada() {
      $this->load->model("Portada_model");
		$id = $this->uri->segment(3);
		$portadas = $this->Portada_model->get_valid_portadas()->result_array();
		$selected_portada = $this->Portada_model->get_portada($id)->result_array()[0];
		$orden_inicial = $selected_portada['orden'];
		foreach ($portadas as $portada) {
			if($portada['orden'] > $orden_inicial) {
				$portada_data['orden'] = $portada['orden']-1;
				$this->Portada_model->update_portada($portada['id_portada'], $portada_data);
			}
		}
		$chau_portada_data = array(
			'orden' => 0,
			'status' => 0
		);		
		$this->Portada_model->update_portada($id, $chau_portada_data);
		redirect('admin_portada');	
	}

	public function subir_portada() {
      $this->load->model("Portada_model");
      $id = $this->uri->segment(3);
      $portadas = $this->Portada_model->get_valid_portadas()->result_array();
		$selected_portada = $this->Portada_model->get_portada($id)->result_array()[0];
		$orden_inicial = $selected_portada['orden'];

		if ($orden_inicial == 1) {
			redirect('admin_portada');				
		}

		foreach ($portadas as $portada) {
			if($portada['orden'] == $orden_inicial) {
				$portada_up_data['orden'] = $portada['orden']-1;
				$this->Portada_model->update_portada($portada['id_portada'], $portada_up_data);
			}
			if($portada['orden'] == $orden_inicial-1) {
				$portada_down_data['orden'] = $portada['orden']+1;
				$this->Portada_model->update_portada($portada['id_portada'], $portada_down_data);
			}
		}
		redirect('admin_portada');	
	}

	public function bajar_portada() {
      $this->load->model("Portada_model");
      $id = $this->uri->segment(3);
      $portadas = $this->Portada_model->get_valid_portadas()->result_array();
		$selected_portada = $this->Portada_model->get_portada($id)->result_array()[0];
		$orden_inicial = $selected_portada['orden'];
      
      if ($orden_inicial == sizeof($portadas)) {
			redirect('admin_portada');				
		}

		foreach ($portadas as $portada) {
			if($portada['orden'] == $orden_inicial) {
				$portada_up_data['orden'] = $portada['orden']+1;
				$this->Portada_model->update_portada($portada['id_portada'], $portada_up_data);
			}
			if($portada['orden'] == $orden_inicial+1) {
				$portada_down_data['orden'] = $portada['orden']-1;
				$this->Portada_model->update_portada($portada['id_portada'], $portada_down_data);
			}
		}
		redirect('admin_portada');	
	}

	public function add_portada() {
	   $this->load->model("Portada_model");
      $id = $this->uri->segment(3);	
      $portadas = $this->Portada_model->get_valid_portadas()->result_array();
		$selected_portada = $this->Portada_model->get_portada($id)->result_array()[0];

		$hola_portada_data = array(
			'orden' => sizeof($portadas)+1,
			'status' => 1
		);		
		$this->Portada_model->update_portada($id, $hola_portada_data);
		redirect('admin_portada');	
	}

	public function delete_portada() {
		$this->load->model("Portada_model");
		$id = $this->uri->segment(3);

		$selected_portada = $this->Portada_model->get_portada($id)->result_object()[0];
		$deleted_imagen = realpath('assets/uploads/'.$selected_portada->imagen);
		if ($deleted_imagen) {
			unlink($deleted_imagen);	
		}		
		$this->Portada_model->delete_portada($id);
		redirect('admin_portada');
	}

}
