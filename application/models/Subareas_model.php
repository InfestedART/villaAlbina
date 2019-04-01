<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subareas_model extends CI_Model {

  	function get_valid_subareas()  {
    	$this->db->select('*');
    	$this->db->from('subarea');
    	$this->db->join('contenido', 'subarea.id_content = contenido.id_content');
    	$this->db->where('subarea.status', 1);
    	$this->db->order_by('subarea.id_subarea', 'asc');
    	$query = $this->db->get(); 
    	return $query;    
  	}
}
?>