<?php 

require_once("database.php");

$username=$_POST['username'];

$sql="SELECT * FROM registrationtbl WHERE USERNAME='$username'";
$result=mysqli_query($con,$sql);

$responce = array();

if(mysqli_num_rows($result)>0){
	$responce["success"]=1;
	$responce["Fullname"]=$row["FULLNAME"];


}



?>