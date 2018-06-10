<?php 
$this->view('includes/header'); 
?>
<body>
    

    <?php $this->view('includes/root_nav'); ?>
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="alert alert-info">
              <h3><?php echo $this->lang->line('portfolio_of').' '.$user_name; ?></h3>  
                     
        </div>

        <div class="col-md-6">  
            <h3><?php echo $this->lang->line('user_info'); ?></h3>          
            <div>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('last_name'); ?></dt>
                    <dd><?php echo $last_name; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('first_name'); ?></dt>
                    <dd><?php echo $first_name; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('company'); ?></dt>
                    <dd><?php echo $company; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('email'); ?></dt>
                    <dd><?php echo $user_email; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('address'); ?></dt>
                    <dd><?php echo $user_address; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('city'); ?></dt>
                    <dd><?php echo $user_city; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('country'); ?></dt>
                    <dd><?php echo $country; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('zip_code'); ?></dt>
                    <dd><?php echo $user_zip; ?></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('tel'); ?></dt>
                    <dd><?php echo $user_tel; ?></dd>
                </dl>


                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('type_of_user'); ?></dt>
                    <dd><?php
                            if($user_type == 1)
                                echo 'Car provider';
                            elseif ($user_type == 2) {
                                echo 'Advertiser';
                            }elseif($user_type == 3)
                            {
                                echo 'Admin';
                            }
                            
                        ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('member_since'); ?></dt>
                    <dd><?php echo $registered_on; ?></dd>
                </dl>
               
            </div>
            <h3><?php echo $this->lang->line('car_info'); ?></h3>
            <div>


            <?php
            if(isset($car_found)){
            ?>


                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('car_model'); ?></dt>
                    <dd><?php echo isset($car_model)? $car_model:''; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('car_make'); ?></dt>
                    <dd><?php echo isset($car_make)? $car_make:''; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('year'); ?></dt>
                    <dd><?php echo isset($car_make_year)? $car_make_year:''; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('color'); ?></dt>
                    <dd><?php echo isset($car_color)? $car_color:''; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('location'); ?></dt>
                    <dd><?php echo isset($car_location)? $car_location:''; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('registration'); ?></dt>
                    <dd><?php echo isset($reg_number)? $reg_number:''; ?></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('day_parking'); ?></dt>
                    <dd><?php echo isset($parking_day)? $parking_day:''; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('night_parking'); ?></dt>
                    <dd><?php echo isset($parking_night)? $parking_night:''; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('day_run'); ?></dt>
                    <dd><?php echo isset($day_run)? $day_run:'00'.' km'; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('week_run'); ?></dt>
                    <dd><?php echo isset($week_run)? $week_run:'00'.' km'; ?></dd>
                </dl>

            <?php

            }else{
                echo '<h4>No car found</h4>';
            }
            ?>



                <?php
                    if(isset($sticker_info)) {
                ?>
                        <div>
                            <h3><?php echo $this->lang->line('sticker_related_info'); ?></h3>

                            <table class="table table-striped">
                                <tbody>
                                <tr><th><?php echo $this->lang->line('no_of_sticker'); ?></th><th><?php echo $this->lang->line('place'); ?></th><th><?php echo $this->lang->line('height'); ?><br>cm</th><th><?php echo $this->lang->line('width'); ?><br>cm</th><th><?php echo $this->lang->line('unit_price'); ?><br>per 100 cm<sup>2</sup></th></tr>
                                <?php




                                $row_price = array();

                                foreach ($sticker_info as $sticker){
                                    echo '<tr>';
                                    echo '<td>'.$sticker['no_of_sticker'].'</td>';
                                    echo '<td>'.$sticker['place_of_sticker'].'</td>';
                                    echo '<td>'.$sticker['height_of_sticker'].'</td>';
                                    echo '<td>'.$sticker['width_of_sticker'].'</td>';
                                    echo '<td>'.$sticker['unit_price_of_sticker'].'</td>';
                                    echo '</tr>';
                                    $price = $sticker['no_of_sticker'] * (($sticker['height_of_sticker'] * $sticker['width_of_sticker'])/100) * $sticker['unit_price_of_sticker'];
                                    array_push($row_price, $price);
                                }

                                ?>
                                </tbody>
                            </table>


                            <div>
                                <?php
                                $total_price = 0;
                                foreach ($row_price as $row_price){
                                    $total_price += $row_price;
                                }
                                echo '<h4>'.$this->lang->line('total_price').': '.$total_price.' Euro/month</h4>';
                                ?>
                            </div>

                        </div>
                <?php
                    }
                ?>





            </div>


            <div>
                 <a class="btn btn-lg btn-primary" href="<?php echo base_url('index.php/car_provider/edit_car_provider_profile'); ?>"><?php echo $this->lang->line('edit'); ?></a>
            </div>


        </div>          
        <!-- /.col-md-6-->


        <div class="col-md-6">
            
            <!-- <h3>Car photos</h3> -->
            <img id="mainImage" style="border:3px solid #93DED8"            
                src="<?php 
                        $image_count = count($car_images);
                        if($image_count>0){
                            echo base_url('car_images/'.$car_images[0]['image_name']); 
                        }else{
                            echo base_url('car_images/logo_transparent.png'); 
                        }
                        
                        ?>" 
            height="450" width="650" />


            <br />
            <div id="divId">
                <?php 
                    /*print_r($car_images);               
                    exit();*/


                    $img_count = count($car_images);
                    $i =0;
                    while( $i < $img_count)
                    {
                        echo '<img class="img_gallary_Style" src="';
                        echo base_url('car_images/'.$car_images[$i]['image_name']);
                        echo '"/>';
                        $i++;
                    }

                    

                ?>
            </div>
            
               

            <script type="text/javascript">

                $(document).ready(function () {
                    $('#divId img').on({
                        mouseover: function () {
                            $(this).css({
                                'cursor': 'hand',
                                'border-Color': 'red'
                            });
                        },
                        mouseout: function () {
                            $(this).css({
                                'cursor': 'default',
                                'border-Color': 'grey'
                            });
                        },
                        click: function () {
                            var imageURL = $(this).attr('src');
                            $('#mainImage').fadeOut(100, function () {
                                $(this).attr('src', imageURL);
                            }).fadeIn(100);
                        }
                    });
                });
            </script>
           

        </div>
        <!-- /.col-md-6-->


    </div>
    <hr>    

      

<?php $this->view('includes/footer') ?>