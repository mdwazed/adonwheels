<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function pending_ad_request(){
		$this->db->where('pending',1);
		$query = $this->db->get('ad_request');
		$query_result = $query->result_array();
		return $query_result;
	}

	public function show_clients_message(){
        $this->db->where('action_taken',0);
        $query = $this->db->get('clients_message');
        $query_result = $query->result_array();
        return $query_result;
    }

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */