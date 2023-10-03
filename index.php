<?php include ("assets/includes/header.php")?>

  <!-- ======= Hero Section ======= -->
    <?php include ("assets/includes/hero_section.php")?>

  <main id="main">

      <!-- Features Box -->
      <div class="features-box">
          <div class="container-fluid">
              <div class="container">
                  <div class="features-content text-center">
                      <h4>Features</h4>
                      <h2>The benefit of using<br> our platform</h2>
                  </div>

                  <div class="feature-grid-wrapper">



                      <?php

                      global $connection;
                      $query = "SELECT * FROM `users`";
                      $query_run = mysqli_query($connection, $query);
                      confirmQuery($query_run);

                      $user_count = mysqli_num_rows($query_run);
                      if($user_count > 0){

                          while ($row = mysqli_fetch_assoc($query_run)){
                              $user_id  = $row['id'];
                              $name  = $row['name'];
                              $email  = $row['email'];
                              $phone = $row['phone'];
                              $st_id  = $row['st_id'];
                              $department = $row['department'];
                              $dob  = $row['dob'];
                              $blood_group = $row['blood_group'];
                              $profile = $row['profile'];
                              $user_role = $row['user_role'];
                              $create_date = $row['create_date'];
                              ?>

                              <div class='grid-box'>
                                  <i class='fa-solid fa-code'></i>
                                  <h4><?php echo $name ?></h4>
                              </div>

                          <?php
                          }

                      }else{
                          echo "No Student Found";
                      }

                      $feature_item = [
                              "Safe & Secure",
                          "Safe & Secure",
                          "Safe & Secure",
                          "Safe & Secure",
                          "Safe & Secure",
                          "Safe & Secure",
                          "Safe & Secure",
                          "Safe & Secure",
                          "Safe & Secure",
                          "Safe & Secure",
                          "Safe & Secure",
                          "Safe & Secure",
                          "Safe & Secure"

                      ];

                      ?>
                  </div>
              </div>
          </div>
      </div>
  </main><!-- End #main -->

<?php include ("assets/includes/footer.php")?>