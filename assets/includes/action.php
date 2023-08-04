<?php
session_start();
?>
<?php include "../../lu-admin/includes/functions.php"; ?>
<?php include "../../lu-admin/includes/database.php"; ?>
<?php

if(isset($_POST['login_btn'])){

    $st_id = real_escape($_POST['st_id']);
    $user_password = real_escape($_POST['user_password']);

    $query = "SELECT * FROM `users` WHERE `st_id` = '$st_id'";
    $query_fetch_users = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($query_fetch_users)){

        $db_user_id  = $row['id'];
        $db_name  = $row['name'];
        $db_email  = $row['email'];
        $db_phone = $row['phone'];
        $db_st_id  = $row['st_id'];
        $db_department = $row['department'];
        $db_dob  = $row['dob'];
        $db_blood_group = $row['blood_group'];
        $db_profile = $row['profile'];
        $db_user_password = $row['password'];
        $db_user_role = $row['user_role'];
        $db_create_date = $row['create_date'];
    }
    if($st_id !== $db_st_id && $user_password !== $db_user_password){
        header('Location: ../../login.php');
    }else if($st_id == $db_st_id && $user_password == $db_user_password) {

            session_start();

            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['name'] = $db_name;
            $_SESSION['email'] = $db_email;
            $_SESSION['phone'] = $db_phone;
            $_SESSION['st_id'] = $db_st_id;
            $_SESSION['department'] = $db_department;
            $_SESSION['dob'] = $db_dob;
            $_SESSION['blood_group'] = $db_blood_group;
            $_SESSION['profile'] = $db_profile;
            $_SESSION['user_role'] = $db_user_role;
            $_SESSION['create_date'] = $db_create_date;

            header('Location: ../../lu-admin/user_profiles.php');
    }else{
        header('Location: ../../login.php');
    }

}

?>

<?php

// Register Actions


if(isset($_POST['register_student'])){

    $student_name =  real_escape($_POST['student_name']);
    $student_email = real_escape($_POST['student_email']);
    $student_phone = real_escape($_POST['student_phone']);
    $student_id = real_escape($_POST['student_id']);
    $student_department = $_POST['student_department'];
    $student_dob = $_POST['student_dob'];
    $user_blood_group = $_POST['user_blood_group'];
    $student_password = real_escape($_POST['student_password']);
    $student_cfpassword = real_escape($_POST['student_cfpassword']);

    $student_avater = $_FILES['student_avater']['name'];
    $student_avater_loc = $_FILES['student_avater']['tmp_name'];


    $phone_rgex = "/(\+88)?-?01[3-9]\d{8}/";
    $email_regx = "/([a-z\d][a-z\d_\-.]+[a-z\d]){1,10}@lus.ac.bd/";

    $duplicate_student_id = mysqli_query($connection,"SELECT `st_id` FROM `users` WHERE `st_id` ='$student_id'");
    $duplicate_student_email = mysqli_query($connection,"SELECT `email` FROM `users` WHERE `email` = '$student_email'");
    $duplicate_student_phone = mysqli_query($connection,"SELECT `phone` FROM `users` WHERE `phone` = '$student_phone'");


    $verification_code = bin2hex(random_bytes(16));


    if(!empty($student_name) && !empty($student_id) && !empty($student_password)){

        if(!preg_match($phone_rgex,$student_phone)){

            echo "<script> 
                        alert('Phone number is not accepted'); 
                        window.location.href = '../../../register.php';
                  </script>";

        }else if(mysqli_num_rows($duplicate_student_id)){

            echo "<script> alert('Student id is already used '); window.location.href = '../../../register.php'; </script>";

        }else if(mysqli_num_rows($duplicate_student_email)){

            echo "<script> alert('Student email is already used'); window.location.href = '../../../register.php'; </script>";

        }else if(mysqli_num_rows($duplicate_student_phone)){

            echo "<script> alert('Student phone number is already used'); window.location.href = '../../../register.php';</script>";

        }else if($student_password !== $student_cfpassword){

            echo "<script> alert('Password and Confirm password is not match');window.location.href = '../../../register.php'; </script>";

        }else if(!preg_match($email_regx,$student_email)){

            echo "<script> alert('Email is not valid'); window.location.href = '../../../register.php';</script>";

        }
        else{

            $query = "INSERT INTO `users`(`name`, `email`, `phone`, `st_id`, `department`, `dob`, `blood_group`, `password`, `profile`, `verification_code`, `is_verify`) VALUES ('$student_name','$student_email','$student_phone','$student_id','$student_department','$student_dob','$user_blood_group','$student_password','$student_avater','$verification_code','0')";

            $query_run = mysqli_query($connection,$query);

            if($query_run){

                move_uploaded_file($student_avater_loc,"../../upload/$student_avater");

                echo "<script> alert('Congratulations, Your registration is completed'); window.location.href = '../../../login.php';</script>";
            }else{

                echo "<script> alert('Student Registration is failed'); </script>";
            }
        }



    }else{

        echo "<script> alert('Data is empty'); window.location.href = '../../../register.php'; </script>";

    }

}


?>
