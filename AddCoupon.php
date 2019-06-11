<?php

require "dbConnect.php";

$response= array();
$db= new dbConnect();
$con = $db->connect();

$IdLocale= $_POST["IdLocale"];
$Descrizione = $_POST["Descrizione"];
$NomeLocale = $_POST["NomeLocale"];
$IdManager = $_POST["IdManager"];

$sql = "INSERT INTO Coupon (IdLocale, Descrizione, NomeLocale, IdManager) VALUES ('$IdLocale', '$Descrizione', '$NomeLocale', '$IdManager')";

mysqli_query($con, $sql);

mysqli_close($con);

?>
