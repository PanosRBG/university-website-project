<!DOCTYPE html>

<?php
    session_start();
    include("scripts/database.php");
    if (isset($_SESSION["message"])) {
        echo "<script>alert(".json_encode($_SESSION["message"]).");</script>";
        unset($_SESSION["message"]);
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign-up</title>
        <link rel="stylesheet" href="styles/menu.css"/>
        <link rel="stylesheet" href="styles/sign-up.css"/>
        <script defer src="scripts/signup_check.js"></script>
    </head>

    <body>
        
        <div class="container">
            
            <div class="menu">
                <nav>
                    <a href="index.php">Home</a><br>
                    <a href="requirements.php">Requirements</a><br>
                    <a href="application.php">Application</a>
                    <p>Log-in/Sign-up</p>
                    <a href="more.php">About</a>
                </nav>
            </div>
            
            <div class="form">
                <h1>Register</h1>
                
                <form id="signup-form" action="../erasmus-project/scripts/register_user.php" 
                      method="POST">
                    <p>
                        <label for="firstname">First Name</label><br>
                        <input type="text" id="firstname" name="firstname" required>
                        <p class="error-message" id="firstnameError"></p>
                    </p>

                    <p>
                        <label for="lastname">Last Name</label><br>
                        <input type="text" id="lastname" name="lastname" required>
                        <p class="error-message" id="lastnameError"></p>
                        
                    </p>

                    <p>
                        <label for="username">Username</label><br>
                        <input type="text" id="username" name="username" required> 
                        <p class="error-message" id="usernameError"></p>                       
                    </p>

                    <p>
                        <label for="email">Email</label><br>
                        <input type="email" id="email" name="email" required>
                        <p class="error-message" id="emailError"></p>
                    </p>

                    <p>
                        <label for="phonenumber">Phone Number</label><br>
                        <input type="number" id="phonenumber" name="phonenumber" required>
                        <p class="error-message" id="phonenumberError"></p>
                    </p>

                    <p>
                        <label for="university">University</label><br>
                        <input type="text" id="university" name="university" required>
                        <p class="error-message" id="universityError"></p>
                    </p>

                    <p>
                        <label for="am">AM</label><br>
                        <input type="number" id="am" name="am" required>
                        <p class="error-message" id="amError"></p>
                    </p>

                    <p>
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="password" required>
                        <p class="error-message" id="passwordError"></p>
                    </p>

                    <p>
                        <label for="confirm_password">Confirm Password</label><br>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                        <p class="error-message" id="passwordConfirmError"></p>
                    </p>

                    <p>
                        <label for="birthdate">Date of Birth</label><br>
                        <input type="date" id="birthdate" name="birthdate" required>
                    </p>

                    <p>
                        <label for="male">Male</label>
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="female">Female</label>
                        <input type="radio" id="female" name="gender" value="female" required>
                    </p>
                    
                    <input class="submit" type="submit">
                    
                </form>

                <p>By signing up, you agree to our <a href="terms.php">Terms and Conditions</a>.</p>
                    
                <p>Already have an account? <a href="log-in.php">Log-in here.</a></p>
                
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