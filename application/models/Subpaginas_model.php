<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subpaginas_model extends CI_Model {

 	function get_all_subpaginas() {
 		$this->db->select('*');
	    $this->db->from('subpagina');
	    $this->db->join('modelo', 'subpagina.id_modelo = modelo.id_modelo', 'left');
	    // $this->db->join('pagina', 'subpagina.id_pagina = pagina.id_pagina');
	    $this->db->order_by('id_subpagina', 'asc');   
	    $query = $this->db->get(); 
	    return $query;  
  	}

    function get_home_subpaginas()  {
      $this->db->select('*');
      $this->db->from('subpagina');
      $this->db->join('contenido', 'subpagina.id_content = contenido.id_content', 'left');
      $this->db->where('subpagina.status', 1);
      $this->db->order_by('subpagina.id_subpagina', 'asc');
      $query = $this->db->get(); 
      return $query;    
    }

  	function get_valid_subpaginas($id_pagina)  {
    	$this->db->select('*');
    	$this->db->from('subpagina');
    	$this->db->join('contenido', 'subpagina.id_content = contenido.id_content', 'left');
    	$this->db->where('subpagina.status', 1);
      $this->db->where('subpagina.id_pagina', $id_pagina);
    	$this->db->order_by('subpagina.id_subpagina', 'asc');
    	$query = $this->db->get(); 
    	return $query;    
  	}

	function get_last_post() {
		$last = $this->db->order_by('id_subpagina',"desc")
			->limit(1)
			->get('subpagina')
			->row()->id_subpagina;
    	return $last;
	}

  	function get_subpagina($id) {
  		$this->db->select('*');
	    $this->db->from('subpagina');
      	$this->db->where('subpagina.id_subpagina',$id);
      	$this->db->join('contenido', 'subpagina.id_content = contenido.id_content', 'left');
      	$result = $this->db->get();
     	return $result;    
    }

    function get_subpaginas_id($id_pagina) {
      $this->db->select('subpagina.id_subpagina');
      $this->db->from('subpagina');
      $this->db->where('subpagina.id_pagina',$id_pagina);
      $this->db->join('galeria_subpagina', 'subpagina.id_subpagina = galeria_subpagina.id_subpagina');
      $this->db->distinct();
      $result = $this->db->get();
      return $result->result_array();  
    }

    function insertar_subpagina($data) {
     	$this->db->insert('subpagina', $data);
    }

  function update_subpagina($id, $data) {
    	$this->db->where('id_subpagina', $id);
    	$this->db->update('subpagina', $data);
  }
}
?>