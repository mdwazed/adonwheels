
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <img class="img-responsive" style="width: 150px; height: 80px" src="<?php echo base_url(); ?>images/logo_beta.png" alt="Logo">
                <!--<a class="navbar-brand" href="index.html">Add on Wheel</a> -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('home'); ?></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->lang->line('car_provider'); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url('index.php/car_provider/earning_possibilities'); ?>"><?php echo $this->lang->line('earning_possibility'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/car_provider/add_car'); ?>"><?php echo $this->lang->line('add_a_car'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/car_provider/car_image_upload_loop'); ?>"><?php echo $this->lang->line('upload_car_photo'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/car_provider/show_car_provider_portfolio'); ?>"><?php echo $this->lang->line('portfolio'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/car_provider/edit_car_provider_profile'); ?>"><?php echo $this->lang->line('edit_profile'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/car_provider/edit_sticker'); ?>"><?php echo $this->lang->line('edit_sticker'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/car_provider/delete_image'); ?>"><?php echo $this->lang->line('delete_image'); ?></a>
                            </li>
                           
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->lang->line('advertiser'); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url('index.php/advertiser/find_cars'); ?>"><?php echo $this->lang->line('find_cars'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/advertiser/car_demands'); ?>"><?php echo $this->lang->line('demand_for_cars'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/advertiser/show_logged_in_advertiser_profile'); ?>"><?php echo $this->lang->line('portfolio'); ?></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/Common_controller/download'); ?>"><?php echo 'Download'; ?></a>                    
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/Common_controller/about_us'); ?>"><?php echo $this->lang->line('about_us'); ?></a>                    
                    </li>

                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img style="width: 35px; height: 25px" src="<?php echo base_url('images/lang3.jpg'); ?>" alt="language"><?php echo $this->lang->line('language'); ?></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url('index.php/common_controller/lang_switcher/deutsche'); ?>">Deutsch</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/common_controller/lang_switcher/english'); ?>">English</a>
                            </li>
                          
                           
                        </ul>
                    </li>
                    <li>
                        <?php 
                            if(isset($this->session->user_email)){
                                echo '<a href="#">'.$this->session->user_email.'</a>';
                            }
                        ?>
                    </li>

                    
                    
                    
                    <li>
                        <?php 
                            if (!isset($_SESSION['user_email'])){
                                echo '<a href='.base_url('index.php/user_controller/registration').'>'.$this->lang->line('login').'</a>';
                            }else{
                                
                                 echo '<a href='.base_url('index.php/user_controller/log_out').'>'.$this->lang->line('log_out').'</a>';
                            }
                        ?>                        
                    </li>
                     

                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
