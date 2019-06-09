<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_area extends Admin_Controller {
	public function index() {
		$this->load->model("Areas_model");
		$this->load->model("Subarea_model");

		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['open_subareas'] = $this->input->get('open_subareas', TRUE);
		$data['areas'] = $this->Areas_model->get_all_areas();
		$data['subareas'] = $this->Subarea_model->get_all_subareas();
		$this->load->view('admin_area', $data);
	}

	public function nueva_area() {
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Defaults_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['api_key'] = $this->Defaults_model->get_value('api_key');

		$this->load->view('nueva_area', $data);
	}

	public function nueva_subarea() {
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Areas_model");
		$this->load->model("Defaults_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas();
		$data['get_area'] = $this->input->get('area', TRUE);
		$data['api_key'] = $this->Defaults_model->get_value('api_key');

		$this->load->view('nueva_subarea', $data);
	}

	public function editar_area() {
		$this->load->model("Areas_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Defaults_model");
		$this->load->model("Galeria_area_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$id = $this->uri->segment(3);
		$data['galeria'] = $this->Galeria_area_model->get_galeria($id);
		$data['api_key'] = $this->Defaults_model->get_value('api_key');
		$data['area'] = $this->Areas_model->get_area($id);
		$this->load->view('editar_area', $data);
	}

	public function editar_subarea() {
		$this->load->model("Areas_model");
		$this->load->model("Subarea_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Defaults_model");
		$this->load->model("Galeria_subarea_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$id = $this->uri->segment(3);
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['galeria'] = $this->Galeria_subarea_model->get_galeria($id);
		$data['api_key'] = $this->Defaults_model->get_value('api_key');
		$data['areas'] = $this->Areas_model->get_all_areas();
		$data['subarea'] = $this->Subarea_model->get_subarea($id);
		$this->load->view('editar_subarea', $data);
	}

	private function set_img_config() {
		$img_config['upload_path'] = './assets/uploads/areas/';
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

	public function insertar_area() {
		$this->load->model("Areas_model");
		$this->load->model("Content_model");
	  	$this->load->model("Galeria_area_model");
	   $this->load->library('upload');

   	$files = $_FILES;   	
   	$img_cant = array_key_exists("galeria", $_FILES) ? sizeof($_FILES['galeria']['name']) : 0;
   	$delete_img = $this->input->post('delete_img', TRUE);
   	$galeria_array=[];

  	  	// insert imgs
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
			 		redirect('admin_area');
				}
			}			
			$galeria_array[$i]='uploads/areas/'
				.str_replace(" ", "_", $_FILES['img_upload']['name']);
	    }
	   $this->upload->initialize($this->set_img_config());
		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_area');
			}
		}

		//save data to database
		$area = $this->input->post('area', TRUE);
		$color = $this->input->post('color', TRUE);
		$color_switch = $this->input->post('color_switch', TRUE);			
		$enlace = str_replace(" ", "_", $area);
		$enlace = strtolower($this->translate($enlace));
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$imagen_destacada = $imagen == '' ? '' : 'uploads/areas/'.$imagen;
		$leyenda = $this->input->post('new_leyenda', TRUE);
		$contenido = $this->input->post('contenido', FALSE);

		$contenido_data = array(
			'html' => $contenido,
			'titulo' => $area,
			'imagen' => $imagen_destacada
		);	
		
		$this->Content_model->insertar_contenido($contenido_data);
 		$id_content = $this->Content_model->get_last_post();
		
		$area_data = array(
			'area' => $area,
			'color_area' => $color,
			'enlace' => $enlace,
			'id_content' => $id_content
		);
		$this->Areas_model->insertar_area($area_data);
		$id_area = $this->Areas_model->get_last_post();

		foreach ($galeria_array as $i => $img_galeria) {
			$galeria_data = array(
				'id_area' => $id_area,
				'imagen' => $img_galeria,
				'leyenda' => $leyenda[$i],
				'orden' => $i+1
			);
			$this->Galeria_area_model->insert_imagen($galeria_data);
		}

		redirect('admin_area');
	}

	public function update_area() {
		$this->load->model("Areas_model");
		$this->load->model("Content_model");
	  	$this->load->model("Galeria_area_model");
	   $this->load->library('upload');
		$id = $this->uri->segment(3);

   	$files = $_FILES;   	
   	$img_cant = array_key_exists("galeria", $_FILES) ? sizeof($_FILES['galeria']['name']) : 0;
   	$delete_img = $this->input->post('delete_img', TRUE);
   	$galeria_array=[];

  	  	// insert imgs
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
			 		redirect('admin_area');
				}
			}			
			$galeria_array[$i]='uploads/areas/'
				.str_replace(" ", "_", $_FILES['img_upload']['name']);
	    }
	   $this->upload->initialize($this->set_img_config());
		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_area');
			}
		}

   	// delete selected imgs
  	  	$current_galeria = $this->Galeria_area_model->get_galeria($id)->result_array();
  	  	foreach ($current_galeria as $index => $current_img) {  	  		
  	  		if ($delete_img[$index]) {
  	  			$this->Galeria_area_model->delete_imagen(
  	  				$current_img['id_img'],
  	  				$current_img['imagen']
  	  			);
  	  			$img_file = realpath('assets/'.$current_img['imagen']);
				if(file_exists($img_file)){
				    unlink($img_file);
				}
  	  		}  	  		
  	  	}
		$updated_area = $this->Areas_model->get_area($id)->result_object()[0];
		$updated_imagen = realpath('assets/'.$updated_area->imagen);
		$delete_imagen = boolval($this->input->post('delete_area', TRUE));
		echo $delete_imagen;
		
     	if ($updated_area->imagen && $delete_imagen) {
     		if(file_exists($updated_imagen)) {
     			unlink($updated_imagen);
     		}
     	}

		//save data to database
		$area = $this->input->post('area', TRUE);
		$color = $this->input->post('color', TRUE);
		$color_switch = $this->input->post('color_switch', TRUE);
		$enlace = str_replace(" ", "_", $area);
		$enlace = strtolower($this->translate($enlace));
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$imagen_destacada = $imagen == '' ? '' : 'uploads/areas/'.$imagen;
		$leyenda = $this->input->post('leyenda', TRUE);
		$new_leyenda = $this->input->post('new_leyenda', TRUE);		
		$id_img = $this->input->post('id_img', TRUE);
		$contenido = $this->input->post('contenido', FALSE);
		$id_content = $updated_area->id_content;

		$contenido_data = array(
			'titulo' => $area,
			'html' => $contenido
		);
		if ($imagen_destacada) {
			$contenido_data['imagen'] = $imagen_destacada;
		} elseif ($updated_area->imagen && $delete_imagen) {
			$contenido_data['imagen'] = '';
		}
		if ($id_content) {
			$this->Content_model->update_contenido($id_content, $contenido_data);
		} else {
			$this->Content_model->insertar_contenido($contenido_data);
 			$id_content = $this->Content_model->get_last_post();
		}
		
		$area_data = array(
			'area' => $area,
			'color_area' => $color,
			'enlace' => $enlace,
			'id_content' => $id_content,
		);
		$this->Areas_model->update_area($id, $area_data);

		$initial_orden = sizeof($current_galeria);
		foreach ($galeria_array as $i => $img_galeria) {
			$galeria_data = array(
				'id_area' => $id,
				'imagen' => $img_galeria,
				'leyenda' => $new_leyenda[$i],
				'orden' => $initial_orden+$i+1
			);
			$this->Galeria_area_model->insert_imagen($galeria_data);
		}

		if ($id_img) {
			foreach ($id_img as $i => $galeria_img) {
				$galeria_data = array(
					'id_img' =>	$galeria_img,
					'leyenda' => $leyenda[$i],
					'orden' => $i+1
				);
					$this->Galeria_area_model->update_imagen(
					$galeria_img,
					$galeria_data
				);
			}	
		}	

		redirect('admin_area');
	}

public function insertar_subarea() {
		$this->load->model("Subarea_model");
		$this->load->model("Content_model");
	  	$this->load->model("Galeria_subarea_model");
	   $this->load->library('upload');

		$files = $_FILES;   	
   	$img_cant = array_key_exists("galeria", $_FILES) ? sizeof($_FILES['galeria']['name']) : 0;
   	$delete_img = $this->input->post('delete_img', TRUE);
   	$galeria_array=[];

  	  	// insert imgs
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
			 		redirect('admin_area');
				}
			}			
			$galeria_array[$i]='uploads/areas/'
				.str_replace(" ", "_", $_FILES['img_upload']['name']);
	    }
	   $this->upload->initialize($this->set_img_config());
		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_area');
			}
		}	

		//save data to database
		$subarea = $this->input->post('subarea', TRUE);
		$area = $this->input->post('area', TRUE);
		$enlace = str_replace(" ", "_", $subarea);
		$enlace = strtolower($this->translate($enlace));
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$imagen_destacada = $imagen == '' ? '' : 'uploads/areas/'.$imagen;
		$leyenda = $this->input->post('new_leyenda', TRUE);
		$contenido = $this->input->post('contenido', FALSE);

		$contenido_data = array(
			'html' => $contenido,
			'titulo' => $subarea,
			'imagen' => $imagen_destacada
		);		
		$this->Content_model->insertar_contenido($contenido_data);
 		$id_content = $this->Content_model->get_last_post();
		
		$subarea_data = array(
			'id_area' => $area,
			'subarea' => $subarea,
			'enlace' => $enlace,
			'id_content' => $id_content
		);
		$this->Subarea_model->insertar_subarea($subarea_data);
		$id_subarea = $this->Subarea_model->get_last_post();

		foreach ($galeria_array as $i => $img_galeria) {
			$galeria_data = array(
				'id_subarea' => $id_subarea,
				'imagen' => $img_galeria,
				'leyenda' => $leyenda[$i]
			);
			$this->Galeria_subarea_model->insert_imagen($galeria_data);
		}

		redirect('admin_area');
	}

	public function update_subarea() {
		$this->load->model("Subarea_model");
		$this->load->model("Content_model");
	  	$this->load->model("Galeria_subarea_model");
	   $this->load->library('upload');
		$id = $this->uri->segment(3);

		$files = $_FILES;   	
   	$img_cant = array_key_exists("galeria", $_FILES) ? sizeof($_FILES['galeria']['name']) : 0;
   	$delete_img = $this->input->post('delete_img', TRUE);
   	$galeria_array=[];

  	  	// insert imgs
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
			 		redirect('admin_area');
				}
			}			
			$galeria_array[$i]='uploads/areas/'
				.str_replace(" ", "_", $_FILES['img_upload']['name']);
	    }
	   $this->upload->initialize($this->set_img_config());
		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_area');
			}
		}	

   	// delete selected imgs
  	  	$current_galeria = $this->Galeria_subarea_model->get_galeria($id)->result_array();
  	  	foreach ($current_galeria as $index => $current_img) {  	  		
  	  		if ($delete_img[$index]) {
  	  			$this->Galeria_subarea_model->delete_imagen(
  	  				$current_img['id_img'],
  	  				$current_img['imagen']
  	  			);
  	  			$img_file = realpath('assets/'.$current_img['imagen']);
				if(file_exists($img_file)){
				    unlink($img_file);
				}
  	  		}  	  		
  	  	}
		$updated_subarea = $this->Subarea_model->get_subarea($id)->result_object()[0];
		$updated_imagen = realpath('assets/'.$updated_subarea->imagen);
		$delete_imagen = boolval($this->input->post('delete_imagen', TRUE));
		
     	if ($updated_subarea->imagen && $delete_imagen) {
     		if(file_exists($updated_imagen)) { 
     			unlink($updated_imagen);
     		}
     	}

		//save data to database
		$area = $this->input->post('area', TRUE);
		$subarea = $this->input->post('subarea', TRUE);
		$enlace = str_replace(" ", "_", $subarea);
		$enlace = strtolower($this->translate($enlace));
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$imagen_destacada = $imagen == '' ? '' : 'uploads/areas/'.$imagen;
		$leyenda = $this->input->post('leyenda', TRUE);
		$id_img = $this->input->post('id_img', TRUE);
		$new_leyenda = $this->input->post('new_leyenda', TRUE);		
		$contenido = $this->input->post('contenido', FALSE);
		$id_content = $updated_subarea->id_content;

		$contenido_data = array(
			'html' => $contenido,
			'titulo' => $subarea
		);		
		if ($imagen_destacada) {
			$contenido_data['imagen'] = $imagen_destacada;
		} elseif ($updated_subarea->imagen && $delete_imagen) {
			$contenido_data['imagen'] = '';
		}
		if ($id_content) {
			$this->Content_model->update_contenido($id_content, $contenido_data);
		} else {
			$this->Content_model->insertar_contenido($contenido_data);
 			$id_content = $this->Content_model->get_last_post();
		}

		$subarea_data = array(
			'id_area' => $area,
			'subarea' => $subarea,
			'enlace' => $enlace,
			'id_content' => $id_content
		);
		$this->Subarea_model->update_subarea($id, $subarea_data);

		$initial_orden = sizeof($current_galeria);
		foreach ($galeria_array as $i => $img_galeria) {
			$galeria_data = array(
				'id_subarea' => $id,
				'imagen' => $img_galeria,
				'leyenda' => $new_leyenda[$i],
				'orden' => $initial_orden+$i+1
			);
			$this->Galeria_subarea_model->insert_imagen($galeria_data);
		}

		if ($id_img) {
			foreach ($id_img as $i => $galeria_img) {
				$galeria_data = array(
					'id_img' =>	$galeria_img,
					'leyenda' => $leyenda[$i],
					'orden' => $i+1
				);
					$this->Galeria_subarea_model->update_imagen(
					$galeria_img,
					$galeria_data
				);
			}	
		}		

		$this->Subarea_model->update_subarea($id, $subarea_data);
		redirect('admin_area');
	}

	public function toggle_area() {
      $this->load->model("Areas_model");
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$area_data = array(
			'status' => $toggle
		);
		$this->Areas_model->update_area($id, $area_data);
		redirect('admin_area');	
	}

	public function toggle_subarea() {
		$this->load->model("Areas_model");
      $this->load->model("Subarea_model");
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$subarea_data = array(
			'status' => $toggle
		);

		$subarea = $this->Subarea_model->get_subarea($id)->result_array()[0];
		$id_area = $subarea['id_area'];
		$this->Subarea_model->update_subarea($id, $subarea_data);
		$this->session->set_flashdata('open_subareas', $id_area);
		redirect('admin_area');	
	}

}