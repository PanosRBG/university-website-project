<?php 

    session_start();
    include('database.php');

    if(isset($_POST['firstname'], 
            $_POST['lastname'],
            $_POST['email'],
            $_POST['phonenumber'],
            $_POST['am'],
            $_POST['password'])) {
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $am = $_POST['am'];
        $password = $_POST['password'];
    }
    else {
        $_SESSION['message'] = 'Unable to update your information, make sure you filled everything correctly.';
        mysqli_close($connection);
        header('Location: ../profile.php');
        exit();
    }

    mysqli_query($connection, "UPDATE users SET 
                                FirstName='$firstname', 
                                LastName='$lastname', 
                                Email='$email', 
                                PhoneNumber='$phonenumber', 
                                AM='$am', 
                                Password='$password'
                                WHERE Username='{$_SESSION['user']}'");
    $_SESSION['message'] = 'Your information has been updated.';

    mysqli_close($connection);
    header('Location: ../index.php');
?>