<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	/**
	*
	* Author: CodexWorld
	* Function Name: getDistance()
	* $addressFrom => From address.
	* $addressTo => To address.
	* $unit => Unit type.
	*
	**/
	public function get_distance($addressFrom, $addressTo, $unit){
	    //Change address format
	    $formattedAddrFrom = str_replace(' ','+',$addressFrom);
	    $formattedAddrTo = str_replace(' ','+',$addressTo);
	    
	    //Send request and receive json data
	    $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');
	    $outputFrom = json_decode($geocodeFrom);
	    $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false');
	    $outputTo = json_decode($geocodeTo);
	    
	    //Get latitude and longitude from geo data
	    $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
	    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
	    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
	    $longitudeTo = $outputTo->results[0]->geometry->location->lng;
	    
	    //Calculate distance from latitude and longitude
	    $theta = $longitudeFrom - $longitudeTo;
	    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
	    $dist = acos($dist);
	    $dist = rad2deg($dist);
	    $miles = $dist * 60 * 1.1515;
	    $unit = strtoupper($unit);
	    if ($unit == "K") {
	        return ($miles * 1.609344).' km';
	    } else if ($unit == "N") {
	        return ($miles * 0.8684).' nm';
	    } else {
	        return $miles.' mi';
	    }
	}

	public function get_all_car(){
		$query = $this->db->get('cars');
        $result = $query->result_array();
        return $result;
	}

	public function get_selected_cars($search_year, $serach_color, $search_run){


		if($search_year != NULL){
			$year = $search_year;			
		}else{
			$year = 1950;			
		}
		
		if($serach_color != NULL){
			$color = $serach_color;
		}else{
			$color = '%';
		}
		if($search_run != NULL){
			$weekly_run = $search_run;
		}else{
			$weekly_run= 0;
		}

		$query = $this->db->query("SELECT * FROM cars WHERE car_make_year >= $year AND week_run >= $weekly_run");
		$result = $query->result_array();
		
		return $result;


		//$sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";
		//$this->db->query($sql, array(3, 'live', 'Rick'));
	}

	public function get_car_by_owner($owner_id){
        $query = $this->db->get_where('cars', array('owner_id'=> $owner_id));
        $result = $query->result_array();

        return $result;

    }

    public function get_geo_coordinates($address){
    	$formatted_address = str_replace(' ','+',$address);
    	$geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?key=AIzaSyA8oohj-8021FeSfo7Oo9uNcM1w7fmLzWA&address='.$formatted_address.'&sensor=false');
    	$output = json_decode($geocode);

    	$latitude = $output->results[0]->geometry->location->lat;
	    $longitude = $output->results[0]->geometry->location->lng;

	    return $lat_long = array('latitude' => $latitude , 'longitude' => $longitude );
    }

    /*public function get_longitude($address){
    	$formatted_address = str_replace(' ','+',$address);
    	$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formatted_address.'&sensor=false');
    	$output = json_decode($geocode);
    	$longitude = $output->results[0]->geometry->location->lng;
    	return $longitude;
    }*/

    /*public function get_latitude($address){
    	$formatted_address = str_replace(' ','+',$address);
    	$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formatted_address.'&sensor=false');
    	$output = json_decode($geocode);
    	$latitude = $output->results[0]->geometry->location->lat;
    	return $latitude;
    }*/

    public function calculate_distance($longitude_from, $latitude_from, $longitude_to, $latitude_to){
    	$theta = $longitude_from - $longitude_to;
    	$dist = sin(deg2rad($latitude_from)) * sin(deg2rad($latitude_to)) +  cos(deg2rad($latitude_from)) * cos(deg2rad($latitude_to)) * cos(deg2rad($theta));
    	$dist = acos($dist);
	    $dist = rad2deg($dist);
	    $miles = $dist * 60 * 1.1515;
	    $distance =$miles * 1.609344;  ///// convert miles to km
	    return $distance;
    }

    /////////////////// returns details of a car  /////////////////////////
    public function get_car_by_id($car_id){
        $query = $this->db->get_where('cars', array('id'=> $car_id));
        $result = $query->result_array();
        return $result;

    }

    public function get_car_image_by_owner_id($owner_id){
    	$this->db->select('image_name');
        $query = $this->db->get_where('car_images',array('owner_id'=>$owner_id));
        $result_car_image = $query->result_array();
        return $result_car_image;
    }

    ///////send mail to intended email and data received through $data parameter ////////
    public function send_mail($data){
        //echo 'sending  mail<br>';

        $this->load->library('email');

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://adonwheels.net',
            'smtp_port' => 465,
            'smtp_user' => 'admin@adonwheels.net',
            'smtp_pass' => '1qaz2wsx3edc',
            'smtp_timeout' => 10,
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );

        /* $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'ssl://smtp.googlemail.com',
             'smtp_port' => 465,
             'smtp_user' => 'wazed6077@gmail.com',
             'smtp_pass' => '',
             'smtp_timeout' => 10,
             'mailtype'  => 'html',
             'charset'   => 'utf-8'
         );*/

        /*$config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.technovabd.com',
            'smtp_port' => 465,
            'smtp_user' => 'admin@technovabd.com',
            'smtp_pass' => '',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );*/

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");


        /*//Email content
        $htmlContent = '<h1>Your passowrd has been reset at Ad on Wheels</h1>';
        $htmlContent .= '<p>'.$data['message'].'</p>';
        $htmlContent .= '<h3>'.$data['password'].'</h3>';*/


        $this->email->to($data['mail_to']);
        $this->email->from('admin@adonwheels.net','Ad On Wheels');
        $this->email->subject($data['subject']);
        $this->email->message($data['message']);
        //var_dump($data);

        if($this->email->send()){
            //echo 'email sent';
            return TRUE;
        }else{
            echo $this->email->print_debugger();
        }

    }

    public function save_clients_message($data){
        $insert_data = array(
            'msg_from' => $data['email'],
            'msg_body' => $data['message']
        );
        if(!$this->db->insert('clients_message',$insert_data))
            return false;
        else
            return true;
    }

}

/* End of file common_model.php */
/* Location: ./application/models/common_model.php */