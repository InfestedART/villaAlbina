<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_model extends CI_Model {
  	function get_all_modelos() {
   	 $result = $this->db->get('modelo');
    	return $result;
  }

}
?>