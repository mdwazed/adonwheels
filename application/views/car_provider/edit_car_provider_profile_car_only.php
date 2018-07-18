<?php
/**
 * Created by PhpStorm.
 * User: wa
 * Date: 18.07.18
 * Time: 23:24
 */

?>

<h4><?php echo $this->lang->line('edit_car_info'); ?></h4>
<form class="form-horizontal" action="<?php echo base_url('index.php/car_provider/edit_car_provider_profile'); ?>" method="POST">
    <?php echo form_hidden('car_id', $car_id); ?>

    <div class="form-group">
        <label for="car_model" class="col-md-3 control-label"><?php echo $this->lang->line('car_model'); ?></label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="car_model" name="car_model" placeholder="e.g. Honda Insight" required="yes" value="<?php echo $car_model; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="car_make" class="col-md-3 control-label"><?php echo $this->lang->line('car_make'); ?></label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="car_make" name="car_make" placeholder="e.g. Toyota" required="yes" value="<?php echo $car_make; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="car_make_year" class="col-md-3 control-label"><?php echo $this->lang->line('year'); ?></label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="car_make_year" name="car_make_year" placeholder="e.g. 2015" required="yes" value="<?php echo $car_make_year; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="car_color" class="col-md-3 control-label"><?php echo $this->lang->line('color'); ?></label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="car_color" name="car_color" placeholder="e.g. white" value="<?php echo $car_color; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="reg_no" class="col-md-3 control-label"><?php echo $this->lang->line('registration'); ?></label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="reg_no" name="reg_no" placeholder="" required="yes" value="<?php echo $reg_number; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="car_location" class="col-md-3 control-label"><?php echo $this->lang->line('car_location'); ?></label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="car_location" name="car_location" placeholder="" required="yes" value="<?php echo $car_location; ?>">
        </div>
    </div>



    <div class="form-group">
        <label for="parking_day" class="col-md-3 control-label"><?php echo $this->lang->line('day_parking'); ?></label>
        <div class="col-md-6">
            <!-- <select class="form-control" id="parking_day" name="parking_day"> -->
            <?php
            $tags = array(
                'class' => 'form-control',
                'id' => 'parking_day'
            );
            $options = array(
                'garrage' => 'Garrage',
                'road_side' => 'Road side'
            );

            if($parking_day === 'garrage')
            {
                echo form_dropdown('parking_day',$options,'garrage',$tags);
            }elseif ($parking_day === 'road_side') {
                echo form_dropdown('parking_day',$options,'road_side',$tags);
            }


            ?>
            <!--   <option value="garrage">Garrage</option>
              <option value="road_side">Road side</option>
            </select> -->
        </div>
    </div>


    <!-- <div class="form-group">
      <label for="parking_night" class="col-md-2 control-label">Night time parking</label>
      <div class="col-md-6">
        <select class="form-control" id="parking_night" name="parking_night">
          <option value="garrage">Garrage</option>
          <option value="road_side">Road side</option>
        </select>
      </div>
    </div> -->
    <div class="form-group">
        <label for="parking_night" class="col-md-3 control-label"><?php echo $this->lang->line('night_parking'); ?></label>
        <div class="col-md-6">

            <?php
            $tags = array(
                'class' => 'form-control',
                'id' => 'parking_night'
            );
            $options = array(
                'garrage' => 'Garrage',
                'road_side' => 'Road side'
            );

            if($parking_night === 'garrage')
            {
                echo form_dropdown('parking_night',$options,'garrage',$tags);
            }elseif ($parking_night === 'road_side') {
                echo form_dropdown('parking_night',$options,'road_side',$tags);
            }


            ?>
        </div>
    </div>


    <div class="form-group">
        <label for="day_run" class="col-md-3 control-label"><?php echo $this->lang->line('day_run'); ?></label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="day_run" name="day_run" placeholder="e.g. 100" required="yes" value="<?php echo $day_run; ?>">
        </div>
        Kilometer
    </div>

    <div class="form-group">
        <label for="week_run" class="col-md-3 control-label"><?php echo $this->lang->line('week_run'); ?></label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="week_run" name="week_run" placeholder="e.g. 500" required="yes" value="<?php echo $week_run; ?>">
        </div>
        Kilometer
    </div>



    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-10">
            <button type="submit" class="btn btn-default" name="save_car_info"><?php echo $this->lang->line('submit'); ?></button>
        </div>
    </div>
</form>
