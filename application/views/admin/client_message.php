
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

            echo '<dl class="dl-custom">';
            echo '<dt>'.$this->lang->line('msg_remarks').'</dt>';
            echo '<dd>'.$client_message['remarks'].'</dd>';
            echo '</dl>';

            echo "</div></div>";

            echo '<div class="panel-footer">';
            echo anchor('Admin_controller/dismiss_clients_message?id='.$client_message['msg_id'], 'Dismiss');
            echo '</div></div>';

        }
        ?>

        <hr>
    </div>

