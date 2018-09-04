<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertiser extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->lang->load('root_nav',$this->session->site_lang);
		$this->lang->load('advertiser',$this->session->site_lang);
		$this->lang->load('message',$this->session->site_lang);
	}

	public function index()
	{
		///echo 'advertiser';
	}


	///////////////// show cars to advertiser which match supplied parameter  ////////////////////////
	public function find_cars(){  
		//echo 'find cars';
		$this->load->model('Common_model');	
		
		$data = array();

		if((!isset($_POST['submit'])) && (!isset($_GET['search_location']))) {	

			$all_car = $this->Common_model->get_all_car();
			$data['all_car'] = $all_car;	
			$config['base_url'] = base_url('index.php/advertiser/find_cars');

			//$this->load->view('advertiser/find_cars', $data);   //////// show all cars when landed this page first time
		}elseif(isset($_GET['search_location'])){
			//echo 'pagination link';
			
			$search_location = $_GET['search_location'];
			$data['search_location'] = $search_location;
			$search_radius =$_GET['search_radius'];
			$data['max_radius'] = $search_radius;
			$min_year = isset($_GET['min_year'])?$_GET['min_year']:1950;
			$data['min_year'] = $min_year;
			$color = isset($_GET['color'])?$_GET['color']:'%';
			$data['color'] = $color;
			$min_week_run = isset($_GET['min_week_run'])?$_GET['min_week_run']:0;
			$data['min_week_run'] = $min_week_run;

			$search_lat_long = $this->Common_model->get_geo_coordinates($search_location);			
			$serach_latitude = $search_lat_long['latitude'];
			$search_longitude = $search_lat_long['longitude'];

			$current_car_pool = array();
			$car_pool = $this->Common_model->get_selected_cars($min_year, $color, $min_week_run);


			foreach ($car_pool as $key => $value) {
			 	$car_location = $value['car_location'];
			 	//echo $car_location;
			 	$car_longitude = $value['longitude'];
			 	$car_latitude = $value['latitude'];
			 	//echo $value['id'];
			 	//echo $car_latitude;
			 	//echo $car_longitude.'<br>';
			 	$distance = $this->Common_model->calculate_distance($search_longitude, $serach_latitude, $car_longitude, $car_latitude);
			 	
			 	if($search_radius!=NULL && $distance <= $search_radius){
			 		array_push($current_car_pool, $value);
			 		//echo $distance.'<br>';
			 	}else{
			 		//echo 'distance more than radius';
			 	}			 	

			}

			$data['all_car'] = $current_car_pool;
			$config['base_url'] = base_url('index.php/advertiser/find_cars');
			//$config['base_url'] = base_url('index.php/advertiser/show_paginated_cars');
			$config['suffix'] = '?search_location='.$search_location.'&search_radius='.$search_radius.'&min_year='.$min_year.'&color='.$color.'&min_week_run='.$min_week_run;
			$config['reuse_query_string'] = TRUE;		
			
		}elseif(isset($_POST['submit'])){
			
			//echo $this->input->post('search_location');
			$search_location = $this->input->post('search_location');
			$search_location = str_replace(' ','',$search_location);
			$data['search_location'] = $search_location;
			$search_radius = $this->input->post('max_radius');
			$data['max_radius'] = $search_radius;
			$search_year = $this->input->post('min_year');
			$data['min_year'] = $search_year;
			$search_color = $this->input->post('color');
			$data['color'] = $search_color;
			$search_run = $this->input->post('min_week_run');
			$data['min_week_run'] = $search_run;

			$search_lat_long = $this->Common_model->get_geo_coordinates($search_location);
			
			$serach_latitude = $search_lat_long['latitude'];
			$search_longitude = $search_lat_long['longitude'];
		
			$current_car_pool = array();
			$car_pool = $this->Common_model->get_selected_cars($search_year, $search_color, $search_run);
			
			//$car_pool = $this->Common_model->get_all_car();
			foreach ($car_pool as $key => $value) {
			 	$car_location = $value['car_location'];
			 	//echo $car_location;
			 	$car_longitude = $value['longitude'];
			 	$car_latitude = $value['latitude'];
			 	//echo $value['id'];
			 	//echo $car_latitude;
			 	//echo $car_longitude.'<br>';
			 	$distance = $this->Common_model->calculate_distance($search_longitude, $serach_latitude, $car_longitude, $car_latitude);
			 	
			 	if($search_radius!=NULL && $distance <= $search_radius){
			 		array_push($current_car_pool, $value);
			 		//echo $distance.'<br>';
			 	}else{
			 		//echo 'distance more than radius';
			 	}			 	

			}
			
			//var_dump($current_car_pool);
			
			$data['all_car'] = $current_car_pool;
			$config['base_url'] = base_url('index.php/advertiser/find_cars');
			//$config['base_url'] = base_url('index.php/advertiser/show_paginated_cars');
			$config['suffix'] = '?search_location='.$search_location.'&search_radius='.$search_radius.'&min_year='.$search_year.'&color='.$search_color.'&min_week_run='.$search_run;
			$config['reuse_query_string'] = TRUE;

		}

		$offset = $this->uri->segment(3);
		$data_per_page = 3;


		$data['car'] = array_slice($data['all_car'],$offset,$data_per_page);
		/*var_dump($data['car']);
		exit();*/


		$this->load->library('pagination');		

        
        $config['total_rows'] = count($data['all_car']);
        $config['per_page'] = $data_per_page; 
        

        //// bootstrap config ///////////
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = "<li class=\"active\"><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";


        $this->pagination->initialize($config); 

        $data['pagination'] = $this->pagination->create_links();
       

		$this->load->view('advertiser/find_cars', $data);
		

	}    ////////////////////////////// End find_cars ////////////////////////////////////////////////////


	public function show_paginated_cars(){
		echo 'paginate car';
		if(isset($_GET['search_location'])){
			$search_location = $_GET['search_location'];
		}else{
			$search_location =NULL;
		}

		if(isset($_GET['search_radius'])){
			$search_radius = $_GET['search_radius'];
		}else{
			$search_location =NULL;
		}
		
		echo $search_location. $search_radius;
	}




	public function distance($from, $to){
		//$from = 'savar, Bangladesh';
		//$to = 'pallabi, mirpur, Dhaka, Bangladesh';
		$this->load->model('common_model');
		$ret_val = $this->common_model->get_distance($from, $to,'k');
		return $ret_val;

	}

	public function get_geo_location($address){
		$this->load->model('Common_model');
		$this->Common_model->get_geo_coordinate($address);
	}

	public function show_car_details($owner_id){
		//echo 'car_details of'.$owner_id;
		$this->load->model('Common_model');
		$data['car'] = $this->Common_model->get_car_by_owner($owner_id); // get car info
		//var_dump($data);

		////////////////////////get car images //////////////////////////////
        
        $data['car_images'] = $this->Common_model->get_car_image_by_owner_id($owner_id);
		
		$this->load->view('advertiser/car_details', $data);
	}


	//////////  act on info receive from car demand page /////////////
	public function request_for_ad($car_id){
        if(!isset($this->session->user_email))
        {
            $data['message'] = $this->lang->line('msg_login_first');
            $this->load->view('gen_views/success_message', $data);

        }else{
            $this->load->model('User_model');
            $this->load->model('Common_model');
            $this->load->model('Advertiser_model');
            $advertiser = $this->User_model->get_logged_in_user_id();
            $car = $this->Common_model->get_car_by_id($car_id);

            $ret_val = $this->Advertiser_model->submit_ad_request($advertiser, $car);
            if($ret_val){
                $data['message'] = 'Your request has been successful. "Ad on wheels" will contact you soon.';
                $this->load->view('gen_views/ad_request_success', $data);

            }else{
                $data['message'] = 'Your request could not be processed at this time. Please try later.';
                $this->load->view('gen_views/ad_request_success', $data);
            }
        }

	}

	public function show_logged_in_advertiser_profile(){
		//echo 'advertiser profile';
		if(!isset($this->session->user_email))
			{
				$data['message'] = $this->lang->line('msg_login_first');
				$this->load->view('gen_views/success_message', $data);
				
			}else{
				$this->load->helper('date');
				$this->load->model('User_model');
				$data['user_data'] = $this->User_model->get_logged_in_user_data();

				$datestring = '%d %M %Y';
				$time = time($data['user_data']['registered_on']);
				$data['user_data']['registered_on'] = mdate($datestring, $time);



				$this->load->view('advertiser/advertiser_profile', $data);
			}
		
	}

	public function car_demands(){

	    if(isset($_POST['submit'])){
	        $this->load->model('Advertiser_model');

            $data['location'] = $_POST['car_location'];
            $data['min_year'] = $_POST['car_make_year'];
            $data['space_reqr'] = $_POST['space_require'];
            $data['max_price'] = $_POST['max_price'];
            $data['no_of_car'] = $_POST['no_of_car'];
            if($this->Advertiser_model->save_demands($data)){
//                exit();
                $data['message'] = $this->lang->line("demand_success");
                $this->load->view('gen_views/success_message',$data);
            }else{
                $data['message'] = $this->lang->line("demand_failed");
                $this->load->view('gen_views/success_message',$data);
            }

        }else{
            $this->load->view('advertiser/car_demands');
        }

	}

	public function upload_logo(){
//        echo 'upload logo';
        $this->load->helper('string');
        $this->load->model('user_model');
        $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $result = $this->user_model->get_user($_SESSION['user_email']);
        $new_file_name = $result[0]['user_id'].'.'.$ext;
        $config['upload_path'] = './coy_logos/';
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $config['max_size'] = 4000000;
        $config['max_width'] = 2048;
        $config['max_height'] = 2048;
        $config['file_name'] = $new_file_name;
        $config['overwrite'] = True;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('logo'))
        {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);

//            $this->load->view('upload_form', $error);
        }
        else
        {
//            echo $this->upload->data('filename');
            if($this->user_model->add_advertisers_logo($result[0]['user_id'], $new_file_name)){
                $this->show_logged_in_advertiser_profile();
            }else{
                echo "error updating logo in database";
            }

        }
    }
	

}

/* End of file advertiser.php */
/* Location: ./application/controllers/advertiser.php */