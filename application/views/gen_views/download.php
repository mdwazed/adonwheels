<?php
/**
 * Created by PhpStorm.
 * User: wa
 * Date: 18.04.18
 * Time: 16:53
 */


$this->view('includes/header');
?>
<body>

<?php $this->view('includes/root_nav'); ?>

<hr>
    <!-- Page Content -->
    <div class="container">
<!--        page content goes here    -->
        <h1><?php echo $this->lang->line('downloadable_content') ?></h1>
        <h4><a href="<?php echo base_url('resources/VertragAutobesitzer.pdf')?>" target="_blank">VertragAutobesitzer</a></h4>
        <h4><a href="<?php echo base_url('resources/VertragWerbepartner.pdf')?>" target="_blank">VertragWerbepartner</a></h4>

    <hr>



<?php $this->view('includes/footer') ?>