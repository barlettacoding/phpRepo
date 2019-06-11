<?php
  require "dbConnect.php";

  $response= array();
  $db= new dbConnect();
  $con = $db->connect();

  $ID = $_POST["ID"];


  $sqlDelete = "delete from Users where ID = '$ID'";

  if($con->query($sqlDelete) === TRUE){
    $response['error']= false;
    $response['message']= "User deleted successfully";
    echo "Cancellato";
  }else {
    $response['error']= true;
    $response['message']= "Error during cancellation";
    echo "Problema cancellazione";
  }


  mysqli_close($con);


?>
