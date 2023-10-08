<?php

//Register Users


if(isset($_POST['register_user'])){

    $user_name =  real_escape($_POST['user_name']);
    $user_email = real_escape($_POST['user_email']);
    $user_phone = real_escape($_POST['user_phone']);
    $user_id = real_escape($_POST['user_id']);
    $user_department = $_POST['user_department'];
    $user_dob = $_POST['user_dob'];
    $user_blood_group = $_POST['user_blood_group'];
    $user_role = $_POST['user_role'];
    $user_password = real_escape($_POST['user_password']);
    $user_cfpassword = real_escape($_POST['user_cfpassword']);

    $user_avater = $_FILES['user_avater']['name'];
    $user_avater_loc = $_FILES['user_avater']['tmp_name'];

    $phone_rgex = "/(\+88)?-?01[3-9]\d{8}/";
    $email_regx = "/([a-z\d][a-z\d_\-.]+[a-z\d]){1,10}@lus.ac.bd/";

    $duplicate_user_id = mysqli_query($connection,"SELECT `st_id` FROM `users` WHERE `st_id` ='$user_id'");
    $duplicate_user_email = mysqli_query($connection,"SELECT `email` FROM `users` WHERE `email` = '$user_email'");
    $duplicate_user_phone = mysqli_query($connection,"SELECT `phone` FROM `users` WHERE `phone` = '$user_phone'");


    $verification_code = bin2hex(random_bytes(16));




    if(!empty($user_name) && !empty($user_email) && !empty($user_phone) && !empty($user_id) && !empty($user_blood_group) && !empty($user_password) && !empty($user_avater) ){

        if(!preg_match($phone_rgex,$user_phone)){

            echo "<h6 class='bg-warning text-center p-3 text-white'>Phone number are not accepted</h6>";

        }else if(mysqli_num_rows($duplicate_user_id)){

            echo "<h6 class='bg-warning text-center p-3 text-white'>User id is already used</h6>";

        }else if(mysqli_num_rows($duplicate_user_email)){

            echo "<h6 class='bg-warning text-center p-3 text-white'>User email is already used</h6>";

        }else if(mysqli_num_rows($duplicate_user_phone)){

            echo "<h6 class='bg-warning text-center p-3 text-white'>User phone number is already used</h6>";

        }else if($user_password !== $user_cfpassword){

            echo "<h6 class='bg-warning text-center p-3 text-white'>Password and Confirm password is not match</h6>";

        }else if(!preg_match($email_regx,$user_email)){

            echo "<h6 class='bg-warning text-center p-3 text-white'>Email is not valid</h6>";

        }
        else{



            $query = "INSERT INTO `users`(`name`, `email`, `phone`, `st_id`, `department`, `dob`, `blood_group`, `password`, `profile`, `verification_code`, `is_verify`, `user_role`) VALUES ('$user_name','$user_email','$user_phone','$user_id','$user_department','$user_dob','$user_blood_group','$user_password','$user_avater','$verification_code','0','$user_role')";

            $query_run = mysqli_query($connection,$query);

            if($query_run){

                move_uploaded_file($user_avater_loc,"../upload/$user_avater");
                echo "<h6 class='bg-warning text-center p-3 text-white'>Congratulations, Verify Now</h6>";

            }else{
                echo "<h6 class='bg-warning text-center p-3 text-white'>Failed</h6>";
            }
        }



    }else{

        echo "<h6 class='bg-warning text-center p-3 text-white'>OOPS, Some Data are missing</h6>";
    }

}


?>


<div class="row">


    <div class="col-md-8 m-auto">

        <div class="card mb-5 register_cards">
            <div class="card-body">

                <h4 class="card-title text-center p-3 text-primary"> Register Panel for (Teacher, Student, Accountant)</h4>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="register-form row">
                        <div class="form-group col-md-6">
                            <input type="text" class='form-control' name='user_name' placeholder='Full Name' require>

                        </div>
                        <div class="form-group col-md-6">

                            <input type="email" class='form-control' name='user_email' placeholder='Email Address' require>
                        </div>
                        <div class="form-group col-md-6">

                            <input type="text" class='form-control' name='user_phone' placeholder='Phone Number' require>
                        </div>
                        <div class="form-group col-md-6">

                            <input type="text" class='form-control' name='user_id' placeholder='Identification Number.' require>
                        </div>

                        <div class="form-group col-md-6">
                            <select name="user_department" class='form-control'>
                                <option value="">Select Department</option>
                                <?php
                                $query = "SELECT * FROM department";
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
                            <input type="date" class='form-control' name='user_dob'  placeholder='Date of Birth' require>
                        </div>
                        <div class="form-group col-md-6">
                            <select name="user_blood_group" class='form-control'>
                                <option value="">Select blood group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="A-">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class='form-control' name='user_password' placeholder='Password' require>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class='form-control' name='user_cfpassword'  placeholder='Confirm Password' require>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="file" class='form-control' name='user_avater' id="formFile" require>
                            <small class="text-danger">Upload your profile photo!</small>
                        </div>
                        <div class="form-group col-md-12">
                            <select name="user_role" class="form-control">
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                                <option value="accountant">Accountant</option>
                                <option value="super_admin">Super Admin</option>
                            </select>
                        </div>
                        <div class="text-center col-md-12">
                            <button type='submit' name='register_user' id='register-btn' class="btn btn-outline-primary">Register Account</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>


    </div>


</div>