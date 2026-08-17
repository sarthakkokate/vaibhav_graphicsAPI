<?php
require_once("database.php");

$sql = "SELECT * FROM customerdatatbl";

$result = mysqli_query($con, $sql);

$data = array();

while ($row = mysqli_fetch_array($result)) {

    array_push($data, array(
        'id' => $row[0],
        'customername' => $row[1],
        'mobileno' => $row[2],
        'product' => $row[3]
    ));
}

echo json_encode(array('Location' => $data));

?>