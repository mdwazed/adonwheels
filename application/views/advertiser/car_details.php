<?php 
$this->view('includes/header'); 
?>
<body>
    
    
   
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="alert alert-info">
              <h3><?php echo $this->lang->line('this_car_aval'); ?></h3>            
        </div>

        <div class="col-md-6">  
            
            <h3><?php echo $this->lang->line('car_info'); ?></h3> 
            

            <div>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('car_model'); ?></dt>
                    <dd><?php echo isset($car[0]['car_model'])? $car[0]['car_model']:''; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('car_make'); ?></dt>
                    <dd><?php echo isset($car[0]['car_make'])? $car[0]['car_make']:''; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('car_make_year'); ?></dt>
                    <dd><?php echo isset($car[0]['car_make_year'])? $car[0]['car_make_year']:''; ?></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('color'); ?></dt>
                    <dd><?php echo isset($car[0]['car_color'])? $car[0]['car_color']:''; ?></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('car_location'); ?></dt>
                    <dd><?php echo isset($car[0]['car_location'])? $car[0]['car_location']:''; ?></dd>
                </dl>
               
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('space_door'); ?></dt>
                    <dd><?php echo isset($car[0]['space_door'])? $car[0]['space_door']:''.' Sq cm'; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('space_rear'); ?></dt>
                    <dd><?php echo isset($car[0]['space_rear'])? $car[0]['space_rear']:''.' Sq cm';  ?></dd>
                </dl>
               
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('day_parking'); ?></dt>
                    <dd><?php echo isset($car[0]['parking_day'])? $car[0]['parking_day']:''; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('night_parking'); ?></dt>
                    <dd><?php echo isset($car[0]['parking_night'])? $car[0]['parking_night']:''; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('day_run'); ?></dt>
                    <dd><?php echo isset($car[0]['day_run'])? $car[0]['day_run']:''.' Km'; ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt><?php echo $this->lang->line('wk_run'); ?></dt>
                    <dd><?php echo isset($car[0]['week_run'])? $car[0]['week_run']:''.' Km'; ?></dd>
                </dl>
            </div>
            <div>
                <?php $car_id = $car[0]['id'];  ?>  
                <a class="btn btn-lg btn-primary" href="<?php echo base_url('index.php/advertiser/request_for_ad/'.$car_id); ?>"><?php echo $this->lang->line('req_ad'); ?></a>
                <a class="btn btn-lg btn-default" href="javascript:window.close();""><?php echo $this->lang->line('back_2_search'); ?></a>
              
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