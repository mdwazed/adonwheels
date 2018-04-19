<?php 
$this->view('includes/header'); 
?>
<body>
    

    <?php $this->view('includes/root_nav'); ?>
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-8">
           
           
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2><?php echo $this->lang->line('car_demands'); ?></h2>
                <p><?php echo $this->lang->line('car_demand_description'); ?></p>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>" method="POST">

                       

                      
                      <div class="form-group">
                        <label for="car_location" class="col-md-2 control-label"><?php echo $this->lang->line('car_location'); ?></label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="car_location" name="car_location" placeholder="e.g. Darmstadt, germany" required="yes">
                        </div>
                        * required
                      </div>
                      <div class="form-group">
                        <label for="car_make_year" class="col-md-2 control-label"><?php echo $this->lang->line('min_year'); ?></label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="car_make_year" name="car_make_year" placeholder="e.g. 2015">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="space_door" class="col-md-2 control-label"><?php echo $this->lang->line('space_require'); ?></label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="space_door" name="space_door" placeholder="e.g. 900" required="yes">
                        </div>
                        cm²
                      </div>

                     

                      <div class="form-group">
                        <label for="min_price" class="col-md-2 control-label"><?php echo $this->lang->line('max_price'); ?></label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="min_price" name="min_price" placeholder="e.g. 70" required="yes">
                        </div>
                        €/100cm²/month
                      </div>

                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('submit'); ?></button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>           
                            

           
        </div>        
    </div>
    <hr>   

     <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function activateAutoComplete() {     
       
        var input = document.getElementById('car_location');
        var autocomplete = new google.maps.places.Autocomplete(input);      
      }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8oohj-8021FeSfo7Oo9uNcM1w7fmLzWA&libraries=places&callback=activateAutoComplete">        
    </script> 

   

<?php $this->view('includes/footer') ?>