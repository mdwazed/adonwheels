<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->lang->load('root_nav',$this->session->site_lang); //same lang file for root nav and admin nav word
        $this->lang->load('admin',$this->session->site_lang);
        $this->lang->load('message',$this->session->site_lang);
        if(!($_SESSION['user_logged_in']==1 and $_SESSION['user_type']==3)){
            redirect('user_controller/registration');
        }
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

    public function dismiss_clients_message(){
        $msg_id = $_GET['id'];
        $this->load->model('Admin_model');
        $this->Admin_model->dismiss_clients_message($msg_id);
        $this->show_clients_messages();
    }

    public function delete_user(){
        if(isset($_GET['id'])){
            $user_id = $_GET['id'];
            $this->load->model('User_model');
            $this->load->model('Car_provider_model');

            $this->User_model->delete_user($user_id);
            $this->Car_provider_model->delete_car($user_id);
            $this->Car_provider_model->delete_sticker($user_id);
            $car_images_name = $this->Car_provider_model->get_car_images_name($user_id);
            foreach ($car_images_name as $car_image_name){
                $image_name = $car_image_name['image_name'];
                $this->Car_provider_model->delete_car_image($user_id, $image_name);
            }

        }
//        get list of user with details links
//        delete user from the db->users table
//        delete user car from db->cars table
//        delete sticker info from db->sticker info table
//        delete car images from db->car images table and car image folder
        $this->load->model('User_model');
        $data['user_list'] = $this->User_model->get_all_user();

        $send_data['returned_page'] = $this->load->view('admin/show_user_list',$data,TRUE);
        $this->load->view('admin/admin_dashboard', $send_data);


//        die();

    }

    public function test(){
        echo 'hello';
        echo '<pre>'; print_r($this->session->all_userdata());
        echo $_SESSION['user_logged_in'];
        exit;
    }



}

/* End of file Admin_controller.php */
/* Location: ./application/controllers/Admin_controller.php */