<?php
class Cat_libro_model extends CI_Model {

  function get_all_categorias()  {
    $result = $this->db->get('categoria_libro');
    return $result;    
  }

  function get_categoria($id) {
  	$this->db->where('id_categoriaLibro',$id);
    $result = $this->db->get('categoria_libro',1);
    return $result;    
  }

  function insert_categoria($data) {
	  $this->db->insert('categoria_libro', $data);
  }

  function update_categoria($id, $data) {
    $this->db->where('id_categoriaLibro', $id);
    $this->db->update('categoria_libro', $data);
  }
  
}
?>