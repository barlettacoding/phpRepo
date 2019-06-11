<?php
require "dbConnect.php";

$response= array();
$db= new dbConnect();
$con = $db->connect();

$string = "SELECT * from Coupon";
$sth = $con->query($string);


if ($sth->num_rows > 0) {
  $arr = array();
  $inc = 0;
while($row = $sth->fetch_assoc()) {
  $rows = (array('ID' => $row["ID"], 'IdLocale' => $row["IdLocale"], 'descrizione' => $row["Descrizione"], 'NomeLocale'=>$row["NomeLocale"], 'IdManager'=>$row["IdManager"]));
  $arr[$inc] = $rows;
  $inc = $inc + 1;
}



}

else{
  echo "0 results";
}

echo json_encode($arr);
?>
