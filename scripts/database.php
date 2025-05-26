<?php

    // Database access information
    $db_server = 'localhost';
    $db_username = 'root';
    $db_password = '';

    // Catches the error of mysqli function if
    // the connection is not established and 
    // throws the user back to the home page
    try {
        $connection = mysqli_connect($db_server, $db_username, $db_password);
        mysqli_set_charset($connection, "utf8");
        mysqli_select_db($connection, 'registered_users');
        $error_message = "Connection established.";
    }
    catch(mysqli_sql_exception) {
        $error_message = "Connection lost.";
        header("Location: ../erasmus-project/index.php");
        exit();
    }
    
?>