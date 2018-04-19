<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertiser_model extends CI_Model {
	

	public function submit_ad_request($advertiser, $car){
		//var_dump($advertiser_id);
		$data['car_id'] = $car[0]['id'];
		$data['owner_id'] = $car[0]['owner_id'];
		$data['requester_id'] = $advertiser[0]['user_id'];


		return $this->db->insert('ad_request', $data);



	}	
	

}

/* End of file Advertiser_model.php */
/* Location: ./application/models/Advertiser_model.php */