<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paginas_model extends CI_Model {
  	function get_all_paginas() {
   	 $result = $this->db->get('pagina');
    	return $result;
  }

  	function get_valid_paginas()  {
    	$this->db->select('*');
    	$this->db->from('pagina');
    	$this->db->where('pagina.status', 1);
    	$this->db->join('modelo', 'pagina.id_modelo = modelo.id_modelo');
    	$this->db->order_by('pagina.orden', 'asc');
    	$query = $this->db->get(); 
    	return $query;    
  	}

    function get_page_color($id) {
      $this->db->select('color');
      $this->db->from('pagina');
      $this->db->where('id_pagina', $id);      
      $this->db->limit(1);
      $query = $this->db->get(); 
      return $query->result_array()[0];    
    }
}
?>