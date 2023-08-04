<?php session_start(); ?>
<?php
    $_SESSION['user_id'] = NULL;
    $_SESSION['name'] = NULL;
    $_SESSION['email'] = NULL;
    $_SESSION['phone'] = NULL;
    $_SESSION['st_id'] = NULL;
    $_SESSION['department'] = NULL;
    $_SESSION['dob'] = NULL;
    $_SESSION['blood_group'] = NULL;
    $_SESSION['profile'] = NULL;
    $_SESSION['user_role'] = NULL;
    $_SESSION['create_date'] = NULL;
    session_unset();
    session_destroy();
    header('Location: ../../login.php');

?>
