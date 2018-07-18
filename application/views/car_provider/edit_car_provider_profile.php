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
            <a href="<?php echo base_url('index.php/car_provider/delete_image'); ?>">Delete Image</a>
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
            <?php
                if($has_car){
                    $this->view('car_provider/edit_car_provider_profile_car_only');
                }else{

                }
            ?>




        </div>          
        <!-- /.col-md-6-->

    </div>
    <hr>

    <script>
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        ////////////// address field auto complete using google api /////////////////////////////
        function activateAutoComplete() {

            var input = document.getElementById('car_location');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8oohj-8021FeSfo7Oo9uNcM1w7fmLzWA&libraries=places&callback=activateAutoComplete"></script>

      

<?php $this->view('includes/footer') ?>