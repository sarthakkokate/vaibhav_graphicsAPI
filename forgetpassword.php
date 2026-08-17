<?php
require_once("database.php");

// Set response type
header("Content-Type: application/json");

$username = $_POST['username'];
$password = $_POST['newpassword'];

// Check if username exists
$sql = "SELECT * FROM registrationtbl WHERE username = '$username'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    // Update password
    $sql1 = "UPDATE registrationtbl SET password = '$password' WHERE username = '$username'";
    $result1 = mysqli_query($con, $sql1);

    if ($result1) {
        http_response_code(200); // OK
        $response = array(
            "success" => 1,
            "message" => "Password changed successfully."
        );
    } else {
        http_response_code(500); // Internal Server Error
        $response = array(
            "success" => 0,
            "message" => "Failed to update password."
        );
    }

} else {

    http_response_code(404); // Not Found
    $response = array(
        "success" => 0,
        "message" => "Username not found."
    );
}

echo json_encode($response);
?>