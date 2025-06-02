<?php

include("scripts/database.php");

if($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $university_id = $_GET['id'];
            $result = $connection->query("SELECT * FROM users WHERE id=$university_id");
            $data = $result->fetch_assoc();
            echo json_encode($data);
        }else {
                $result = $connection->query("SELECT * FROM users");
                $users = [];
                while ($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }
                echo json_encode($users);
        }
        break;
case 'POST':
    $university_id = $input['id'];
    $university_name = $input['name'];
    $country = $input['country'];
    $connection->query ("INSERT INTO users (id, name, country) VALUES
                ('$university_id', '$university_name', $country)");
    echo json_encode(["message" => "User added successfully"]);
    break;
case 'PUT':
    $university_id = $_GET['id'];
    $university_name = $input['name'];
    $country = $input['email'];

    $connection->query("UPDATE users SET name='$university_name',
    country='$country' WHERE id=$university_id");
    echo json_encode(["message" => "User updated successfully"]);
    break;
case 'DELETE':
    $university_id = $_GET['id'];
    $connection->query("DELETE FROM users WHERE id=$university_id");
    echo json_encode(["message" => "User deleted successfully"]);
    break;
default:
    echo json_encode(["message" => "Invalid request method"]);
    break;
}

$connection->close();

?>
















