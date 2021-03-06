<?php
class Media_model extends CI_Model {
  function get_all_media($search = false) {
	$this->db->select('*');
	$this->db->from('media');
	$this->db->join('publicacion', 'publicacion.id_post = media.id_post');
	$this->db->join('tipo_media', 'tipo_media.id_tipo_media = media.id_tipo_media');
	$this->db->join('area', 'area.id_area = media.id_area');
	if ($search) {
      $this->db->like('publicacion.titulo', $search);
    }

	$this->db->order_by('(orden = 0), orden ASC');
	$query = $this->db->get(); 
	return $query;
  }

  function get_valid_media($limit, $search=false, $search_cat = false, $step=0) {
	$this->db->select('*');
	$this->db->from('media');
	$this->db->join('publicacion', 'publicacion.id_post = media.id_post');
	$this->db->where('publicacion.status', 1);
	if ($search) {
    	$this->db->like('publicacion.titulo', $search);
    }
   	if ($search_cat) {
	    $this->db->where('media.id_area', $search_cat);
	}	
    $this->db->order_by('orden ASC');
    $start = $step * $limit;
	$this->db->limit($limit, $start);
	$query = $this->db->get(); 
	return $query;  	
  }

	  function get_media($id) {
		$this->db->select('*');
		$this->db->from('media');
		$this->db->where('media.id_post', $id);
		$this->db->join('publicacion', 'publicacion.id_post = media.id_post');
		$this->db->join('tipo_media', 'tipo_media.id_tipo_media = media.id_tipo_media');
		$query = $this->db->get(); 
		return $query;
	  }

    function get_cant_media() {
        $this->db->select('*');
        $this->db->from('media');
 		$this->db->join('publicacion', 'publicacion.id_post = media.id_post');       
        $this->db->where('status', 1);
        $query = $this->db->get(); 
        return sizeof($query->result_array());
    }

  	function get_all_tipos() {
 		$this->db->select('*');
		$this->db->from('tipo_media'); 	
		$query = $this->db->get(); 
		return $query;  
  	}

	function insert_media($data) {
	  	$this->db->insert('media', $data);
	}

	function update_media($id, $data) {
	    $this->db->where('id_post', $id);
	    $this->db->update('media', $data);
	}

  	function delete_media($id) {
	  	$this->db->delete('publicacion', array('id_post' => $id)); 
	   	$this->db->delete('media', array('id_post' => $id));
 	}

}
?>