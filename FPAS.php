
<?php

require_once("database.php");

$username = $_POST['username'];
$password = $_POST['password'];

$response = array();

$sql = "UPDATE registrationtbl 
        SET PASSWORD='$password' 
        WHERE USERNAME='$username'";

$result = mysqli_query($con, $sql);

if ($result)
{
    $response["success"] = 1;
    $response["message"] = "Password Updated Successfully";
}
else
{
    $response["success"] = 0;
    $response["message"] = mysqli_error($con);
}

echo json_encode($response);

?>