<?php 

    session_start();
    include('database.php');
    mysqli_query($connection, "UPDATE users SET 
                                FirstName='{$_POST['firstname']}', 
                                LastName='{$_POST['lastname']}', 
                                Email='{$_POST['email']}', 
                                PhoneNumber='{$_POST['phonenumber']}', 
                                AM='{$_POST['am']}', 
                                Password='{$_POST['password']}'
                                WHERE Username='{$_SESSION['user']}'");
    $_SESSION['message'] = 'Your information has been updated.';

    header('Location: ../index.php');
?>