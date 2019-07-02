<?php
class Obras_model extends CI_Model {

	function get_all_obras(
		$search = false,
		$orderby = false,
		$direction = 'desc',
		$step = 0,
  		$limit = 12
	) {
		
		$this->db->select('obra_teatro.*, publicacion.*, html.*');
		$this->db->from('obra_teatro');
		$this->db->join('publicacion', 'publicacion.id_post = obra_teatro.id_post');
		$this->db->join('html', 'html.id_post = obra_teatro.id_post', 'left');
		if ($search) {
    		$this->db->like('publicacion.titulo', $search);
	      	$this->db->or_like('obra_teatro.info', $search);
	      	$this->db->or_like('obra_teatro.organizador', $search);
	      	$this->db->or_like('html.contenido', $search);
	    }    
	    $this->db->order_by(
			$orderby ? $orderby : 'obra_teatro.id_post',
			$direction
		);
		$start = $step * $limit;
		$this->db->limit($limit, $start);
	  	$result = $this->db->get();
	  	return $result;    		
	}

	function get_valid_obras(
		$date,
		$limit,
		$search = false,
		$step=0
	) {
		$this->db->select('obra_teatro.*, publicacion.*, html.*');
		$this->db->from('obra_teatro');
		$this->db->join('publicacion', 'publicacion.id_post = obra_teatro.id_post');
		$this->db->join('html', 'html.id_post = obra_teatro.id_post', 'left');
		$this->db->where('publicacion.status', 1);
		if ($search) {
    		$this->db->like('publicacion.titulo', $search);
	      	$this->db->or_like('obra_teatro.info', $search);
	      	$this->db->or_like('obra_teatro.descripcion', $search);
	      	$this->db->or_like('obra_teatro.organizador', $search);
	      	$this->db->or_like('html.contenido', $search);
	    }
	    $start = $step * $limit;
	    $this->db->group_start();
	    	$this->db->where('obra_teatro.fecha_ini >', $date);
			$this->db->or_where('obra_teatro.fecha_fin >', $date);
		$this->db->group_end();
		$this->db->order_by('obra_teatro.fecha_ini');
		$this->db->limit($limit, $start);
		$result = $this->db->get();
	  	return $result;    		
	}

	function get_valid_obras_pasadas(
		$date,
		$limit,
		$search = false,
		$step=0
	) {
		$this->db->select('obra_teatro.*, publicacion.*, html.*');
		$this->db->from('obra_teatro');
		$this->db->join('publicacion', 'publicacion.id_post = obra_teatro.id_post');
		$this->db->join('html', 'html.id_post = obra_teatro.id_post', 'left');
		$this->db->where('publicacion.status', 1);
		if ($search) {
    		$this->db->like('publicacion.titulo', $search);
	      	$this->db->or_like('obra_teatro.info', $search);
	      	$this->db->or_like('obra_teatro.descripcion', $search);
	      	$this->db->or_like('obra_teatro.organizador', $search);
	      	$this->db->or_like('html.contenido', $search);
	    }
	    $start = $step * $limit;
		$this->db->where('obra_teatro.fecha_fin <', $date);
		$this->db->order_by('obra_teatro.fecha_ini', 'desc');
		$this->db->limit($limit, $start);
		$result = $this->db->get();
	  	return $result;    		
	}

	function get_valid_fechas(
		$date,
		$limit,
		$search = false,
		$step=0
	) {
	  	$this->db->select('fecha_evento.*');
		$this->db->from('fecha_evento');
		$this->db->join('obra_teatro', 'fecha_evento.id_post = obra_teatro.id_post');
		$this->db->join('publicacion', 'fecha_evento.id_post = publicacion.id_post');
		$this->db->join('html', 'html.id_post = obra_teatro.id_post', 'left');
		$this->db->where('publicacion.status', 1);
		if ($search) {
    		$this->db->like('publicacion.titulo', $search);
	      	$this->db->or_like('obra_teatro.info', $search);
	      	$this->db->or_like('obra_teatro.descripcion', $search);
	      	$this->db->or_like('obra_teatro.organizador', $search);
	      	$this->db->or_like('html.contenido', $search);
	    } 
	    $start = $step * $limit;
	    $this->db->group_start();
	    	$this->db->where('obra_teatro.fecha_ini >', $date);
			$this->db->or_where('obra_teatro.fecha_fin >', $date);
		$this->db->group_end();
		$query = $this->db->get(); 
		return $query->result_array();	
	  }

	function get_valid_fechas_pasadas(
		$date,
		$limit,
		$search = false,
		$step=0
	) {
	  	$this->db->select('fecha_evento.*');
		$this->db->from('fecha_evento');
		$this->db->join('obra_teatro', 'fecha_evento.id_post = obra_teatro.id_post');
		$this->db->join('publicacion', 'fecha_evento.id_post = publicacion.id_post');
		$this->db->join('html', 'html.id_post = obra_teatro.id_post', 'left');
		$this->db->where('publicacion.status', 1);
		if ($search) {
    		$this->db->like('publicacion.titulo', $search);
	      	$this->db->or_like('obra_teatro.info', $search);
	      	$this->db->or_like('obra_teatro.descripcion', $search);
	      	$this->db->or_like('obra_teatro.organizador', $search);
	      	$this->db->or_like('html.contenido', $search);
	    } 
	    $start = $step * $limit;
		$this->db->where('obra_teatro.fecha_fin <', $date);
		$query = $this->db->get(); 
		return $query->result_array();	
	}

	  function get_prev_obra($id, $fecha) {
		$this->db->select('*');
		$this->db->from('obra_teatro');
		$this->db->where('obra_teatro.fecha_ini <', $fecha);
		$this->db->where('obra_teatro.id_post <>', $id);
		$this->db->order_by('obra_teatro.fecha_ini', 'desc');
		$this->db->limit(1);
		$query = $this->db->get(); 
		return $query;
	  }

	  function get_next_obra($id, $fecha) {
		$this->db->select('*');
		$this->db->from('obra_teatro');
		$this->db->where('obra_teatro.fecha_ini >', $fecha);
		$this->db->where('obra_teatro.id_post <>', $id);
		$this->db->order_by('obra_teatro.fecha_ini', 'asc');
		$this->db->limit(1);
		$query = $this->db->get(); 
		return $query;
	  }


	function get_obra($id) {
		$this->db->select('*');
		$this->db->from('obra_teatro');
		$this->db->where('obra_teatro.id_post', $id);
		$this->db->join('publicacion', 'publicacion.id_post = obra_teatro.id_post');
		$this->db->join('html', 'html.id_post = obra_teatro.id_post', 'left');
		$query = $this->db->get(); 
		return $query;
	}

	  function get_fecha_ini($id) {
	  	$this->db->select('fecha_ini');
		$this->db->from('obra_teatro');
		$this->db->where('id_post', $id);
		$this->db->limit(1);
		$query = $this->db->get(); 
		return $query->result_array()[0]['fecha_ini'];
	  }

	  function get_fechas($id) {
		$this->db->select('fecha_evento.*');
		$this->db->from('fecha_evento');
		$this->db->where('id_post', $id);
		$query = $this->db->get(); 
		return $query;
	  }

	function insert_obra($data) {
	  	$this->db->insert('obra_teatro', $data);
	}

	function update_obra($id, $data) {
	    $this->db->where('id_post', $id);
	    $this->db->update('obra_teatro', $data);
	}

  	function delete_obra($id) {
	  	$this->db->delete('publicacion', array('id_post' => $id)); 
	   	$this->db->delete('obra_teatro', array('id_post' => $id));
	   	$this->db->delete('fecha_evento', array('id_post' => $id));
	   	$this->db->delete('html', array('id_post' => $id));
 	}
}