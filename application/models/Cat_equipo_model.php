<?php
class Cat_equipo_model extends CI_Model {

  	function get_all_categorias()  {
    	$result = $this->db->get('categoria_equipo');
    	return $result;    
  	}

   function get_categoria($id) {
  		$this->db->where('id_categoria_equipo',$id);
    	$result = $this->db->get('categoria_equipo',1);
    	return $result;    
  	}

  	function insert_categoria($data) {
	  	$this->db->insert('categoria_equipo', $data);
  	}

  	function update_categoria($id, $data) {
    	$this->db->where('id_categoria_equipo', $id);
    	$this->db->update('categoria_equipo', $data);
  	}
}
