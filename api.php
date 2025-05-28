<?php

include("database.php")

/*if ($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}
    */

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);
















?>