<?php
class Archivo_model extends CI_Model {
 	function insert_archivo($data) {
  		$this->db->insert('archivo_adjunto', $data);
  	}

  	function update_imagen($id, $data) {
	    $this->db->where('id_archivo', $id);
	    $this->db->update('archivo_adjunto', $data);
  	}

  	function delete_archivo($id, $archivo) {
	   	$this->db->delete('archivo_adjunto', array(
	   		'id_post' => $id,
	   		'archivo' => $archivo,
	   		)
	   	);
 	}

 	 function get_archivos($id) {
 		$this->db->select('*');
		$this->db->from('archivo_adjunto');
		$this->db->where('id_post', $id);
		$query = $this->db->get(); 
		return $query;
 	}
}
?>