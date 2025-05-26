<?php
    session_start();
    include('database.php');
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($connection, 
                        "SELECT * FROM users 
                        WHERE Username='$username' AND Password='$password'");
    $row = mysqli_fetch_assoc($query);
    if($row) {
        $_SESSION['user'] = $row['Username'];
        $_SESSION['message'] = "Signed-in Succesfuly. Welcome, $username";
        $_SESSION['userID'] = $row['ID'];
        
        header('Location: ../index.php');
    }
    else {
        $_SESSION['message'] = 'Wrong username or password.';
        header('Location: ../log-in.php');
    }
?>