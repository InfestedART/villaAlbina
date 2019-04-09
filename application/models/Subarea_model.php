<?php
class Subarea_model extends CI_Model {
 	function get_all_subareas() {
      $this->db->order_by('id_area');
	   $query = $this->db->get('subarea'); 
	   return $query; 
  	}

 	function get_subarea($id) {
    	$this->db->where('id_subarea',$id);
    	$result = $this->db->get('subarea', 1);
    	return $result;    
  	}

  	function insertar_subarea($data) {
	    $this->db->insert('subarea', $data);
  	}

  	function update_subarea($id, $data) {
    	$this->db->where('id_subarea', $id);
    	$this->db->update('subarea', $data);
    }
}  	
?>