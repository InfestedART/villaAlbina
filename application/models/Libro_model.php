<?php
class Libro_model extends CI_Model {

  function get_all_libros($search = false, $orderby = false, $direction = 'asc')  {
    $this->db->select('*');
    $this->db->from('libro');
    $this->db->join(
      'categoria_libro',
      'libro.id_categoriaLibro = categoria_libro.id_categoriaLibro'
    );
    if ($search) {
      $this->db->like('libro.titulo', $search);
      $this->db->or_like('libro.descripcion', $search);
      $this->db->or_like('libro.autor', $search);
    }
    if ($orderby) {
      $this->db->order_by('libro.'.$orderby, $direction);  
    }
    $result = $this->db->get();
    return $result;    
  }

  function get_valid_libros($limit, $search = false)  {
    $this->db->select('*');
    $this->db->from('libro');
    $this->db->where('libro.status', 1);
    if ($search) {
      $this->db->like('libro.titulo', $search);
      $this->db->or_like('libro.descripcion', $search);
      $this->db->or_like('libro.autor', $search);
    }
    $this->db->join(
      'categoria_libro',
      'libro.id_categoriaLibro = categoria_libro.id_categoriaLibro'
    );
    $this->db->limit($limit);
    $this->db->order_by('libro.id_libro', 'desc');
    $query = $this->db->get(); 
    return $query;    
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