<?php

if(isset($_POST['delete_btn'])){

    $department_id = $_POST['department_id'];
    $query = "DELETE FROM `department` WHERE `department_id`= '$department_id'";
    $query_run = mysqli_query($connection,$query);

    confirmQuery($query_run);
    success_data();
    header("Location: department.php?source=view_department");
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
                    $head_photo = $row['head_photo'];

                    if($id == $department_id){

                ?>

                <div class="delete_cards text-center">
                    <h4> Are you sure you want to delete  <i class="typcn typcn-user-delete-outline menu-icon"></i> ???</h4>
                    <div class="image_container">
                        <img src="../upload/<?php echo $head_photo ?>" style="width: 200px; height: auto"/>
                    </div>
                    <div class="name_container">
                        <h5><?php echo $department_name ?></h5>
                    </div>

                    <div class="row justify-content-around d-flex">

                        <form action="" method="post">
                            <input type="hidden" name="department_id" value="<?php echo $department_id ?>">
                            <button type='submit' class='btn btn-danger' name="delete_btn"> Delete   <i class="typcn typcn-document-delete menu-icon"></i></button>
                        </form>

                        <a href='department.php'><button type='submit' class='btn btn-success'> CANCEL </button></a>
                    </div>


                </div>

           <?php

            }else{
                empty_data();
            }

            }

        }
        ?>

    </div>

</div>
