<?php ob_start(); ?>
<?php include "lu-admin/includes/database.php"; ?>
<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

        <title> LU - AID</title>

        <link rel="stylesheet" href="assets/css/register.css">
        <link href="assets/img/favicon.png" rel="icon">

    </head>
<body id="register-page" onload="myFunction()">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container registration-form rounded">
                <div class="row align-items-start">

                    <div class="col-md-12 text-center p-3">
                        <h4>Create A Student Account</h4>
                    </div>

                    <div class="col-lg-8 p-3 m-auto">

                        <?php if(isset($_SESSION['st_id'])){ ?>
                        <h4 class="text-primary text-center">You are Logged In</h4>
                        <p>Home ?? <a href='index.php'>Home </a></p>
                        <?php }else{ ?>
                            <div class="register-left-content">

                                <form action="../assets/includes/action.php" method="post" enctype="multipart/form-data">
                                    <div class="register-form">
                                        <div class="form-group">
                                            <input type="text" class='form-control' name='student_name' placeholder='Student Name' required>

                                        </div>
                                        <div class="form-group">

                                            <input type="email" class='form-control' name='student_email' placeholder='Email Address' required>
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class='form-control' name='student_phone' placeholder='Phone Number' required>
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class='form-control' name='student_id' placeholder='Stuent Id.' required>
                                        </div>

                                        <div class="form-group">
                                            <select name="student_department" class='form-control'>
                                                <option value="">Select Department</option>
                                                <?php
                                                $query = "SELECT * FROM department";
                                                $query_run = mysqli_query($connection,$query);
                                                while($row = mysqli_fetch_assoc($query_run)){
                                                    $department_id = $row['department_id'];
                                                    $department_name = $row['department_name']; ?>
                                                    <option value="<?php echo $department_id ?>"><?php echo $department_name ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class='form-control' name='student_dob'  placeholder='Date of Birth' required>
                                        </div>
                                        <div class="form-group">
                                            <select name="user_blood_group" class='form-control'>
                                                <option value="">Select blood group</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class='form-control' name='student_password' placeholder='Password' required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class='form-control' name='student_cfpassword'  placeholder='Confirm Password' required>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class='form-control' name='student_avater' id="formFile" required>
                                            <small class="text-danger">Upload your profile photo!</small>
                                        </div>
                                        <div class="submit-regiter text-center">
                                            <button type='submit' name='register_student' id='register-btn'>Create Account</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="info p-3">

                                <p class="text-center">Already Have A Student Account? <a href='login.php'>Sign In</a></p>

                            </div>
                        <?php }
                        ?>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"</script>

</body>
</html>