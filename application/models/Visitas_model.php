<?php
class Visitas_model extends CI_Model {
 	function get_ip($ip) {
	    $this->db->select('*');
	    $this->db->from('visitas');
	    $this->db->where('userip', $ip);
	    $query = $this->db->get(); 
	    return $query->result_array();   
 	}

    function insertar_visita($data) {
	    $this->db->insert('visitas', $data);
	 }

	 function update_visita($ip, $data) {
	    $this->db->where('userip', $ip);
	    $this->db->update('visitas', $data);
	 }

	 function get_visitas_count() {
	 	$this->db->select_sum('visita');
		$query = $this->db->get('visitas');
		return $query;
	 }
}
?>