<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Pagina extends Admin_Controller {
	public function index() {
		$this->load->model("Paginas_model");
		$this->load->model("Subpaginas_model");

		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$data['open_subpaginas'] = $this->input->get('open_subpaginas', TRUE);
		$data['paginas'] = $this->Paginas_model->get_all_paginas();
		$data['subpaginas'] = $this->Subpaginas_model->get_all_subpaginas();

		$this->load->view('admin_pagina', $data);
	}

	public function nueva_pagina() {
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Modelo_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['modelos'] = $this->Modelo_model->get_all_modelos();
		$this->load->view('nueva_pagina', $data);
	}

	public function editar_pagina() {
		$this->load->model("Paginas_model");
		$this->load->model("Modelo_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Defaults_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['modelos'] = $this->Modelo_model->get_all_modelos();
		$data['default_color'] = $this->Defaults_model->get_value('primary_color');
		$id = $this->uri->segment(3);

		$data['pagina'] = $this->Paginas_model->get_pagina($id);
		$this->load->view('editar_pagina', $data);
	}	

	public function nueva_subpagina() {
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Subpaginas_model");
		$this->load->model("Paginas_model");
		$this->load->model("Modelo_model");
		$this->load->model("Defaults_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['api_key'] = $this->Defaults_model->get_value('api_key');
		$data['modelos'] = $this->Modelo_model->get_subpagina_modelos();
		$data['paginas'] = $this->Paginas_model->get_parent_paginas();
		$data['subpaginas'] = $this->Subpaginas_model->get_all_subpaginas();
		$data['get_pagina'] = $this->input->get('pagina', TRUE);
		$this->load->view('nueva_subpagina', $data);
	}

	public function editar_subpagina() {
		$this->load->model("Paginas_model");
		$this->load->model("Subpaginas_model");
		$this->load->model("Modelo_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Galeria_subpagina_model");
		$this->load->model("Defaults_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$id = $this->uri->segment(3);

		$data['modelos'] = $this->Modelo_model->get_subpagina_modelos();
		$data['paginas'] = $this->Paginas_model->get_parent_paginas();
		$data['subpagina'] = $this->Subpaginas_model->get_subpagina($id);
		$data['default_color'] = $this->Defaults_model->get_value('primary_color');
		$data['galeria'] = $this->Galeria_subpagina_model->get_galeria($id);
		$data['api_key'] = $this->Defaults_model->get_value('api_key');
		$this->load->view('editar_subpagina', $data);
	}


	public function insertar_pagina() {
		$this->load->model("Paginas_model");

		$titulo = $this->input->post('titulo', TRUE);
		$color = $this->input->post('color', TRUE);
		$modelo = $this->input->post('modelo', TRUE);
		$mostrar_navbar = $this->input->post('mostrar_navbar', TRUE);
		$mostrar_home = $this->input->post('mostrar_home', TRUE);
		$enlace = str_replace(" ", "_", strtolower($titulo));
		$paginas = $this->Paginas_model->get_valid_paginas()->result_array();

		$pagina_data = array(
			'titulo' => $titulo,
			'color' => $color ? $color : '',
			'id_modelo' => $modelo,
			'enlace' => $enlace,
			'mostrar_navbar' => !!$mostrar_navbar,
			'mostrar_home' => !!$mostrar_home,
			'orden' => sizeof($paginas)+1
		);

		$this->Paginas_model->insertar_pagina($pagina_data);
		redirect('admin_pagina');
	}

	public function update_pagina() {
		$this->load->model("Paginas_model");

		$titulo = $this->input->post('titulo', TRUE);
		$color = $this->input->post('color', TRUE);
		$modelo = $this->input->post('modelo', TRUE);
		$mostrar_navbar = $this->input->post('mostrar_navbar', TRUE);
		$mostrar_home = $this->input->post('mostrar_home', TRUE);
		$id = $this->uri->segment(3);

		$pagina_data = array(
			'titulo' => $titulo,
			'color' => $color ? $color : '',
			'id_modelo' => $modelo,
			'mostrar_navbar' => !!$mostrar_navbar,
			'mostrar_home' => !!$mostrar_home,
		);

		$this->Paginas_model->update_pagina($id, $pagina_data);
		redirect('admin_pagina');
	}

	private function set_img_config() {
		$img_config['upload_path'] = './assets/uploads/subpagina/';
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

	public function insertar_subpagina() {
		$this->load->model("Subpaginas_model");
		$this->load->model("Content_model");
		$this->load->model("Galeria_subpagina_model");
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
			$galeria_array[$i]='uploads/subpagina/'
				.str_replace(" ", "_", $_FILES['img_upload']['name']);
	    }
	    $this->upload->initialize($this->set_img_config());
		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_pagina');
			}
		}

		//save data to database
		$pagina = $this->input->post('pagina', TRUE);
		$subpagina = $this->input->post('subpagina', TRUE);
		$enlace = str_replace(" ", "_", strtolower($subpagina));
		$modelo = $this->input->post('modelo', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$img = $imagen == '' ? '' : 'uploads/subpagina/'.$imagen;
		$leyenda = $this->input->post('new_leyenda', TRUE);
		$contenido = $this->input->post('contenido', FALSE);

		if ($modelo == '0') {
			$contenido_data = array(
				'titulo' => $subpagina,
				'imagen' => $img,
				'html' => $contenido
			);
			$this->Content_model->insertar_contenido($contenido_data);	
		}
		$last_id = $modelo == '0' 
			? $this->Content_model->get_last_post()
			: NULL;

		$subpagina_data = array(
			'subpagina' => $subpagina,
			'id_pagina' => $pagina,
			'id_modelo' => $modelo,
			'enlace' => $enlace,
			'id_content' => $last_id
		);
		$this->Subpaginas_model->insertar_subpagina($subpagina_data);		
		$id_subpagina = $this->Subpaginas_model->get_last_post();

		foreach ($galeria_array as $i => $img_galeria) {
			$galeria_data = array(
				'id_subpagina' => $id_subpagina,
				'imagen' => $img_galeria,
				'leyenda' => $leyenda[$i]
			);
			$this->Galeria_subpagina_model->insert_imagen($galeria_data);
		}

		redirect('admin_pagina');
	}


	public function update_subpagina() {
		$this->load->model("Subpaginas_model");
		$this->load->model("Content_model");
		$this->load->model("Galeria_subpagina_model");
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
			 		redirect('admin_pagina');
				}
			}			
			$galeria_array[$i]='uploads/subpagina/'
				.str_replace(" ", "_", $_FILES['img_upload']['name']);
	    }
		$this->upload->initialize($this->set_img_config());
		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_pagina');
			}
		}

   	// delete selected imgs
  	  	$current_galeria = $this->Galeria_subpagina_model->get_galeria($id)->result_array();
  	  	foreach ($current_galeria as $index => $current_img) {  	  		
  	  		if ($delete_img[$index]) {
  	  			$this->Galeria_subpagina_model->delete_imagen(
  	  				$current_img['id_img'],
  	  				$current_img['imagen']
  	  			);
  	  			$img_file = realpath('assets/'.$current_img['imagen']);
				if(file_exists($img_file)){
				    unlink($img_file);
				}
  	  		}  	  		
  	  	}		
		$updated_subpagina = $this->Subpaginas_model->get_subpagina($id)->result_object()[0];
		$updated_imagen = realpath('assets/'.$updated_subpagina->imagen);
		$delete_subpagina = boolval($this->input->post('delete_subpagina', TRUE));

		$id_content = $updated_subpagina->id_content;
		$pagina = $this->input->post('pagina', TRUE);
		$subpagina = $this->input->post('subpagina', TRUE);
		$modelo = $this->input->post('modelo', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$img = $imagen == '' ? '' : 'uploads/subpagina/'.$imagen;
		$leyenda = $this->input->post('leyenda', TRUE);
		$id_img = $this->input->post('id_img', TRUE);
		$new_leyenda = $this->input->post('new_leyenda', TRUE);	
		$contenido = $this->input->post('contenido', FALSE);
		$current_contenido = $this->Content_model->get_contenido($id_content);
		$last_id = NULL;		

		if ($modelo == '0') {
			$contenido_data = array(
				'html' => $contenido
			);
			if ($img) {
				$contenido_data['imagen'] = $img;
			} elseif ($updated_subpagina->imagen && $delete_subpagina) {
				$contenido_data['imagen'] = '';
			}
			echo $updated_subpagina->imagen."--".$delete_subpagina."<br />";
	     	if ($updated_subpagina->imagen && $delete_subpagina) {
	     		if(file_exists($updated_imagen)) {
	     			unlink($updated_imagen);
	     		}
	     	}

	     	if (sizeof($current_contenido) < 1) {
	     		$this->Content_model->insertar_contenido($contenido_data);
	     		$last_id = $this->Content_model->get_last_post();
	     	} else {
	     		$this->Content_model->update_contenido($id_content, $contenido_data);	
	     		$last_id = $id_content;
	     	}
			
			$initial_orden = sizeof($current_galeria);
			foreach ($galeria_array as $i => $img_galeria) {
				$galeria_data = array(
					'id_subpagina' => $id,
					'imagen' => $img_galeria,
					'leyenda' => $new_leyenda[$i],
					'orden' => $initial_orden+$i+1
				);
				$this->Galeria_subpagina_model->insert_imagen($galeria_data);
			}

			if ($id_img) {
				foreach ($id_img as $i => $galeria_img) {
					$galeria_data = array(
						'id_img' =>	$galeria_img,
						'leyenda' => $leyenda[$i],
						'orden' => $i+1
					);
						$this->Galeria_subpagina_model->update_imagen(
						$galeria_img,
						$galeria_data
					);
				}	
			}	

		} else {
			$this->Content_model->delete_contenido($id_content);
		}
		
		$subpagina_data = array(
			'subpagina' => $subpagina,
			'id_pagina' => $pagina,
			'id_modelo' => $modelo,
			'id_content' => $last_id
		);
		$this->Subpaginas_model->update_subpagina($id, $subpagina_data);

		redirect('admin_pagina');
	}

	public function toggle_pagina() {
      $this->load->model("Paginas_model");
		$id = $this->uri->segment(3);
		$paginas = $this->Paginas_model->get_valid_paginas()->result_array();
		$toggle = $this->input->get('toggle', TRUE);

		$pagina_data = array(
			'status' => $toggle,
			'orden' => $toggle ? sizeof($paginas)+1 : 0
		);
		
		$this->Paginas_model->update_pagina($id, $pagina_data);
		redirect('admin_pagina');	
	}

	public function toggle_subpagina() {
      $this->load->model("Subpaginas_model");
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$subpagina_data = array(
			'status' => $toggle
		);
		$subpagina = $this->Subpaginas_model->get_subpagina($id)->result_array()[0];
		$id_subpagina = $subpagina['id_pagina'];

		$this->Subpaginas_model->update_subpagina($id, $subpagina_data);
		$this->session->set_flashdata('open_subpaginas', $id_subpagina);
		redirect('admin_pagina');	
	}

	public function subir_pagina() {
      $this->load->model("Paginas_model");
      $id = $this->uri->segment(3);
      $paginas = $this->Paginas_model->get_valid_paginas()->result_array();
		$selected_pagina = $this->Paginas_model->get_pagina($id)->result_array()[0];
		$orden_inicial = $selected_pagina['orden'];
		if ($orden_inicial == 1) {
			redirect('admin_pagina');				
		} else {
			foreach ($paginas as $pagina) {
				echo $pagina['titulo'].": ".$pagina['orden']."==".$orden_inicial."<br/>";
				if($pagina['orden'] == $orden_inicial-1) {
					$pagina_down_data['orden'] = $pagina['orden']+1;
					$this->Paginas_model->update_pagina($pagina['id_pagina'], $pagina_down_data);
				}
				if($pagina['orden'] == $orden_inicial) {
					$pagina_up_data['orden'] = $pagina['orden']-1;
					$this->Paginas_model->update_pagina($pagina['id_pagina'], $pagina_up_data);
				}
			}
		redirect('admin_pagina');
		}
	}

	public function bajar_pagina() {
      $this->load->model("Paginas_model");
      $id = $this->uri->segment(3);
      $paginas = $this->Paginas_model->get_valid_paginas()->result_array();
		$selected_pagina = $this->Paginas_model->get_pagina($id)->result_array()[0];
		$orden_inicial = $selected_pagina['orden'];
      
      if ($orden_inicial == sizeof($paginas)) {
			redirect('admin_pagina');				
		}

		foreach ($paginas as $pagina) {
			if($pagina['orden'] == $orden_inicial) {
				$pagina_up_data['orden'] = $pagina['orden']+1;
				$this->Paginas_model->update_pagina($pagina['id_pagina'], $pagina_up_data);
			}
			if($pagina['orden'] == $orden_inicial+1) {
				$pagina_down_data['orden'] = $pagina['orden']-1;
				$this->Paginas_model->update_pagina($pagina['id_pagina'], $pagina_down_data);
			}
		}
		redirect('admin_pagina');	
	}

}
