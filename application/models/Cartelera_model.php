<?php
class Cartelera_model extends CI_Model {
 	function get_active_cartelera() {
        $this->db->select('*');
        $this->db->from('cartelera');		
        $this->db->where('status', 1);
        $this->db->order_by('id_cartelera', 'desc');
        $this->db->limit(1);
        $result = $this->db->get();
        return $result;    
  	}

  	 function get_all_carteleras() {
        $this->db->select('*');
        $this->db->from('cartelera');		
        $this->db->order_by('id_cartelera', 'desc');
        $result = $this->db->get();
        return $result;    
  	}

    function get_cartelera($id) {
        $this->db->where('id_cartelera',$id);
        $result = $this->db->get('cartelera',1);
        return $result;    
  	}

    function insert_cartelera($data) {
        $this->db->insert('cartelera', $data);
    }

 	function update_cartelera($id, $data) {
    	$this->db->where('id_cartelera', $id);
    	$this->db->update('cartelera', $data);
    }

    function delete_cartelera($id) {
      $this->db->delete('cartelera', array('id_cartelera' => $id));     
  	}
}
