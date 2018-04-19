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
                        <h3><i class="fa fa-fw"></i><?php echo $this->lang->line('add_car_instr_heading'); ?></h3>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $add_car_instr; ?></p>
                       
                    </div>
                </div>
                <div>
                    <a class="btn btn-lg btn-default" href="<?php echo base_url('index.php/car_provider/add_car'); ?>"><?php echo $this->lang->line('back'); ?></a>
                </div>
            </div>
            
        </div>
        <!-- /.row -->

        

        

        <hr>

      

<?php $this->view('includes/footer') ?>