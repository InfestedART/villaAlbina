<?php
class Publicacion_model extends CI_Model {
	function get_last_post() {
		$last = $this->db->order_by('id_post',"desc")
			->limit(1)
			->get('publicacion')
			->row()->id_post;
    	return $last;
	}

 	function insert_publicacion($data) {
  		$this->db->insert('publicacion', $data);
  	}

  	function update_publicacion($id, $data) {
    $this->db->where('id_post', $id);
    $this->db->update('publicacion', $data);
  	}
}
?>