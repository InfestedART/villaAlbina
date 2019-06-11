<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo_model extends CI_Model {

    function get_all_miembros(
        $search = false,
        $orderby = false,
        $direction = 'asc',
        $step = 0,
        $limit = 12
    )  {
        $this->db->select('*');
        $this->db->from('miembro_equipo');
        $this->db->join('publicacion','publicacion.id_post = miembro_equipo.id_post');
        $this->db->join(
            'categoria_equipo',
            'miembro_equipo.id_categoria_equipo = categoria_equipo.id_categoria_equipo'
        );
        if ($search) {
            $this->db->like('publicacion.titulo', $search);
            $this->db->or_like('miembro_equipo.descripcion', $search);
            $this->db->or_like('miembro_equipo.cargo', $search);
        }
        if ($orderby == 'titulo') {
          $this->db->order_by('publicacion.'.$orderby, $direction);  
        } elseif($orderby) {
          $this->db->order_by('miembro_equipo.'.$orderby, $direction);
        }
        $start = $step * $limit;
        $this->db->limit($limit, $start);
        $query = $this->db->get(); 
        return $query;    
    }

  	function get_valid_miembros()  {
    	$this->db->select('*');
    	$this->db->from('miembro_equipo');
        $this->db->join('publicacion','publicacion.id_post = miembro_equipo.id_post');
    	$this->db->join(
    		'categoria_equipo',
    		'miembro_equipo.id_categoria_equipo = categoria_equipo.id_categoria_equipo'
    	);
    	$this->db->where('publicacion.status', 1);
    	$this->db->order_by('miembro_equipo.id_post', 'asc');
    	$query = $this->db->get(); 
    	return $query;    
  	}

    function get_miembro($id) {
        $this->db->where('miembro_equipo.id_post',$id);
        $this->db->join('publicacion', 'publicacion.id_post = miembro_equipo.id_post');
        $result = $this->db->get('miembro_equipo',1);
        return $result;    
  }

    function insert_miembro($data) {
        $this->db->insert('miembro_equipo', $data);
    }

    function update_miembro($id, $data) {
        $this->db->where('id_post', $id);
        $this->db->update('miembro_equipo', $data);
    }

   function delete_miembro($id) {
      $this->db->delete('publicacion', array('id_post' => $id)); 
      $this->db->delete('miembro_equipo', array('id_post' => $id));
  }

}
?>