<?php 
$this->view('includes/header'); 
?>
<body>
    

    <?php $this->view('includes/root_nav'); ?>
    <hr>
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-8">

            <div class="alert alert-info">
              <h2><?php echo $this->lang->line('basic_car_info'); ?></h2>
              <h4><a href="<?php echo base_url('index.php/car_provider/add_car_instr'); ?>" class="alert-link"> <?php echo $this->lang->line('read_instr1'); ?></a><?php echo $this->lang->line('read_instr2'); ?></h4>
            </div>

            <div>
              <h4> <?php echo validation_errors();  ?></h4>
            </div>

           <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Car_provider/save_car" method="POST">

              <div class="form-group">
                <label for="car_model" class="col-md-2 control-label"><?php echo $this->lang->line('car_model'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="car_model" name="car_model" placeholder="e.g. Honda Insight" value="<?php echo $post['car_model']?>">
                </div>
              </div>

              <div class="form-group">
                <label for="car_make" class="col-md-2 control-label"><?php echo $this->lang->line('car_make'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="car_make" name="car_make" placeholder="e.g. Toyota" value="<?php echo $post['car_make']?>">
                </div>
              </div>

              <div class="form-group">
                <label for="car_make_year" class="col-md-2 control-label"><?php echo $this->lang->line('car_make_year'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="car_make_year" name="car_make_year" placeholder="e.g. 2015" value="<?php echo $post['car_make_year']?>">
                </div>
              </div>

              <div class="form-group">
                <label for="car_location" class="col-md-2 control-label"><?php echo $this->lang->line('car_location'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="car_location" name="car_location" placeholder="e.g. Darmstadt, germany" value="<?php echo $post['car_location']?>">
                </div>
              </div>

              <div class="form-group">
                <label for="car_color" class="col-md-2 control-label"><?php echo $this->lang->line('color'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="car_color" name="car_color" placeholder="e.g. Silver" value="<?php echo $post['car_color']?>">
                </div>
              </div>

              <div class="form-group">
                <label for="reg_no" class="col-md-2 control-label"><?php echo $this->lang->line('reg_no'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="reg_no" name="reg_no" placeholder="" value="<?php echo $post['reg_no']?>">
                </div>
              </div>

              <div class="form-group">
                <label for="parking_day" class="col-md-2 control-label"><?php echo $this->lang->line('day_parking'); ?></label>
                <div class="col-md-6">
                  <select class="form-control" id="parking_day" name="parking_day" value="<?php echo $post['parking_day']?>">
                    <option value="">Please select...</option>
                    <option value="garrage"><?php echo $this->lang->line('garrage'); ?></option>
                    <option value="road_side"><?php echo $this->lang->line('road_side'); ?></option>                    
                  </select>                  
                </div>
              </div>


              <div class="form-group">
                <label for="parking_night" class="col-md-2 control-label"><?php echo $this->lang->line('night_parking'); ?></label>
                <div class="col-md-6">
                  <select class="form-control" id="parking_night" name="parking_night" value="<?php echo $post['parking_night']?>">
                    <option value="">Please select...</option>
                    <option value="garrage"><?php echo $this->lang->line('garrage'); ?></option>
                    <option value="road_side"><?php echo $this->lang->line('road_side'); ?></option>                   
                  </select>                  
                </div>
              </div>

              <div class="form-group">
                <label for="day_run" class="col-md-2 control-label"><?php echo $this->lang->line('day_run'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="day_run" name="day_run" placeholder="e.g. 100" value="<?php echo $post['day_run']?>">
                </div>
                Km
              </div>

              <div class="form-group">
                <label for="week_run" class="col-md-2 control-label"><?php echo $this->lang->line('wk_run'); ?></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="week_run" name="week_run" placeholder="e.g. 500" value="<?php echo $post['week_run']?>">
                </div>
                Km
              </div>

               <div class="col-md-12">
                   <div class="panel panel-default col-md-12">
                       <div class="panel-heading">
                           <h4><?php echo $this->lang->line('sticker_related_info'); ?></h4>
                       </div>
                       <div class="panel-body">

                           <table id=myTable class="table">
                               <tbody id=sticker_table>
                               <td><?php echo $this->lang->line('no_of_sticker'); ?></td><td><?php echo $this->lang->line('place'); ?></td><td><?php echo $this->lang->line('height'); ?><br> (cm)</td><td><?php echo $this->lang->line('width'); ?><br>(cm)</td><td><?php echo $this->lang->line('unit_price'); ?><br>( per 100 cm <sup>2</sup>)</td>
                               <tr class="input_row">
                                   <td>
                                       <input type="text" class="form-control no_of_sticker" id="0" name="no_of_sticker[]" placeholder="" value="">
                                   </td>
                                   <td>
                                       <select class="form-control" id="1" style="width: max-content" name="sticker_place[]" placeholder="" value="">
                                           <option></option>
                                           <option><?php echo $this->lang->line('front'); ?></option>
                                           <option><?php echo $this->lang->line('side'); ?></option>
                                           <option><?php echo $this->lang->line('rear'); ?></option>
                                           <option><?php echo $this->lang->line('side_window'); ?></option>
                                           <option><?php echo $this->lang->line('rear_window'); ?></option>

                                       </select>
                                   </td>
                                   <td>
                                       <input type="text" class="form-control" id="2" name="sticker_height[]" placeholder="" value="">
                                   </td>
                                   <td>
                                       <input type="text" class="form-control" id="3" name="sticker_width[]" placeholder="" value="">
                                   </td>
                                   <td>
                                       <input type="text" class="form-control" id="4" name="sticker_price[]" placeholder="" value="3">
                                   </td>
                                   <td class="remove_row">
                                       <a href="#">X</a>
                                   </td>
                               </tr>


                               </tbody>
                           </table>
                           <button class=" btn btn-default btn-xs add_row_button"><?php echo $this->lang->line('add_more'); ?></button>

                       </div>
                       <div class="panel-footer">
                           Total price:<span id="total_price">0</span> Euro/month
                       </div>
                   </div>
               </div>


              
              <div class="form-group">
                <div class="col-md-offset-10 col-md-12">
                  <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('submit'); ?></button>
                </div>
              </div>
           </form>
            <hr>
        </div> <!-- /.col-md-8-->
   



     <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      ////////////// address field auto complete using google api /////////////////////////////
      function activateAutoComplete() {

          var input = document.getElementById('car_location');
          var autocomplete = new google.maps.places.Autocomplete(input);
      }


        ////////// jquery functionality ///////////////////////////////
      $(document).ready(function() {


          var priceArray = [];
          var max_size = 10;
          var wrapper = $("#sticker_table");
          var add_button = $(".add_row_button");
          // var total_space = 0;
          var total_price = 0;
          var x=5;


            /////////   remove a row by clicking X ////////////////
          $(wrapper).on('click','.remove_row', function(e){
              e.preventDefault();
              $(this).parent('.input_row').remove();
              x -=5;
              calculate_total();
          });

          ////////////////   add a row by clicking add more n=btn ////////////////////
          var current_language = "<?php echo $this->session->site_lang; ?>";
          console.log(current_language);

          $(add_button).on('click', function(e){
              e.preventDefault();
              $(wrapper).append('<tr class="input_row">'+
                  '<td><input type="text" class="form-control no_of_sticker" id="'+(x)+'" name="no_of_sticker[]" placeholder="" value=""></td>'+
                  '<td><select class="form-control" id="'+(x+1)+'" style="width: max-content" name="sticker_place[]" placeholder="" value="">'+
                  '<option></option>'+
                  '<option><?php echo $this->lang->line("front"); ?></option>'+
                  '<option><?php echo $this->lang->line("side"); ?></option>'+
                  '<option><?php echo $this->lang->line("rear"); ?></option>'+
                  '<option><?php echo $this->lang->line("side_window"); ?></option>'+
                  '<option><?php echo $this->lang->line("rear_window"); ?></option></select></td>'+
                  '<td><input type="text" class="form-control" id="'+(x+2)+'" name="sticker_height[]" placeholder="" value=""></td>'+
                  '<td><input type="text" class="form-control" id="'+(x+3)+'" name="sticker_width[]" placeholder="" value=""></td>'+
                  '<td><input type="text" class="form-control" id="'+(x+4)+'" name="sticker_price[]" placeholder="" value="3"></td>'+
                  '<td class="remove_row"><a href="#">X</a></td></tr>');
              x+=5;
          });

          function calculate_total(){
                  priceArray.length = 0;
                  for(var i=0;i<=x-4;){
                      var id0 = i;
                      var id2 = i+2;
                      var id3 = i+3;
                      var id4 = i+4;

                      var row_total = ($('#'+id0).val()) * (($('#'+id2).val()) * ($('#'+id3).val())/100) * ($('#'+id4).val());
                      // console.log(i, row_total);
                      priceArray.push(row_total);
                      i +=5;
                  }
                  // console.log(priceArray);
                  total_price = 0;
                  for(var y=0;y<priceArray.length; y++){
                      total_price +=priceArray[y];
                  }
                  // console.log(total_price);

                  $('#total_price').html(total_price);
          };

          $(wrapper).on('focusout','.input_row',function(){
              calculate_total();
          });





      });  /// end of document.ready


    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8oohj-8021FeSfo7Oo9uNcM1w7fmLzWA&libraries=places&callback=activateAutoComplete">
    </script>


<?php $this->view('includes/footer') ?>