<div class='row'>

    <div class='col-md-12'>
        <div class='card mb-5'>


            <?php
            global $connection;

            $query = "SELECT * FROM `contact`";
            $query_fetch_contact = mysqli_query($connection, $query);
            $total_contact = mysqli_num_rows($query_fetch_contact);
            // echo $total_blood_count;

            if ($total_contact > 0) {

                ?>
                <div class="table-responsive p-3">

                    <table id="example" class="display" style="width:100%!important">
                        <thead>
                        <tr>
                            <th class="ml-5">ID</th>
                            <th> Name</th>
                            <th> Email</th>
                            <th> Subject</th>
                            <th> Contact</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        while ($row = mysqli_fetch_assoc($query_fetch_contact)) {

                            $contact_id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $subject = $row['subject'];
                            $message = $row['message'];
                            ?>
                            <tr>
                                <td><?php echo $contact_id ?> </td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $subject ?></td>
                                <td><?php echo $message ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <?php
            } else {
                echo "<h3 class='text-center p-4'> No Results Found </h3>";
            }
            ?>

        </div>
    </div>

</div>