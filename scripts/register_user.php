<?php

    session_start();
    include("database.php");
    
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
    

    mysqli_query($connection, "USE registered_users");

    $row = mysqli_fetch_assoc(
           mysqli_query($connection,
                        "SELECT * FROM users WHERE 
                         Username='$username' OR Email='$email' OR AM='$am'"
    ));

    if($row && ($row['Username'] == $username)) {
        $_SESSION['message'] = 'Username already exists';
        header('Location: ../sign-up.php');
        exit();
    }
    
    if($row && ($row['AM'] == $am)){
        $_SESSION['message'] = 'AM already exists';
        header('Location: ../sign-up.php');
        exit();
    }

    mysqli_query($connection, "INSERT INTO users 
        (FirstName, LastName, Username, Email, PhoneNumber, University, AM, Password, Birthdate, Gender) VALUES 
        ('$firstname', '$lastname', '$username', '$email', '$phonenumber', '$university', '$am', '$password', '$birthdate', '$gender')");
    $_SESSION['message'] = 'Registration successful!';
    header('Location: ../index.php');

    mysqli_close($connection);
?>