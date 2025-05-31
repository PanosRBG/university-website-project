<?php 

    session_start();
    include('database.php');

    $dir = __DIR__."/../uploads/".$_SESSION['user'];
    if(!is_dir($dir)) {
        mkdir($dir, 0755);
    }

    if(isset($_POST['firstname'], 
            $_POST['lastname'], 
            $_POST['am'],
            $_POST['passedcourses'], 
            $_POST['courses'],
            $_POST['avgscore'],
            $_POST['languagelevel'],
            $_POST['firstuni'])) {
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $am = $_POST['am'];
        $courses = $_POST['courses'];
        $passed = $_POST['passedcourses'];
        $courses = (($passed/$courses)*100)."%";
        $avgscore = $_POST['avgscore'];
        $languagelevel = $_POST['languagelevel'];
        $firstuni = $_POST['firstuni'];
    }
    else {
        $_SESSION['message'] = 'Unable to process application make sure you fill correctly all the required fields.';
        mysqli_close($connection);
        header('Location: ../application.php');
        exit();
    }

    if(isset($_POST['extralangs'], $_POST['seconduni'], $_POST['thirduni'])) {
        $extralangs = $_POST['extralangs'];
        $seconduni = $_POST['seconduni'];
        $thirduni = $_POST['thirduni'];
    }
    else {
        $extralangs = null;
        $seconduni = null;
        $thirduni = null;
    }

    if(!empty($_FILES)) {
        $grades = $dir.'/'.$_FILES['grades']['name'];
        move_uploaded_file($_FILES['grades']['tmp_name'], $grades);
        
        $cert = $dir.'/'.$_FILES['certificate']['name'];
        move_uploaded_file($_FILES['certificate']['tmp_name'], $cert);
        
        if(isset($_FILES['others']) && $_FILES['others']['error'] != 4) {
            $others = $dir.'/'.$_FILES['others']['name'];
            move_uploaded_file($_FILES['others']['tmp_name'], $others);
        }
        else 
            $others = NULL;
    }
    
    $check = mysqli_query($connection, 
        "INSERT INTO applications 
        (FirstName, LastName, AM, CoursesPassed, Score, EngLvl, MoreLng, FirstUni, SecondUni, ThirdUni, GradeFile, EngCert, OthrCert, Accepted, UserID) 
        VALUES 
        ('$firstname','$lastname','$am','$courses','$avgscore','$languagelevel','$extralangs', '$firstuni', '$seconduni', '$thirduni', '$grades', '$cert','$others', NULL, '{$_SESSION['userID']}')");
    
    if($check) {
        $_SESSION['message'] = 'Application submitted successfuly';
        mysqli_close($connection);
        header('Location: ../application.php');
        exit();
    }
    else {
        $_SESSION['message'] = 'Failed to submit application.';
        mysqli_close($connection);
        header('Location: ../application.php');
        exit();
    }
?>