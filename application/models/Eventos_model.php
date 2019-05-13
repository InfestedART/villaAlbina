<?php
class Eventos_model extends CI_Model {

	function get_all_eventos($search = false, $orderby = false, $direction = 'desc') {
		$this->db->select('evento.*, publicacion.*, html.*, area.area, area.color_area');
		$this->db->from('evento');
		$this->db->join('publicacion', 'publicacion.id_post = evento.id_post');
		$this->db->join('area', 'area.id_area = evento.id_area');
		$this->db->join('html', 'html.id_post = evento.id_post', 'left');
		if ($search) {
    		$this->db->like('publicacion.titulo', $search);
	      	$this->db->or_like('evento.info', $search);
	      	$this->db->or_like('evento.organizador', $search);
	      	$this->db->or_like('html.contenido', $search);
	    }
	    $this->db->order_by(
			$orderby ? $orderby : 'evento.id_post',
			$direction
		);
	  	$result = $this->db->get();
	  	return $result;    		
	}

	function get_valid_eventos_futuros($date, $limit, $search = false, $step=0) {
		$this->db->select('evento.*, publicacion.*, html.*, area.area, area.color_area');
		$this->db->from('evento');
		$this->db->join('publicacion', 'publicacion.id_post = evento.id_post');
		$this->db->join('area', 'area.id_area = evento.id_area');
		$this->db->join('html', 'html.id_post = evento.id_post', 'left');
		$this->db->where('publicacion.status', 1);
		
		if ($search) {
    		$this->db->like('publicacion.titulo', $search);
	      	$this->db->or_like('evento.info', $search);
	      	$this->db->or_like('evento.organizador', $search);
	      	$this->db->or_like('html.contenido', $search);
	    }
	    $start = $step * $limit;
	    $this->db->where('evento.fecha_ini >', $date);
		$this->db->or_where('evento.fecha_fin >', $date);
		$this->db->limit($limit, $start);
		$result = $this->db->get();
	  	return $result;    		
	}

	function get_valid_obras($date, $limit, $search = false, $step=0) {
		$this->db->select('*');
		$this->db->from('evento');
		$this->db->join('publicacion', 'publicacion.id_post = evento.id_post');
		$this->db->where('publicacion.status', 1);
		$this->db->where('evento.id_area', 5);
		if ($search) {
    		$this->db->like('publicacion.titulo', $search);
	      	$this->db->or_like('evento.info', $search);
	      	$this->db->or_like('evento.organizador', $search);
	    }
	    $this->db->where('evento.fecha_ini >', $date);
	    $start = $step * $limit;
	    $this->db->limit($limit, $start);
		// $this->db->or_where('evento.fecha_fin >', $date);
		$result = $this->db->get();
	  	return $result;    		
	}

	  function get_evento($id) {
		$this->db->select('*');
		$this->db->from('evento');
		$this->db->where('evento.id_post', $id);
		$this->db->join('publicacion', 'publicacion.id_post = evento.id_post');
		$this->db->join('html', 'html.id_post = evento.id_post', 'left');
		$query = $this->db->get(); 
		return $query;
	  }

	  function get_prev_evento($id) {
		$this->db->select('*');
		$this->db->from('evento');
		$this->db->where('evento.id_post <', $id);
		$this->db->order_by('evento.id_post', 'desc');
		$this->db->limit(1);
		$query = $this->db->get(); 
		return $query;
	  }

	  function get_next_evento($id) {
		$this->db->select('*');
		$this->db->from('evento');
		$this->db->where('evento.id_post >', $id);
		$this->db->order_by('evento.id_post', 'asc');
		$this->db->limit(1);
		$query = $this->db->get(); 
		return $query;
	  }

	  function get_fechas($id) {
		$this->db->select('*');
		$this->db->from('fecha_evento');
		$this->db->where('id_post', $id);
		$query = $this->db->get(); 
		return $query;
	  }

	function insert_evento($data) {
	  	$this->db->insert('evento', $data);
	}

	function update_evento($id, $data) {
	    $this->db->where('id_post', $id);
	    $this->db->update('evento', $data);
	}

  	function delete_evento($id) {
	  	$this->db->delete('publicacion', array('id_post' => $id)); 
	   	$this->db->delete('evento', array('id_post' => $id));
	   	$this->db->delete('fecha_evento', array('id_post' => $id));
	   	$this->db->delete('html', array('id_post' => $id));
 	}

}

?>