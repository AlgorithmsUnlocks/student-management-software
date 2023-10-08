<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">

            <h4> Search Result ... </h4>

            <div class="col-md-6 m-auto">
                <div class="search-form">
                    <form action="department.php?source=search_teacher_result" method="post">
                        <input type="text" name="search_text" placeholder="Search">
                        <input type="submit" value="Search" name="search_btn">
                    </form>
                </div>
            </div>

        </div>

        <div class="row">

<?php

    if(isset($_POST['search_btn'])){

        global $connection;
        $search_text = $_POST['search_text'];

        if(!empty($search_text)){
            $query = "SELECT * FROM faculty_teachers WHERE teacher_name LIKE '%$search_text%'";

            $search_query = mysqli_query($connection, $query);

            if(!$search_query){
                die("QUERY FAILED".mysqli_connect_error());

            }else{
                $count = mysqli_num_rows($search_query);
                if($count == 0){
                    echo "<h2 class='not-found text-center'>No Result Found </h2>";
                }else{

                    while($row = mysqli_fetch_assoc($search_query)){

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
            }
        }else{
            header("Location: department.php");
        }

    }else{
        header("Location: department.php");
    }


?>

        </div>

    </div>
</section><!-- End Service  Section -->
