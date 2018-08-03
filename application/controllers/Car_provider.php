<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// all function related to car provider goes here /////

class Car_provider extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->lang->load('root_nav',$this->session->site_lang);
		$this->lang->load('car_provider',$this->session->site_lang);
		$this->lang->load('message',$this->session->site_lang);
	}
	
	public function index()
	{

		
	}
	
	public function earning_possibilities()
	{
		$data['message'] = $this->lang->line('msg_page_constr_later');
		$this->load->view('gen_views/success_message', $data);
	}

	///////////////  add  car info  for a user  //////////////////
	public function add_car()
	{
		//echo "add car";
		if(!isset($_SESSION['user_email'])){
			redirect('/user_controller/registration','refresh');
		}
		$data['post']['car_model']='';
		$data['post']['car_make']='';
		$data['post']['car_make_year']='';
		$data['post']['car_location']='';
		$data['post']['car_color']='';
		$data['post']['reg_no']='';


		$data['post']['min_price']='';
		$data['post']['parking_day']='';
		$data['post']['parking_night']='';
		$data['post']['day_run']='';
		$data['post']['week_run']='';
		$this->load->view('car_provider/add_car',$data);
	}


	///// save car information to db after car provider submit ad car form and take user to image uploading page /////////////////
	public function save_car()
	{
		//echo "add car";
		$this->load->model('Car_provider_model');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('car_make_year', 'Car make year', 'trim|required|numeric|greater_than_equal_to[1995]');
		$this->form_validation->set_rules('day_run', 'Daily run', 'trim|required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules('week_run', 'Weekly run', 'trim|required|numeric|greater_than_equal_to[0]');


		if($this->form_validation->run()==FALSE)
		{

		    $data['post']=$_POST;
			$this->load->view('car_provider/add_car',$data); //// present the same page for correcting validation error.
		}
		else{
            if($this->Car_provider_model->save_car()){
                $this->load->view('car_provider/add_car_image'); // load the car image upload page if save car was successful
            }else{
                $data['message'] = $this->lang->line('msg_img_upload_error');
                $this->load->view('gen_views/success_message',$data);
            }
        }

		
	}
	////////////////  loop through the image upload option and also accessible from root nav upload car photo menu ///////////
	public function car_image_upload_loop()
	{
		if(!isset($_SESSION['user_email'])){
			$data['message'] = 'Please log in before add a car photo';
			$this->load->view('gen_views/success_message',$data);
		}else{
			$this->load->view('car_provider/add_car_image');
		}
		
	}

	public function add_car_image()
	{
		echo "add car image";


		if(!isset($_SESSION['user_email'])){
			redirect('/user_controller/registration','refresh');
		}
		$this->load->model('Car_provider_model');
		$return_value = $this->Car_provider_model->save_car_image();
		if($return_value == 1){
			//$data['message'] = 'Successful image upload ! Click'.anchor('car_provider/car_image_upload_loop',' here ').'to add another';
            $data['message'] = $this->lang->line('successful_img_upload');
            $this->load->view('gen_views/success_message',$data);
		}else{
			//var_dump($return_value);
			$data['message'] = $return_value['message']['error'].'Click'.anchor('car_provider/car_image_upload_loop',' here ').'to add another';
			//echo $data['message'];
			$this->load->view('gen_views/success_message',$data);
			
		}
	}

	////////////// show the details instruction page for uploading a car //////////////////
	public function add_car_instr()
	{
		$this->load->model('common_var');
		if($this->session->site_lang == 'english')
		{
			$data['add_car_instr'] = $this->common_var->get_add_car_instr_english();
		}elseif($this->session->site_lang == 'deutsche'){
			$data['add_car_instr'] = $this->common_var->get_add_car_instr_deutsche();
		}
		
		$this->load->view('car_provider/add_car_instruction',$data);
	}


	/////////////// show portfolio of current logged in user  ///////////////////////
	public function show_car_provider_portfolio()
	{
		if(!isset($_SESSION['user_email'])){
			redirect('/user_controller/registration','refresh');
		}

		$this->load->model('car_provider_model');
		$this->car_provider_model->show_car_provider_portfolio();
	}


	//////////////////////// edit user and car information ////////////////////
	public function edit_car_provider_profile()
	{
		
		if(!isset($_SESSION['user_email'])){
			redirect('/user_controller/registration','refresh');
		}

        ///////// initial load before submit update /////////////
		if(!isset($_POST['save_user_info']) && !isset($_POST['save_car_info']))
		{
			////////// get user information from users table   //////////////////////
			$this->load->model('user_model');
            $result = $this->user_model->get_user($_SESSION['user_email']);
          
            $data['last_name'] = $result[0]['last_name'];
            $data['first_name'] = $result[0]['first_name'];
            $data['user_address'] = $result[0]['user_address'];
            $data['user_city'] = $result[0]['user_city'];
            $data['country'] = $result[0]['country'];
            $data['user_zip'] = $result[0]['user_zip'];
            $data['user_tel'] = $result[0]['user_tel'];

			
            $ret_val = $this->user_model->get_logged_in_user_id();


            ////////// get car info from cars table  //////////////////////////
			$this->load->model('car_provider_model');
			$car_data = $this->car_provider_model->get_car($ret_val[0]['user_id']);
			if(count($car_data)>0){
			    $data['has_car'] = True;
				$data['car_id'] = $car_data[0]['id'];
				$data['car_model'] = $car_data[0]['car_model'];
				$data['car_make'] = $car_data[0]['car_make'];
				$data['car_make_year'] = $car_data[0]['car_make_year'];
				$data['car_color'] = $car_data[0]['car_color'];
				$data['reg_number'] = $car_data[0]['reg_number'];
                $data['car_location'] = $car_data[0]['car_location'];
				$data['parking_day'] = $car_data[0]['parking_day'];
				$data['parking_night'] = $car_data[0]['parking_night'];
				$data['day_run'] = $car_data[0]['day_run'];
				$data['week_run'] = $car_data[0]['week_run'];
			}else{
			    $data['has_car'] = False;
				$data['car_id'] = '';
				$data['car_model'] = '';
				$data['car_make'] = '';
				$data['car_make_year'] = '';
				$data['car_color'] = '';
				$data['reg_number'] = '';
                $data['car_location'] = '';
				$data['parking_day'] = '';
				$data['parking_night'] = '';
				$data['day_run'] = '';
				$data['week_run'] = '';
			}
			

			///////////////////// load view with user and car data ///////////////////////////
			$this->load->view('car_provider/edit_car_provider_profile', $data);

            /////////// user submitted user update form ///////
		}elseif(isset($_POST['save_user_info']))
		{
			echo 'save user info';
			$this->load->model('user_model');
			$result = $this->user_model->get_user($_SESSION['user_email']);
			$ret_val = $this->user_model->update_user($result[0]['user_id']);
			if($ret_val){
				$this->show_car_provider_portfolio();
			}

            //////////// user submitted car update form ///////////
		}elseif (isset($_POST['save_car_info']))
		{
			echo 'save car info';
			$id = $this->input->post('car_id');
			
			$this->load->model('car_provider_model');
			$ret_val = $this->car_provider_model->update_car($id);
			if($ret_val){
				$this->show_car_provider_portfolio();
			}

		}
	}

	public function edit_sticker(){
        if(!isset($_SESSION['user_email'])){
            redirect('/user_controller/registration','refresh');
        }

        $this->load->model('car_provider_model');
        $this->load->model('user_model');
        $ret_val = $this->user_model->get_logged_in_user_id();
        $user_id = $ret_val[0]['user_id'];


        if(!isset($_POST['save_sticker_info'])){

            $ret_val = $this->car_provider_model->get_sticker($user_id);

            $data['sticker_data'] = $ret_val;

            $this->load->view('car_provider/edit_sticker',$data);
        }else{
            echo 'edit sticker submitted';

            if($this->car_provider_model->delete_sticker($user_id)){
                $this->car_provider_model->add_sticker();
                $this->show_car_provider_portfolio();

            }else{
                $data['message']='something went wrong during updating sticker. Please contact Admin';
                $this->load->view('gen_views/success_message',$data);
            }


        }

    }

    public function delete_image(){

        if(!isset($_SESSION['user_email'])){
//            redirect('/user_controller/registration','refresh');
            $data['message'] = $this->lang->line('msg_login_first');
            $this->load->view('gen_views/success_message', $data);
        }else{
            $this->load->model('car_provider_model');
            $this->load->model('user_model');
            $user_id = $this->user_model->get_logged_in_user_id();

            if(isset($_POST['delete'])){
                echo 'delete submitted';
//            var_dump($_POST);
                $retval = $this->car_provider_model->delete_car_image($user_id[0]['user_id'], $_POST['tobe_deleted']);


            }


            $car_images_name = $this->car_provider_model->get_car_images_name($user_id[0]['user_id']);

            $data['image_names'] = $car_images_name;
            $this->load->view('car_provider/delete_image',$data);
        }



    }




}

