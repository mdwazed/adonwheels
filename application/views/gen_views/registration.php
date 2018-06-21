<?php 
$this->view('includes/header');


?>
<body>
    

    <?php $this->view('includes/root_nav'); ?>
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-8">
           
              <div class="page-header">
                <h1><?php echo $this->lang->line('user_registration'); ?></h1>
              </div>              
            

           <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/User_controller/save_user" method ="POST">

               <div class="form-group">
                   <label for="user_type" class="col-md-2 control-label"><?php echo $this->lang->line('user_type'); ?></label>
                   <div class="col-md-6">
                       <select class="form-control" id="user_type" name="user_type" title="If you are a potential clients who would like to let us put banner on your car then select 'car provider'. If you are interested for advertisement on our car pool please select 'advertiser'">
                           <option value="1"><?php echo $this->lang->line('car_provider'); ?></option>
                           <option value="2"><?php echo $this->lang->line('advertiser'); ?></option>
                       </select>
                   </div>
               </div>

               <div class="form-group">
                   <label for="company" class="col-md-2 control-label"><?php echo $this->lang->line('company'); ?></label>
                   <div class="col-md-6">
                       <input type="text" class="form-control" id="company" name="company" title="Only fill up if you belongs to a company. private user please keep it blank">
                   </div>
               </div>

              <div class="form-group">
                <label for="last_name" class="col-md-2 control-label"><?php echo $this->lang->line('last_name'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="first_name" class="col-md-2 control-label"><?php echo $this->lang->line('first_name'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-md-2 control-label"><?php echo $this->lang->line('email'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="password" class="col-md-2 control-label"><?php echo $this->lang->line('password'); ?></label>
                <div class="col-md-6">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="yes">
                </div>                
              </div>

              <div class="form-group">
                <label for="user_address" class="col-md-2 control-label"><?php echo $this->lang->line('address'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_address" name="user_address" placeholder="Address" required="yes">
                </div>                
              </div>

              <div class="form-group">
                <label for="user_city" class="col-md-2 control-label"><?php echo $this->lang->line('city'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_city" name="user_city" placeholder="City" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="user_zip" class="col-md-2 control-label"><?php echo $this->lang->line('zip_code'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_zip" name="user_zip" placeholder="Zip Code" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="user_country" class="col-md-2 control-label"><?php echo $this->lang->line('country'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_country" name="user_country" placeholder="Country" required="yes">
                </div>
              </div>

              <div class="form-group">
                <label for="user_tel" class="col-md-2 control-label"><?php echo $this->lang->line('telephone'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_tel" name="user_tel" placeholder="Country" required="yes">
                </div>
              </div>



              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default"><?php echo $this->lang->line('submit'); ?></button>
                </div>
              </div>
            </form>
        </div>
          
        <!-- /.col-md-8-->

        <div class="col-md-4"> 
          <div class="page-header">
            <h1><?php echo $this->lang->line('user_login'); ?></h1>
          </div>
            <div>
                <input type="image" name="fb_login" id="fb_login" alt="Continue with FB" onclick="fbLogin()" class="fb_login" 
                src="<?php echo base_url('images/fb_login.png') ?>"/> 
                <br><strong>OR</strong>
            </div>
           
          <div>
              <form action="<?php echo base_url(); ?>index.php/User_controller/login" method ="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo $this->lang->line('email'); ?></label>
                  <input type="email" class="form-control" id="email1" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"><?php echo $this->lang->line('password'); ?></label>
                  <input type="password" class="form-control" id="password1" name="password" placeholder="Password">
                </div>
                
                <button type="submit" class="btn btn-default"><?php echo $this->lang->line('submit'); ?></button>
              </form>
          </div> 
          <a href="<?php echo base_url('index.php/user_controller/reset_password'); ?>"><?php echo $this->lang->line('forgot_password'); ?></a>
        </div>
    </div>
    <hr>


    <script>
    
		/////// fb log in script /////////
    	function fbLogOut(){
    		FB.logout(function(){
    			console.log('user logged out');
    		});
    	};

    	// Post to the provided URL with the specified parameters.
	    function post(path, parameters) {
	        var form = $('<form></form>');

	        form.attr("method", "post");
	        form.attr("action", path);

	        $.each(parameters, function(key, value) {
	            if ( typeof value == 'object' || typeof value == 'array' ){
	                $.each(value, function(subkey, subvalue) {
	                    var field = $('<input />');
	                    field.attr("type", "hidden");
	                    field.attr("name", key+'[]');
	                    field.attr("value", subvalue);
	                    form.append(field);
	                });
	            } else {
	                var field = $('<input />');
	                field.attr("type", "hidden");
	                field.attr("name", key);
	                field.attr("value", value);
	                form.append(field);
	            }
	        });
	        $(document.body).append(form);
	        form.submit();
	    };

        function fbLogin(){
        	// console.log('getting log in status');
            FB.getLoginStatus(function(response) {
                console.log(response.status);
                if(response.status != 'connected'){
                	FB.login(function(response) {
					    if (response.authResponse) {
					     console.log('Welcome!  Fetching your information.... ');
					     FB.api('/me?fields=id,name,email', function(userData) {
					       // console.log(userData);
					       var purl = "<?php echo base_url(); ?>index.php/User_controller/fbLogIn";
	                		var parameters = {name:userData.name, email:userData.email};
	                		// console.log(parameters);
	                		post(purl, parameters);
					     });
					    } else {
					     console.log('User cancelled login or did not fully authorize.');
					    }
					}, {scope: 'public_profile,email'});
                }else{
                	// console.log(response);
                	FB.api('/me?fields=id,name,email',function (userData){
                		console.log(userData);
                		var purl = "<?php echo base_url(); ?>index.php/User_controller/fbLogIn";
                		var parameters = {name:userData.name, email:userData.email, accessToken: userData.accessToken};
                		// console.log(parameters);
                		post(purl, parameters);

                	});
                }
       			
            });
        };


         window.fbAsyncInit = function() {
		    FB.init({
		      appId            : '884578681735299',
		      autoLogAppEvents : true,
		      xfbml            : true,
		      version          : 'v3.0'
		    });
		    FB.AppEvents.logPageView();

		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "https://connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
    </script>



<?php $this->view('includes/footer') ?>