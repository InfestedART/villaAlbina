<?php
class Complemento_model extends CI_Model {

	function get_all_posts()  {
	  $result = $this->db->get('complemento');
	  return $result;    
	}

}
?>