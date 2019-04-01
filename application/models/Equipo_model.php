<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo_model extends CI_Model {

  	function get_valid_miembros()  {
    	$this->db->select('*');
    	$this->db->from('miembro_equipo');
    	$this->db->join(
    		'categoria_equipo',
    		'miembro_equipo.id_categoria_equipo = categoria_equipo.id_categoria_equipo'
    	);
    	$this->db->where('miembro_equipo.status', 1);
    	$this->db->order_by('miembro_equipo.id_miembro', 'asc');
    	$query = $this->db->get(); 
    	return $query;    
  	}
}
?>