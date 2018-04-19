<?php 
$this->view('includes/header'); 
?>
<body>
    

    <?php $this->view('includes/root_nav'); ?>
    
    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   
                </h1>

                

            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-money"></i><?php echo $this->lang->line('earn_by_car'); ?></h4>
                    </div>
                    <div class="panel-body text-justify">
                        <p><?php echo $common_variable['earn_by_car']; ?></p>
                       
                    </div>
                </div>
                <div>
                    <a class="btn btn-lg btn-default" href="<?php echo base_url(); ?>"><?php echo $this->lang->line('back'); ?></a>
                </div>
            </div>
            
        </div>
        <!-- /.row -->

        

        

        <hr>

      

<?php $this->view('includes/footer') ?>