<!DOCTYPE html>

<?php 
    session_start();
    include('scripts/database.php');
    if(isset($_SESSION['message'])) {
        echo "<script>alert(".json_encode($_SESSION['message']).");</script>";
        unset($_SESSION['message']);
    }
    $user_info = mysqli_fetch_assoc( 
        mysqli_query($connection, "SELECT * FROM users WHERE Username='{$_SESSION['user']}'"));

    if($user_info) {
        $firstname = $user_info['FirstName'];
        $lastname = $user_info['LastName'];
        $am = $user_info['AM'];
    }
    else {
        header('Location: index.php');
        session_destroy();
    }
?>

<html>
    <head>
        <title>Application form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/menu.css"/>
        <link rel="stylesheet" href="styles/application.css"/>
    </head>

    <body>
        <div class="container">
            <div class ="menu">
                <nav>
                    <?php
                        if(isset($_SESSION['user']) && $_SESSION['user'] == 'root') {
                            echo('<a href="index.php">Home</a>
                                <a href="requirements.php">Requirements</a>
                                <a href="application.php">Application</a>
                                <a href="dashboard.php">Dashboard</a>
                                <a href="log-out.php">Log-out</a>
                                <a href="more.php">About</a>');
                        }
                        else if(isset($_SESSION['user'])) {
                            echo('<a href="index.php">Home</a>
                                <a href="requirements.php">Requirements</a>
                                <p>Application</p>
                                <a href="profile.php">Profile</a>
                                <a href="log-out.php">Log-out</a>
                                <a href="more.php">About</a>');
                        }
                    ?>
                </nav>
            </div>
            <div class="content">
                <h1>Application Form</h1>
                <form id="application-form" action="scripts/application_handler.php"
                    method="POST" enctype="multipart/form-data">
                    <p>
                        <label for="firstname">First Name</label><br>
                        <input type="text" id="firstname" name="firstname" value="<?php echo"$firstname"; ?>" readonly>
                    </p>
                    <p>
                        <label for="lastname">Last Name</label><br>
                        <input type="text" id="lastname" name="lastname" value="<?php echo"$lastname"; ?>" readonly>
                    </p>
                    <p>
                        <label for="am">AM</label><br>
                        <input type="number" id="am" name="am" value="<?php echo"$am"; ?>" readonly>
                    </p>
                    <p>
                        <label for="courses">Total Courses</label><br>
                        <input type="number" id="courses" name="courses" required>
                    </p>
                    <p>
                        <label for="passedcourses">Courses Passed</label><br>
                        <input type="number" id="passedcourses" name="passedcourses" required>
                    </p>
                    <p>
                        <label for="avgscore">Average Score</label><br>
                        <input type="number" id="avgscore" name="avgscore" required>
                    </p>
                    <p>
                        English Level<br>
                        <label for="level1">A1</label>
                        <input type="radio" id="level1" name="languagelevel" value="A1" required>
                        <label for="level2">A2</label>
                        <input type="radio" id="level2" name="languagelevel" value="A2" required>
                        <label for="level3">B1</label>
                        <input type="radio" id="level3" name="languagelevel" value="B1" required>
                        <label for="level4">B2</label>
                        <input type="radio" id="level4" name="languagelevel" value="B2" required>
                        <label for="level5">C1</label>
                        <input type="radio" id="level5" name="languagelevel" value="C1" required>
                        <label for="level6">C2</label>
                        <input type="radio" id="level6" name="languagelevel" value="C2" required>
                    </p>
                    <p>
                        More languages<br>
                        <label for="affirmative">Yes</label>
                        <input type="radio" id="yes" name="extralangs" value="yes">
                        <label for="negative">No</label>
                        <input type="radio" id="no" name="extralangs" value="no">
                    </p>
                    <p>
                        <label for="firstuni">First Option</label><br>
                        <input list="firstlist" id="firstuni" name="firstuni" required>
                        <datalist id="firstlist">
                            <option value="University of Bologna, Italy">
                            <option value="Sorbonne University, France">
                            <option value="University of Warsaw, Poland">
                            <option value="University of Copenhagen, Denmark">
                            <option value="University of Milan, Italy">
                            <option value="Charles University, Czech Republic">
                            <option value="University of Geneva, Switzerland">
                            <option value="Heidelberg University, Germany">
                            <option value="University of Lisbon, Portugal">
                            <option value="University of Barcelona, Spain">
                            <option value="University of Granada, Spain">
                            <option value="University of Porto, Portugal">
                            <option value="University of Ljubljana, Slovenia">
                            <option value="University of Helsinki, Finland">
                            <option value="University of Vienna, Austria">
                            <option value="University of Amsterdam, Netherlands">
                            <option value="University of Leuven, Belgium">
                            <option value="University of Zagreb, Croatia">
                            <option value="University of Tartu, Estonia">
                            <option value="University of Gothenburg, Sweden">
                        </datalist><br>

                        <label for="seconduni">Second Option</label><br>
                        <input list="secondlist" id="seconduni" name="seconduni">
                        <datalist id="secondlist">
                            <option value="University of Bologna, Italy">
                            <option value="Sorbonne University, France">
                            <option value="University of Warsaw, Poland">
                            <option value="University of Copenhagen, Denmark">
                            <option value="University of Milan, Italy">
                            <option value="Charles University, Czech Republic">
                            <option value="University of Geneva, Switzerland">
                            <option value="Heidelberg University, Germany">
                            <option value="University of Lisbon, Portugal">
                            <option value="University of Barcelona, Spain">
                            <option value="University of Granada, Spain">
                            <option value="University of Porto, Portugal">
                            <option value="University of Ljubljana, Slovenia">
                            <option value="University of Helsinki, Finland">
                            <option value="University of Vienna, Austria">
                            <option value="University of Amsterdam, Netherlands">
                            <option value="University of Leuven, Belgium">
                            <option value="University of Zagreb, Croatia">
                            <option value="University of Tartu, Estonia">
                            <option value="University of Gothenburg, Sweden">
                        </datalist><br>

                        <label for="thirduni">Third Option</label><br>
                        <input list="thirdlist" id="thirduni" name="thirduni">
                        <datalist id="thirdlist">
                            <option value="University of Bologna, Italy">
                            <option value="Sorbonne University, France">
                            <option value="University of Warsaw, Poland">
                            <option value="University of Copenhagen, Denmark">
                            <option value="University of Milan, Italy">
                            <option value="Charles University, Czech Republic">
                            <option value="University of Geneva, Switzerland">
                            <option value="Heidelberg University, Germany">
                            <option value="University of Lisbon, Portugal">
                            <option value="University of Barcelona, Spain">
                            <option value="University of Granada, Spain">
                            <option value="University of Porto, Portugal">
                            <option value="University of Ljubljana, Slovenia">
                            <option value="University of Helsinki, Finland">
                            <option value="University of Vienna, Austria">
                            <option value="University of Amsterdam, Netherlands">
                            <option value="University of Leuven, Belgium">
                            <option value="University of Zagreb, Croatia">
                            <option value="University of Tartu, Estonia">
                            <option value="University of Gothenburg, Sweden">
                        </datalist>
                    </p>
                    <p>
                        <label for="grades">Analytical Grades</label><br>
                        <input type="file" id="grades" name="grades" accept=".pdf" required>
                    </p>
                    <p>
                        <label for="certificate">English Certificate</label><br>
                        <input type="file" id="certificate" name="certificate" accept=".pdf" required>
                    </p>
                    <p>
                        <label for="others">Other Language Certificates</label><br>
                        <input type="file" id="others" name="others" accept=".pdf">
                    </p>
                    <p>
                        <br>
                        <input type="checkbox" id="terms" required>
                        <label for="terms">Agree to Terms and Conditions</label>
                    </p>
                    <p>
                        <input type="submit" value="Submit">
                    </p>
                    <?php mysqli_close($connection); ?>
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