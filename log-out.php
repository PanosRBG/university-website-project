<?php

    session_start();
    
    unset($_SESSION["message"]);
    unset($_SESSION["user"]);
    unset($_SESSION['userID']);

    session_destroy();

    header("LOCATION: index.php");
?>