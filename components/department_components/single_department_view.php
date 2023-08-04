<?php
if(isset($_GET['id'])){
    echo $id = $_GET['id'];
}else{
    header("Location: faculty.php");
}
$query = "SELECT * FROM `department` WHERE department_id='$id'";
$query_fetch_department = mysqli_query($connection,$query);
confirmQuery($query_fetch_department);
while ($row = mysqli_fetch_assoc($query_fetch_department)) {

    $department_id = $row['department_id'];
    $department_name = $row['department_name'];
    $head_name = $row['head_name'];
    $head_email = $row['head_email'];
    $head_phone = $row['head_phone'];
    $head_description = $row['head_description'];
    $head_photo = $row['head_photo'];
}

?>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><?php echo $department_name?></h2>
            <ol>
                <li><a href="department.php">Department</a></li>
                <li><?php echo $head_name; ?></li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-6 m-auto">
                <div class="portfolio-info">
                    <h3 class="text-center">Department Head Information</h3>
                   <div class="text-center">
                       <img src="upload/<?php echo $head_photo ?>" class="img-fluid" style="width: 150px; border-radius: 20px; box-shadow: 0px 0 30px rgb(18 66 101 / 8%); margin: 15px 0;"/>
                        <h5 class="text-primary"> <?php echo $head_name ?></h5>
                   </div>
                    <div class="d-flex justify-content-between">
                        <p><strong>Department Name : </strong></p>
                        <p><?php echo $department_name?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p><strong>Phone Number : </strong></p>
                        <p><?php echo $head_phone?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p><strong>Email Address : </strong></p>
                        <p><?php echo $head_email?></p>
                    </div>

                </div>
            </div>

        </div>
        <h3> All Teacher Information </h3>

        <div class="col-md-6 m-auto">
            <div class="search-form">
                <form action="department.php?source=search_teacher_result" method="post">
                    <input type="text" name="search_text" placeholder="Search">
                    <input type="submit" value="Search" name="search_btn">
                </form>
            </div>
        </div>
        <div class="row gy-4">

            <?php
            $query = "SELECT * FROM `faculty_teachers` WHERE teacher_department_id=$id";
            $query_run = mysqli_query($connection,$query);
            $faculty_teachers_count = mysqli_num_rows($query_run);

            if($faculty_teachers_count > 0){
            while($row = mysqli_fetch_assoc($query_run)){

            $teacher_id = $row['teacher_id'];
            $faculty_id = $row['faculty_id'];
            $teacher_department_id = $row['teacher_department_id'];
            $teacher_name= $row['teacher_name'];
            $teacher_title= $row['teacher_title'];
            $teacher_email = $row['teacher_email'];
            $teacher_cell = $row['teacher_cell'];
            $education_bg_conduct_course = substr($row['education_bg_conduct_course'],0,20);
            $teacher_photo = $row['teacher_photo'];
            ?>

            <div class="col-lg-4">

                <div class="portfolio-info">
                    <div class="text-center">
                        <img src="upload/<?php echo $teacher_photo ?>" class="img-fluid" style="height: 150px; border-radius: 20px; box-shadow: 0px 0 30px rgb(18 66 101 / 8%); margin: 15px 0;"/>
                        <h5 class="text-primary"> <?php echo $teacher_name ?></h5>
                    </div>
                    <div class="personals">
<!--                        <p><strong>Department Name : </strong> --><?php //echo $teacher_department_id?><!--</p>-->
                        <p><strong>Phone Number : </strong> <?php echo $teacher_cell?></p>
                        <p><strong>Email Address : </strong> <?php echo $teacher_email?></p>
                        <p><strong>Teacher Title : </strong> <?php echo $teacher_title?></p>
                    </div>

                </div>
            </div>

            <?php
                }
            }
            ?>

        </div>

    </div>
</section><!-- End Portfolio Details Section -->