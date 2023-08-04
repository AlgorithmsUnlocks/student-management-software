<?php

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    $query = "DELETE FROM `users` WHERE `id`='$user_id'";
    $query_delete_users = mysqlI_query($connection,$query);
    confirmQuery($query_delete_users);
    success_data();
}

?>
