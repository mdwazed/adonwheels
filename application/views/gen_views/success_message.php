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
                <h2><?php echo $message; ?></h2>
              </div>
        <hr>
        </div>

<?php $this->view('includes/footer') ?>

