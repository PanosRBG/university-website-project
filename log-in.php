<!DOCTYPE html>

<?php 
    session_start();
    if(isset($_SESSION['message'])) {
        echo "<script>alert(".json_encode($_SESSION['message']).");</script>";
        unset($_SESSION['message']);
    }
?>

<html>
    <head>
        <title>Log-in</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/menu.css"/>
        <link rel="stylesheet" href="styles/log-in.css"/>
    </head>

    <body>
        <div class="container">

            <div class="menu">
                <nav>
                    <?php
                        echo('<a href="index.php">Home</a> 
                            <a href="requirements.php">Requirements</a>
                            <p>Application(Log-in)</p>
                            <p>Log-in/Sign-up</p>
                            <a href="more.php">About</a>');
                    ?>
                </nav>
            </div>

            <div class="signin-form">
                <h1>Sign-in</h1>
                <form id="signin-form" action="scripts/user_authentication.php" method="POST">
                    <p>
                        <label for="username">Username</label><br>
                        <input type="username" id="username" name="username" required>
                    </p>
                    <p>
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="password" required><br>
                    </p>
                    <input type="submit" id="login-button" value="Log-in" >
                    <p>Don't have an account? <a href="sign-up.php">Sign-up here.</a></p>
                </form>
            </div>

        </div>

        <footer>
            <p>
                Contact: placeholder@email.com |
                <a href="https://erasmus-plus.ec.europa.eu/document/higher-education-institutions-holding-an-eche-2021-2027">Partners</a> |
                <a href="more.php">About</a>
            </p>
            <p>&copy; 1791 Erasmus Program. All rights reserved. (not really)</p>
        </footer>
    </body>
</html>