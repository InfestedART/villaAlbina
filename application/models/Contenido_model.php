<?php
class Contenido_model extends CI_Model {
 	function insert_contenido($data) {
  		$this->db->insert('html', $data);
  	}

  	function update_contenido($id, $data) {
	    $this->db->where('id_post', $id);
	    $this->db->update('html', $data);
  	}
}
?>