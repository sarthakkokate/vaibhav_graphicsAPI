<?php
require_once("database.php");

$username = $_POST['username'];
$newpass = $_POST['newpass'];

$response = array();

$sql="UPDATE registrationtbl SET PASSWORD='$newpass' WHERE USERNAME='$username'";

$result = mysqli_query($con,$sql);


if($result)
{

	$response['success']=1;
	$response['mess']="Password Updated";

}else{

	$response['success']=0;
	$response['mess']="Password not Updated";


}

echo json_encode($response);





?>