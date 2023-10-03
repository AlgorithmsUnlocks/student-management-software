<?php
session_start();
?>
<?php include "../../lu-admin/includes/functions.php"; ?>
<?php include "../../lu-admin/includes/database.php"; ?>
<?php

global $connection;
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
