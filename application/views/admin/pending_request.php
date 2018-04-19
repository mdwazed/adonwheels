<?php 
	//var_dump($pending_request);

 ?>
 <div class="alert alert-info">
 	<h4>Pending request</h4>
 </div>
 
 <div>
 	<div>
            <?php  
            //var_dump($request_data);
              foreach ($request_data as $row) {
                echo '<div class="panel panel-default">';
                  echo '<div class="panel-body">';
                    echo '<div class= "col-md-6">';
                    echo '<h4 class= "alert alert-info">Requested By</h4>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>First Name:</dt>';    
                    echo '<dd>'.$row['requester_first_name'].'</dd>';
                    echo '</dl>';

                    

                    echo '<dl class="dl-custom">';
                    echo '<dt>Last Name:</dt>';    
                    echo '<dd>'.$row['requester_last_name'].'</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>Address:</dt>';    
                    echo '<dd>'.$row['requester_address'].'</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>City:</dt>';    
                    echo '<dd>'.$row['requester_city'].'</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>Country:</dt>';    
                    echo '<dd>'.$row['requester_country'].'</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>Tel:</dt>';    
                    echo '<dd>'.$row['requester_tel'].'</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>Email:</dt>';    
                    echo '<dd>'.$row['requester_email'].'</dd>';
                    echo '</dl>';

                    echo '</div>';


                    echo '<div class="col-md-6">';
                    echo '<h4 class= "alert alert-info">Car Owned By</h4>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>First Name:</dt>';    
                    echo '<dd>'.$row['owner_first_name'].'</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>Last Name:</dt>';    
                    echo '<dd>'.$row['owner_last_name'].'</dd>';
                    echo '</dl>';

                    

                    echo '<dl class="dl-custom">';
                    echo '<dt>Address:</dt>';    
                    echo '<dd>'.$row['owner_address'].'</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>City:</dt>';    
                    echo '<dd>'.$row['owner_city'].'</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>Country:</dt>';    
                    echo '<dd>'.$row['owner_country'].'</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>Tel:</dt>';    
                    echo '<dd>'.$row['owner_tel'].'</dd>';
                    echo '</dl>';

                    echo '<dl class="dl-custom">';
                    echo '<dt>Email:</dt>';    
                    echo '<dd>'.$row['owner_email'].'</dd>';
                    echo '</dl>';

                    
                    
                    echo '</div>';

                  echo '</div>';   ///////// end of panel body div
                  echo '<div class="panel-footer">'; 
                    echo anchor('Admin_controller/action_on_pending_request', 'Action');
                  echo '</div>'; 

                echo '</div>';  ////// end of panel div
               
              }
            ?>
          </div>

 </div>
 