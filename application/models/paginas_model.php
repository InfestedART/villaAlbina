<?php
class Paginas_model extends CI_Model {
  function get_all_paginas() {
    $result = $this->db->get('pagina');
    // return $result->result_array();
    return $result;
  }
}
?>