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
                    <h2><?php echo '<h3>Action on pending request</h3>'; ?></h2>
                </div>
            </div>

            <div class="col-md-4">
                <?php
                $this->load->view('includes/admin_left_nav');
                ?>

            </div>
            <div class="col-md-8">
              place holder for action

            </div>
        </div>
        <hr>



    <?php $this->view('includes/footer') ?>