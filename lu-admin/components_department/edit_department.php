<?php

if(isset($_POST['update'])){

    $department_id = real_escape($_POST['department_id']);
    $department_name = real_escape($_POST['department_name']);
    $head_name = real_escape($_POST['head_name']);
    $head_email = real_escape($_POST['head_email']);
    $head_phone = real_escape($_POST['head_phone']);
    $head_description = real_escape($_POST['head_description']);

            $query = "UPDATE `department` SET `department_name`='$department_name',`head_name`='$head_name',`head_email`='$head_email',`head_phone`='$head_phone',`head_description`='$head_description' WHERE `department_id`='$department_id'";
            $query_run = mysqli_query($connection, $query);

            confirmQuery($query_run);
            success_data();
}

?>

    <div class="card shadow mb-4">

            <div class="card-body">

                <?php
                // Edit Button Actions 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $query = "SELECT * FROM `department` WHERE department_id='$id'";
                    $query_run = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($query_run)) {

                        $department_id = $row['department_id'];
                        $department_name = $row['department_name'];
                        $head_name = $row['head_name'];
                        $head_email = $row['head_email'];
                        $head_phone = $row['head_phone'];
                        $head_description = $row['head_description'];
                        $head_photo = $row['head_photo'];
                    }
                        ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Department Name</label>
                                <input type="text" class='form-control'name='department_name' value="<?php echo $department_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Head Name</label>
                                <input type="text" class='form-control'name='head_name' value="<?php echo $head_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Head Email</label>
                                <input type="email" class='form-control'name='head_email' value="<?php echo $head_email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Head Phone</label>
                                <input type="tel" class='form-control'name='head_phone' value="<?php echo $head_phone; ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Head Description</label>
                                <textarea class="form-control" cols="30" rows="5" name="head_description" id="summernote"><?php echo $head_description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <img src="../upload/<?php echo $head_photo; ?>" class="img-fluid" style="border-radius: 50px; height: auto; width: 160px"/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class='form-control'name='department_id' value="<?php echo $department_id; ?>">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name='update'>Save Changes</button>
                        </div>
                    </form>

                        <a href='department.php'><button type='submit' class='btn btn-warning'> CANCEL </button></a>
                        <?php
                }else{
                    empty_data();
                }

                ?>

            </div>

    </div>
