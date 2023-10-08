<div class="row">

    <div class="col-md-12">
        <div class="card mb-5">

            <?php $login_student_name = $_SESSION['name']; ?>

            <h2 class="text-center text-primary p-3">Hi, <?php echo $login_student_name; ?></h2>
            <h4 class="text-center text-primary"> All Payment History (Only for personal view) </h4>

            <?php
            global $connection;
            $login_student_id = $_SESSION['st_id'];

            $query = "SELECT * FROM `student_fees` WHERE student_id='$login_student_id'";
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
                            <th> Student ID </th>
                            <th> Semester </th>
                            <th> Credit </th>
                            <th> Total  </th>
                            <th> Received  </th>
                            <th> Due </th>
                            <th> R.Name </th>
                            <th> Add Date </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        while($row = mysqli_fetch_assoc($query_fetch_users)){

                            $fee_id  = $row['id'];
                            $student_id  = $row['student_id'];
                            $student_semester  = $row['student_semester'];
                            $course_credit = $row['course_credit'];
                            $course_fee  = $row['course_fee'];
                            $received_fee = $row['received_fee'];
                            $due_fee  = $row['due_fee'];
                            $receiver_name = $row['receiver_name'];
                            $add_date = $row['add_date'];
                            $update_date = $row['update_date'];

                            ?>
                            <tr>

                                <td><?php echo $fee_id ?> </td>
                                <td><?php echo $student_id ?></td>
                                <td><?php echo $student_semester ?></td>
                                <td><?php echo $course_credit ?></td>
                                <td><?php echo $course_fee ?></td>
                                <td><?php echo $received_fee ?></td>
                                <td style="color: red"><?php echo  $course_fee - $received_fee; ?></td>
                                <td><?php echo $receiver_name ?></td>
                                <td><?php echo $add_date ?></td>
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