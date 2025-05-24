<?php

    // Database access information
    $db_server = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $test = "";
    // Catches the error of mysqli function if
    // the connection is not established and 
    // throws the user back to the home page
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $connection = mysqli_connect($db_server, $db_username, $db_password);
        mysqli_set_charset($connection, "utf8mb4");
        if(mysqli_query($connection, "CREATE DATABASE IF NOT EXISTS registered_users")) {
            mysqli_select_db($connection, 'registered_users');
            mysqli_query($connection, "CREATE TABLE IF NOT EXISTS users(
                ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                FirstName VARCHAR(30) NOT NULL, 
                LastName VARCHAR(30) NOT NULL, 
                Username VARCHAR(40), 
                Email VARCHAR(40) NOT NULL, 
                PhoneNumber VARCHAR(10) NOT NULL, 
                University VARCHAR(50) NOT NULL, 
                AM VARCHAR(13) NOT NULL, 
                Password VARCHAR(255) NOT NULL, 
                Birthdate DATE, 
                Gender VARCHAR(6) NOT NULL)
            ");
        }
        $error_message = "Connection established.";
    }
    catch(mysqli_sql_exception) {
        $error_message = "Connection lost.";
        header("Location: ../erasmus-project/index.php");
        exit();
    }

?>