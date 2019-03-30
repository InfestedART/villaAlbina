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
    $this->db->where('status', 1);
    $this->db->order_by('orden', 'asc');
    $query = $this->db->get(); 
    return $query;    
  }
}
?>