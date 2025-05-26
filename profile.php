<!DOCTYPE html>

<?php

    session_start();
    include('scripts/database.php');
    $user_info = mysqli_fetch_assoc( 
        mysqli_query($connection, "SELECT * FROM users WHERE Username='{$_SESSION['user']}'"));

    if($user_info) {
        $firstname = $user_info['FirstName'];
        $lastname = $user_info['LastName'];
        $email = $user_info['Email'];
        $phonenumber = $user_info['PhoneNumber'];
        $am = $user_info['AM'];
        $password = $user_info['Password'];
    }
    else {
        header('Location: index.php');
        session_destroy();
    }
    
?>

<html>
    <head>
        <title>Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/menu.css"/>
        <link rel="stylesheet" href="styles/sign-up.css"/>
        <script defer src="scripts/signup_check.js"></script>
    </head>

    <body>
        
        <div class="container">
            
            <div class="menu">
                <nav>
                    <?php
                        echo('<a href="index.php">Home</a>
                            <a href="requirements.php">Requirements</a>
                            <a href="application.php">Application</a>
                            <p>Profile</p>
                            <a href="log-out.php">Log-out</a>
                            <a href="more.php">About</a>');
                    ?>
                </nav>
            </div>
            
            <div class="form">
                <h1><?php echo "Hello, $firstname"; ?></h1>
                
                <form id="user-info" action="scripts/update_user.php" 
                      method="POST">
                    <p>
                    <label for="firstname">First Name</label><br>
                    <input type="text" id="firstname" name="firstname" value="<?php echo"$firstname"; ?>">
                    <p class="error-message" id="firstnameError"></p>
                    </p>

                    <p>
                        <label for="lastname">Last Name</label><br>
                        <input type="text" id="lastname" name="lastname" value="<?php echo"$lastname"; ?>">
                        <p class="error-message" id="lastnameError"></p>     
                    </p>

                    <p>
                        <label for="email">Email</label><br>
                        <input type="email" id="email" name="email" value="<?php echo"$email"; ?>">
                        <p class="error-message" id="emailError"></p>
                    </p>

                    <p>
                        <label for="phonenumber">Phone Number</label><br>
                        <input type="number" id="phonenumber" name="phonenumber" value="<?php echo"$phonenumber"; ?>">
                        <p class="error-message" id="phonenumberError"></p>
                    </p>

                    <p>
                        <label for="am">AM</label><br>
                        <input type="number" id="am" name="am" value="<?php echo"$am"; ?>">
                        <p class="error-message" id="amError"></p>
                    </p>

                    <p>
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="password" required>
                        <p class="error-message" id="passwordError"></p>
                    </p>

                    <p>
                        <label for="confirm_password">Confirm Password</label><br>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <p class="error-message" id="passwordConfirmError"></p>
                    </p>

                    <input class="submit" type="submit" value="Update">
                    <?php mysqli_close($connection); ?>
                </form>
                
            </div>

        </div>

        <footer>
            <p>
                Contact: placeholder@email.com |
                <a href="uhttps://erasmus-plus.ec.europa.eu/document/higher-education-institutions-holding-an-eche-2021-2027">Partners</a> |
                <a href="more.php">About</a>
            </p>
            <p>&copy; 1791 Erasmus Program. All rights reserved. (not really)</p>
        </footer>

    </body>

</html>