<?php

//Add Students Fees


if(isset($_POST['add_fees'])){

    $student_id =  real_escape($_POST['student_id']);
    $student_semester = real_escape($_POST['student_semester']);
    $course_credit	= real_escape($_POST['course_credit']);
    $course_fee = real_escape($_POST['course_fee']);
    $received_fee = real_escape($_POST['received_fee']);
    $due_fee =  $course_fee - $received_fee;
    $receiver_name = real_escape($_POST['receiver_name']);


    $duplicate_student_semester = mysqli_query($connection,"SELECT `student_semester` FROM `student_fees` WHERE `student_semester` = '$student_semester'");
    $duplicate_student_id_for_fee = mysqli_query($connection,"SELECT `student_id` FROM `student_fees` WHERE `student_id` = '$student_id'");


    if(!empty($student_id) && !empty($student_semester) && !empty($course_credit) && !empty($course_fee) && !empty($received_fee) && !empty($receiver_name) ){

        if(mysqli_num_rows($duplicate_student_semester) && mysqli_num_rows($duplicate_student_id_for_fee) ){
            echo "<script> alert('Student Semester is already Input');</script>";
        }else{
            $query = "INSERT INTO `student_fees`(`student_id`, `student_semester`, `course_credit`, `course_fee`, `received_fee`, `due_fee`, `receiver_name`) VALUES ('$student_id','$student_semester','$course_credit','$course_fee','$received_fee','$due_fee','$receiver_name')";

            $query_run = mysqli_query($connection,$query);

            if($query_run){

                echo "<h6 class='bg-warning text-center p-3 text-white'>Congratulations, Fee Added Successfully </h6>";

            }else{
                echo "<h6 class='bg-warning text-center p-3 text-white'>Failed</h6>";
            }
        }


    }else{

        echo "<h6 class='bg-warning text-center p-3 text-white'>OOPS, Some Data are missing</h6>";
    }

}


?>


<div class="row">


    <div class="col-md-8 m-auto">

        <div class="card mb-5 register_cards students_cards">
            <div class="card-body">

                <h4 class="card-title text-center p-3 text-primary"> ADD STUDENT FEES <span class="text-danger"> (ONLY FOR NEW ENTRY) </span></h4>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="register-form row">
                        <div class="form-group col-md-6">
                            <label for="name" style="color: whitesmoke"> Select Student ID </label>
                            <select name="student_id" class='form-control'>
                                <option value="">-select-</option>
                                <?php
                                $query = "SELECT * FROM users WHERE user_role='student'";
                                $query_run = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($query_run)){
                                    $st_id = $row['st_id'];
                                    $name = $row['name']; ?>
                                    <option value="<?php echo $st_id ?>"><?php echo $st_id ?></option>
                                    <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group col-md-6">

                            <label for="name" style="color: whitesmoke"> Select Student Semester </label>
                            <select name="student_semester" class='form-control'>
                                <option value="">-select-</option>
                                <option value="1_semester">1 Semester</option>
                                <option value="2_semester">2 Semester</option>
                                <option value="3_semester">3 Semester</option>
                                <option value="4_semester">4 Semester</option>
                                <option value="5_semester">5 Semester</option>
                                <option value="6_semester">6 Semester</option>
                                <option value="7_semester">7 Semester</option>
                                <option value="8_semester">8 Semester</option>
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" style="color: whitesmoke"> Total Credit </label>
                            <input type="number" class='form-control' name='course_credit' placeholder='total credit' require>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" style="color: whitesmoke"> Total Fee </label>
                            <input type="number" class='form-control' name='course_fee' placeholder='40,000 BDT' require>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name" style="color: whitesmoke"> Received Fee </label>
                            <input type="number" class='form-control' name='received_fee' placeholder='30,000 BDT' require>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" style="color: whitesmoke"> Receiver Name </label>
                            <input type="text" class='form-control' name='receiver_name' placeholder='Rad Khan'
                                   require>
                        </div>

                        <div class="text-center col-md-12">
                            <button type='submit' name='add_fees' id='register-btn' class="btn btn-outline-primary">Add Student Fees</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>


    </div>


</div>