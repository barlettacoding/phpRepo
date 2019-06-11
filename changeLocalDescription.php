<?php

  require "dbConnect.php";

  $response= array();
  $db= new dbConnect();
  $con = $db->connect();

  $descrizioneCompleta= $_POST["descrizioneCompleta"];
  $ID= $_POST["ID"];

  //$sql = "UPDATE Locali SET voto = voto + '$voto', numeroVoti = numveroVoti + 1 WHERE ID = '$ID'";
	$sql = "UPDATE Locali SET descrizioneCompleta = '$descrizioneCompleta' WHERE ID = '$ID'";

  mysqli_query($con, $sql);

  mysqli_close($con);


?>
