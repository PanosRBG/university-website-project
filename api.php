<?php

    include("scripts/database.php");

    if($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Access the type of method described in the URI and tokenize
    $method = $_SERVER['REQUEST_METHOD'];
    $input = json_decode(file_get_contents('php://input'), true);

    // TODO: Learn to prevent SQL Injection
    switch($method) {
        // Output a single university information for a given ID or 
        // output the whole database if not ID is given
        case 'GET':
            if (isset($_GET['id'])) {
                $university_id = $_GET['id'];
                $exists = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM universities WHERE ID=$university_id"));
                // Always inform the user for unexptected occurrences
                if($exists) {
                    echo json_encode($exists);
                }
                else {
                    echo json_encode(["Error" => "University not found"]);
                }
            }
            else {
                    $result = $connection->query("SELECT * FROM universities");
                    $universities = [];
                    while ($row = $result->fetch_assoc()) {
                        $universities[] = $row;
                    }
                    echo json_encode($universities);
            }
            break;
        // User inputs with JSON attributes from a JSON file, parses them and 
        // extract them to the database 
        case 'POST':
            if(isset($input['name'], $input['country'])) {
                $university_name = $input['name'];
                $country = $input['country'];
                mysqli_query($connection, "INSERT INTO universities (Name, Country) VALUES
                        ('$university_name', '$country')");
                echo json_encode(["Message" => "University added to the database successfully"]);
            }
            else {
                echo json_encode(["Error" => "Error: This feature is only accesible with JSON file types using the attributes 'name' and 'country'"]);
            }
            break;
        // User inputs with JSON attributes from a JSON file, parses them and updates the 
        // specified, with ID, university in the database
        case 'PUT':
            if(isset($_GET['id'], $input['name'], $input['country'])) {
                $university_id = $_GET['id'];
                $university_name = $input['name'];
                $country = $input['country'];
                $exists = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM universities WHERE ID=$university_id"));
                if($exists) {
                    mysqli_query($connection, "UPDATE universities SET Name='$university_name',
                    Country='$country' WHERE id=$university_id");
                    echo json_encode(["Message" => "University's information updated in the database successfully"]);
                }
                else {
                    echo json_encode(["Error" => "University not found"]);
                }
            }
            else {
                echo json_encode(["Error" => "This feature is only accesible with the id of the university using URI 
                    and JSON file types using the attributes 'name' and 'country' to update the corresponding fields"]);
            }
            break;
        // Deletes university in the database based on the given ID in the URI
        case 'DELETE':
            if(isset($_GET['id'])) {
                $university_id = $_GET['id'];
                $exists = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM universities WHERE ID=$university_id"));
                if($exists) {
                    mysqli_query($connection, "DELETE FROM universities WHERE id=$university_id");
                    echo json_encode(["Message" => "University removed from the database successfully"]);
                }
                else {
                    echo json_encode(["Error" => "University not found"]);
                }
            }
            else {
                echo json_encode(["Error" => "Make sure you define the ID of the university in the URI"]);
            }
            break;
        default:
            echo json_encode(["Message" => "Invalid request method"]);
            break;
        }

    $connection->close();

?>
















