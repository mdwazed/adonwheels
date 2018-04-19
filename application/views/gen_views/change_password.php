

<!-- reset the password of user to a auto generated password if user forget password -->

<?php 
$this->view('includes/header'); 
?>
<body>
    

    <?php $this->view('includes/root_nav'); ?>
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-8">
            <div class="alert alert-info">
                <h3>Provide your old password and new password</h3>
                <?php
                  
                    if(isset($error_message)){
                      echo '<h4>'.$error_message.'</h4>';
                    }
                    
                  
                ?>
            </div>
            <div>
              <form action="<?php echo base_url('index.php/User_controller/change_password'); ?>" method ="POST">

                <div class="form-group">
                  <label for="old_password">Old Password</label>
                  <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
                </div>

                <div class="form-group">
                  <label for="new_password_1">New Password</label>
                  <input type="password" class="form-control" id="new_password_1" name="new_password_1" placeholder="New Password">
                </div>

                <div class="form-group">
                  <label for="new_password_2">New Password</label>
                  <input type="password" class="form-control" id="new_password_2" name="new_password_2" placeholder="New Password">
                </div>
                
                
                <button type="submit" class="btn btn-default" name="submit">Submit</button>
              </form>
          </div> 

        </div>        
    </div>
    <hr>    

   

<?php $this->view('includes/footer') ?>