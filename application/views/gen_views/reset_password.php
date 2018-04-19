

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
            <div>
                <h3>
                  <?php echo $this->lang->line('password_reset_instr'); ?>
                </h3>
            </div>
            <div>
              <form action="<?php echo base_url('index.php/User_controller/reset_password'); ?>" method ="POST">

                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo $this->lang->line('email'); ?></label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                
                
                <button type="submit" class="btn btn-default" name="submit"><?php echo $this->lang->line('submit'); ?></button>
              </form>
          </div> 

        </div>        
    </div>
    <hr>    

   

<?php $this->view('includes/footer') ?>