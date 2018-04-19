<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->lang->load('root_nav',$this->session->site_lang);	
		$this->lang->load('message',$this->session->site_lang);
		$this->lang->load('common_controller',$this->session->site_lang);
	}

	public function index()
	{
		
	}

	public function distance(){
		$from = 'savar, Bangladesh';
		$to = 'pallabi, mirpur, Dhaka, Bangladesh';
		$this->load->model('common_model');
		$ret_val = $this->common_model->get_distance($from, $to,'k');
		var_dump($ret_val);
		exit();

	}

	public function about_us(){
		$this->load->view('gen_views/about_us');
	}

	public function process_contact_message(){
		echo "processing contact message";
	}

	public function download(){
	    $this->load->view('gen_views/download');
    }

	///////// switch session language by user selection from root nav menu default is english /////////////////////
	public function lang_switcher($language = 'english'){

		$lang = $language;
		$this->session->set_userdata('site_lang', $lang);
		redirect(base_url());
		
	}



}

/* End of file common_controller.php */
/* Location: ./application/controllers/common_controller.php */