<?php
class Eventos_model extends CI_Model {

	function get_all_eventos() {
		$this->db->select('*');
		$this->db->from('evento');
		$this->db->join('publicacion', 'publicacion.id_post = evento.id_post');
		$this->db->join('html', 'html.id_post = evento.id_post');
	  	$result = $this->db->get();
	  	return $result;    		
	}

	/*
  	function get_all_eventos($search = false, $orderby = false, $direction = 'desc') {
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
  */
}