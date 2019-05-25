<?php
class Galeria_subarea_model extends CI_Model {
 	function insert_imagen($data) {
  		$this->db->insert('galeria_subarea', $data);
  	}

  	function update_imagen($id, $data) {
	    $this->db->where('id_img', $id);
	    $this->db->update('galeria_subarea', $data);
  	}

  	function delete_imagen($id, $imagen) {
	   	$this->db->delete('galeria_subarea', array(
	   		'id_img' => $id,
	   		'imagen' => $imagen
	   	));
 	}

 	function get_galeria($id) {
 		$this->db->select('*');
		$this->db->from('galeria_subarea');
		$this->db->where('id_subarea', $id);
		$this->db->order_by('orden', 'asc');
		$query = $this->db->get(); 
		return $query;
 	}

}
?>