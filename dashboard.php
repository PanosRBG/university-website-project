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
                        if(isset($_SESSION['user']) && $_SESSION['user'] == 'root') {
                            echo('<a href="index.php">Home</a>
                                <a href="requirements.php">Requirements</a>
                                <a href="application.php">Application</a>
                                <p>Dashboard</p>
                                <a href="log-out.php">Log-out</a>
                                <a href="more.php">About</a>');
                        }
                        else {
                            header("Location: index.php");
                        }
                    ?>
                </nav>
            </div>
            
            <div class="form">
                <h1>Dashboard</h1>
                
                <form id="daterange" action="scripts/save_dates.php" method="GET">
                    <p>
                        <label>Application Submission Dates</label><br>
                        <label>Start Date</label>
                        <label style="margin-left: 70px;">End Date</label> <br>

                        <input type="date" id="startdate" name="startdate">
                        -
                        <input type="date" id="enddate" name="enddate">
                    </p>

                    <input class="submit" type="submit" value="Submit">
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