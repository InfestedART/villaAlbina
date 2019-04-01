<?php
class Noticias_model extends CI_Model {
  function get_all_noticias($search = false, $orderby = false, $direction = 'desc') {
	$this->db->select('*');
	$this->db->from('noticia');
	$this->db->join('publicacion', 'publicacion.id_post = noticia.id_post');
	$this->db->join('html', 'html.id_post = noticia.id_post');
	if ($search) {
    	$this->db->like('publicacion.titulo', $search);
      $this->db->or_like('publicacion.resumen', $search);
      $this->db->or_like('noticia.fuente', $search);
      $this->db->or_like('html.contenido', $search);
    }	
	$this->db->order_by(
		$orderby ? $orderby : 'noticia.fecha',
		$direction
	);
	$query = $this->db->get(); 
	return $query;
  }

  function get_valid_noticias($limit, $search = false) {
	$this->db->select('*');
	$this->db->from('noticia');
	$this->db->join('publicacion', 'publicacion.id_post = noticia.id_post');
	$this->db->join('html', 'html.id_post = noticia.id_post');
	$this->db->where('publicacion.status', 1);
	if ($search) {
    	$this->db->like('publicacion.titulo', $search);
      $this->db->or_like('publicacion.resumen', $search);
      $this->db->or_like('noticia.fuente', $search);
      $this->db->or_like('html.contenido', $search);
    }
	$this->db->order_by('noticia.fecha', 'desc');
	$this->db->limit($limit);
	$query = $this->db->get(); 
	return $query;  	
  }

  function get_ultimas_noticias() {
	$this->db->select('*');
	$this->db->from('noticia');
	$this->db->join('publicacion', 'publicacion.id_post = noticia.id_post');
	$this->db->order_by('noticia.fecha', 'desc');
	$this->db->limit(6);
	$query = $this->db->get(); 
	return $query;
  }

  function get_noticia($id) {
	$this->db->select('*');
	$this->db->from('noticia');
	$this->db->where('noticia.id_post', $id);
	$this->db->join('publicacion', 'publicacion.id_post = noticia.id_post');
	$this->db->join('html', 'html.id_post = noticia.id_post');
	$query = $this->db->get(); 
	return $query;
  }

  function insert_noticia($data) {
  	$this->db->insert('noticia', $data);
  }

  function delete_noticia($id) {
  	$this->db->delete('publicacion', array('id_post' => $id)); 
   	$this->db->delete('noticia', array('id_post' => $id));
  }

  function update_noticia($id, $data) {
    $this->db->where('id_post', $id);
    $this->db->update('noticia', $data);
  }
}
?>