<?php
class Agenda_model extends CI_Model {
 	function get_active_agenda() {
        $this->db->select('*');
        $this->db->from('agenda');		
        $this->db->where('status', 1);
        $this->db->order_by('id_agenda', 'desc');
        $this->db->limit(1);
        $result = $this->db->get();
        return $result;    
  	}

  	 function get_all_agendas() {
        $this->db->select('*');
        $this->db->from('agenda');		
        $this->db->order_by('id_agenda', 'desc');
        $result = $this->db->get();
        return $result;    
  	}

    function get_agenda($id) {
        $this->db->where('id_agenda',$id);
        $result = $this->db->get('agenda',1);
        return $result;    
  	}

    function insert_agenda($data) {
        $this->db->insert('agenda', $data);
    }

 	function update_agenda($id, $data) {
    	$this->db->where('id_agenda', $id);
    	$this->db->update('agenda', $data);
    }

 	function deactivate_all_agendas() {
    	$this->db->update('agenda', array('status' => 0));
    }

    function delete_agenda($id) {
      $this->db->delete('agenda', array('id_agenda' => $id));     
  	}
}
