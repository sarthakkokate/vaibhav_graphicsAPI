<?php

require_once("database.php");

if (isset($_POST['username'])) {

    $username = $_POST['username'];

    $sql = "SELECT * FROM registrationtbl WHERE username = '$username'";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {

        $sql1 = "DELETE FROM registrationtbl WHERE username = '$username'";

        $result1 = mysqli_query($con, $sql1);

        if ($result1) {
            $response['success'] = 1;
            $response['message'] = "Account Deleted Successfully";
        } else {
            $response['success'] = 0;
            $response['message'] = "Account Delete Failed";
        }

    } else {

        $response['success'] = 0;
        $response['message'] = "Account Not Found";
    }

} else {

    $response['success'] = 0;
    $response['message'] = "Account Deleted Successfully";
}

echo json_encode($response);

?>