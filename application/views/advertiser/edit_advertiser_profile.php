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
    <div class="col-md-6">

        <div class="alert alert-info">
            <h3>Edit personal information</h3>
        </div>

        <form  action="<?php echo base_url('index.php/advertiser/edit_logged_in_advertiser_profile'); ?>" method="POST">
            <div class="form-group">
                <label for="company" ><?php echo $this->lang->line('company'); ?></label>
                <input type="text" class="form-control" id="company " name="company" required="yes" value="<?php echo isset($user_data['company'])?$user_data['company']:''; ?>">
            </div>
            <div class="form-group">
                <label for="first_name" ><?php echo $this->lang->line('first_name'); ?></label>
                <input type="text" class="form-control" id="first_name" name="first_name"  required="yes" value="<?php echo isset($user_data['first_name'])?$user_data['first_name']:''; ?>">
            </div>
            <div class="form-group">
                <label for="last_name" ><?php echo $this->lang->line('last_name'); ?></label>
                <input type="text" class="form-control" id="last_name" name="last_name"  required="yes" value="<?php echo isset($user_data['first_name'])?$user_data['last_name']:''; ?>">
            </div>
            <div class="form-group">
                <label for="address" ><?php echo $this->lang->line('address'); ?></label>
                <input type="text" class="form-control" id="address" name="address"  required="yes" value="<?php echo isset($user_data['user_address'])?$user_data['user_address']:''; ?>">
            </div>
            <div class="form-group">
                <label for="city" ><?php echo $this->lang->line('city'); ?></label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo isset($user_data['user_city'])?$user_data['user_city']:''; ?>">
            </div>
            <div class="form-group">
                <label for="country" ><?php echo $this->lang->line('country'); ?></label>
                <input type="text" class="form-control" id="country" name="country"  value="<?php echo isset($user_data['country'])?$user_data['country']:''; ?>">
            </div>
            <div class="form-group">
                <label for="zip_code" ><?php echo $this->lang->line('zip_code'); ?></label>
                <input type="text" class="form-control" id="zip_code" name="zip_code"  value="<?php echo isset($user_data['user_zip'])?$user_data['user_zip']:''; ?>">
            </div>
            <div class="form-group">
                <label for="telephone" ><?php echo $this->lang->line('tel'); ?></label>
                <input type="text" class="form-control" id="telephone" name="telephone"  value="<?php echo isset($user_data['user_tel'])?$user_data['user_tel']:''; ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default" name="submit"><?php echo $this->lang->line('submit'); ?></button>
            </div>
        </form>

    </div>
    <!-- /.col-md-4-->







<?php $this->view('includes/footer') ?>