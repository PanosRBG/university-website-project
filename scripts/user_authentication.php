<?php
    session_start();
    include('database.php');
    
    if(isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    else {
        $_SESSION['message'] = 'Unable to log you in, make sure you filled everything correctly.';
        mysqli_close($connection);
        header('Location: ../log-in.php');
        exit();
    }

    $query = mysqli_query($connection, 
                        "SELECT * FROM users 
                        WHERE Username='$username' AND Password='$password'");
    $row = mysqli_fetch_assoc($query);
    if($row) {
        $_SESSION['user'] = $row['Username'];
        $_SESSION['message'] = "Signed-in Succesfuly. Welcome, $username";
        $_SESSION['userID'] = $row['ID'];
        
        mysqli_close($connection);
        header('Location: ../index.php');
    }
    else {
        $_SESSION['message'] = 'Wrong username or password.';

        mysqli_close($connection);
        header('Location: ../log-in.php');
    }
?>