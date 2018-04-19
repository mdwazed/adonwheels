<?php
$this->view('includes/header');
?>
<body>


<?php $this->view('includes/root_nav'); ?>
<hr>
<!-- Page Content -->
<div class="container">
    <div class="row">


<?php
    foreach ($image_names as $image){
//        print_r($image['image_name']);
?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="/car_images/<?php echo $image['image_name']; ?>" alt="....">
                <div class="caption">
                    <form action="<?php echo base_url('/index.php/car_provider/delete_image') ?>" method="post">
                        <input type="hidden" name="tobe_deleted" value="<?php echo $image['image_name']; ?>">
                        <input type="submit" name="delete" value="delete">
                    </form>


<!--                    <p><a href="--><?php //echo base_url('/index.php/car_provider/delete_image') ?><!--">Delete</a></p>-->
                </div>
            </div>
        </div>
<?php
    }
?>
    </div>

<hr>
<?php $this->view('includes/footer') ?>

