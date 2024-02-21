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

                      $feature_item = [
                              "Register Systems",
                          "(Student, Teacher, Account Officer)",
                          "Login System",
                          "University Fee Management",
                          "Student Fee Portal",
                          "Accountant Action",
                          "Blood Donations Systems",
                          "Student Dashboard",

                      ];

                      foreach ($feature_item as $feature){ ?>
                          <div class='grid-box'>
                              <i class='fa-solid fa-code'></i>
                              <h4> <?php echo  $feature; ?> </h4>
                          </div>
                     <?php }

                      ?>

                  </div>
              </div>
          </div>
      </div>
  </main><!-- End #main -->

<?php include ("assets/includes/footer.php")?>