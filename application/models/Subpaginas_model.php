<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subpaginas_model extends CI_Model {

  	function get_valid_subpaginas()  {
    	$this->db->select('*');
    	$this->db->from('subpagina');
    	$this->db->join('contenido', 'subpagina.id_content = contenido.id_content');
    	$this->db->where('subpagina.status', 1);
    	$this->db->order_by('subpagina.id_subpagina', 'asc');
    	$query = $this->db->get(); 
    	return $query;    
  	}
}
?>