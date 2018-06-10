<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Car_provider_model extends CI_Model {
    	

        function __construct(){
            parent::__construct();

        }



          ///////// store new users car info to db  ///////////////////
        public function save_car(){  

            $data = array();
            $this->load->model('user_model');
            $result = $this->user_model->get_user($_SESSION['user_email']);
            $owner_id = $result[0]['user_id'];


//            print_r($_POST);
            $no_of_sticker = $this->input->post('no_of_sticker');
            $place_of_sticker = $this->input->post('sticker_place');
            $height_of_sticker = $this->input->post('sticker_height');
            $width_of_sticker = $this->input->post('sticker_width');
            $unit_price_of_sticker = $this->input->post('sticker_price');
//            print(sizeof($no_of_sticker));

            for($x=0;$x< sizeof($no_of_sticker); $x++){
                $data_sticker['car_owner_id'] = $owner_id;
                $data_sticker['no_of_sticker'] = $no_of_sticker[$x];
                $data_sticker['place_of_sticker'] = $place_of_sticker[$x];
                $data_sticker['height_of_sticker'] = $height_of_sticker[$x];
                $data_sticker['width_of_sticker'] = $width_of_sticker[$x];
                $data_sticker['unit_price_of_sticker'] = $unit_price_of_sticker[$x];

                if(!$this->db->insert('sticker_on_car',$data_sticker)){
                    return false;
                }
            };



            $data['owner_id'] = $owner_id;
            $data['car_model'] = $this->input->post('car_model');
            $data['car_make'] = $this->input->post('car_make');
            $data['car_make_year'] = $this->input->post('car_make_year');
            $car_location = $this->input->post('car_location');  //// $car_location is used in get_geo_coordinate
            $data['car_location'] = $car_location;
            $data['car_color'] =  $this->input->post('car_color');           
            $data['reg_number'] = $this->input->post('reg_no');
            $data['space_door'] = $this->input->post('space_door');
            $data['space_rear'] = $this->input->post('space_rear');
            $data['min_price'] = $this->input->post('min_price');
            $data['parking_day'] = $this->input->post('parking_day');
            $data['parking_night'] = $this->input->post('parking_night');
            $data['day_run'] = $this->input->post('day_run');
            $data['week_run'] = $this->input->post('week_run');


            $this->load->model('Common_model');
           

            $car_lat_long = $this->Common_model->get_geo_coordinates($car_location);          
            $data['latitude'] = $car_lat_long['latitude'];
            $data['longitude'] = $car_lat_long['longitude'];

            //$data['longitude'] = $this->Common_model->get_longitude($car_location);
            //$data['latitude'] = $this->Common_model->get_latitude($car_location);



//            exit();
            return $this->db->insert('cars',$data);
        }


        ///////// update car info based on car_id //////////////////////////
        public function update_car($car_id){

            $data['car_model'] = $this->input->post('car_model');
            $data['car_make'] = $this->input->post('car_make');
            $data['car_make_year'] = $this->input->post('car_make_year');
            $data['car_color'] = $this->input->post('car_color');
            $data['reg_number'] = $this->input->post('reg_no');
            $data['space_door'] = $this->input->post('space_door');
            $data['space_rear'] = $this->input->post('space_rear');
            $data['min_price'] = $this->input->post('min_price');
            $data['parking_day'] = $this->input->post('parking_day');
            $data['parking_night'] = $this->input->post('parking_night');
            $data['day_run'] = $this->input->post('day_run');
            $data['week_run'] = $this->input->post('week_run');
            
            $this->db->where('id',$car_id);
            return $this->db->update('cars',$data);
        }


        ////////////////// upload car image and save corresponding data to db ///////////////////////////////////
        public function save_car_image(){
            $this->load->helper('string');
            $this->load->model('user_model');
            $result = $this->user_model->get_user($_SESSION['user_email']);
            $new_file_name = $result[0]['user_id']. random_string('alnum',10);
            

            //exit();

            /// /////////set image parameter to be saved   /////////////////////////////
            $config['upload_path']   = './car_images/'; 
            $config['allowed_types'] = 'gif|jpg|png'; 
            $config['max_size']      = 2048000; 
            $config['max_width']     = 1024; 
            $config['max_height']    = 768;
            $config['file_name']     = $new_file_name;  
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image')) {   /////////// upload the image to the target folder
                $data['message'] = array('error' => $this->upload->display_errors()); 
                return $data;
            }

            else {

                //////////////// store car image information to car_images table   ////////////////////
                $data['image_name'] = $this->upload->data('file_name');
                

                $data['owner_id'] = $result[0]['user_id'];
                //$data['image_name'] = $new_file_name;
                $data['remarks'] = 'no remarks';
                $return_value = $this->db->insert('car_images',$data);
                if($this->db->affected_rows() >0){
                    return 1; 
                }else{
                    $data['message'] = 'Problem inserting image data into database'; 
                    return $data;

                }

                 
            }
           
        }

        /////////////////// returns details of a car  /////////////////////////
        public function get_car($owner_id){
            $query = $this->db->get_where('cars', array('owner_id'=> $owner_id));
            $result = $query->result_array();
            return $result;

        }

        /////////// returns details of a car owner sticker /////////
        public function get_sticker($owner_id){
            $query = $this->db->get_where('sticker_on_car', array('car_owner_id'=>$owner_id));
            $result = $query->result_array();
            return $result;
        }



        public function show_car_provider_portfolio(){
            //echo 'car provider portfolio';

            ///////////////////////// get user information from db  /////////////////////////
            $this->load->model('user_model');
            $this->load->helper('date');
            $result = $this->user_model->get_user($_SESSION['user_email']);
            $data['user_name'] = $result[0]['last_name'].' '. $result[0]['first_name'];
            $data['last_name'] = $result[0]['last_name'];
            $data['company'] = $result[0]['company'];
            $data['first_name'] = $result[0]['first_name'];
            $data['user_email'] = $result[0]['user_email'];
            $data['user_address'] = $result[0]['user_address'];
            $data['user_city'] = $result[0]['user_city'];
            $data['country'] = $result[0]['country'];
            $data['user_zip'] = $result[0]['user_zip'];
            $data['user_tel'] = $result[0]['user_tel'];
            $data['user_type'] = $result[0]['user_type'];
            $data['registered_on'] = $result[0]['registered_on'];
            $datestring = '%d %M %Y';
            $time = time($data['registered_on']);
            $data['registered_on'] = mdate($datestring, $time);

            //////////////////////// get car information ////////////////////////////
            $user_id = $result[0]['user_id'];

            $result_car = $this->get_car($user_id);

            ////// get sticker info //////////////
            $result_sticker = $this->get_sticker($user_id);

            if(count($result_car)>0){
                $data['car_found'] = true;
                $data['car_model'] = $result_car[0]['car_model'];
                $data['car_make'] = $result_car[0]['car_make'];
                $data['car_make_year'] = $result_car[0]['car_make_year'];
                $data['car_color'] = $result_car[0]['car_color'];
                $data['car_location'] = $result_car[0]['car_location'];
                $data['reg_number'] = $result_car[0]['reg_number'];
                $data['space_door'] = $result_car[0]['space_door'];
                $data['space_rear'] = $result_car[0]['space_rear'];
                $data['min_price'] = $result_car[0]['min_price'];
                $data['parking_day'] = $result_car[0]['parking_day'];
                $data['parking_night'] = $result_car[0]['parking_night'];
                $data['day_run'] = $result_car[0]['day_run'];
                $data['week_run'] = $result_car[0]['week_run'];
                $data['sticker_info'] = $result_sticker;
            }
            

            ////////////////////////get car images //////////////////////////////
            $this->db->select('image_name');
            $query = $this->db->get_where('car_images',array('owner_id'=>$result[0]['user_id']));
            $result_car_image = $query->result_array();
            $data['car_images'] = $result_car_image;
            //print_r($data['car_images']);
            //exit();
            

            $this->load->view('car_provider/car_provider_portfolio',$data);
        }

        public function update_sticker(){
            $this->load->model('user_model');
            $result = $this->user_model->get_user($_SESSION['user_email']);
            $user_id = $result[0]['user_id'];
        }

        public function delete_sticker($user_id){
            $this -> db -> where('car_owner_id', $user_id);
            return $this -> db -> delete('sticker_on_car');

        }

        public function add_sticker(){
            $this->load->model('user_model');
            $result = $this->user_model->get_user($_SESSION['user_email']);
            $owner_id = $result[0]['user_id'];


            $no_of_sticker = $this->input->post('no_of_sticker');
            $place_of_sticker = $this->input->post('sticker_place');
            $height_of_sticker = $this->input->post('sticker_height');
            $width_of_sticker = $this->input->post('sticker_width');
            $unit_price_of_sticker = $this->input->post('sticker_price');

            for($x=0;$x< sizeof($no_of_sticker); $x++){
                $data_sticker['car_owner_id'] = $owner_id;
                $data_sticker['no_of_sticker'] = $no_of_sticker[$x];
                $data_sticker['place_of_sticker'] = $place_of_sticker[$x];
                $data_sticker['height_of_sticker'] = $height_of_sticker[$x];
                $data_sticker['width_of_sticker'] = $width_of_sticker[$x];
                $data_sticker['unit_price_of_sticker'] = $unit_price_of_sticker[$x];

                if(!$this->db->insert('sticker_on_car',$data_sticker)){
                    return false;
                }
            };
        }

        ///////////  returns array of car image name for a user ////////////
        public function get_car_images_name($car_provider_id){
            $this->db->select('image_name');
            $query = $this->db->get_where('car_images', array('owner_id'=> $car_provider_id));
            $result = $query->result_array();
            return $result;
        }

        ////////// delete car image from db and image folder ////////////
        public function delete_car_image($user_id, $image_name){
            if($this->db->delete('car_images', array('owner_id' => $user_id, 'image_name' => $image_name))){
                unlink($_SERVER['DOCUMENT_ROOT'].'/car_images/'.$image_name);
            }
        }

        
    }
