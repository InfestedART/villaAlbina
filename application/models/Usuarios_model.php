<?php
class Usuarios_model extends CI_Model {
  function get_all_usuarios()  {
    $result = $this->db->get('usuarios');
    return $result;    
  }

  function get_usuario($username) {
  	$this->db->where('username',$username);
    $result = $this->db->get('usuarios',1);
    return $result;    
  }

  function insert_usuario($data) {
	  $this->db->insert('usuarios', $data);
  }
}
?>