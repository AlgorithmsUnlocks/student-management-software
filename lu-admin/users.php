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

            <?php if(($_SESSION['user_role'] == 'super_admin')){ ?>
                <!-- Main Content Panel -->

                <?php

                if(isset($_GET['source'])){
                    $source = $_GET['source'];
                }else{
                    $source = "";
                }

                switch($source){
                    case 'all_users':
                        include "users_components/all_users.php";
                        break;
                    case 'add_user':
                        include "users_components/add_user.php";
                        break;
                    case 'edit_users':
                        include "users_components/edit_users.php";
                        break;
                    case 'delete_user':
                        include "users_components/delete_user.php";
                        break;
                    default:
                        invalid_url();
                }

                ?>

                <?php
            }else{
               invalid_url();
            }
            ?>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include("includes/admin_footer.php") ?>