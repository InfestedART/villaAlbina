<?php
class Tipo_model extends CI_Model {

	function get_all_posts()  {
	  $result = $this->db->get('tipo_post');
	  return $result;    
	}

}
?>