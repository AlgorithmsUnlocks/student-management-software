<?php


if (isset($_POST['register_user'])) {
    // Retrieve form data
    global $connection;
    $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
    $user_phone = mysqli_real_escape_string($connection, $_POST['user_phone']);
    $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
    $user_department = $_POST['user_department'];
    $user_dob = $_POST['user_dob'];
    $user_blood_group = $_POST['user_blood_group'];
    $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);
    $user_cfpassword = mysqli_real_escape_string($connection, $_POST['user_cfpassword']);

    $phone_rgex = "/(\+88)?-?01[3-9]\d{8}/";
    $email_regx = "/([a-z\d][a-z\d_\-.]+[a-z\d]){1,10}@lus.ac.bd/";

    // File upload handling
    if (isset($_FILES['user_avater']) && $_FILES['user_avater']['error'] == UPLOAD_ERR_OK) {

        $upload_directory = "../upload/";
        $user_avater = $_FILES['user_avater']['name'];
        $user_avater_loc = $_FILES['user_avater']['tmp_name'];
        $avatar_path = $upload_directory . basename($user_avater);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($user_avater_loc, $avatar_path)) {
            // Check for duplicate entries
            $duplicate_user_id = mysqli_query($connection, "SELECT `st_id` FROM `users` WHERE `st_id` ='$user_id'");
            $duplicate_user_email = mysqli_query($connection, "SELECT `email` FROM `users` WHERE `email` = '$user_email'");
            $duplicate_user_phone = mysqli_query($connection, "SELECT `phone` FROM `users` WHERE `phone` = '$user_phone'");

            // Generate verification code
            $verification_code = bin2hex(random_bytes(16));

            if (!empty($user_name) && !empty($user_id) && !empty($user_password)) {
                if (!preg_match($phone_rgex, $user_phone)) {
                    echo "<script>
                            alert('Phone number is not accepted');
                         
                          </script>";
                } else if (mysqli_num_rows($duplicate_user_id)) {
                    echo "<script> alert('user id is already used '); </script>";
                } else if (mysqli_num_rows($duplicate_user_email)) {
                    echo "<script> alert('user email is already used'); </script>";
                } else if (mysqli_num_rows($duplicate_user_phone)) {
                    echo "<script> alert('user phone number is already used'); </script>";
                } else if ($user_password !== $user_cfpassword) {
                    echo "<script> alert('Password and Confirm password is not match'); </script>";
                } else if (!preg_match($email_regx, $user_email)) {
                    echo "<script> alert('Email is not valid'); </script>";
                } else {
                    $query = "INSERT INTO `users`(`name`, `email`, `phone`, `st_id`, `department`, `dob`, `blood_group`, `password`, `profile`, `verification_code`, `is_verify`) VALUES ('$user_name','$user_email','$user_phone','$user_id','$user_department','$user_dob','$user_blood_group','$user_password','../$avatar_path','$verification_code','0')";
                    $result = mysqli_query($connection, $query);

                    if ($result) {
                        echo "<h6 class='bg-warning text-center p-3 text-white'>Congratulations, Successfull</h6>";
                    } else {
                        echo "<h6 class='bg-warning text-center p-3 text-white'>Failed</h6>";
                    }
                }
            } else {
                echo "<script> alert('Data is empty'); </script>";
            }
        } else {
            echo "Failed to upload avatar.";
        }
    } else {
        echo "No file uploaded or upload error occurred.";
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
                                $query = "SELECT * FROM `department`";
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