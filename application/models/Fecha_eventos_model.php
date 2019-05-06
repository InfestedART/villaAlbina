<?php
class Fecha_eventos_model extends CI_Model {
	function insert_fechas($data) {
  		$this->db->insert('fecha_evento', $data);
	}

	function delete_fechas($id) {
	   $this->db->delete('fecha_evento', array('id_post' => $id));
 	}
}
?>