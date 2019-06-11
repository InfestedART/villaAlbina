<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_libro extends Admin_Controller {
	public function index() {
		$this->load->model("Cat_libro_model");
		$this->load->model("Libro_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this
			->Visitas_model
			->get_visitas_count()
			->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['header'] = $this->load->view('templates/admin_header', NULL, true);
		$data['footer'] = $this->load->view('templates/admin_footer', NULL, true);
		$step = $this->input->get('step', TRUE);
		if (!$step) { $step = 0; }	
		$limit = 12;
		$orderby = $this->input->get('orderby', TRUE);
		$direction = $this->input->get('direction', TRUE); 
		if (!$orderby) {
			$orderby = 'id_post';
			$direction = 'desc';
		}	
		$search_libro = $this->input->post('buscar_libreria', TRUE);
		$search_cat = $this->input->post('buscar_categoria', TRUE);
		$data['step'] = $step;
		$data['limit'] = $limit;
		$data['search'] = $search_libro;
		$data['search_cat'] = $search_cat;
		$data['cant_libros'] = sizeof(
			$this->Libro_model->get_all_libros(
				$search_libro, $search_cat, $orderby, $direction, 0, 144
			)->result_array()
		);
		$data['libros'] = $this->Libro_model->get_all_libros(
			$search_libro, $search_cat, $orderby, $direction, $step, $limit
		);
		$data['categorias'] = $this->Cat_libro_model->get_all_categorias();

		$this->load->view('admin_libro', $data);
	}	

	public function nuevo_libro() {
		$this->load->model("Cat_libro_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$data['categorias'] = $this->Cat_libro_model->get_all_categorias();
		$this->load->view('nuevo_libro', $data);
	}

	public function editar_libro() {
		$this->load->model("Cat_libro_model");
		$this->load->model("Libro_model");
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();
		$id = $this->uri->segment(3);

		$data['libro'] = $this->Libro_model->get_libro($id);
		$data['categorias'] = $this->Cat_libro_model->get_all_categorias();
		$this->load->view('editar_libro', $data);
	}

	public function categorias_libro() {
		$this->load->model("Cat_libro_model");
		$id_categoria = $this->uri->segment(3);
		$this->load->model("Tipo_model");
		$this->load->model("Complemento_model");
		$this->load->model("Visitas_model");
		$data['visitas'] = $this->Visitas_model->get_visitas_count()->result_array()[0]['visita'];
		$data['tipo_posts'] = $this->Tipo_model->get_all_posts()->result_array();
		$data['complementos'] = $this->Complemento_model->get_all_posts()->result_array();

	    $data['categorias'] = $this->Cat_libro_model->get_all_categorias();
	    $data['selected_categoria'] = $this->Cat_libro_model->get_categoria($id_categoria);
	    $this->load->view('categorias_libro', $data);
	}

	public function insertar_categoria() {
		$this->load->model('Cat_libro_model');
		$categoria = $this->input->post('categoria', TRUE);
		$cat_data = array('categoria' => $categoria);
		$this->Cat_libro_model->insert_categoria($cat_data);
    	redirect('admin_libro/categorias_libro');
	}

	public function editar_categoria() {
		$this->load->model('Cat_libro_model');
		$categoria = $this->input->post('edit_categoria', TRUE);
		$id_categoria = $this->input->post('edit_id_categoria', TRUE);		
		$cat_data = array('categoria' => $categoria);
		$this->Cat_libro_model->update_categoria($id_categoria, $cat_data);
    	redirect('admin_libro/categorias_libro');
	}

	public function delete_libro() {
		$this->load->model("Libro_model");
		$this->load->model("Cat_libro_model");
		$id = $this->uri->segment(3);
		$deleted_libro = $this->Libro_model->get_libro($id)->result_object()[0];
		$deleted_portada = realpath('assets/'.$deleted_libro->imagen);
		if ($deleted_portada && file_exists($deleted_portada)) {
			unlink($deleted_portada);	
		}		
		$this->Libro_model->delete_libro($id);
     	redirect('admin_libro');
	}

	public function insertar_libro() {
		$config['upload_path'] = './assets/uploads/libros/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['max_size'] = 0;
	    $config['max_width'] = 0;
	    $config['max_height'] = 0;

		$this->load->model('Libro_model');
		$this->load->model("Publicacion_model");
	    $this->load->library('upload', $config);

		if (!$this->upload->do_upload('portada')) {
			if ($_FILES['portada']['error'] != 4) {				
				$error = $this->upload->display_errors();				
				$data = array('error' => $error);	
				$this->load->view('admin_libro', $data);
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
		$year = $this->input->post('year', TRUE);
		$editorial = $this->input->post('editorial', TRUE);
		$paginas = $this->input->post('paginas', TRUE);
		$descripcion = $this->input->post('descripcion', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['portada']['name']);
		$portada = $imagen == '' ? '' : 'uploads/libros/'.$imagen;

		$post_data = array(
			'titulo' => $titulo,
			'imagen' => $portada,
			'tipo' => 2
		);
		$this->Publicacion_model->insert_publicacion($post_data);
		$last_id = $this->Publicacion_model->get_last_post();

		$libro_data = array(
			'id_post' => $last_id,
			'id_categoriaLibro' => $categoria,
			'autor' => $autor,
			'precio' => $precio,
			'descripcion' => $descripcion,
			'year' => $year,
			'paginas' => $paginas,
			'editorial' => $editorial
		);
		$this->Libro_model->insert_libro($libro_data);
     	redirect('admin_libro');
	}

	public function update_libro() {
		$this->load->model('Libro_model');
		$this->load->model("Publicacion_model");
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
				$this->load->view('admin_libro', $data);
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
		$year = $this->input->post('year', TRUE);
		$editorial = $this->input->post('editorial', TRUE);
		$paginas = $this->input->post('paginas', TRUE);
		$descripcion = $this->input->post('descripcion', TRUE);
		$imagen = str_replace(" ", "_", $_FILES['portada']['name']);
		$portada = $imagen == '' ? '' : 'uploads/libros/'.$imagen;

		$post_data = array(
			'titulo' => $titulo,
			'tipo' => 2
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
			'year' => $year,
			'paginas' => $paginas,
			'editorial' => $editorial
		);

     	if ($updated_libro->imagen && $delete_imagen_libro) {
     		if (file_exists($updated_portada)) {
     		unlink($updated_portada);
     		}
     	}
		$this->Publicacion_model->update_publicacion($id, $post_data);
		$this->Libro_model->update_libro($id, $libro_data);
     	redirect('admin_libro');
	}

	public function toggle_libro() {
		$this->load->model('Publicacion_model');
		$id = $this->uri->segment(3);
		$toggle = $this->input->get('toggle', TRUE);
		$post_data = array(
			'status' => $toggle
		);
		$this->Publicacion_model->update_publicacion($id, $post_data);
      redirect('admin_libro');
	}

}
