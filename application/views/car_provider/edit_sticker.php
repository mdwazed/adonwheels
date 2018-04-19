
/**
 * Created by PhpStorm.
 * User: wazed
 * Date: 3/15/18
 * Time: 10:48 AM
 */


<?php
$this->view('includes/header');
?>
    <body>


<?php $this->view('includes/root_nav'); ?>
    <hr>
    <!-- Page Content -->
<div class="container">
    <div class="col-md-10">
        <h2><?php echo $this->lang->line('edit_sticker'); ?></h2>

        <div>
            <form action="<?php echo base_url('index.php/car_provider/edit_sticker'); ?>" method="post">
                <div class="col-md-12">
                    <div class="panel panel-default col-md-12">
                        <div class="panel-heading">
                            <h4><?php echo $this->lang->line('sticker_related_info'); ?></h4>
                        </div>
                        <div class="panel-body">

                            <table id=myTable class="table">
                                <tbody id=sticker_table>
                                <td><?php echo $this->lang->line('no_of_sticker'); ?></td><td><?php echo $this->lang->line('place'); ?></td><td><?php echo $this->lang->line('height'); ?><br> (cm)</td><td><?php echo $this->lang->line('width'); ?><br>(cm)</td><td><?php echo $this->lang->line('unit_price'); ?><br>( per 100 cm <sup>2</sup>)</td>
                                <?php
                                    $x = 0;
                                    //echo $x;

                                    foreach ($sticker_data as $data){
                                        $id0 = $x;
                                        $id1 = $x+1;
                                        $id2 = $x+2;
                                        $id3 = $x+3;
                                        $id4 = $x+4;
                                        echo <<< EOT
                                            <tr class="input_row">
                                                <td><input type="text" class="form-control no_of_sticker" id="$id0" name="no_of_sticker[]" placeholder="" value="$data[no_of_sticker]"></td>
                                                <td>
                                                    <select class="form-control" id="$id1" style="width: max-content" name="sticker_place[]" placeholder="" value="">
                                                        <option selected>$data[place_of_sticker]</option>
                                                        <option>Front</option>
                                                        <option>Side</option>
                                                        <option>Rear</option>
                                                        <option>Side window</option>
                                                        <option>Rear window</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="$id2" name="sticker_height[]" placeholder="" value="$data[height_of_sticker]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="$id3" name="sticker_width[]" placeholder="" value="$data[width_of_sticker]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="$id4" name="sticker_price[]" placeholder="" value="$data[unit_price_of_sticker]">
                                                </td>
                                                <td class="remove_row">
                                                    <a href="#">X</a>
                                                </td>
                                                
                                            </tr>
EOT;
                                    $x = $x+5;

                                    }

                                ?>



                                </tbody>
                            </table>
                            <div class="col-md-offset-10">
                                <button class=" btn btn-default btn-xs add_row_button">Add more </button>
                            </div>


                        </div>
                        <div class="panel-footer">
                            <?php echo $this->lang->line('total_price'); ?> :<span id="total_price">0</span> Euro/month
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-10">
                        <button type="submit" class="btn btn-primary" name = "save_sticker_info"><?php echo $this->lang->line('submit'); ?></button>
                    </div>
                </div>
            </form>
        </div>
        <hr>
    </div>

    <script>
        ////////// jquery functionality ///////////////////////////////
        $(document).ready(function() {

            var priceArray = [];
            var max_size = 10;
            var wrapper = $("#sticker_table");
            var add_button = $(".add_row_button");
            // var total_space = 0;
            var total_price = 0;
            var x=<?php echo $x; ?>;


            /////////   remove a row by clicking X ////////////////
            $(wrapper).on('click','.remove_row', function(e){
                e.preventDefault();
                $(this).parent('.input_row').remove();
                x -=5;
                calculate_total();
            });

            ////////////////   add a row by clicking add more n=btn ////////////////////
            $(add_button).on('click', function(e){
                e.preventDefault();
                $(wrapper).append('<tr class="input_row">'+
                    '<td><input type="text" class="form-control no_of_sticker" id="'+(x)+'" name="no_of_sticker[]" placeholder="" value=""></td>'+
                    '<td><select class="form-control" id="'+(x+1)+'" style="width: max-content" name="sticker_place[]" placeholder="" value="">'+
                    '<option>Front</option>'+
                    '<option>Side</option>'+
                    '<option>Rear</option>'+
                    '<option>Side window</option>'+
                    '<option>Rear window</option></select></td>'+
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
                console.log(priceArray);
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

<?php $this->view('includes/footer') ?>