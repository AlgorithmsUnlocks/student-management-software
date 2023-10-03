<?php include('assets/includes/header.php') ?>



    <main id="main">

        <!-- Features Box -->
        <div class="features-box">
            <div class="container-fluid">
                <div class="container">
                    <div class="features-content text-center">
                        <h4>Contact Forms of Leading University </h4>
                        <h2> How Can We <br> Help You </h2>
                    </div>

                    <div class="feature-grid-wrapper-new">

                        <div class="row">
                            <div class="col-md-6 m-auto">
                                <form action='assets/includes/submit.php' method='post' enctype='multipart/form-data'>

                                    <div class='register-form'>


                                        <div class='form-group'>
                                            <label for="name"> Your Name</label>
                                            <input type='text' class='form-control' name='name' placeholder='Your name'
                                                   required>
                                        </div>
                                        <div class='form-group'>
                                            <label for='email'> Email Address</label>
                                            <input type='email' class='form-control' name='email' placeholder='Email'
                                                   required>
                                        </div>
                                        <div class='form-group'>
                                            <label for='subject'> Subject</label>
                                            <input type='text' class='form-control' name='subject' placeholder='Subject'
                                                   required>
                                        </div>
                                        <div class='form-group'>
                                            <label for='message'> Message</label>
                                            <textarea name="message" id="" cols="30" rows="10"
                                                      class="form-control" placeholder="message"></textarea>
                                        </div>
                                        <div class='submit-regiter text-center'>
                                            <button type='submit' name='submit_btn' id='register-btn'>Send
                                                Messagena</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>


    </main><!-- End #main -->

<?php include('assets/includes/footer.php') ?>