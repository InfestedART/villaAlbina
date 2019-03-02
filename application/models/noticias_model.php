<?php
class Noticias_model extends CI_Model {
  function get_ultimas_noticias() {
	//$this->db->from($this->noticias);
	$this->db->select('*');
	$this->db->from('noticia');
	$this->db->join('publicacion', 'publicacion.id_post = noticia.id_post');
	$this->db->order_by('noticia.id_post', 'desc');

	$query = $this->db->get(); 
	return $query;
  }
}
?>