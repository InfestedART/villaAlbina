<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_model extends CI_Model {
  	function get_all_modelos() {
   	 $result = $this->db->get('modelo');
    	return $result;
  }

  function get_subpagina_modelos() {
	$this->db->select('*');
	$this->db->from('modelo');
	$this->db->where('mostrar_subpagina', 1);
	$query = $this->db->get(); 
	return $query;
  }

}
?>