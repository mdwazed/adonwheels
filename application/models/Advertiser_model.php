<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertiser_model extends CI_Model {
	
    //////////// save requset for ad for a car in the db. ///////////////
	public function submit_ad_request($advertiser, $car){
		//var_dump($advertiser_id);
		$data['car_id'] = $car[0]['id'];
		$data['owner_id'] = $car[0]['owner_id'];
		$data['requester_id'] = $advertiser[0]['user_id'];
		return $this->db->insert('ad_request', $data);
	}

	////////// save advanced demand if suitable car not found in pool  //////////////
    public function save_demands($data){
	    $req_by = '10';
        $save_data = array(
            'req_by' => '',
            'req_loc' => 'location',
            'min_year' => 'min_year',
            'space_reqr' => 'space_reqr',
            'max_price' => 'max_price'
        );
        exit();
	    return true;
    }


	

}

/* End of file Advertiser_model.php */
/* Location: ./application/models/Advertiser_model.php */