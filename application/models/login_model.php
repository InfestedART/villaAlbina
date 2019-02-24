<?php
class Login_model extends CI_Model {
  function get_usuario($username,$password)  {    
    $this->db->where('username',$username);
    $this->db->where('password',$password);
     $result = $this->db->get('usuarios',1);
    return $result;    
  }
}
?>