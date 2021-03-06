<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class User_model extends CI_Model {
    	

        function __construct(){
            parent::__construct();

        }
        ///// save user info to db from registration  page
        public function save_user(){
            $data = array();
            $data['last_name'] = $this->input->post('last_name');
            $data['first_name'] = $this->input->post('first_name');
            $data['user_email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            $data['user_address'] = $this->input->post('user_address');
            $data['user_city'] = $this->input->post('user_city');
            $data['user_zip'] = $this->input->post('user_zip');
            $data['country'] = $this->input->post('user_country');
            $data['user_type'] = $this->input->post('user_type');
            $data['user_tel'] = $this->input->post('user_tel');
            $data['email_verified'] = 0;

            $this->db->select('user_email');
            $query = $this->db->get_where('users',array('user_email'=>$data['user_email']));
            $row_count = $query->num_rows();
            if($row_count > 0){
                
                $data_message['message'] = 'This email is already in use. Try forgot password to recover your login credential, if this email belongs to you.';
                $this->load->view('gen_views/success_message', $data_message);
                //var_dump($data_message);
            }else{
                return $this->db->insert('users',$data)  ;                  
            }            
        }

        public function user_fb_login($email){
            $return_value = 0;
            $this->db->select('user_email');
            $query = $this->db->get_where('users', array('user_email'=> $email,'email_verified'=>1));
            $result = $query->result_array();         
            $num_of_rows = $query->num_rows();
            if($num_of_rows == 1){                
                $_SESSION['user_email'] = $email; //////// set usr email as session var
                $_SESSION['user_type'] = $this->get_user_type($email); //////// set user type as session var
                $_SESSION['user_logged_in'] = 1;
                $_SESSION['user_fb_logged_in'] = True;
                $return_value = 1;                
            }else{
                $return_value = 0;
            }

            return $return_value;
        }

        public function user_login(){
            $return_value = 0;
            
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $this->db->select('user_email, password');
            $query = $this->db->get_where('users', array('user_email'=> $email,'email_verified'=>1));
            $result = $query->result_array();
            //var_dump($result);
            //echo $result[0]['user_email'];
         
            $num_of_rows = $query->num_rows();
            if($num_of_rows == 1){
                if($password == $result[0]['password']){
                    $_SESSION['user_email'] = $email; //////// set usr email as session var
                    $_SESSION['user_type'] = $this->get_user_type($email); //////// set user type as session var
                    $_SESSION['user_logged_in'] = 1;
                    $return_value = 1;
                }else{
                    $return_value = 0;
                }
            }else{
                $return_value = 0;
            }

            return $return_value;
        }

        public function get_user_type($email){
            $this->db->select('user_type');
            $this->db->where('user_email', $email);
            $query = $this->db->get('users');
            $query_result = $query->result_array();
            $user_type = $query_result[0]['user_type'];
            return $user_type;
            //exit();
        }

        ////// returns user deatils info 
        public function get_user($email){
            $query = $this->db->get_where('users', array('user_email'=> $email));
            $result = $query->result_array();
            return $result;

        }

        public function get_all_user(){
            $this->db->order_by('last_name','asc');
            $query = $this->db->get('users');
            return $query->result_array();

        }

        ////// returns user deatils info 
        public function get_logged_in_user_data(){
            $email = $_SESSION['user_email'];
            $query = $this->db->get_where('users', array('user_email'=> $email));
            $result = $query->result_array();
            return $result[0];

        }

        public function get_logged_in_user_id()
        {
            $this->db->select('user_id');
            $query = $this->db->get_where('users', array('user_email'=> $_SESSION['user_email']));
            $result = $query->result_array();
            return $result; //return user id as array extract before use//
        }

        public function update_user($user_id)
        {
            $data = array();
            $data['last_name'] = $this->input->post('last_name');
            $data['first_name'] = $this->input->post('first_name');
            $data['user_address'] = $this->input->post('user_address');
            $data['user_city'] = $this->input->post('user_city');
            $data['user_zip'] = $this->input->post('user_zip');
            $data['country'] = $this->input->post('user_country');

            $this->db->where('user_id',$user_id);
            return $this->db->update('users',$data);
        }

        public function update_advertiser($user_id)
        {
            $data = array();
            $data['company'] = $this->input->post('company');
            $data['last_name'] = $this->input->post('last_name');
            $data['first_name'] = $this->input->post('first_name');
            $data['user_address'] = $this->input->post('address');
            $data['user_city'] = $this->input->post('city');
            $data['user_zip'] = $this->input->post('zip_code');
            $data['country'] = $this->input->post('country');
            $data['user_tel'] = $this->input->post('telephone');

            $this->db->where('user_id',$user_id);
            return $this->db->update('users',$data);
        }

        public function update_password($email, $password){
            $data['password'] = $password;
            $this->db->where('user_email', $email);
            return $this->db->update('users',$data);

        }

        public function get_user_by_id($id){
            $this->db->where('user_id', $id);
            $query = $this->db->get('users');
            return $query->result_array();
        }

        public function add_user_activation_code($email, $activation_code){
            $this->db->set('activation_code', $activation_code);
            $this->db->where('user_email', $email);
            $this->db->update('users');

        }

        public function set_email_verify_true($email){
            $this->db->set('email_verified', 1);
            $this->db->where('user_email', $email);
            if($this->db->update('users')){
                return TRUE;
            }else{
                return FALSE;
            }

        }

        public function add_advertisers_logo($user_id, $file_name){

            $this->db->set('company_logo', $file_name);
            $this->db->where('user_id', $user_id);
            if($this->db->update('users')){
                return true;
            }else{
                return false;
            }

        }

        public function delete_user($id){
            $this->db->delete('users', array('user_id' => $id));
        }

    }
?>