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

                      foreach ($feature_item as $item) { ?>
                          <div class="grid-box">
                              <i class="fa-solid fa-code"></i>
                              <h4><?php echo $item ?></h4>
                          </div>
                     <?php }

                      ?>
                  </div>
              </div>
          </div>
      </div>
  </main><!-- End #main -->

<?php include ("assets/includes/footer.php")?>