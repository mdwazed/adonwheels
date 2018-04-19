<?php 
$this->view('includes/header'); 
?>
<body>
    

    
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-8">
           
              <div class="alert alert-success" role="alert">
                <h2><?php echo $message; ?></h2>
              </div> 
              <a class="btn btn-lg btn-default" href="javascript:window.close();"">Back to search result</a>             
            

           
        </div>        
    </div>
    <hr>    

   

<?php $this->view('includes/footer') ?>
