<?php 
$this->view('includes/header'); 
?>
<body>
    

    <?php $this->view('includes/root_nav'); ?>
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-10">

            <div class="alert alert-info">
              <!-- <h2> <?php  echo $message; ?> -->
              <h2><?php echo $this->lang->line('upload_img_heading'); ?></h2>
              <h4><?php echo $this->lang->line('img_dim_instr'); ?></h4>
            </div>

            <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Car_provider/add_car_image" method="POST" enctype = "multipart/form-data">



              <div class="form-group">
                <label for="image"><?php echo $this->lang->line('select_image_upload'); ?></label>
                <input type="file" id="image" name="image"/>              
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('submit'); ?></button>
                    <a class="btn btn-default" href=<?php echo base_url(); ?>index.php/Car_provider/show_car_provider_portfolio><?php echo $this->lang->line('back_to_profile'); ?></a>
                </div>
                  <div class="col-md-10">

                  </div>
              </div>
            </form>
        </div>
          
        <!-- /.col-md-8-->



      <script>
          $(document).ready(function(){

              $('#btn-back').click(function(e){
                  e.preventDefault();

                  // alert('hello');
              })

          });
      </script>

<?php $this->view('includes/footer') ?>