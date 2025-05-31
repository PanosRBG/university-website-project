<?php

    session_start();
    include('database.php');

    if(isset($_POST['firstname'], 
            $_POST['lastname'],
            $_POST['username'],
            $_POST['email'],
            $_POST['phonenumber'],
            $_POST['university'],
            $_POST['am'],
            $_POST['password'], 
            $_POST['birthdate'],
            $_POST['gender'])) {
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $university = $_POST['university'];
        $am = $_POST['am'];
        $password = $_POST['password'];
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
    }
    else {
        $_SESSION['message'] = 'Unable to register your account, make sure you filled everything correctly.';
        mysqli_close($connection);
        header('Location: ../sign-up.php');
        exit();
    }

    $row = mysqli_fetch_assoc(
           mysqli_query($connection,
                        "SELECT * FROM users WHERE 
                         Username='$username' OR AM='$am'"
    ));

    if($row && ($row['Username'] == $username)) {
        $_SESSION['message'] = 'Username already exists';
        mysqli_close($connection);
        header('Location: ../sign-up.php');
        exit();
    }
    
    if($row && ($row['AM'] == $am)){
        $_SESSION['message'] = 'AM already exists';
        mysqli_close($connection);
        header('Location: ../sign-up.php');
        exit();
    }

    mysqli_query($connection, "INSERT INTO users 
        (FirstName, LastName, Username, Email, PhoneNumber, University, AM, Password, Birthdate, Gender) VALUES 
        ('$firstname', '$lastname', '$username', '$email', '$phonenumber', '$university', '$am', '$password', '$birthdate', '$gender')");
    $_SESSION['message'] = 'Registration successful!';
    
    mysqli_close($connection);
    header('Location: ../index.php');
?>