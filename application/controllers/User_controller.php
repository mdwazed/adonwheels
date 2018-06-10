<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// all function related to common user goes here /////

class User_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->lang->load('root_nav',$this->session->site_lang);
		$this->lang->load('user_controller',$this->session->site_lang);
		$this->lang->load('message',$this->session->site_lang);
	}


	public function index(){

		
	}
	
	public function registration(){
		//echo "registration";
		$this->load->view('gen_views/registration');
	}


	/// //////store user information to db from registration page  ///////////////////
	public function save_user(){
		//var_dump($_POST);
		$this->load->helper('string');
		$this->load->model('User_model');
		$this->load->model('Common_model');

		$ret_val = $this->User_model->save_user();
		if($ret_val != 1){
			$data['message'] = $this->lang->line('user_creation_failed');
		}else{
			$email = $this->input->post('email');
			$email_data['mail_to'] = $email;
			$activation_code = random_string('alnum', 16);
			$activation_link = $email.'/'.$activation_code;
			$email_data['subject'] = $this->lang->line('email_verification_mail_subj');
			$email_data['message'] = $this->lang->line('email_verification_mail_body_part1').base_url("index.php/User_controller/activate_account/".$activation_link).$this->lang->line('email_verification_mail_body_part2');

			if($this->Common_model->send_mail($email_data)){
				$data['message'] = $this->lang->line('user_creation_success');
				////////////////////////////
				/*
				code to add the activation code in the application goes here
				*/
				$this->User_model->add_user_activation_code($email, $activation_code);

				/////////////////////////////
			}else{
			    /////////// add code to remove the added user in db
                $this->User_model->remove_user($email);
				$data['message'] = $this->lang->line('user_creation_failed');
			}
			
		}
		
		$this->load->view('gen_views/success_message', $data);		
	}

	public function login(){

		// user type 
		// car provider-1
		// advertijser-2
		// admin-3

		$this->load->model('User_model');
		if($this->User_model->user_login()){
			if($_SESSION['user_type'] == 3){
				$data['message'] = $this->lang->line('login_successful').'</br><h3>'.anchor('admin_controller/show_dashboard',' Admin Dashboard ').'</h3><h4>'.anchor('User_controller/change_password',' Change password ').'</h4>';
			}elseif($_SESSION['user_type'] == 2){
				$data['message'] = $this->lang->line('login_successful').'</br>'. anchor('home',' Home ').'<br>'.anchor('advertiser/show_logged_in_advertiser_profile',' Profile ').'<h4>'.anchor('User_controller/change_password',' Change password ').'</h4>';
			}else{
				$data['message'] = $this->lang->line('login_successful').'</br>'. anchor('home',' Home ').'<br>'.anchor('car_provider/show_car_provider_portfolio',' Profile ').'<h4>'.anchor('User_controller/change_password',' change password ').'</h4>';
			}
			
		}else{
			$data['message'] = $this->lang->line('login_failed');
		}
		$this->load->view('gen_views/success_message', $data);

	}

	public function log_out(){
		session_destroy();
		redirect('/user_controller/registration','refresh');
	}



	/////////////// generate a random password  and send by email if requested through forgot password/////////////
	public function reset_password(){
		//echo 'resetting password';
		if(!isset($_POST['submit'])){
			$this->load->view('gen_views/reset_password');
		}else{
			$email = $this->input->post('email');
			$this->load->model('User_model');
			$this->load->model('Common_model');
			$ret_val = $this->User_model->get_user($email);
			//var_dump($ret_val);
			if(count($ret_val)==1){
				$this->load->helper('string');
				$random_password = random_string('alnum', 8);
				$data['mail_to'] = $ret_val[0]['user_email'];
				//$data['mail_from'] = 'admin@adonwheels.com';
				$data['subject'] = $this->lang->line('password_reset_email_subj');
				$data['message'] = $this->lang->line('password_reset_email_body_1st_part').$random_password.$this->lang->line('password_reset_email_body_2nd_part');
				//$data['message'] = '<h1>Your passowrd has been reset at Ad on Wheels</h1><p>You have requested for resetting your login credential. Your password has been reset. this is a randomly generated password. Please change the password as soon as possible.Your new passowrd is:</p>'.$random_password.'<p>Best regards</p><p>Ad on wheels team</p>';

				
				if($this->User_model->update_password($email,md5($random_password))){
					if($this->Common_model->send_mail($data)){
						$data['message'] = $this->lang->line('msg_passwd_reset_mail_sent');
						$this->load->view('gen_views/success_message', $data);
					}
				}
				
			}
		}		

	}

	////////////// change passowrd on users request  /////////////////////////
	public function change_password(){
		//echo 'change password';
		if(!isset($_POST['submit'])){
			$this->load->view('gen_views/change_password');
		}else{
			echo 'submitted';
			$email = $_SESSION['user_email'];
			$this->load->model('User_model');
			$ret_val = $this->User_model->get_user($email);
			$old_passowrd = md5($this->input->post('old_password'));
			$new_password_1 = md5($this->input->post('new_password_1'));
			$new_password_2 = md5($this->input->post('new_password_2'));
			if($old_passowrd === $ret_val[0]['password']){
				if($new_password_1 === $new_password_2){
					if($this->User_model->update_password($email, $new_password_1)){
						$data['message'] = $this->lang->line('password_change_success');
						
					}else{
						$data['message'] = $this->lang->line('password_change_fail');

					}
					$this->load->view('gen_views/success_message',$data);
				}else{
					$data['error_message'] = $this->lang->line('new_password_mismatch_error');
					$this->load->view('gen_views/change_password', $data);
				}
			}else{
				$data['error_message'] = $this->lang->line('old_password_mismatch_error');
				$this->load->view('gen_views/change_password', $data);
			}
		}
	}



	public function activate_account(){
		$email = $this->uri->segment(3);
		$code = $this->uri->segment(4);

		$this->load->model('User_model');
		$user_data = $this->User_model->get_user($email);

		if($code == $user_data[0]['activation_code']){
			if($this->User_model->set_email_verify_true($email)){
				$data['message'] = 'Your Email verification is successful. You can log in to the system';
			}else{
				$data['message'] = 'email verification internal error. Pl contact "Ad on wheels"';
			}
		}else{
			$data['message'] = 'Could not verify your email.';
		}

		$this->load->view('gen_views/success_message', $data);

	}

	
}