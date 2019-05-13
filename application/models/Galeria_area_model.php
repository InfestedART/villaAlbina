<?php
class Galeria_area_model extends CI_Model {
 	function insert_imagen($data) {
  		$this->db->insert('galeria_area', $data);
  	}

  	function update_imagen($id, $data) {
	    $this->db->where('id_img', $id);
	    $this->db->update('galeria_area', $data);
  	}

  	function delete_imagen($id, $imagen) {
	   	$this->db->delete('galeria_area', array(
	   		'id_post' => $id,
	   		'imagen' => $imagen
	   	));
 	}

 	function get_galeria($id) {
 		$this->db->select('*');
		$this->db->from('galeria_area');
		$this->db->where('id_area', $id);
		$query = $this->db->get(); 
		return $query;
 	}

}
?>