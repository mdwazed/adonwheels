<?php 
$this->view('includes/header'); 
?>
<body>
    

    <?php $this->view('includes/root_nav'); ?>
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="page-header">
            <h3><?php echo $this->lang->line('edit_portfolio'); ?></h3>
            <a href="<?php echo base_url('index.php/car_provider/edit_sticker'); ?>">Edit sticker</a>
            <a href="">Delete Image</a>
        </div>

        <div class="col-md-6">  
            <h4><?php echo $this->lang->line('edit_user_info'); ?></h4>
            <form class="form-horizontal" action="<?php echo base_url('index.php/car_provider/edit_car_provider_profile'); ?>" method ="POST">

              <div class="form-group">
                <label for="last_name" class="col-md-2 control-label"><?php echo $this->lang->line('last_name'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required="yes" value="<?php echo $last_name; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="first_name" class="col-md-2 control-label"><?php echo $this->lang->line('first_name'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required="yes" value="<?php echo $first_name; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="user_address" class="col-md-2 control-label"><?php echo $this->lang->line('address'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_address" name="user_address" placeholder="Address" required="yes" value="<?php echo $user_address; ?>">
                </div>                
              </div>

              <div class="form-group">
                <label for="user_city" class="col-md-2 control-label"><?php echo $this->lang->line('city'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_city" name="user_city" placeholder="City" required="yes" value="<?php echo $user_city; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="user_zip" class="col-md-2 control-label"><?php echo $this->lang->line('zip_code'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_zip" name="user_zip" placeholder="Zip Code" required="yes" value="<?php echo $user_zip; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="user_country" class="col-md-2 control-label"><?php echo $this->lang->line('country'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_country" name="user_country" placeholder="Country" required="yes" value="<?php echo $country; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="user_tel" class="col-md-2 control-label"><?php echo $this->lang->line('tel'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_tel" name="user_tel" placeholder="Telephone " required="yes" value="<?php echo $user_tel; ?>">
                </div>
              </div>

              

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default" name = "save_user_info"><?php echo $this->lang->line('submit'); ?></button>
                </div>
              </div>
            </form>

        </div>          
        <!-- /.col-md-6-->


        <div class="col-md-6">  
            <h4><?php echo $this->lang->line('edit_car_info'); ?></h4> 
            <form class="form-horizontal" action="<?php echo base_url('index.php/car_provider/edit_car_provider_profile'); ?>" method="POST">
                <?php echo form_hidden('car_id', $car_id); ?>

                <div class="form-group">
                    <label for="car_model" class="col-md-3 control-label"><?php echo $this->lang->line('car_model'); ?></label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="car_model" name="car_model" placeholder="e.g. Honda Insight" required="yes" value="<?php echo $car_model; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="car_make" class="col-md-3 control-label"><?php echo $this->lang->line('car_make'); ?></label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="car_make" name="car_make" placeholder="e.g. Toyota" required="yes" value="<?php echo $car_make; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="car_make_year" class="col-md-3 control-label"><?php echo $this->lang->line('year'); ?></label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="car_make_year" name="car_make_year" placeholder="e.g. 2015" required="yes" value="<?php echo $car_make_year; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="car_color" class="col-md-3 control-label"><?php echo $this->lang->line('color'); ?></label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="car_color" name="car_color" placeholder="e.g. white" value="<?php echo $car_color; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="reg_no" class="col-md-3 control-label"><?php echo $this->lang->line('registration'); ?></label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="reg_no" name="reg_no" placeholder="" required="yes" value="<?php echo $reg_number; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="space_door" class="col-md-3 control-label"><?php echo $this->lang->line('door_space'); ?></label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="space_door" name="space_door" placeholder="e.g. 900" required="yes" value="<?php echo $space_door; ?>">
                    </div>
                    square centemeter
                </div>

                <div class="form-group">
                    <label for="space_rear" class="col-md-3 control-label"><?php echo $this->lang->line('rear_space'); ?></label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="space_rear" name="space_rear" placeholder="e.g. 3600" required="yes" value="<?php echo $space_rear; ?>">
                    </div>
                    square centemeter
                </div>

                <div class="form-group">
                    <label for="min_price" class="col-md-3 control-label"><?php echo $this->lang->line('minimum_price'); ?></label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="min_price" name="min_price" placeholder="e.g. 3600" required="yes" value="<?php echo $min_price; ?>">
                    </div>
                    €/100cm²/month
                </div>


                <div class="form-group">
                    <label for="parking_day" class="col-md-3 control-label"><?php echo $this->lang->line('day_parking'); ?></label>
                    <div class="col-md-6">
                      <!-- <select class="form-control" id="parking_day" name="parking_day"> -->
                        <?php 
                            $tags = array(
                                'class' => 'form-control',
                                'id' => 'parking_day'
                            );
                            $options = array(
                                'garrage' => 'Garrage',
                                'road_side' => 'Road side'
                            );

                            if($parking_day === 'garrage')
                            {
                                echo form_dropdown('parking_day',$options,'garrage',$tags);
                            }elseif ($parking_day === 'road_side') {
                                echo form_dropdown('parking_day',$options,'road_side',$tags);
                            }


                        ?>
                      <!--   <option value="garrage">Garrage</option>
                        <option value="road_side">Road side</option>                   
                      </select> -->                  
                    </div>
                </div>


              <!-- <div class="form-group">
                <label for="parking_night" class="col-md-2 control-label">Night time parking</label>
                <div class="col-md-6">
                  <select class="form-control" id="parking_night" name="parking_night">
                    <option value="garrage">Garrage</option>
                    <option value="road_side">Road side</option>                   
                  </select>                  
                </div>
              </div> -->
                <div class="form-group">
                    <label for="parking_night" class="col-md-3 control-label"><?php echo $this->lang->line('night_parking'); ?></label>
                    <div class="col-md-6">
                   
                        <?php 
                            $tags = array(
                                'class' => 'form-control',
                                'id' => 'parking_night'
                            );
                            $options = array(
                                'garrage' => 'Garrage',
                                'road_side' => 'Road side'
                            );

                            if($parking_night === 'garrage')
                            {
                                echo form_dropdown('parking_night',$options,'garrage',$tags);
                            }elseif ($parking_night === 'road_side') {
                                echo form_dropdown('parking_night',$options,'road_side',$tags);
                            }


                        ?>                             
                    </div>
                </div>


                <div class="form-group">
                    <label for="day_run" class="col-md-3 control-label"><?php echo $this->lang->line('day_run'); ?></label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="day_run" name="day_run" placeholder="e.g. 100" required="yes" value="<?php echo $day_run; ?>">
                    </div>
                    Kilometer
                </div>

                <div class="form-group">
                    <label for="week_run" class="col-md-3 control-label"><?php echo $this->lang->line('week_run'); ?></label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="week_run" name="week_run" placeholder="e.g. 500" required="yes" value="<?php echo $week_run; ?>">
                    </div>
                    Kilometer
                </div>


              
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                      <button type="submit" class="btn btn-default" name="save_car_info"><?php echo $this->lang->line('submit'); ?></button>
                    </div>
                </div>
            </form>


        </div>          
        <!-- /.col-md-6-->

    </div>
    <hr>    

      

<?php $this->view('includes/footer') ?>