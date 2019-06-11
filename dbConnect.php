<?php

class dbConnect{
  

  function __construct(){
    
  }
  function connect(){
  	  
  $servername = "localhost";
  $usernameDB = "balettacoding";
  $passwordDB = "";
  $dbname = "my_barlettacoding";
  
    $con = new mysqli($servername,$usernameDB,$passwordDB,$dbname);//agg _connect

    if(!$con){

      die("Connection faild");
    }

    return $con;
  }
}


?>
