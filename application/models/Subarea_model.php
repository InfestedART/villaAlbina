<?php
class Subarea_model extends CI_Model {
 	function get_all_subareas() {
      $this->db->order_by('id_area');
	   $query = $this->db->get('subarea'); 
	   return $query; 
  	}

 	function get_subarea($id) {
    	$this->db->where('subarea.id_subarea',$id);
      $this->db->join('contenido', 'contenido.id_content = subarea.id_content', 'left');  
    	$result = $this->db->get('subarea', 1);
    	return $result;    
  	}

    function get_area_subareas($id_area) {
      $this->db->where('subarea.id_area', $id_area);
      $this->db->where('subarea.status', 1);
      $this->db->join('contenido', 'contenido.id_content = subarea.id_content', 'left');  
      $result = $this->db->get('subarea');
      return $result;     
    }

  function get_subarea_id($enlace, $area_id) {
    $this->db->where('subarea.id_area', $area_id);
    $this->db->where('subarea.enlace',$enlace);
    $this->db->limit(1);
    $result = $this->db->get('subarea', 1);
    return sizeof($result->result_array()) > 0 ? $result->row()->id_subarea : NULL;
  }

  function get_prev_subarea($id, $area_id) {
    $this->db->select('*');
    $this->db->from('subarea');
    $this->db->where('subarea.id_area', $area_id);
    $this->db->where('subarea.status', 1);
    $this->db->where('subarea.id_subarea <', $id);
    $this->db->order_by('subarea.id_subarea', 'desc');
    $this->db->limit(1);
    $query = $this->db->get(); 
    return $query;
  }

  function get_next_subarea($id, $area_id) {
    $this->db->select('*');
    $this->db->from('subarea');
    $this->db->where('subarea.id_area', $area_id);
    $this->db->where('subarea.id_subarea >', $id);
    $this->db->where('subarea.status', 1);
    $this->db->order_by('subarea.id_subarea', 'asc');
    $this->db->limit(1);
    $query = $this->db->get(); 
    return $query;
  }

  function insertar_subarea($data) {
	  $this->db->insert('subarea', $data);
  }

  function update_subarea($id, $data) {
  	$this->db->where('id_subarea', $id);
   	$this->db->update('subarea', $data);
  }

  function get_last_post() {
    $last = $this->db->order_by('id_subarea',"desc")
      ->limit(1)
      ->get('subarea')
      ->row()->id_subarea;
      return $last;
  }

}  	
?>