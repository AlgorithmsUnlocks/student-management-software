<!--This is admin header part -->
<?php include("includes/admin_header.php"); ?>
<!--This is admin header part end -->

<!-- partial:partials/_sidebar -->
<?php include("includes/admin_sidebar.php") ?>

<?php

if(isset($_GET['id'])){
    $user_id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $query_fetch_single_users = mysqli_query($connection,$query);

    confirmQuery($query_fetch_single_users);

    while($row = mysqli_fetch_assoc($query_fetch_single_users)){

        $user_id  = $row['id'];
        $name  = $row['name'];
        $email  = $row['email'];
        $phone = $row['phone'];
        $st_id  = $row['st_id'];
        $department = $row['department'];
        $dob  = $row['dob'];
        $blood_group = $row['blood_group'];
        $profile = $row['profile'];
        $user_role = $row['user_role'];
        $create_date = $row['create_date'];
        $is_verify = $row['is_verify'];

    }
}

?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <!-- Main Content Panel -->

        <div class="col-md-8 m-auto">

            <div class="card mb-5 register_cards">
                <div class="card-body">

                    <h4 class="card-title text-center">Edit Users</h4>

                    <?php

                    if(isset($_POST['update_user'])){

                        $user_id  = $_POST['id'];
                        $user_name  = $_POST['user_name'];
                        $user_email  = $_POST['user_email'];
                        $user_phone = $_POST['user_phone'];
                        $st_id  = $_POST['st_id'];
                        $user_department = $_POST['user_department'];
                        $user_dob  = $_POST['user_dob'];
                        $user_blood_group = $_POST['user_blood_group'];

                        $query = "UPDATE `users` SET `name`='$user_name',`email`='$user_email',`phone`='$user_phone',`st_id`='$st_id',`department`='$user_department',`dob`='$user_dob',`blood_group`='$user_blood_group' WHERE `id`='$user_id'";
                        $query_update_user = mysqli_query($connection,$query);

                        confirmQuery($query_update_user);

                        echo "<a class='btn btn-success form-control' href='user_profiles.php'>Updated Successfull -> View Users</a>";

                    }



                    ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="register-form row">
                            <div class="form-group col-md-12 text-center">
                                <img src="../upload/<?php echo $profile ?>" class="img-fluid" style="height: 150px; border-radius: 10px; text-align: center"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class='form-control' name='user_name' value="<?php echo $name ?>" require>

                            </div>
                            <div class="form-group col-md-6">

                                <input type="email" class='form-control' name='user_email' value="<?php echo $email ?>" require>
                            </div>
                            <div class="form-group col-md-6">

                                <input type="text" class='form-control' name='user_phone' value="<?php echo $phone ?>" require>
                            </div>
                            <div class="form-group col-md-6">

                                <input type="text" class='form-control' name='st_id' value="<?php echo $st_id ?>" require>
                            </div>

                            <div class="form-group col-md-6">
                                <select name="user_department" class='form-control'>
                                    <?php
                                    $query = "SELECT * FROM department WHERE department_id=$department";
                                    $query_run = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($query_run)){
                                        $department_id = $row['department_id'];
                                        $department_name = $row['department_name']; ?>
                                        <option value="<?php echo $department_id ?>"><?php echo $department_name ?></option>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    $query = "SELECT * FROM department WHERE department_id != $department ";
                                    $query_run = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($query_run)){
                                        $department_id = $row['department_id'];
                                        $department_name = $row['department_name']; ?>
                                        <option value="<?php echo $department_id ?>"><?php echo $department_name ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" class='form-control' name='user_dob' value="<?php echo $dob ?>" require>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="user_blood_group" class='form-control'>
                                    <?php
                                    if($blood_group == 'A+'){?>
                                        <option value="A+">A+</option>
                                        <option value="A-">B+</option>
                                        <option value="B+">B-</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    <?php }else if($blood_group == 'A-'){?>
                                        <option value="A-">B+</option>
                                        <option value="B+">B-</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="A+">A+</option>
                                    <?php }else if($blood_group == 'B+'){?>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                    <?php }else if($blood_group == 'B-'){?>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                    <?php }else if($blood_group == 'O+'){?>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                    <?php }else if($blood_group == 'O-'){?>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                    <?php }else if($blood_group == 'AB+'){?>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    <?php }else if($blood_group == 'AB-'){?>
                                        <option value="AB-">AB-</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                    <?php }

                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="hidden" class='form-control' name='id' value="<?php echo $user_id ?>" require>
                            </div>
                            <div class="text-center col-md-12">
                                <button type='submit' name='update_user' id='register-btn' class="btn btn-outline-primary">Update Account</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </div>



        <div class="row">
            <!-- Main Content Panel End -->
        </div>
    </div>       <!-- Admin Body -> write content -->
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer -->
    <?php include("includes/admin_footer.php"); ?>
