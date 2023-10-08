<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "lu-admin/includes/functions.php"; ?>
<?php include "lu-admin/includes/database.php"; ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font Awesom CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts Setup -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    <!-- External CSS Files -->
    <link rel="stylesheet" href="assets/css/header_style.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" />

    <title>LU AIDE - Development Mode</title>


</head>

<!-- Header HTML-->

<header class="header fixed-top">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <a href="index.php" class="logo">LeadingUniversity <span>AID </span></a>
            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="all_donors.php">All Donors</a>
                <a href="contact.php">Contact</a>
            </nav>
            <?php

            if(isset($_SESSION['st_id'])){ ?>
                <a class="getstarted" href="../../lu-admin/user_profiles.php">Profile</a>
            <?php  }else{ ?>

                <a href="register.php" class="link-btn"> Registration From Here</a>
            <?php }

            ?>
            <div id="menu-btn" class="fas fa-bars">
            </div>
        </div>
    </div>
</header>
