<?php
class Areas_model extends CI_Model {
 	function get_all_areas() {
	    $query = $this->db->get('area'); 
	    return $query; 
  	}

  	function get_area_color($id) {
  		$this->db->select('color_area');
    	$this->db->from('area');
    	$this->db->where('id_area', $id);
        $result = $this->db->get();
    	return $result->result_array()[0]['color_area'];
  	}

}
?>