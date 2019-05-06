<?php
class Libro_model extends CI_Model {

  function get_all_libros($search = false, $orderby = false, $direction = 'asc')  {
    $this->db->select('*');
    $this->db->from('libro');
    $this->db->join(
      'categoria_libro',
      'libro.id_categoriaLibro = categoria_libro.id_categoriaLibro'
    );
    $this->db->join('publicacion', 'publicacion.id_post = libro.id_post');
    if ($search) {
      $this->db->like('publicacion.titulo', $search);
      $this->db->or_like('libro.descripcion', $search);
      $this->db->or_like('libro.autor', $search);
    }
    if ($orderby == 'titulo') {
      $this->db->order_by('publicacion.'.$orderby, $direction);  
    } elseif($orderby) {
      $this->db->order_by('libro.'.$orderby, $direction);
    }

    $result = $this->db->get();
    return $result;    
  }

  function get_valid_libros($limit, $search = false, $step=0)  {
    $this->db->select('*');
    $this->db->from('libro');
    $this->db->join('publicacion', 'publicacion.id_post = libro.id_post');
    $this->db->where('publicacion.status', 1);
    if ($search) {
      $this->db->like('publicacion.titulo', $search);
      $this->db->or_like('libro.descripcion', $search);
      $this->db->or_like('libro.autor', $search);
    }
    $this->db->join(
      'categoria_libro',
      'libro.id_categoriaLibro = categoria_libro.id_categoriaLibro'
    );
    $start = $step * $limit;
    $this->db->limit($limit, $start);
    $this->db->order_by('libro.id_post', 'desc');
    $query = $this->db->get(); 
    return $query;    
  }

  function get_libro($id) {
  	$this->db->where('libro.id_post',$id);
    $this->db->join('publicacion', 'publicacion.id_post = libro.id_post');
    $result = $this->db->get('libro',1);
    return $result;    
  }

  function insert_libro($data) {
	  $this->db->insert('libro', $data);
  }

  function delete_libro($id) {
    $this->db->delete('publicacion', array('id_post' => $id)); 
  	$this->db->delete('libro', array('id_post' => $id)); 
  }

  function update_libro($id, $data) {
    $this->db->where('id_post', $id);
    $this->db->update('libro', $data);
  }

}
?>