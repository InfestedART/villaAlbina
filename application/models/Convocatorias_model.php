<?php
class Convocatorias_model extends CI_Model {

	function get_all_convocatorias(
		$search = false,
		$search_cat = false,
		$orderby = false,
		$direction = 'desc',
		$step = 0,
  		$limit = 12
	) {
		$this->db->select('*');
		$this->db->from('convocatoria');
		$this->db->join('publicacion', 'publicacion.id_post = convocatoria.id_post');
		$this->db->join('area', 'area.id_area = convocatoria.id_area');
		$this->db->join('html', 'html.id_post = convocatoria.id_post', 'left');
		if ($search) {
    		$this->db->like('publicacion.titulo', $search);
	      	$this->db->or_like('convocatoria.descripcion', $search);	      	
	      	$this->db->or_like('html.contenido', $search);
	    }
	    if ($search_cat) {
	      $this->db->where('convocatoria.id_area', $search_cat);
	    }
	    $this->db->order_by(
			$orderby ? $orderby : 'convocatoria.id_post',
			$direction
		);
		$start = $step * $limit;
		$this->db->limit($limit, $start);
	  	$result = $this->db->get();
	  	return $result;    		
	}

	function get_valid_convocatorias(
		$date,
		$limit,
		$search = false,
		$search_cat = false,
		$step=0
	) {
		$this->db->select('*');
		$this->db->from('convocatoria');
		$this->db->join('publicacion', 'publicacion.id_post = convocatoria.id_post');
		$this->db->join('area', 'area.id_area = convocatoria.id_area');
		$this->db->join('html', 'html.id_post = convocatoria.id_post', 'left');
		$this->db->where('publicacion.status', 1);
		if ($search) {
    		$this->db->like('publicacion.titulo', $search);
	      	$this->db->or_like('convocatoria.descripcion', $search);	      	
	      	$this->db->or_like('html.contenido', $search);
	    }
	    if ($search_cat) {
	      $this->db->where('convocatoria.id_area', $search_cat);
	    }	
	   	$this->db->where('convocatoria.fecha_limite >=', $date);
	   	$start = $step * $limit;
	    $this->db->order_by('convocatoria.fecha_limite', 'desc');
		$this->db->limit($limit, $start);
	  	$result = $this->db->get();
	  	return $result;    		
	}

	  function get_convocatoria($id) {
		$this->db->select('*');
		$this->db->from('convocatoria');
		$this->db->where('convocatoria.id_post', $id);
		$this->db->join('publicacion', 'publicacion.id_post = convocatoria.id_post');
		$this->db->join('html', 'html.id_post = convocatoria.id_post', 'left');
		$query = $this->db->get(); 
		return $query;
	  }

	  function get_prev_convo($id) {
		$this->db->select('*');
		$this->db->from('convocatoria');
		$this->db->where('convocatoria.id_post <', $id);
		$this->db->order_by('convocatoria.id_post', 'desc');
		$this->db->limit(1);
		$query = $this->db->get(); 
		return $query;
	  }

	  function get_next_convo($id) {
		$this->db->select('*');
		$this->db->from('convocatoria');
		$this->db->where('convocatoria.id_post >', $id);
		$this->db->order_by('convocatoria.id_post', 'asc');
		$this->db->limit(1);
		$query = $this->db->get(); 
		return $query;
	  }

	function insert_convocatoria($data) {
	  	$this->db->insert('convocatoria', $data);
	}

	function update_convocatoria($id, $data) {
	    $this->db->where('id_post', $id);
	    $this->db->update('convocatoria', $data);
	}

  	function delete_convocatoria($id) {
	  	$this->db->delete('publicacion', array('id_post' => $id)); 
	   	$this->db->delete('convocatoria', array('id_post' => $id));
	   	$this->db->delete('galeria', array('id_post' => $id));
	   	$this->db->delete('archivo_adjunto', array('id_post' => $id));
	   	$this->db->delete('html', array('id_post' => $id));
 	}

}