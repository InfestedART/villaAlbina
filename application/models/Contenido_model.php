<?php
class Contenido_model extends CI_Model {

	function get_contenido($id) {

	}

 	function insert_contenido($data) {
  		$this->db->insert('html', $data);
  	}

  	function update_contenido($id, $data) {
	    $this->db->where('id_post', $id);
	    $this->db->update('html', $data);
  	}

  	function delete_contenido($id) {
	   	$this->db->delete('html', array('id_post' => $id));
 	}

}
?>