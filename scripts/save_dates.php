<?php 

    session_start();
    include('database.php');
    
    if(isset($_GET['startdate'], $_GET['enddate'])) {
        mysqli_query($connection, "UPDATE dates SET StartDate = '{$_GET['startdate']}', EndDate = '{$_GET['enddate']}'");
        $_SESSION['message'] = 'Dates have been set.';
    }
    else {
        $_SESSION['message'] = 'Dates have not been set.';
    }

    mysqli_close($connection);
    header('Location: ../dashboard.php');

?>