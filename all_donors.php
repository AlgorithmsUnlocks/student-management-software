<?php include('assets/includes/header.php') ?>



    <main id="main">

        <!-- Features Box -->
        <div class="features-box">
            <div class="container-fluid">
                <div class="container">
                    <div class="features-content text-center">
                        <h4>All Donors of Leading University </h4>
                        <h2> Donate Blood <br> Saves Life </h2>
                    </div>

                    <div class="feature-grid-wrapper-new">


                        <?php

                        global $connection;
                        $query = 'SELECT * FROM `users`';
                        $query_run = mysqli_query($connection, $query);
                        confirmQuery($query_run);

                        $user_count = mysqli_num_rows($query_run);
                        if ($user_count > 0) {   ?>
                            <table id='example' class='display' style='width:100%!important'>
                            <thead class='thead-dark'>
                            <tr>
                                <th scope='col'>Profile</th>
                                <th scope='col'>Name</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Phone</th>
                                <th scope='col'>Student ID.</th>
                                <th scope='col'>Department</th>
                                <th scope='col'>Blood G.</th>
                                <th scope='col'>User Role</th>

                            </tr>
                            </thead>
                            <tbody>

                        <?php

                            while ($row = mysqli_fetch_assoc($query_run)) {
                                $user_id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $st_id = $row['st_id'];
                                $department = $row['department'];
                                $dob = $row['dob'];
                                $blood_group = $row['blood_group'];
                                $profile = $row['profile'];
                                $user_role = $row['user_role'];
                                $create_date = $row['create_date'];

                                ?>

                                    <tr>
                                        <td>
                                            <img src="../upload/<?php echo $profile ?>" class='img-fluid'
                                                 style='height: 80px; border-radius: 50px; text-align: center'/>
                                        </td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $phone ?></td>
                                        <td><?php echo $st_id ?></td>
                                        <td>
                                            <?php

                                            $query_1 = "SELECT * FROM `department` WHERE department_id=$department";
                                            $query_fetch_users_1 = mysqli_query($connection, $query_1);
                                            while($row = mysqli_fetch_assoc($query_fetch_users_1)) {

                                                $department_id = $row['department_id'];
                                                $department_name = $row['department_name'];
                                                echo $department_name;
                                            }

                                            ?>
                                        </td>
                                        <td><?php echo $blood_group ?></td>
                                        <td><?php echo $user_role ?></td>

                                    </tr>


                            <?php
                            }
                            ?>
                            </tbody>
                            </table>
                        <?php

                        } else {
                            echo 'No Student Found';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>


    </main><!-- End #main -->

<?php include('assets/includes/footer.php') ?>