<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paginas_model extends CI_Model {
  	function get_all_paginas() {
      $this->db->select('*');
      $this->db->from('pagina');
      $this->db->join('modelo', 'pagina.id_modelo = modelo.id_modelo', 'left');
      $this->db->order_by('pagina.status', 'desc');
      $this->db->order_by('pagina.orden', 'asc');      
      $query = $this->db->get(); 
      return $query;  
    }

    function get_parent_paginas() {
      $this->db->select('*');
      $this->db->from('pagina');
      $this->db->where('pagina.status', 1);
      $this->db->where('pagina.id_modelo', 3);
      $this->db->join('modelo', 'pagina.id_modelo = modelo.id_modelo');
      $this->db->order_by('pagina.orden', 'asc');
      $query = $this->db->get(); 
      return $query;         
    }

  	function get_valid_paginas()  {
    	$this->db->select('*');
    	$this->db->from('pagina');
    	$this->db->where('pagina.status', 1);
    	$this->db->join('modelo', 'pagina.id_modelo = modelo.id_modelo', 'left');
    	$this->db->order_by('pagina.orden', 'asc');
    	$query = $this->db->get(); 
    	return $query;    
  	}

    function get_navbar_paginas()  {
      $this->db->select('*');
      $this->db->from('pagina');
      $this->db->where('pagina.status', 1);
      $this->db->where('pagina.mostrar_navbar', 1);
      // $this->db->join('modelo', 'pagina.id_modelo = modelo.id_modelo', 'left');
      $this->db->order_by('pagina.orden', 'asc');
      $query = $this->db->get(); 
      return $query;    
    }

    function get_home_paginas()  {
      $this->db->select('*');
      $this->db->from('pagina');
      $this->db->where('pagina.status', 1);
      $this->db->where('pagina.mostrar_home', 1);
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

    function get_pagina_order($id) {
      $this->db->select('orden');
      $this->db->from('pagina');
      $this->db->where('id_pagina', $id);      
      $this->db->limit(1);
      $query = $this->db->get(); 
      return $query->result_array()[0]['orden'];
    }

    function update_orden($position) {
      $this->db->set('orden', 'orden - 1', FALSE);
      $this->db->where('orden >', $position);
      $this->db->update('pagina'); 
    }

    function get_pagina($id) {
      $this->db->where('id_pagina',$id);
      $result = $this->db->get('pagina', 1);
      return $result;    
    }

    function insertar_pagina($data) {
      $this->db->insert('pagina', $data);
    }

  function update_pagina($id, $data) {
    $this->db->where('id_pagina', $id);
    $this->db->update('pagina', $data);
  }
}
?>