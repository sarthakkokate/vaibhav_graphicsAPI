<?php
require_once("database.php");

header("Content-Type: application/json");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT username, password FROM registrationtbl 
        WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    http_response_code(200); // OK

    $response = array(
        "success" => 1,
        "message" => "Login successful."
    );

} else {

    http_response_code(401); // Unauthorized

    $response = array(
        "success" => 0,
        "message" => "Invalid username or password."
    );
}

echo json_encode($response);
?>