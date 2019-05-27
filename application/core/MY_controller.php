<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$ip = $this->input->ip_address();
		$this->page_view($ip);
	}

	public function page_view($ip) {
		$this->load->model("Visitas_model");
		$target_ip = $this->Visitas_model->get_ip($ip);
		$ip_exists = sizeof($target_ip) > 0;
		if ($ip_exists) {
			$timestamp = $target_ip[0]['timestamp'];
			$time = strtotime($timestamp);
			$next_time = strtotime(date('Y-m-d H:i:s'));	
			$diff = ($next_time - $time)/3600;
			if ($diff > 5) {
				$visitas_data = array(
					'userip' => $ip,
					'timestamp' => date('Y-m-d H:i:s'),
					'visita' => $target_ip[0]['visita']+1
				);
				$this->Visitas_model->update_visita($ip, $visitas_data);
			}
		} else {
			$visitas_data = array(
				'userip' => $ip,
				'timestamp' => date('Y-m-d H:i:s'),
			);
			$this->Visitas_model->insertar_visita($visitas_data);
		}
	}

}


class Admin_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		if(!$this->session->has_userdata('logged_in') || !$this->session->logged_in){
			header('Location: '.base_url('admin'));
			exit;
		}
	}
}
