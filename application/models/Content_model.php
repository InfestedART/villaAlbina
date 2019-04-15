<?php
class Content_model extends CI_Model {
 	function insertar_contenido($data) {
  		$this->db->insert('contenido', $data);
  	}

  	function update_contenido($id, $data) {
	    $this->db->where('id_content', $id);
	    $this->db->update('contenido', $data);
  	}

  	function get_last_post() {
		$last = $this->db->order_by('id_content',"desc")
			->limit(1)
			->get('contenido')
			->row()->id_content;
    	return $last;
	}
}
?>