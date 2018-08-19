<?php
$this->view('includes/header');
?>
<body>


<?php $this->view('includes/root_nav'); ?>
    <hr>
    <!-- Page Content -->
<div class="container">
    <div class="col-md-8">
        <div class="alert alert-success" role="alert">
            <h2><?php echo $this->lang->line('ep_earning_possibilities'); ?></h2>
        </div>



                <?php
                    foreach ($car_demands as $car_demand){
                        echo '<div class="panel panel-default">';
                        echo '<div class="panel-body">';
                        echo '<div class= "col-md-6">';


                        echo '<dl class="dl-custom">';
                        echo '<dt>'.$this->lang->line('ep_company').'</dt>';
                        echo '<dd>'.$car_demand['user_company'].'</dd>';
                        echo '</dl>';

                        echo '<dl class="dl-custom">';
                        echo '<dt>'.$this->lang->line('ep_no_of_car').'</dt>';
                        echo '<dd>'.$car_demand['no_of_car'].'</dd>';
                        echo '</dl>';

                        echo '<dl class="dl-custom">';
                        echo '<dt>'.$this->lang->line('ep_loc').'</dt>';
                        echo '<dd>'.$car_demand['loc'].'</dd>';
                        echo '</dl>';

                        echo '<dl class="dl-custom">';
                        echo '<dt>'.$this->lang->line('ep_earning').'</dt>';
                        echo '<dd>'.$car_demand['earning'].' '.'euro/100 qcm/month</dd>';
                        echo '</dl>';

                        echo '<dl class="dl-custom">';
                        echo '<dt>'.$this->lang->line('ep_space').'</dt>';
                        echo '<dd>'.$car_demand['space_reqr'].' '.'qcm/auto</dd>';
                        echo '</dl>';

                        echo "</div>";
                        echo '<div class= "col-md-6">';
                        echo '<img style="max-width: 70%;" align= "right" src="'. base_url('coy_logos/12.jpg').'" alt="logo">';
                        echo "</div></div></div>";

                    }
                ?>

        <hr>
    </div>

<?php $this->view('includes/footer') ?>