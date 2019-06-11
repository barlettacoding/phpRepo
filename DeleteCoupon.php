<?php

require "dbConnect.php";

$response= array();
$db= new dbConnect();
$con = $db->connect();

$ID = $_POST["ID"];

$sql = "DELETE FROM Coupon WHERE ID = '$ID'";

mysqli_query($con, $sql);

mysqli_close($con);

?>
