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
	    $this->load->model('User_model');

	    if(!$this->session->user_type == 2){
	        exit("not advertiser");
        }else{
            $req_by = $this->User_model->get_logged_in_user_id();
           $user_id = $req_by[0]['user_id'];
            $save_data = array(
                'req_by' => $user_id,
                'req_loc' => $data['location'],
                'min_year' => $data['min_year'],
                'space_reqr' => (int)$data['space_reqr'],
                'max_price' => $data['max_price'],
                'no_of_car' =>$data['no_of_car']
            );

            if($this->db->insert('advance_car_demands', $save_data)){
                return true;

            }else{
                return false;
            }
        }

    }


	

}

/* End of file Advertiser_model.php */
/* Location: ./application/models/Advertiser_model.php */