<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_evento extends Admin_Controller {
	public function index()	{
		$this->load->model("Eventos_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Areas_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$orderby = $this->input->get('orderby', TRUE);
		$direction = $this->input->get('direction', TRUE);
		$search = $this->input->post('buscar', TRUE);
		$search_cat = $this->input->post('buscar_cat', TRUE);
		$data['search'] = $search;
		$data['search_cat'] = $search_cat;
		$data['areas'] = $this->Areas_model->get_all_areas();
		$data['eventos'] = $this->Eventos_model->get_all_eventos(
			$search, $search_cat, $orderby, $direction
		);
		$this->load->view('admin_evento', $data);
	}

	public function nuevo_evento() {
		$this->load->model("Areas_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Defaults_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['areas'] = $this->Areas_model->get_all_areas();
		$data['api_key'] = $this->Defaults_model->get_value('api_key');
		$this->load->view('nuevo_evento', $data);
	}

	public function editar_evento() {
		$this->load->model("Areas_model");
		$this->load->model("Eventos_model");
		$this->load->model("Galeria_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Defaults_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$id = $this->uri->segment(3);
		$data['evento'] = $this->Eventos_model->get_evento($id);
		$data['fechas'] = $this->Eventos_model->get_fechas($id);
		$data['galeria'] = $this->Galeria_model->get_galeria($id);
		$data['areas'] = $this->Areas_model->get_all_areas();
		$data['api_key'] = $this->Defaults_model->get_value('api_key');
		$this->load->view('editar_evento', $data);
	}

	private function set_img_config() {
		$img_config['upload_path'] = './assets/uploads/eventos/';
      	$img_config['allowed_types'] = 'gif|jpg|png|jpeg';
      	$img_config['max_size'] = 0;
      	$img_config['max_width'] = 0;
      	$img_config['max_height'] = 0;
      	return $img_config;
	}

	public function insertar_evento() {
   	$this->load->model("Eventos_model");
    	$this->load->model("Publicacion_model");
     	$this->load->model("Contenido_model");
     	$this->load->model("Fecha_eventos_model");
     	$this->load->model("Galeria_model");
     	$this->load->library('upload');

   	$files = $_FILES;
   	$img_cant = sizeof($_FILES['galeria']['name']);
   	$galeria_array=[];

      for($i=0; $i<$img_cant; $i++) {           
	      $_FILES['img_upload']['name'] = $files['galeria']['name'][$i];
	      $_FILES['img_upload']['type'] = $files['galeria']['type'][$i];
	      $_FILES['img_upload']['tmp_name'] = $files['galeria']['tmp_name'][$i];
	      $_FILES['img_upload']['error'] = $files['galeria']['error'][$i];
	      $_FILES['img_upload']['size'] = $files['galeria']['size'][$i];  

        	$this->upload->initialize($this->set_img_config());
			if (!$this->upload->do_upload('img_upload')) {						
				if ($_FILES['img_upload']['error'] != 4) {				
					$error = $this->upload->display_errors();				
					$this->session->set_flashdata('error', $error);
			 		redirect('admin_evento');
				}
			}			
			$galeria_array[$i]='uploads/eventos/'
				.str_replace(" ", "_", $_FILES['img_upload']['name']);
	   }

      $this->upload->initialize($this->set_img_config());
		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
				echo $error;
		 		redirect('admin_evento');
			}
		}

		$titulo = $this->input->post('titulo', TRUE);
		$area = $this->input->post('area', TRUE);
		$rango = $this->input->post('rango', TRUE);
		$fecha_ini = $this->input->post('fecha_ini', TRUE);
		$fecha_fin = $this->input->post('fecha_fin', TRUE);
		$fecha = $this->input->post('fecha', TRUE);
		$leyenda = $this->input->post('leyenda', TRUE);
		sort($fecha);
		$organizador = $this->input->post('organizador', TRUE);
		$hora = $this->input->post('hora', TRUE);
		$lugar = $this->input->post('lugar', TRUE);
		$info = $this->input->post('info', TRUE);
		$descripcion = $this->input->post('descripcion', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$imagen_destacada = $imagen == '' ? '' : 'uploads/eventos/'.$imagen;
		$contenido = $this->input->post('contenido', FALSE);

		$post_data = array(
			'titulo' => $titulo,
			'imagen' => $imagen_destacada,
			'tipo' => 4
		);
		$this->Publicacion_model->insert_publicacion($post_data);
		$last_id = $this->Publicacion_model->get_last_post();
		$evento_data = array(
			'id_post' => $last_id,
			'id_area' => $area,
			'organizador' => $organizador,
			'rango' => $rango ? 1 : 0,
			'fecha_ini' =>  $rango ? $fecha_ini : $fecha[0],
			'fecha_fin' =>  $rango ? $fecha_fin : $fecha[sizeof($fecha)-1],
			'hora' => $hora,
			'lugar' => $lugar,
			'descripcion' => $descripcion,
			'info' => $info
		);
		$this->Eventos_model->insert_evento($evento_data);
		if (!$rango) {
			foreach ($fecha as $each_fecha) {
				$fecha_data = array(
				'id_post' => $last_id,
				'fecha' => $each_fecha
			);	
			$this->Fecha_eventos_model->insert_fechas($fecha_data);
			}
		}
		$contenido_data = array(
			'id_post' => $last_id,
			'contenido' => $contenido,
		);
		$this->Contenido_model->insert_contenido($contenido_data);			
		
		foreach ($galeria_array as $i => $img_galeria) {
			$galeria_data = array(
				'id_post' => $last_id,
				'imagen' => $img_galeria,
				'leyenda' => $leyenda[$i]
			);
			$this->Galeria_model->insert_imagen($galeria_data);
		}

		redirect('admin_evento');
	}

	public function update_evento() {
		$this->load->model("Eventos_model");
	   $this->load->model("Publicacion_model");
	   $this->load->model("Contenido_model");
	   $this->load->model("Fecha_eventos_model");
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
  	  			$this->Galeria_model->delete_imagen(
  	  				$current_img['id_img'],
  	  				$current_img['imagen']
  	  			);
  	  			$img_file = realpath('assets/'.$current_img['imagen']);
				if(file_exists($img_file)){
				    unlink($img_file);
				}
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
			 		redirect('admin_evento');
				}
			}
			$galeria_array[$i]='uploads/eventos/'
				.str_replace(" ", "_", $_FILES['img_upload']['name']);
	    }

	   $this->upload->initialize($this->set_img_config());
		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_evento');
			}
		}

		$updated_evento = $this->Eventos_model->get_evento($id)->result_object()[0];
		$updated_imagen = realpath('assets/'.$updated_evento->imagen);
		$delete_imagen = boolval($this->input->post('delete_imagen', TRUE));

   	$titulo = $this->input->post('titulo', TRUE);
   	$area = $this->input->post('area', TRUE);
   	$rango = $this->input->post('rango', TRUE);
		$fecha_ini = $this->input->post('fecha_ini', TRUE);
		$fecha_fin = $this->input->post('fecha_fin', TRUE);
		$fecha = $this->input->post('fecha', TRUE);
		sort($fecha);
		$organizador = $this->input->post('organizador', TRUE);
		$hora = $this->input->post('hora', TRUE);
		$lugar = $this->input->post('lugar', TRUE);
		$info = $this->input->post('info', TRUE);
		$descripcion = $this->input->post('descripcion', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$imagen_destacada = $imagen == '' ? '' : 'uploads/eventos/'.$imagen;
		$leyenda = $this->input->post('leyenda', TRUE);
		$new_leyenda = $this->input->post('new_leyenda', TRUE);
		$id_img = $this->input->post('id_img', TRUE);
		$contenido = $this->input->post('contenido', FALSE);

		$post_data = array(
			'titulo' => $titulo,
			'tipo' => 4
		);
		if ($imagen_destacada) {
			$post_data['imagen'] = $imagen_destacada;
		} elseif ($updated_evento->imagen && $delete_imagen) {
			$post_data['imagen'] = '';
		}

		$evento_data = array(
			'id_area' => $area,
			'organizador' => $organizador,
			'rango' => $rango ? 1 : 0,
			'fecha_ini' =>  $rango ? $fecha_ini : $fecha[0],
			'fecha_fin' =>  $rango ? $fecha_fin : $fecha[sizeof($fecha)-1],
			'hora' => $hora,
			'lugar' => $lugar,
			'descripcion' => $descripcion,
			'info' => $info
		);

		if (!$rango) {
			$this->Fecha_eventos_model->delete_fechas($id);
			foreach ($fecha as $each_fecha) {
				$fecha_data = array(
				'id_post' => $id,
				'fecha' => $each_fecha
			);	
			$this->Fecha_eventos_model->insert_fechas($fecha_data);
			}
		}
		$this->Contenido_model->delete_contenido($id);
		$contenido_data = array(
			'id_post' => $id,
			'contenido' => $contenido
		);
		$this->Contenido_model->insert_contenido($contenido_data);	

     	if ($updated_evento->imagen && $delete_imagen) {
     		if(file_exists($updated_imagen)) {
     			unlink($updated_imagen);
     		}
     	}

		$initial_orden = sizeof($current_galeria);
		foreach ($galeria_array as $i => $img_galeria) {
			$galeria_data = array(
				'id_post' => $id,
				'imagen' => $img_galeria,
				'leyenda' => $new_leyenda[$i],
				'orden' => $initial_orden+$i+1
			);
			$this->Galeria_model->insert_imagen($galeria_data);
		}
		if ($id_img) {
			foreach ($id_img as $i => $galeria_img) {
				$galeria_data = array(
					'id_img' =>	$galeria_img,
					'leyenda' => $leyenda[$i],
					'orden' => $i+1
				);
				$this->Galeria_model->update_imagen(
					$galeria_img,
					$galeria_data
				);
			}	
		}		

		$this->Publicacion_model->update_publicacion($id, $post_data);
		$this->Eventos_model->update_evento($id, $evento_data);
		redirect('admin_evento');
	}

	public function toggle_evento() {
      $this->load->model("Publicacion_model");
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$post_data = array(
			'status' => $toggle
		);
		$this->Publicacion_model->update_publicacion($id, $post_data);
		redirect('admin_evento');	
	}

	public function delete_evento() {
		$this->load->model("Eventos_model");
		$this->load->model("Galeria_model");
		$id = $this->uri->segment(3);
		$deleted_evento = $this->Eventos_model->get_evento($id)->result_object()[0];
		$deleted_imagen = realpath('assets/'.$deleted_evento->imagen);
		if ($deleted_imagen && file_exists($deleted_imagen)) {
			unlink($deleted_imagen);
		}
		$current_galeria = $this->Galeria_model->get_galeria($id)->result_array();
  	  	foreach ($current_galeria as $index => $current_img) {
  	  		$deleted_img = realpath('assets/'.$current_img['imagen']);
			if ($deleted_img && file_exists($deleted_img)) {
				unlink($deleted_img);
			}		
  	  	}
		$this->Eventos_model->delete_evento($id);
		redirect('admin_evento');
	}

}
