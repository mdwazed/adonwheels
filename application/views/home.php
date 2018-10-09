<?php 
     if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $this->view('includes/header');     

?>
<body>
<?php $this->view('includes/root_nav'); ?>
<?php //$this->view('includes/carousel'); ?>

    <!-- Page Content -->
    <div class="container">
        <!-- Marketing Icons Section -->

        <div class="row">
            <div class="banner">
                <img class="banner-image" src="<?php echo base_url('images/banner2.png'); ?>" >
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <h1 class="alert alert-info text-center">
                    <?php echo $this->lang->line('welcome'); ?>
                </h1>
            </div>
           
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-money"></i><?php echo $this->lang->line('earn_by_car'); ?></h4>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $common_variable['earn_by_car']; ?></p>
                        <a href="<?php echo base_url('index.php/home/earn_by_car')?>" class="btn btn-default"><?php echo $this->lang->line('learn_more'); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-car"></i><?php echo $this->lang->line('let_your_ad_move'); ?></h4>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $common_variable['let_your_ad_move_around']; ?></p>
                        <a href="<?php echo base_url('index.php/home/let_your_ad_move')?>" class="btn btn-default"><?php echo $this->lang->line('learn_more'); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-briefcase"></i><?php echo $this->lang->line('terms_condition'); ?></h4>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $common_variable['terms_condition']; ?></p>
                        <a href="<?php echo base_url('index.php/home/terms_condition')?>" class="btn btn-default"><?php echo $this->lang->line('learn_more'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

<?php $this->view('includes/footer'); ?>
