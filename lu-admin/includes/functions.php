<?php

//check the query is correct or not
function confirmQuery($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED".mysqli_error($connection));
    }
}

// mysqli_real_escape_string -> escape the whole data that coming from form
// trim -> any extra space is not count when they enter their data

function real_escape($user_data){
    global $connection;
    return trim(mysqli_real_escape_string($connection,$user_data));
}

// operation successful funcitons

function success_data(){
    echo "<h4 href='' class='bg-success text-white p-2 text-center'> Opeartion Successfull</h4>";
}
function empty_data(){
    echo "<h4 href='' class='bg-warning text-white p-2 text-center'> No data type yet</h4>";
}

function invalid_url(){
    echo "<h3 class='text-warning text-center'> It seems like the URL is not valid! </h3>";
}
