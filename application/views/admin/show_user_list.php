
<!-- Page Content -->
<div class="container">
    <div class="col-md-8">
        <div class="alert alert-success" role="alert">
            <h2><?php echo 'select user to delete'; ?></h2>
        </div>



        <?php
        echo '<table class="table table-sm table-striped">';
        echo '<tr><th>Last name</th><th>First name</th><th>Email</th><th>Delete</th></tr>';
        foreach ($user_list as $user){
            echo '<tr>';
            echo '<td>'.$user["last_name"].'</td>';
            echo '<td>'.$user["first_name"].'</td>';
            echo '<td>'.$user["user_email"].'</td>';
            echo '<td>';
            echo anchor('Admin_controller/delete_user?id='.$user['user_id'], 'Delete');
            echo '</td>';

            echo '</tr>';
        }
        echo '</table>';
        ?>

        <hr>
    </div>
