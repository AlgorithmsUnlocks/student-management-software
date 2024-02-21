<!--This is admin header part -->
<?php include("includes/admin_header.php"); ?>
<!--This is admin header part end -->

<!-- Sidebar -->
<?php include("includes/admin_sidebar.php") ?>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php include("includes/admin_topbar.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <section class="h-100 gradient-custom-2">
            <div class="container py-5 h-40">
                <div class="row d-flex justify-content-center align-items-center h-40">
                    <div class="col col-lg-9 col-xl-7">
                        <div class="card">
                            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                    <img src="<?php  $profile_path = $_SESSION['profile'];
                                    $profile_path = substr($profile_path, 3);
                                    echo $profile_path; ?>"
                                         alt="placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                         style="width: 250px; z-index: 1">
                                </div>
                                <div class="ms-3" style="margin-top: 130px;">
                                    <h5><?php echo $_SESSION['name']; ?></h5>
                                    <p><?php echo $_SESSION['user_role']; ?></p>
                                </div>
                            </div>

                            <div class="card-body p-4 text-black">
                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">About</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        <p class="font-italic mb-1">Email : <?php echo $_SESSION['email']; ?></p>
                                        <p class="font-italic mb-1">Phone Number : <?php echo $_SESSION['phone']; ?></p>
                                        <p class="font-italic mb-0">Your ID. : <?php echo $_SESSION['st_id']; ?></p>
                                        <p class="font-italic mb-0">Department : <?php echo $_SESSION['department']; ?></p>
                                        <p class="font-italic mb-0">Date of Birth : <?php echo $_SESSION['dob']; ?></p>
                                        <p class="font-italic mb-0">Blood Group : <?php echo $_SESSION['blood_group']; ?></p>
                                        <p class="font-italic mb-0">I am : <?php echo $_SESSION['user_role']; ?></p>
                                        <p class="font-italic mb-0">Creation Date : <?php echo $_SESSION['create_date']; ?></p>
                                    </div>
                                </div>

                            </div>
                            <div class="text-center p-3 m-3">
                                <a class="btn btn-outline-primary" href="user_profile_edit.php?id=<?php echo $_SESSION['user_id']; ?>">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("includes/admin_footer.php") ?>