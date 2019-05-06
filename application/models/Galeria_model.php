<?php
class Galeria_model extends CI_Model {
 	function insert_imagen($data) {
  		$this->db->insert('galeria', $data);
  	}

  	function update_imagen($id, $data) {
	    $this->db->where('id_img', $id);
	    $this->db->update('galeria', $data);
  	}

  	function delete_imagen($id, $imagen) {
	   	$this->db->delete('galeria', array(
	   		'id_post' => $id,
	   		'imagen' => $imagen
	   	));
 	}

 	function get_galeria($id) {
 		$this->db->select('*');
		$this->db->from('galeria');
		$this->db->where('id_post', $id);
		$query = $this->db->get(); 
		return $query;
 	}

}
?>