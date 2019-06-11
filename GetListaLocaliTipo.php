<?php
require "dbConnect.php";

$response= array();
$db= new dbConnect();
$con = $db->connect();
$tipo = $_POST["Tipologia"];
$string = "SELECT * from Locali WHERE Tipologia = '$tipo'";
$sth = $con->query($string);


if ($sth->num_rows > 0) {
  $arr = array();
  $inc = 0;
while($row = $sth->fetch_assoc()) {
  $rows = (array('ID' => $row["ID"], 'nome' => $row["nome"], 'descrizione' => $row["descrizione"],
  'idGestore'=> $row["idGestore"],'immagine'=>$row["immagine"], 'Tipologia'=>$row["Tipologia"], 
  'descrizioneCompleta'=>$row["descrizioneCompleta"]));
  $arr[$inc] = $rows;
  $inc = $inc + 1;
}



}

else{
  echo "0 results";
}

echo json_encode(array('Local' => $arr));
?>
