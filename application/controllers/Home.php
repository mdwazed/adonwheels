<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['site_lang'])){
			$this->session->set_userdata('site_lang','deutsche');
		}

		$this->lang->load('home',$this->session->site_lang);
		$this->lang->load('root_nav',$this->session->site_lang);

	}


	public function index()
	{
		//echo phpinfo();
		//exit();
		

		$this->load->model('common_var');

		//$this->Model_name->function();
		//$this->load->model('common_var');
		$data = array();
		//$data['welcome'] = $this->lang->line('welcome');
		/*$data['home'] = $this->lang->line('home');
		$data['car_provider'] = $this->lang->line('car_provider');
		$data['advertiser'] = $this->lang->line('advertiser');
		$data['about_us'] = $this->lang->line('about_us');
		$data['language'] = $this->lang->line('language');
		$data['login'] = $this->lang->line('login');
		$data['earning_possibility'] = $this->lang->line('earning_possibility');
		$data['add_a_car'] = $this->lang->line('add_a_car');
		$data['upload_car_photo'] = $this->lang->line('upload_car_photo');
		$data['portfolio'] = $this->lang->line('portfolio');
		$data['find_cars'] = $this->lang->line('find_cars');
		$data['demand_for_cars'] = $this->lang->line('demand_for_cars');*/

		if($this->session->site_lang == 'english'){
			$data['common_variable'] = $this->common_var->get_home_var_min_english();
		}elseif($this->session->site_lang == 'deutsche'){
			$data['common_variable'] = $this->common_var->get_home_var_min_deutsche();
		}

		$this->load->view('home',$data);
	}

	
	public function earn_by_car()
	{
		$this->load->model('common_var');
		$data = array();
		if($this->session->site_lang == 'english'){
			$data['common_variable'] = $this->common_var->get_home_var_english();
			// $data['earn_by_car'] = $
		}elseif($this->session->site_lang == 'deutsche'){
			$data['common_variable'] = $this->common_var->get_home_var_deutsche();
		}
		//$this->load->view('includes/header');
		$this->load->view('gen_views/earn_by_car',$data);		
		
	}

	public function let_your_ad_move()
	{
		$this->load->model('common_var');
		$data = array();
		if($this->session->site_lang == 'english'){
			$data['common_variable'] = $this->common_var->get_home_var_english();
		}elseif($this->session->site_lang == 'deutsche'){
			$data['common_variable'] = $this->common_var->get_home_var_deutsche();
		}
		//$this->load->view('includes/header');
		$this->load->view('gen_views/let_your_ad_move',$data);		
		
	}

	public function terms_condition()
	{
		$this->load->model('common_var');
		$data = array();
		if($this->session->site_lang == 'english'){
			$data['common_variable'] = $this->common_var->get_home_var_english();
		}elseif($this->session->site_lang == 'deutsche'){
			$data['common_variable'] = $this->common_var->get_home_var_deutsche();
		}
		//$this->load->view('includes/header');
		$this->load->view('gen_views/terms_condtion',$data);		
		
	}

	public function show_message($message)
	{
		$data['message'] = $message;
		$this->load->view('gen_views/success_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */