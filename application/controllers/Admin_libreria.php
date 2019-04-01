<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_libreria extends MY_Controller {
	public function index() {
		$this->load->model("Cat_libro_model");
		$this->load->model("Libro_model");

		$data['header'] = $this->load->view('templates/admin_header', NULL, true);
		$data['sidebar'] = $this->load->view('templates/admin_sidebar', NULL, true);
		$data['footer'] = $this->load->view('templates/admin_footer', NULL, true);

		$orderby = $this->input->get('orderby', TRUE);
		$direction = $this->input->get('direction', TRUE); 
		$search = $this->input->post('buscar_libreria', TRUE);
		$data['search'] = $search;
		$data['libros'] = $this->Libro_model->get_all_libros(
			$search, $orderby, $direction
		);
		$data['categorias'] = $this->Cat_libro_model->get_all_categorias();

		$this->load->view('admin_libreria', $data);
	}	

	public function nuevo_libro() {
		$this->load->model("Cat_libro_model");
		$data['categorias'] = $this->Cat_libro_model->get_all_categorias();
		$this->load->view('nuevo_libro', $data);
	}

	public function editar_libro() {
		$this->load->model("Cat_libro_model");
		$this->load->model("Libro_model");
		$id = $this->uri->segment(3);
		$data['libro'] = $this->Libro_model->get_libro($id);
		$data['categorias'] = $this->Cat_libro_model->get_all_categorias();
		$this->load->view('editar_libro', $data);
	}

	public function categorias_libro() {
		$this->load->model("Cat_libro_model");
		$id_categoria = $this->uri->segment(3);

      	$data['categorias'] = $this->Cat_libro_model->get_all_categorias();
      	$data['selected_categoria'] = $this->Cat_libro_model->get_categoria($id_categoria);
      	$this->load->view('categorias_libro', $data);
	}

	public function insertar_categoria() {
		$this->load->model('Cat_libro_model');
		$categoria = $this->input->post('categoria', TRUE);
		$cat_data = array('categoria' => $categoria);
		$this->Cat_libro_model->insert_categoria($cat_data);
      	$data['categorias'] = $this->Cat_libro_model->get_all_categorias();
      	$this->load->view('categorias_libro', $data);
	}

	public function editar_categoria() {
		$this->load->model('Cat_libro_model');
		$categoria = $this->input->post('edit_categoria', TRUE);
		$id_categoria = $this->input->post('edit_id_categoria', TRUE);		
		$cat_data = array('categoria' => $categoria);
		$this->Cat_libro_model->update_categoria($id_categoria, $cat_data);
      	$data['categorias'] = $this->Cat_libro_model->get_all_categorias();
      	$data['selected_categoria'] = NULL;
      	$this->load->view('categorias_libro', $data);
	}

	public function delete_libro() {
		$this->load->model("Libro_model");
		$this->load->model("Cat_libro_model");
		$id = $this->uri->segment(3);
		$deleted_libro = $this->Libro_model->get_libro($id)->result_object()[0];
		$deleted_portada = realpath('assets/'.$deleted_libro->portada);
		if ($deleted_portada) {
			unlink($deleted_portada);	
		}		
		$this->Libro_model->delete_libro($id);
		$data['libros'] = $this->Libro_model->get_all_libros();
		$data['categorias'] = $this->Cat_libro_model->get_all_categorias();		
		$data['search'] = '';
     	$this->load->view('admin_libreria', $data);
	}

	public function insertar_libro() {
		$config['upload_path'] = './assets/uploads/libros/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['max_size'] = 0;
	    $config['max_width'] = 0;
	    $config['max_height'] = 0;

		$this->load->model('Libro_model');
		$this->load->model("Publicacion_model");
		$this->load->model("Cat_libro_model");
	    $this->load->library('upload', $config);

		if (!$this->upload->do_upload('portada')) {
			if ($_FILES['portada']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$data = array('error' => $error);	
				$this->load->view('admin_libreria', $data);
			}
		}
	     $data = array(
	     	'upload_data' => $this->upload->data(),
	       	'msg' => 'libro agregado exitosamente'
	     );

	    $titulo = $this->input->post('titulo', TRUE);
		$categoria = $this->input->post('categoria', TRUE);
		$autor = $this->input->post('autor', TRUE);
		$precio = $this->input->post('precio', TRUE);
		$descripcion = $this->input->post('descripcion', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['portada']['name']);
		$portada = $imagen == '' ? '' : 'uploads/libros/'.$imagen;

		$post_data = array(
			'titulo' => $titulo,
			'imagen' => $portada,
			'tipo' => 'libro'
		);
		$this->Publicacion_model->insert_publicacion($post_data);
		$last_id = $this->Publicacion_model->get_last_post();

		$libro_data = array(
			'id_post' => $last_id,
			'id_categoriaLibro' => $categoria,
			'autor' => $autor,
			'precio' => $precio,
			'descripcion' => $descripcion,
		);
		$this->Libro_model->insert_libro($libro_data);

      	$data['libros'] = $this->Libro_model->get_all_libros();
      	$data['categorias'] = $this->Cat_libro_model->get_all_categorias();
      	$data['search'] = '';
      	$this->load->view('admin_libreria', $data);
	}

	public function update_libro() {
		$this->load->model('Libro_model');
		$this->load->model("Publicacion_model");
		$this->load->model("Cat_libro_model");
		$id = $this->uri->segment(3);

		$config['upload_path'] = './assets/uploads/libros/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['max_size'] = 0;
	    $config['max_width'] = 0;
	    $config['max_height'] = 0;
	    $this->load->library('upload', $config);
		if (!$this->upload->do_upload('portada')) {
			if ($_FILES['portada']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$data = array('error' => $error);	
				$this->load->view('admin_libreria', $data);
			}
		}		
	    $data = array(
	     	'upload_data' => $this->upload->data(),
	       	'msg' => 'noticia agregada exitosamente'
	    );

		$updated_libro = $this->Libro_model->get_libro($id)->result_object()[0];
		$updated_portada = realpath('assets/'.$updated_libro->imagen);
		$delete_imagen_libro = boolval($this->input->post('delete_imagen_libro', TRUE));

	    $titulo = $this->input->post('titulo', TRUE);
		$categoria = $this->input->post('categoria', TRUE);
		$autor = $this->input->post('autor', TRUE);
		$precio = $this->input->post('precio', TRUE);
		$descripcion = $this->input->post('descripcion', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['portada']['name']);
		$portada = $imagen == '' ? '' : 'uploads/libros/'.$imagen;

		$post_data = array(
			'titulo' => $titulo,
			'tipo' => 'libro'
		);
		if ($portada) {
			$post_data['imagen'] = $portada;
		} elseif ($updated_libro->imagen && $delete_imagen_libro) {
			$post_data['imagen'] = '';
		}

		$libro_data = array(
			'id_categoriaLibro' => $categoria,
			'autor' => $autor,
			'precio' => $precio,
			'descripcion' => $descripcion,
		);

     	if ($updated_libro->imagen && $delete_imagen_libro) {
     		unlink($updated_portada);
     	}
		$this->Publicacion_model->update_publicacion($id, $post_data);
		$this->Libro_model->update_libro($id, $libro_data);
      	$data['libros'] = $this->Libro_model->get_all_libros();
      	$data['categorias'] = $this->Cat_libro_model->get_all_categorias();
      	$data['search'] = '';
     	$this->load->view('admin_libreria', $data);
	}

	public function toggle_libro() {
		$this->load->model('Libro_model');
		$this->load->model("Cat_libro_model");
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$libro_data = array(
			'status' => $toggle
		);
		$this->Libro_model->update_libro($id, $libro_data);
      	$data['libros'] = $this->Libro_model->get_all_libros();
      	$data['categorias'] = $this->Cat_libro_model->get_all_categorias();
      	$data['search'] = '';
     	$this->load->view('admin_libreria', $data);
	}

}
