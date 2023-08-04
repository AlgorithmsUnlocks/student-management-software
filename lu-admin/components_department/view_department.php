<?php
//Insert into Database

if(isset($_POST['register'])){

    $department_name = real_escape($_POST['department_name']);
    $head_name = real_escape($_POST['head_name']);
    $head_email = real_escape($_POST['head_email']);
    $head_phone = real_escape($_POST['head_phone']);
    $head_description = real_escape($_POST['head_description']);

    $head_photo = $_FILES['head_photo']['name'];
    $head_photo_loc = $_FILES['head_photo']['tmp_name'];


    if(!empty($department_name) && !empty($head_name) &&!empty($head_email) &&!empty($head_phone) &&!empty($head_description) &&!empty($head_photo)){

        $query = "INSERT INTO `department`(`department_name`, `head_name`, `head_email`, `head_phone`, `head_description`, `head_photo`) VALUES ('$department_name','$head_name','$head_email','$head_phone','$head_description','$head_photo')";

        $query_run = mysqli_query($connection, $query);

        confirmQuery($query_run);
        move_uploaded_file($head_photo_loc,"../upload/{$head_photo}");
        success_data();
    }else{
        empty_data();
    }

}

// Delete Data

?>




<div class="container">

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white text-center" id="exampleModalLongTitle">Add Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class='form-control'name='department_name' placeholder='Department Name'>
                        </div>
                        <div class="form-group">
                            <input type="text" class='form-control'name='head_name' placeholder='Name of Head'>
                        </div>
                        <div class="form-group">
                            <input type="email" class='form-control'name='head_email' placeholder='Email of Head'>
                        </div>
                        <div class="form-group">
                            <input type="tel" class='form-control'name='head_phone' placeholder='Phone of Head'>
                        </div>
                        <div class="form-group">
                           <textarea class="form-control" cols="30" rows="5" name="head_description" id="summernote" placeholder="Head Descriptions"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" class='form-control'name='head_photo' placeholder='photo'>
                            <label for="dean_photo">Please upload profile photo</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name='register'>Save Changes</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>




<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-lg-5">
        <div class="card-header py-3">
            <h2 class='text-center title p-3'>
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalLong">
                        <i class="fa-solid fa-users-viewfinder"></i> <span>
                                          Click to Add Department
                               </span>
                    </button>
            </h2>

        </div>
        <div class="card-body">


            <div class="table-responsive">

                <?php
                $query = "SELECT * FROM `department`";
                $query_run = mysqli_query($connection,$query);
                confirmQuery($query_run);

                $department_count = mysqli_num_rows($query_run);
                ?>
                <table id="example" class="display" style="width:100%!important">
                    <thead>
                    <tr>


                        <th>Department Name</th>
                        <th>Name of Head</th>
                        <th>Email of Head</th>
                        <th>Phone of Head</th>
                        <th>Profile</th>
                        <th>Actions</th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php

                    if($department_count > 0){
                        while($row = mysqli_fetch_assoc($query_run)){

                            $department_id = $row['department_id'];
                            $department_name = $row['department_name'];
                            $head_name = $row['head_name'];
                            $head_email = $row['head_email'];
                            $head_phone = $row['head_phone'];
                            $head_description = substr($row['head_description'],0,10);
                            $head_photo = $row['head_photo'];

                            ?>
                            <tr>

                                <td><?php echo $department_name ?></td>
                                <td><?php echo $head_name ?></td>
                                <td><?php echo $head_email ?></td>
                                <td><?php echo $head_phone ?></td>
                                <td>
                                    <img src="../upload/<?php echo $head_photo; ?>" class="img-fluid" style="border-radius: 50px; height: auto; width: 160px"/>
                                </td>

                                <td>

                                    <a href="department.php?source=edit_department&id=<?php echo $department_id ?>" method="GET" class="bg-primary pt-2 pl-3 pb-2 pr-3 text-white">
                                           Edit
                                    </a>
                                    <hr>
                                    <a href="department.php?source=delete_department&id=<?php echo $department_id ?>" method="GET" class="bg-warning pt-2 pl-3 pb-2 pr-3 text-white">
                                       Delete
                                    </a>
                                </td>


                            </tr>

                            <?php
                        }

                    }else{
                        echo "No Data Found";
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
