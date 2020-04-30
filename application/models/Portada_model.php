<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portada_model extends CI_Model {
  function get_all_portadas()  {
    $result = $this->db->get('imagen_portada');
    return $result;     
  }

  function get_valid_portadas()  {
    $this->db->select('*');
    $this->db->from('imagen_portada');
    $this->db->where('imagen_portada.status', 1);
    $this->db->order_by('imagen_portada.orden', 'asc');
    $query = $this->db->get(); 
    return $query;    
  }

  function get_other_portadas()  {
    $this->db->select('*');
    $this->db->from('imagen_portada');
    $this->db->where('imagen_portada.status', 0);
    $this->db->order_by('imagen_portada.orden', 'asc');
    $query = $this->db->get(); 
    return $query;    
  }

  function get_last_portada() {
    $this->db->select('*');
    $this->db->from('imagen_portada');
    $this->db->where('status', 1);
    $this->db->order_by('orden', 'desc');
    $this->db->limit(1);
    $query = $this->db->get(); 
    return $query->result_array()[0];
  }

  function get_portada($id) {
    $this->db->where('id_portada',$id);
    $result = $this->db->get('imagen_portada', 1);
    return $result;    
  }

  function insertar_portada($data) {
    $this->db->insert('imagen_portada', $data);
  }

 	function update_portada($id, $data) {
   	$this->db->where('id_portada', $id);
   	$this->db->update('imagen_portada', $data);
  	}

  	function delete_portada($id) {
   	$this->db->delete('imagen_portada', array('id_portada' => $id)); 
  	}

}
?>