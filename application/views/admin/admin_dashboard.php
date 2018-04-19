<?php 
$this->view('includes/header'); 
?>
<body>
    

    <?php $this->load->view('includes/admin_nav'); ?>
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-10">           
              <div class="alert alert-success" role="alert">
                <h2><?php echo '<h3>Admin Dashboard</h3>'; ?></h2>
              </div>            
        </div>

        <div class="col-md-4">
            <?php 
                $this->load->view('includes/admin_left_nav');
            ?>

        </div>        
        <div class="col-md-8">
            <?php 
                if(isset($returned_page)){
                    echo $returned_page;
                }else{
                   
                    echo '<h1>Admin will be able to perform all his task from this page. Left menu will enable him to perform his task smoothly</h1>';
                }
                
            ?>
            
        </div>
    </div>
    <hr>    

   

<?php $this->view('includes/footer') ?>