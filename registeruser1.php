<?php

require_once("database.php");

$fullname  = $_POST['fullname'];
$username  = $_POST['username'];
$email     = $_POST['email'];
$mobileno  = $_POST['mobileno'];
$password  = $_POST['password'];

$responce = array();

// Check username already exists
$sql = "select * from registrationtbl WHERE USERNAME='$username'";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result))
{
    $responce["success"] = 0;
    $responce["message"] = "Username Already Exists";
}
else
{
    $sql1 = "insert into registrationtbl (FULLNAME,USERNAME,EMAIL,MOBILE_NO,PASSWORD)
    values
    ('$fullname', '$username', '$email', '$mobileno', '$password')";

    $result1 = mysqli_query($con, $sql1);

    if ($result1>0){
        $responce["success"] = 1;
        $responce["message"] = "Registration Successfully Done";
    }else{
        $responce["success"] = 0;
        $responce["message"] = mysqli_error($con);
    }
}

echo json_encode($responce);
?>