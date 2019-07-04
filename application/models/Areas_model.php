<?php
class Areas_model extends CI_Model {
 	function get_all_areas() {
	  $query = $this->db->get('area'); 
	  return $query; 
  }

  function get_valid_areas() {
      $this->db->select('*');
      $this->db->from('area');
      $this->db->join('contenido', 'area.id_content = contenido.id_content', 'left');
      $this->db->where('area.status', 1);
      $this->db->order_by('area.id_area', 'asc');
      $query = $this->db->get(); 
      return $query;    
    }
  function get_area_color($id) {
  	$this->db->select('color_area');
    $this->db->from('area');
    $this->db->where('id_area', $id);
    $result = $this->db->get();
    return $result->result_array()[0]['color_area'];
  }

  function get_area_id($enlace) {
    $this->db->where('area.enlace',$enlace);
    $this->db->limit(1);
    $result = $this->db->get('area', 1);
    return sizeof($result->result_array()) > 0 ? $result->row()->id_area : NULL;
  }

  function get_first_id() {
    $this->db->limit(1);
    $this->db->order_by('id_area', 'asc');
    $result = $this->db->get('area', 1);
    return $result->row()->id_area;
  }

  function get_area($id) {
    $this->db->where('area.id_area',$id);
    $this->db->join('contenido', 'area.id_content = contenido.id_content', 'left');  
    $result = $this->db->get('area', 1);
    return $result;    
  }

  function get_prev_area($id) {
    $this->db->select('*');
    $this->db->from('area');
    $this->db->where('area.id_area <', $id);
    $this->db->where('area.status', 1);
    $this->db->order_by('area.id_area', 'desc');
    $this->db->limit(1);
    $query = $this->db->get(); 
    return $query;
  }

  function get_next_area($id) {
    $this->db->select('*');
    $this->db->from('area');
    $this->db->where('area.id_area >', $id);
    $this->db->where('area.status', 1);
    $this->db->order_by('area.id_area', 'asc');
    $this->db->limit(1);
    $query = $this->db->get(); 
    return $query;
  }

  function insertar_area($data) {
    $this->db->insert('area', $data);
  }

  function update_area($id, $data) {
    $this->db->where('id_area', $id);
    $this->db->update('area', $data);
    }

  function get_last_post() {
    $last = $this->db->order_by('id_area',"desc")
      ->limit(1)
      ->get('area')
      ->row()->id_area;
      return $last;
  }

}
?>