<!-- Content Row -->
<div class="row">

    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                        <p class="mb-2 text-md-center text-lg-left">Total  Department</p>
                        <?php

                        $query = "SELECT * FROM `department`";
                        $query_fetch_department = mysqli_query($connection,$query);
                        $query_fetch_department_count = mysqli_num_rows($query_fetch_department);

                        ?>
                        <h1 class="mb-0"><?php echo $query_fetch_department_count; ?></h1>

                    </div>
                    <i class="typcn typcn-chart-pie icon-xl text-secondary"></i>
                </div>
                <a href="department.php?source=view_department" class="btn btn-primary form-control">View  Department</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                        <p class="mb-2 text-md-center text-lg-left">Total Register Users </p>
                        <?php

                        $query = "SELECT * FROM `users`";
                        $query_fetch = mysqli_query($connection,$query);
                        $query_fetch_count = mysqli_num_rows($query_fetch);

                        ?>
                        <h1 class="mb-0"><?php echo $query_fetch_count; ?></h1>

                    </div>
                    <i class="typcn typcn-clipboard icon-xl text-secondary"></i>
                </div>
                <a href="users.php?source=all_users" class="btn btn-primary form-control">View </a>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                        <p class="mb-2 text-md-center text-lg-left">Total Register Student </p>
                        <?php

                        $query = "SELECT * FROM `users` WHERE user_role='student'";
                        $query_fetch = mysqli_query($connection,$query);
                        $query_fetch_count = mysqli_num_rows($query_fetch);

                        ?>
                        <h1 class="mb-0"><?php echo $query_fetch_count; ?></h1>

                    </div>
                    <i class="typcn typcn-clipboard icon-xl text-secondary"></i>
                </div>
                <a href="student_fee.php?source=all_student" class="btn btn-primary form-control">View </a>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card mt-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                        <p class="mb-2 text-md-center text-lg-left">Total Student Fee Received </p>
                        <?php

                        $query = "SELECT * FROM `student_fees`";
                        $query_fetch = mysqli_query($connection,$query);
                        $query_fetch_count = mysqli_num_rows($query_fetch);

                        ?>
                        <h1 class="mb-0"><?php echo $query_fetch_count; ?></h1>

                    </div>
                    <i class="typcn typcn-clipboard icon-xl text-secondary"></i>
                </div>
                <a href="student_fee.php?source=manage_student_fee" class="btn btn-primary form-control">View </a>
            </div>
        </div>
    </div>
    <div class='col-md-4 grid-margin stretch-card mt-4'>
        <div class='card'>
            <div class='card-body'>
                <div class='d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4'>
                    <div>
                        <p class='mb-2 text-md-center text-lg-left'>Total Contact Forms Submission </p>
                        <?php

                        $query = 'SELECT * FROM `contact`';
                        $query_fetch = mysqli_query($connection, $query);
                        $query_fetch_count = mysqli_num_rows($query_fetch);

                        ?>
                        <h1 class="mb-0"><?php echo $query_fetch_count; ?></h1>

                    </div>
                    <i class="typcn typcn-clipboard icon-xl text-secondary"></i>
                </div>
                <a href="contact-forms.php?source=all_contact" class="btn btn-primary form-control">View </a>
            </div>
        </div>
    </div>

</div>

