<?php
session_start();
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

// Include necessary files
require_once "../../lu-admin/includes/functions.php";
require_once "../../lu-admin/includes/database.php";
require '../../vendor/autoload.php'; // Assuming PHPMailer is installed via Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['register_student'])){
    // Retrieve form data
    global $connection;
    $student_name = real_escape($_POST['student_name']);
    $student_email = real_escape($_POST['student_email']);
    $student_phone = real_escape($_POST['student_phone']);
    $student_id = real_escape($_POST['student_id']);
    $student_department = $_POST['student_department'];
    $student_dob = $_POST['student_dob'];
    $user_blood_group = $_POST['user_blood_group'];
    $student_password = real_escape($_POST['student_password']);
    $student_cfpassword = real_escape($_POST['student_cfpassword']);

    $phone_rgex = "/(\+88)?-?01[3-9]\d{8}/";
    $email_regx = "/([a-z\d][a-z\d_\-.]+[a-z\d]){1,10}@lus.ac.bd/";

    // File upload handling
    $student_avater = $_FILES['student_avater']['name'];
    $student_avater_loc = $_FILES['student_avater']['tmp_name'];
    $upload_directory = "../../upload/";
    $avatar_path = $upload_directory . basename($student_avater);

    // Move the uploaded file to the specified directory
    if(move_uploaded_file($student_avater_loc, $avatar_path)) {
        // Check for duplicate entries
        $duplicate_student_id = mysqli_query($connection, "SELECT `st_id` FROM `users` WHERE `st_id` ='$student_id'");
        $duplicate_student_email = mysqli_query($connection, "SELECT `email` FROM `users` WHERE `email` = '$student_email'");
        $duplicate_student_phone = mysqli_query($connection, "SELECT `phone` FROM `users` WHERE `phone` = '$student_phone'");

        // Generate verification code
        $verification_code = bin2hex(random_bytes(16));


        if(!empty($student_name) && !empty($student_id) && !empty($student_password)){

            if(!preg_match($phone_rgex,$student_phone)){

                echo "<script>
                        alert('Phone number is not accepted');
                        window.location.href = '../../register.php';
                  </script>";

            }else if(mysqli_num_rows($duplicate_student_id)){

                echo "<script> alert('Student id is already used '); window.location.href = '../../register.php'; </script>";

            }else if(mysqli_num_rows($duplicate_student_email)){

                echo "<script> alert('Student email is already used'); window.location.href = '../../register.php'; </script>";

            }else if(mysqli_num_rows($duplicate_student_phone)){

                echo "<script> alert('Student phone number is already used'); window.location.href = '../../register.php';</script>";

            }else
                if($student_password !== $student_cfpassword){

                    echo "<script> alert('Password and Confirm password is not match');window.location.href = '../../register.php'; </script>";

                }
                else if(!preg_match($email_regx,$student_email)){

                    echo "<script> alert('Email is not valid'); window.location.href = '../../register.php';</script>";

                }
                else{
                    // Instantiate PHPMailer
                    $mail = new PHPMailer();

                    try {
                        // SMTP configuration
                        $mail->SMTPDebug = 0;
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'lu.aide12345@gmail.com';
                        $mail->Password = 'sjps zpin pklp rucb';
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = 587;

                        $mail->setFrom('lu.aide12345@gmail.com', 'LU AID');
                        $mail->addAddress($student_email);
                        $mail->isHTML(true);
                        $mail->Subject = 'Email Verification';
                        $mail->Body = "Thanks for your registration; your verification code is: $verification_code";


                        $mail->send();

                        $query = "INSERT INTO `users`(`name`, `email`, `phone`, `st_id`, `department`, `dob`, `blood_group`, `password`, `profile`, `verification_code`, `is_verify`) VALUES ('$student_name','$student_email','$student_phone','$student_id','$student_department','$student_dob','$user_blood_group','$student_password','$avatar_path','$verification_code','0')";
                        $result = mysqli_query($connection, $query);

                        if($result) {
                            header("Location: verify-code.php?email=$student_email");
                            exit();
                        } else {
                            echo "Error: " . mysqli_error($connection);
                        }

                    } catch (Exception $e) {
                        // Handle errors
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }

        }else{

            echo "<script> alert('Data is empty'); window.location.href = '../../register.php'; </script>";

        }

    } else {
        echo "Failed to upload avatar.";
    }
}
