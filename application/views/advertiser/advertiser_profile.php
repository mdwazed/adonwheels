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
                    <div class= col-md-8>
                        <dl class="dl-custom">
                            <dt> <?php echo $this->lang->line('company'); ?></dt>
                            <dd> <?php echo $user_data['company']; ?></dd>
                        </dl>
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
                    <div class="col-md-4">
                        <img style="max-width: 100%;" src="<?php echo base_url('coy_logos/'. $user_data['user_id'].'.jpg'); ?>" alt="logo">
                        <?php echo form_open_multipart(base_url('index.php/advertiser/upload_logo'));?>
                        <input type="file" name="logo" size="20" />
                        <input type="submit" value="upload" />
                        </form>

                    </div>

                </div>
            </div>           
            
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $this->lang->line('active_contract'); ?></h3>
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
                    <h3 class="panel-title"><?php echo $this->lang->line('pending_contract'); ?></h3>
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