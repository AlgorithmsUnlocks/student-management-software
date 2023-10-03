<?php
session_start();
?>
<?php include '../../lu-admin/includes/functions.php'; ?>
<?php include '../../lu-admin/includes/database.php'; ?>

<?php

// Register Actions


if (isset($_POST['submit_btn'])) {

    global $connection;

    $name = real_escape($_POST['name']);
    $email = real_escape($_POST['email']);
    $subject = real_escape($_POST['subject']);
    $message = real_escape($_POST['message']);

    $query = "INSERT INTO `contact`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {

        echo "<script> alert('Thanks for submit your query'); window.location.href = '../../../contact.php';</script>";
    } else {

        echo "<script> alert('Submission Failed'); </script>";
    }

}


?>
