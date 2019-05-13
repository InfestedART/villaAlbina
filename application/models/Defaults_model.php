<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Defaults_model extends CI_Model {
  	function get_value($property) {
      $this->db->select('value');
      $this->db->from('defaults');
      $this->db->where('property', $property);
      $this->db->limit(1);
      $query = $this->db->get(); 
      return $query->result_array()[0]['value'];
  }
}
?>