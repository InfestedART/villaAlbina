<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_convocatoria extends CI_Controller {
	public function index()	{
		$this->load->model("Convocatorias_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$orderby = $this->input->get('orderby', TRUE);
		$direction = $this->input->get('direction', TRUE);
		$search = $this->input->post('buscar_convocatoria', TRUE);
		$data['search'] = $search;
		$data['convocatorias'] = $this->Convocatorias_model->get_all_convocatorias(
			$search, $orderby, $direction
		);
		$this->load->view('admin_convocatoria', $data);
	}

	public function nueva_convocatoria() {
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$this->load->view('nueva_convocatoria', $data);
	}

	public function editar_convocatoria() {
		$this->load->model("Convocatorias_model");
		$this->load->model("Galeria_model");
		$this->load->model("Archivo_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

		$id = $this->uri->segment(3);
		$data['convocatoria'] = $this->Convocatorias_model->get_convocatoria($id);
		$data['galeria'] = $this->Galeria_model->get_galeria($id);
		$data['archivos'] = $this->Archivo_model->get_archivos($id);
		$this->load->view('editar_convocatoria', $data);
	}

	private function set_img_config() {
		$img_config['upload_path'] = './assets/uploads/convocatorias/';
      	$img_config['allowed_types'] = 'gif|jpg|png|jpeg';
      	$img_config['max_size'] = 0;
      	$img_config['max_width'] = 0;
      	$img_config['max_height'] = 0;
      	return $img_config;
	}

	private function set_file_config() {
		$config['upload_path'] = './assets/uploads/archivos/';
      	$config['allowed_types'] = 'pdf|txt|xlsx|docx|xls|doc';
      	$config['max_size'] = 0;
      	return $config;
	}

	public function insertar_convocatoria() {
   	$this->load->model("Convocatorias_model");
   	$this->load->model("Publicacion_model");
   	$this->load->model("Contenido_model");
   	$this->load->model("Galeria_model");
   	$this->load->model("Archivo_model");
   	$this->load->library('upload');

   	$files = $_FILES;
   	$img_cant = sizeof($_FILES['galeria']['name']);
   	$file_cant = sizeof($_FILES['file']['name']);
   	$galeria_array=[];
   	$file_array=[];
   	$file_size=[];

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
			 		redirect('admin_convocatoria');
				}
			}			
			$galeria_array[$i]='uploads/convocatorias/'
				.str_replace(" ", "_", $_FILES['img_upload']['name']);
	    }
      for($i=0; $i<$file_cant; $i++) {           
	      $_FILES['file_upload']['name']= $files['file']['name'][$i];
	      $_FILES['file_upload']['type']= $files['file']['type'][$i];
	      $_FILES['file_upload']['tmp_name']= $files['file']['tmp_name'][$i];
	      $_FILES['file_upload']['error']= $files['file']['error'][$i];
	      $_FILES['file_upload']['size']= $files['file']['size'][$i];  

	      $this->upload->initialize($this->set_file_config());
			if (!$this->upload->do_upload('file_upload')) {						
				if ($_FILES['file_upload']['error'] != 4) {				
					$error = $this->upload->display_errors();				
					$this->session->set_flashdata('error', $error);
			 		redirect('admin_convocatoria');
				}
			}
			$file_array[$i]='uploads/archivos/'
				.str_replace(" ", "_", $_FILES['file_upload']['name']);
			$file_size[$i]=$_FILES['file_upload']['size'];
	   }
	   $this->upload->initialize($this->set_img_config());
		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_convocatoria');
			}
		}

   	$titulo = $this->input->post('titulo', TRUE);
		$fecha_limite = $this->input->post('fecha_limite', TRUE);
		$descripcion = $this->input->post('descripcion', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$imagen_destacada = $imagen == '' ? '' : 'uploads/convocatorias/'.$imagen;
		$leyenda = $this->input->post('leyenda', TRUE);
		$contenido = $this->input->post('contenido', TRUE);
   
		$post_data = array(
			'titulo' => $titulo,
			'imagen' => $imagen_destacada,
			'tipo' => 5
		);
		$this->Publicacion_model->insert_publicacion($post_data);
		$last_id = $this->Publicacion_model->get_last_post();

		$convocatoria_data = array(
			'id_post' => $last_id,
			'fecha_limite' =>  $fecha_limite,
			'descripcion' => $descripcion,
		);
		$this->Convocatorias_model->insert_convocatoria($convocatoria_data);

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
		foreach ($file_array as $index => $adjunto) {
			$archivo_data = array(
				'id_post' => $last_id,
				'archivo' => $adjunto,
				'size' => $file_size[$index]
			);	
			$this->Archivo_model->insert_archivo($archivo_data);
		}
		
		redirect('admin_convocatoria');
	}

	public function update_convocatoria() {
		$this->load->model("Convocatorias_model");
	   $this->load->model("Publicacion_model");
	   $this->load->model("Contenido_model");
	   $this->load->model("Galeria_model");
   	$this->load->model("Archivo_model");
   	$this->load->library('upload');
  	  	$id = $this->uri->segment(3);

   	$files = $_FILES;   	
   	$img_cant = array_key_exists("galeria", $_FILES) ? sizeof($_FILES['galeria']['name']) : 0;
   	$file_cant = array_key_exists("file", $_FILES) ? sizeof($_FILES['file']['name']) : 0;
   	$delete_img = $this->input->post('delete_img', TRUE);
   	$delete_file = $this->input->post('delete_file', TRUE);
   	$galeria_array=[];
   	$file_array=[];
   	$file_size=[];

   	// delete selected img/files
  	  	$current_galeria = $this->Galeria_model->get_galeria($id)->result_array();
  	  	foreach ($current_galeria as $index => $current_img) {
  	  		if ($delete_img[$index]) {
  	  			$this->Galeria_model->delete_imagen($id, $current_img['imagen']);
  	  			unlink(realpath('assets/'.$current_img['imagen']));
  	  		}  	  		
  	  	}
  	  	$current_archivos = $this->Archivo_model->get_archivos($id)->result_array();
  	  	foreach ($current_archivos as $index => $current_file) {
  	  		if ($delete_file[$index]) {
  	  			$this->Archivo_model->delete_archivo($id, $current_file['archivo']);
  	  			unlink(realpath('assets/'.$current_file['archivo']));
  	  		}  	  		
  	  	}

	   // upload files/img
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
			 		redirect('admin_convocatoria');
				}
			}			
			$galeria_array[$i]='uploads/convocatorias/'
				.str_replace(" ", "_", $_FILES['img_upload']['name']);
	    }
	   for($i=0; $i<$file_cant; $i++) {           
	      $_FILES['file_upload']['name']= $files['file']['name'][$i];
	      $_FILES['file_upload']['type']= $files['file']['type'][$i];
	      $_FILES['file_upload']['tmp_name']= $files['file']['tmp_name'][$i];
	      $_FILES['file_upload']['error']= $files['file']['error'][$i];
	      $_FILES['file_upload']['size']= $files['file']['size'][$i];  
	      $this->upload->initialize($this->set_file_config());
			if (!$this->upload->do_upload('file_upload')) {						
				if ($_FILES['file_upload']['error'] != 4) {				
					$error = $this->upload->display_errors();				
					$this->session->set_flashdata('error', $error);
			 		redirect('admin_convocatoria');
				}
			}
			$file_array[$i]='uploads/archivos/'
				.str_replace(" ", "_", $_FILES['file_upload']['name']);
			$file_size[$i]=$_FILES['file_upload']['size'];
	   }
	   $this->upload->initialize($this->set_img_config());
		if (!$this->upload->do_upload('imagen')) {						
			if ($_FILES['imagen']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$this->session->set_flashdata('error', $error);
		 		redirect('admin_evento');
			}
		}
		$updated_convo = $this->Convocatorias_model->get_convocatoria($id)->result_object()[0];
		$updated_imagen = realpath('assets/'.$updated_convo->imagen);
		$delete_imagen = boolval($this->input->post('delete_imagen', TRUE));

     	if ($updated_convo->imagen && $delete_imagen) {
     		unlink($updated_imagen);
     	}

		//save data to database
   	$titulo = $this->input->post('titulo', TRUE);
		$fecha_limite = $this->input->post('fecha_limite', TRUE);
		$descripcion = $this->input->post('descripcion', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['imagen']['name']);
		$imagen_destacada = $imagen == '' ? '' : 'uploads/convocatorias/'.$imagen;
		$leyenda = $this->input->post('leyenda', TRUE);
		$contenido = $this->input->post('contenido', TRUE);
   
   	echo "<br />";
		$post_data = array(
			'titulo' => $titulo,
			'tipo' => 5
		);
		if ($imagen_destacada) {
			$post_data['imagen'] = $imagen_destacada;
		} elseif ($updated_convo->imagen && $delete_imagen) {
			$post_data['imagen'] = '';
		}		
		$this->Publicacion_model->update_publicacion($id, $post_data);

		$convocatoria_data = array(
			'fecha_limite' =>  $fecha_limite,
			'descripcion' => $descripcion,
		);
		$this->Convocatorias_model->update_convocatoria($id, $convocatoria_data);

		$contenido_data = array(
			'contenido' => $contenido,
		);
		$this->Contenido_model->update_contenido($id, $contenido_data);	

		foreach ($galeria_array as $i => $img_galeria) {
			$galeria_data = array(
				'id_post' => $id,
				'imagen' => $img_galeria,
				'leyenda' => $leyenda[$i]
			);	
			$this->Galeria_model->insert_imagen($galeria_data);
		}

		foreach ($file_array as $index => $adjunto) {
			$archivo_data = array(
				'id_post' => $id,
				'archivo' => $adjunto,
				'size' => $file_size[$index]
			);	
			$this->Archivo_model->insert_archivo($archivo_data);
		}

		redirect('admin_convocatoria');
	}

	public function toggle_convocatoria() {
      $this->load->model("Publicacion_model");
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$post_data = array(
			'status' => $toggle
		);
		$this->Publicacion_model->update_publicacion($id, $post_data);
		redirect('admin_convocatoria');	
	}

	public function delete_convocatoria() {
		$this->load->model("Convocatorias_model");
		$this->load->model("Galeria_model");
   		$this->load->model("Archivo_model");
		$id = $this->uri->segment(3);
		$deleted_conv = $this->Convocatorias_model->get_convocatoria($id)->result_object()[0];
		$deleted_imagen = realpath('assets/'.$deleted_conv->imagen);
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
  	  	$current_archivos = $this->Archivo_model->get_archivos($id)->result_array();
  	  	foreach ($current_archivos as $index => $current_file) {
  	  		$deleted_file = realpath('assets/'.$current_file['archivo']);
			if ($deleted_file) {
				unlink($deleted_file);
			}	 	  		
  	  	}

		$this->Convocatorias_model->delete_convocatoria($id);
		redirect('admin_convocatoria');
	}

}
