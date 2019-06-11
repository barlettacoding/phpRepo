<?php
require "dbConnect.php";

$response= array();
$db= new dbConnect();
$con = $db->connect();

$string = "SELECT * from ImageLocal";
$sth = $con->query($string);


if ($sth->num_rows > 0) {
  $arr = array();
  $inc = 0;
while($row = $sth->fetch_assoc()) {
  $rows = (array('IDLocale' => $row["IDLocale"], 'Immagine' => $row["Immagine"]));
  $arr[$inc] = $rows;
  $inc = $inc + 1;

}

}


echo json_encode($arr);
?>
