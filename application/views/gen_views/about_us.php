<?php 
$this->view('includes/header'); 
?>
<body>
    

    <?php $this->view('includes/root_nav'); ?>
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-4">
            <div class= "panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo $this->lang->line('about_us'); ?></h4>
                </div>
                <div class="panel-body">
                    <h4>AD on Wheels</h4>
                    <?php echo $this->lang->line('address'); ?>
                </div>
            </div>
            
        </div>
        <div class="col-md-8">
           
            <div class= "panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo $this->lang->line('contact_us'); ?></h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo base_url('index.php/Common_controller/process_contact_message'); ?>" method ="POST">

              <div class="form-group">
                <label for="full_name" class="col-md-2 control-label"><?php echo $this->lang->line('full_name'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-md-2 control-label"><?php echo $this->lang->line('email'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="message" class="col-md-2 control-label"><?php echo $this->lang->line('message'); ?></label>
                <div class="col-md-10">
                  <textarea class="form-control" id="message" name="message" rows="4" required="yes"></textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default"><?php echo $this->lang->line('submit'); ?></button>
                </div>
              </div>
            </form>
                </div>
            </div>  
        </div>         

    <hr>

<?php $this->view('includes/footer') ?>