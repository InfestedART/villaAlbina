<?php
class Noticias_model extends CI_Model {
  function get_all_noticias() {
	$this->db->select('*');
	$this->db->from('noticia');
	$this->db->join('publicacion', 'publicacion.id_post = noticia.id_post');
	$this->db->order_by('noticia.id_post', 'desc');
	$query = $this->db->get(); 
	return $query;
  }

  function get_ultimas_noticias() {
	$this->db->select('*');
	$this->db->from('noticia');
	$this->db->join('publicacion', 'publicacion.id_post = noticia.id_post');
	$this->db->order_by('noticia.id_post', 'desc');
	$this->db->limit(3);
	$query = $this->db->get(); 
	return $query;
  }

  function get_noticia($id) {
	$this->db->select('*');
	$this->db->from('noticia');
	$this->db->where('noticia.id_post', $id);
	$this->db->join('publicacion', 'publicacion.id_post = noticia.id_post');
	$this->db->order_by('noticia.id_post', 'desc');
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
}
?>