<?php 
$this->view('includes/header'); 
?>
<body>
    

    <?php $this->view('includes/root_nav'); ?>
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-10">
           
            <div class="alert alert-success" role="alert">
             <h2><?php echo $this->lang->line('portfolio_of').$user_data['first_name'].' '.$user_data['last_name']; ?></h2>
            </div>  
              
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $this->lang->line('pers_info'); ?></h3>
                </div>
                <div class="panel-body">
                    <dl class="dl-custom">
                        <dt> <?php echo $this->lang->line('email'); ?></dt>
                        <dd> <?php echo $user_data['user_email']; ?></dd>
                    </dl>
                    <dl class="dl-custom">
                        <dt> <?php echo $this->lang->line('address'); ?></dt>
                        <dd> <?php echo $user_data['user_address']; ?></dd>
                    </dl>
                    <dl class="dl-custom">
                        <dt><?php echo $this->lang->line('city'); ?></dt>
                        <dd> <?php echo $user_data['user_city']; ?></dd>
                    </dl>
                    <dl class="dl-custom">
                        <dt> <?php echo $this->lang->line('country'); ?></dt>
                        <dd> <?php echo $user_data['country']; ?></dd>
                    </dl>
                    <dl class="dl-custom">
                        <dt><?php echo $this->lang->line('zip_code'); ?></dt>
                        <dd> <?php echo $user_data['user_zip']; ?></dd>
                    </dl>
                    <dl class="dl-custom">
                        <dt><?php echo $this->lang->line('tel'); ?></dt>
                        <dd> <?php echo $user_data['user_tel']; ?></dd>
                    </dl>
                    
                    <dl class="dl-custom">
                        <dt><?php echo $this->lang->line('member_since'); ?></dt>
                        <dd> <?php echo $user_data['registered_on']; ?></dd>
                    </dl>
                </div>
            </div>           
            
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Active contract</h3>
                </div>
                <div class="panel-body">
                    <dl class="dl-custom">
                        <dt> <?php echo 'No data to show yet'; ?></dt>
                       <!--  <dd> <?php echo $user_data['user_address']; ?></dd> -->
                    </dl>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Pending contract</h3>
                </div>
                <div class="panel-body">
                    <dl class="dl-custom">
                        <dt> <?php echo 'No data to show yet'; ?></dt>
                        <!-- <dd> <?php echo $user_data['user_address']; ?></dd> -->
                    </dl>
                </div>
            </div>

           
        </div>        
    </div>
    <hr>    

   

<?php $this->view('includes/footer') ?>