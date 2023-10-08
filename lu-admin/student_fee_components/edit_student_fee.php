<?php

//fetch user information with get supper global method
global $connection;

if(isset($_GET['fee_id'])){
    $fee_id = $_GET['fee_id'];

    $query = "SELECT * FROM student_fees WHERE id = '$fee_id'";
    $query_fetch_fees = mysqli_query($connection,$query);

    confirmQuery($query_fetch_fees);

    while($row = mysqli_fetch_assoc($query_fetch_fees)){

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

    }
}


?>
<div class="row">


    <div class="col-md-8 m-auto">

        <div class="card mb-5 register_cards">
            <div class="card-body">

                <h4 class="card-title text-center"> Updated Student Fees </h4>

                <div class="card p-3 m-3">
                      Student ID: <?php echo $student_id ?> <br>
                      Student Semester: <?php echo $student_semester ?><br>
                      Student Semester: <?php echo $student_semester ?><br>
                      Course Credit: <?php echo $course_credit ?><br>
                      Course Fees: <?php echo $course_fee ?><br>
                      Received Fees: <?php echo $received_fee ?><br>
                      <p style="color: red">Due Fees: <?php echo $course_fee - $received_fee; ?> </p>
                </div>

                <?php

                if(isset($_POST['add_fees'])){

                    $received_fee_new = real_escape($_POST['received_fee']) + $received_fee;
                    $receiver_name = real_escape($_POST['receiver_name']);


                    $query = "UPDATE `student_fees` SET `received_fee`='$received_fee_new',`receiver_name`='$receiver_name' WHERE `id`=$fee_id";
                    $query_run = mysqli_query($connection,$query);

                    if($query_run){

                        echo "<h6 class='bg-warning text-center p-3 text-white'>Congratulations, Fee Updated Successfully </h6>";

                    }else{
                        echo "<h6 class='bg-warning text-center p-3 text-white'>Failed</h6>";
                    }

                }

                ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="register-form row">

                        <div class="form-group col-md-6">
                            <label for="name" style="color: whitesmoke"> Received Fee (New) </label>
                            <input type="number" name="received_fee" id="" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" style="color: whitesmoke"> Receiver Name </label>
                            <input type="text" name="receiver_name" id="" value="<?php echo $receiver_name ?>" class="form-control">

                        </div>
                        <input type="hidden" name="fee_id" id="" value="<?php echo $fee_id  ?>" class="form-control">

                        <div class="text-center col-md-12">
                            <button type='submit' name='add_fees' id='register-btn' class="btn btn-outline-primary">Updated Student Fees</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>


    </div>


</div>