<?php

require "dbConnect.php";

$response= array();
$db= new dbConnect();
$con = $db->connect();

$IDutente= $_POST["IDutente"];
$ID= $_POST["ID"]; //ID LOCALE

$sql = "UPDATE Locali SET idGestore = '$IDutente' WHERE ID = '$ID'";

mysqli_query($con, $sql);



$sqlUpdateType = "UPDATE Users SET Tipo = '2' WHERE ID = '$IDutente'";

mysqli_query($con, $sqlUpdateType);

mysqli_close($con);


?>
