<?php 
$this->view('includes/header'); 
?>
<body>
    

    <?php 
      $this->view('includes/root_nav'); 
      // $this->session->set_userdata('referred_from', current_url());

    ?>

    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-4">

           <div class="alert alert-info">
              <h3><?php echo $this->lang->line('filter_results'); ?></h3>
              
              
            </div>

           <form  action="<?php echo base_url('index.php/advertiser/find_cars'); ?>" method="POST">

                <div class="form-group">
                    <label for="search_location" ><?php echo $this->lang->line('car_location'); ?></label>                
                    <input type="text" class="form-control" id="search_location" name="search_location" placeholder="e.g. Darmstadt" required="yes" value="<?php echo isset($search_location)?$search_location:''; ?>">
                </div>

                <div class="form-group">
                    <label for="max_radius" ><?php echo $this->lang->line('max_redius'); ?></label>                
                    <input type="text" class="form-control" id="max_radius" name="max_radius" placeholder="e.g. 50" required="yes" value="<?php echo isset($max_radius)?$max_radius:''; ?>">
                </div>

                <div class="form-group">
                    <label for="min_year" ><?php echo $this->lang->line('min_year'); ?></label>                
                    <input type="text" class="form-control" id="min_year" name="min_year" placeholder="e.g. 2009" value="<?php echo isset($min_year)?$min_year:''; ?>">
                </div>

                <div class="form-group">
                    <label for="car_color" ><?php echo $this->lang->line('color'); ?></label>                
                    <input type="text" class="form-control" id="car_color name="car_color" placeholder="e.g. white" value="<?php echo isset($car_color)?$car_color:''; ?>">
                </div>

                <div class="form-group">
                    <label for="min_week_run" ><?php echo $this->lang->line('min_weekly_run'); ?></label>                
                    <input type="text" class="form-control" id="min_week_run" name="min_week_run" placeholder="e.g. 400" value="<?php echo isset($min_week_run)?$min_week_run:''; ?>">
                </div>
             

             
              <div class="form-group">
                
                  <button type="submit" class="btn btn-default" name="submit"><?php echo $this->lang->line('submit'); ?></button>
                
              </div>
            </form>

        </div>  
        <!-- /.col-md-4-->

        <div class="col-md-8">

          <div class="alert alert-success">
            <h4>
              <?php 
                if(isset($search_location) && isset($max_radius)){                
                  echo count($all_car).$this->lang->line('cars_found_within') .$max_radius.' km of '.$search_location;
                }else{
                    echo count($all_car).$this->lang->line('cars_found');
                  }

              ?>                
            </h4>                
          </div>

          <div>
            <?php  
              foreach ($car as $row) {
                echo '<div class="panel panel-default">';
                  echo '<div class="panel-body">';
                    echo '<div class= "col-md-6">';

                    echo '<dl class="dl-custom">';
                    echo '<dt>'.$this->lang->line('car_model').'</dt>';    
                    echo '<dd>'.$row['car_model'].'</dd>';
                    echo '</dl>';

                    

                    echo '<dl class="dl-custom">';
                    echo '<dt>'.$this->lang->line('year').'</dt>';    
                    echo '<dd>'.$row['car_make_year'].'</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>'.$this->lang->line('door_space').'</dt>';    
                    echo '<dd>'.$row['space_door'].' Sq cm</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>'.$this->lang->line('parking').'</dt>';    
                    echo '<dd>'.$row['parking_day'].'</dd>';
                    echo '</dl>';

                    echo '</div>';


                    echo '<div class="col-md-6">';

                    echo '<dl class="dl-custom">';
                    echo '<dt>'.$this->lang->line('car_location').'</dt>';    
                    echo '<dd>'.$row['car_location'].'</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>'.$this->lang->line('color').'</dt>';    
                    echo '<dd>'.$row['car_color'].'</dd>';
                    echo '</dl>';

                    

                    echo '<dl class="dl-custom">';
                    echo '<dt>'.$this->lang->line('rear_space').'</dt>';    
                    echo '<dd>'.$row['space_rear'].' Sq cm</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>'.$this->lang->line('weekly_run').'</dt>';    
                    echo '<dd>'.$row['week_run'].' km</dd>';
                    echo '</dl>';

                    
                    
                    echo '</div>';

                  echo '</div>';   ///////// end of panel body div
                  echo '<div class="panel-footer">'; 
                    echo anchor('Advertiser/show_car_details/'.$row['owner_id'], $this->lang->line('details'), 'target="_blank"');
                  echo '</div>'; 

                echo '</div>';  ////// end of panel div
               
              }
            ?>
          </div>

          <div>
            

          </div>

          <div>  <!-- pagination  -->
            <?php 
              echo $pagination;

            ?>
          </div>   <!-- end pagination  -->

            
        </div>  
        <!-- /.col-md-8-->

      


    


    <hr>    
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function activateAutoComplete() {     
       
        var input = document.getElementById('search_location');
        var autocomplete = new google.maps.places.Autocomplete(input);      
      }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8oohj-8021FeSfo7Oo9uNcM1w7fmLzWA&libraries=places&callback=activateAutoComplete">        
    </script>

      

<?php $this->view('includes/footer') ?>