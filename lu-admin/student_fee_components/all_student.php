<div class="row">

    <div class="col-md-12">
        <div class="card mb-5" >


            <?php

            $query = "SELECT * FROM `users` WHERE `user_role` = 'student'";
            $query_fetch_users = mysqli_query($connection, $query);
            $total_users = mysqli_num_rows($query_fetch_users);
            // echo $total_blood_count;

            if($total_users > 0){

                ?>
                <div class="table-responsive p-3">

                    <table id="example" class="display" style="width:100%!important">
                        <thead>
                        <tr>
                            <th class="ml-5">ID</th>
                            <th> Name </th>
                            <th> S.ID</th>
                            <th> Department</th>
                            <th> Profile</th>

                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        while($row = mysqli_fetch_assoc($query_fetch_users)){

                            $user_id  = $row['id'];
                            $name  = $row['name'];
                            $email  = $row['email'];
                            $phone = $row['phone'];
                            $st_id  = $row['st_id'];
                            $department = $row['department'];
                            $dob  = $row['dob'];
                            $blood_group = $row['blood_group'];
                            $profile = $row['profile'];
                            $user_role = $row['user_role'];
                            $create_date = $row['create_date'];

                            ?>
                            <tr>
                                <td><?php echo $user_id ?> </td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $st_id ?></td>
                                <td><?php echo $department ?></td>

                                <td>
                                    <img src="../upload/<?php echo $profile ?>" class="img-fluid" style="height: 80px; border-radius: 50px; text-align: center"/>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">


                                        <a href="users.php?source=edit_users&user_id=<?php echo $user_id; ?>">
                                            <button type="submit" class="btn btn-success btn-sm btn-icon-text mr-3" name="update_btn">
                                                Edit

                                            </button>
                                        </a>

                                        <a href="users.php?source=delete_user&user_id=<?php echo $user_id; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm btn-icon-text" name="delete_btn">
                                                Delete

                                            </button>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <?php
            }else{
                echo "<h3 class='text-center p-4'> No Results Found </h3>";
            }
            ?>

        </div>
    </div>

</div>