<?php 

    session_start();
    include('database.php');

    $dir = __DIR__."/../uploads/".$_SESSION['user'];
    if(!is_dir($dir)) {
        mkdir($dir, 0755);
    }

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $am = $_POST['am'];
    $courses = $_POST['courses'];
    $passed = $_POST['passedcourses'];
    $avgscore = $_POST['avgscore'];
    $languagelevel = $_POST['languagelevel'];
    $firstuni = $_POST['firstuni'];

    if(isset($_POST['extralangs'])) 
        $extralangs = $_POST['extralangs'];
    else
        $extralangs = NULL;
    
    if(isset($_POST['seconduni'])) 
        $seconduni = $_POST['seconduni'];
    else
        $seconduni = NULL;
    
    if(isset($_POST['thirduni'])) 
        $thirduni = $_POST['thirduni'];
    else
        $thirduni = NULL;

    if(!empty($_FILES)) {
        $grades = $dir.'/'.$_FILES['grades']['name'];
        move_uploaded_file($_FILES['grades']['tmp_name'], $grades);
        
        $cert = $dir.'/'.$_FILES['certificate']['name'].'/';
        move_uploaded_file($_FILES['certificate']['tmp_name'], $cert);
        
        if(isset($_FILES['others']) && $_FILES['others']['error'] != 4) {
            $others = $dir.'/'.$_FILES['others']['name'];
            move_uploaded_file($_FILES['others']['tmp_name'], $cert);
        }
        else 
            $others = NULL;
    }
    
    $check = mysqli_query($connection, 
        "INSERT INTO applications 
        (FirstName, LastName, AM, Courses, Passed, Score, EngLvl, MoreLng, FirstUni, SecondUni, ThirdUni, GradeFile, EngCert, OthrCert, Accepted, UserID) 
        VALUES 
        ('$firstname','$lastname','$am','$courses','$passed','$avgscore','$languagelevel','$extralangs', '$firstuni', '$seconduni', '$thirduni', '$grades', '$cert','$others', NULL, '{$_SESSION['userID']}')");
    
    if($check) {
        $_SESSION['message'] = 'Application submitted successfuly';
        header('Location: ../application.php');
    }
    else {
        $_SESSION['message'] = 'Failed to submit application.';
        header('Location: ../application.php');
    }

    mysqli_close($connection);
?>