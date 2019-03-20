<?php
class Libro_model extends CI_Model {

  function get_all_libros($orderby = false, $direction = 'asc')  {
    if ($orderby) {
      $this->db->order_by($orderby, $direction);  
    }
    $result = $this->db->get('libro');
    return $result;    
  }

  function get_libro($id) {
  	$this->db->where('id_libro',$id);
    $result = $this->db->get('libro',1);
    return $result;    
  }

  function insert_libro($data) {
	  $this->db->insert('libro', $data);
  }

  function delete_libro($id) {
  	$this->db->delete('libro', array('id_libro' => $id)); 
  }

  function update_libro($id, $data) {
    $this->db->where('id_libro', $id);
    $this->db->update('libro', $data);
  }


}
?>