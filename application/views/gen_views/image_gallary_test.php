<html>
<head>
    <link href="<?php echo base_url(); ?>css/adonwheels.css" rel="stylesheet">
    <script src="<?php echo base_url('js/jquery-3.2.1.js'); ?>"></script>

</head>
<body>
    <img id="mainImage" style="border:3px solid grey"
         src="<?php echo base_url('car_images/107o3iZ.jpg'); ?>" height="500" width="540" />
    <br />
    <div id="divId">
        <img class="img_gallary_Style" src="<?php echo base_url('car_images/107o3iZ.jpg'); ?>" />
        <img class="img_gallary_Style" src="<?php echo base_url('car_images/10MOqir.jpg'); ?>" />
        <img class="img_gallary_Style" src="<?php echo base_url('car_images/10sQXvO.jpg'); ?>" />
        <img class="img_gallary_Style" src="<?php echo base_url('car_images/107o3iZ.jpg'); ?>" />
        <img class="img_gallary_Style" src="<?php echo base_url('car_images/107o3iZ.jpg'); ?>" />
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
                    $('#mainImage').fadeOut(1000, function () {
                        $(this).attr('src', imageURL);
                    }).fadeIn(1000);
                }
            });
        });
    </script>

</body>
</html>