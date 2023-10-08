<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <div class="counters">
                <?php
                $query = "SELECT * FROM `department`";
                $query_fetch_department = mysqli_query($connection,$query);
                $query_count = mysqli_num_rows($query_fetch_department);
                ?>
                <span><?php echo $query_count?></span>
            </div>
            <h2>All Department of <span class="text-bg-primary p-1">Leading University</span></h2>
            <h6>Here you can see all the department of Leading University</h6>
        </div>

        <div class="row">

            <?php

            $query = "SELECT * FROM `department`";
            $query_fetch_department = mysqli_query($connection,$query);
            confirmQuery($query_fetch_department);
            while ($row = mysqli_fetch_assoc($query_fetch_department)){

                $department_id = $row['department_id'];
                $department_name = $row['department_name'];
                $head_name = $row['head_name'];
                $head_email = $row['head_email'];
                $head_phone = $row['head_phone'];
                $head_description = substr($row['head_description'],0,10);
                $head_photo = $row['head_photo'];

                ?>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-blue">
                        <h4><a href="department.php?source=single_department_view&id=<?php echo $department_id ?>"><?php echo "Department of ".$department_name.",<span style='font-size: 16px; color: #007aff'> Head of the department ".$head_name."</span>" ?></a></h4>
                    </div>
                </div>

                <?php
            }
            ?>



        </div>

    </div>
</section><!-- End Service  Section -->