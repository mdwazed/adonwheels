<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->lang->load('root_nav',$this->session->site_lang);
        $this->lang->load('admin',$this->session->site_lang);
        $this->lang->load('message',$this->session->site_lang);
    }

	public function index()
	{
		
	}

	public function show_dashboard(){
		$this->load->view('admin/admin_dashboard');
	}

	public function show_pending_request(){
		$this->load->model('Admin_model');  // to get the req info
		$this->load->model('User_model');   // to get car car owner and requester info

		
		$data = array();
		$request_data = array();

		$pending_requests = $this->Admin_model->pending_ad_request();

		foreach ($pending_requests as $key => $value) {
			//var_dump($key);
			$row_data = array();
			$request_id = $value['req_id'];
			$car_id = $value['car_id'];
			$owner_id = $value['owner_id'];
			$requester_id = $value['requester_id'];
			$admin_remarks = $value['admin_remarks'];
			$requested_on = $value['requested_on'];

			$requester = $this->User_model->get_user_by_id($requester_id);
			$requester_first_name = $requester[0]['first_name'];
			$requester_last_name = $requester[0]['last_name'];
			$requester_address = $requester[0]['user_address'];
			$requester_city = $requester[0]['user_city'];
			$requester_country = $requester[0]['country'];
			$requester_tel = $requester[0]['user_tel'];
			$requester_email = $requester[0]['user_email'];

			$owner = $this->User_model->get_user_by_id($owner_id);	
				
			$owner_first_name = $owner[0]['first_name'];
			$owner_last_name = $owner[0]['last_name'];
			$owner_address = $owner[0]['user_address'];
			$owner_city = $owner[0]['user_city'];
			$owner_country = $owner[0]['country'];
			$owner_tel = $owner[0]['user_tel'];
			$owner_email = $owner[0]['user_email'];

			$row_data['request_id'] = $request_id;
			$row_data['car_id'] = $car_id;
			
			$row_data['requester_first_name'] = $requester_first_name;
			$row_data['requester_last_name'] = $requester_last_name;
			$row_data['requester_address'] = $requester_address;
			$row_data['requester_city'] = $requester_city;
			$row_data['requester_country'] = $requester_country;
			$row_data['requester_email'] = $requester_email;
			$row_data['requester_tel'] = $requester_tel;
			$row_data['requester_email'] = $requester_email;
			$row_data['requester_city'] = $requester_city;
			

			$row_data['owner_first_name'] = $owner_first_name;
			$row_data['owner_last_name'] = $owner_last_name;
			$row_data['owner_address'] = $owner_address;
			$row_data['owner_city'] = $owner_city;
			$row_data['owner_country'] = $owner_country;
			$row_data['owner_email'] = $owner_email;
			$row_data['owner_tel'] = $owner_tel;
			$row_data['owner_email'] = $owner_email;
			$row_data['owner_city'] = $owner_city;
			

			array_push($request_data, $row_data);
			
		}

		$data['request_data'] = $request_data;
		/*echo '<pre>';
		print_r($data);*/

		/*$query_string = 'SELECT users.user_id, users.first_name, users.last_name FROM users INNER JOIN ad_request ON users.user_id = ad_request.requester_id WHERE ad_request.pending = 1';
		$query = $this->db->query($query_string);
		$query_result = $query->result_array();*/


		/*echo '<pre>';
		print_r($pending_requests);
		exit();*/
		$send_data['returned_page'] = $this->load->view('admin/pending_request',$data,TRUE);
		$this->load->view('admin/admin_dashboard', $send_data);
	}

	public function action_on_pending_request(){
//		echo 'action on pending request';
        $this->load->view('admin/action_on_pending_request');
	}

	public function css_test(){
		$this->load->view('gen_views/css_test');
	}

	public function show_clients_messages(){
        $this->load->model('Admin_model');  // to get the req info
//	    print('show clients messages');
        $data['client_messages'] = $this->Admin_model->show_clients_message();

        $send_data['returned_page'] = $this->load->view('admin/client_message',$data,TRUE);
        $this->load->view('admin/admin_dashboard', $send_data);
//        $this->load->view('admin/client_message', $data);


    }

}

/* End of file Admin_controller.php */
/* Location: ./application/controllers/Admin_controller.php */