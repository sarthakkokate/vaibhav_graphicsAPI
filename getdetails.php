<?php
require_once("database.php");

$username = $_POST['username'];

$sql = "select * from registrationtbl where username = '$username'";

$result = mysqli_query($con,$sql);

$data = array();

if ($row = mysqli_fetch_array($result))
 {
	array_push($data, array('id' => $row[0], 'fullname' => $row[1], 'username'=> $row[2] ,'mobileno' => $row[3], 'email' => $row[4]));
 }

 echo json_encode(array('userData' => $data));

?>