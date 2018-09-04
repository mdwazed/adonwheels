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
            <h2><?php echo $this->lang->line('clients_message'); ?></h2>
        </div>



        <?php
        foreach ($client_messages as $client_message){
            echo '<div class="panel panel-default">';
            echo '<div class="panel-body">';
            echo '<div class= "col-md-6">';

            echo '<dl class="dl-custom">';
            echo '<dt>'.$this->lang->line('msg_from').'</dt>';
            echo '<dd>'.$client_message['msg_from'].'</dd>';
            echo '</dl>';


            echo '<dl class="dl-custom">';
            echo '<dt>'.$this->lang->line('msg_body').'</dt>';
            echo '<dd>'.$client_message['msg_body'].'</dd>';
            echo '</dl>';




            echo "</div></div></div>";

        }
        ?>

        <hr>
    </div>

<?php $this->view('includes/footer') ?>