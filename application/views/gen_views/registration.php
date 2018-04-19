<?php 
$this->view('includes/header'); 
?>
<body>
    

    <?php $this->view('includes/root_nav'); ?>
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-8">
           
              <div class="page-header">
                <h1><?php echo $this->lang->line('user_registration'); ?></h1>
              </div>              
            

           <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/User_controller/save_user" method ="POST">

              <div class="form-group">
                <label for="last_name" class="col-md-2 control-label"><?php echo $this->lang->line('last_name'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="first_name" class="col-md-2 control-label"><?php echo $this->lang->line('first_name'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-md-2 control-label"><?php echo $this->lang->line('email'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="password" class="col-md-2 control-label"><?php echo $this->lang->line('password'); ?></label>
                <div class="col-md-6">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="yes">
                </div>                
              </div>

              <div class="form-group">
                <label for="user_address" class="col-md-2 control-label"><?php echo $this->lang->line('address'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_address" name="user_address" placeholder="Address" required="yes">
                </div>                
              </div>

              <div class="form-group">
                <label for="user_city" class="col-md-2 control-label"><?php echo $this->lang->line('city'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_city" name="user_city" placeholder="City" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="user_zip" class="col-md-2 control-label"><?php echo $this->lang->line('zip_code'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_zip" name="user_zip" placeholder="Zip Code" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="user_country" class="col-md-2 control-label"><?php echo $this->lang->line('country'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_country" name="user_country" placeholder="Country" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="user_tel" class="col-md-2 control-label"><?php echo $this->lang->line('telephone'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_tel" name="user_tel" placeholder="Country" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="user_type" class="col-md-2 control-label"><?php echo $this->lang->line('user_type'); ?></label>
                <div class="col-md-6">
                  <select class="form-control" id="user_type" name="user_type">
                    <option value="1"><?php echo $this->lang->line('car_provider'); ?></option>
                    <option value="2"><?php echo $this->lang->line('advertiser'); ?></option>
                                       
                  </select>
                  
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default"><?php echo $this->lang->line('submit'); ?></button>
                </div>
              </div>
            </form>
        </div>
          
        <!-- /.col-md-8-->

        <div class="col-md-4"> 
          <div class="page-header">
            <h1><?php echo $this->lang->line('user_login'); ?></h1>
          </div> 
          <div>
              <form action="<?php echo base_url(); ?>index.php/User_controller/login" method ="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo $this->lang->line('email'); ?></label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"><?php echo $this->lang->line('password'); ?></label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                
                <button type="submit" class="btn btn-default"><?php echo $this->lang->line('submit'); ?></button>
              </form>
          </div> 
          <a href="<?php echo base_url('index.php/user_controller/reset_password'); ?>"><?php echo $this->lang->line('forgot_password'); ?></a>
        </div>
    </div>
    <hr>    

      

<?php $this->view('includes/footer') ?>