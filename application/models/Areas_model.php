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

  function get_area($id) {
    $this->db->where('id_area',$id);
    $result = $this->db->get('area', 1);
    return $result;    
  }

  function insertar_area($data) {
    $this->db->insert('area', $data);
  }

  function update_area($id, $data) {
    $this->db->where('id_area', $id);
    $this->db->update('area', $data);
    }
}
?>