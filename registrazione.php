<?php
  require "dbConnect.php";

  $response= array();
  $db= new dbConnect();
  $con = $db->connect();
  $checkname= false; // falsa se il nome non esiste , vera se esiste

  $username= $_POST["username"];
  $email= $_POST["email"];
  $password= $_POST["password"];

  $sqlCheck = "select Username, Mail from Users";
  $sqlInsert = "insert into Users (Username, Mail, Password) values ('$username', '$email', '$password')";
  $result = $con->query($sqlCheck);

//controllo se esiste gia l'username o l'email
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      if($username == $row["Username"]){
        $response['error']= true;
        $response['message']= "Username already exists";
        $checkname= true;
      }
      if($email == $row["Mail"]){
        $response['error']= true;
        $response['message']= "Email already exists";
        $checkname= true;
      }


    }

  }
if(!$checkname){
  if(mysqli_query($con, $sqlInsert)){
    $response['error']= false;
    $response['message']= "User registered successfully";
  }else {
    $response['error']= true;
    $response['message']= "Error during registration";
  }
}

//Login Diretto dopo la registrazione
$sql2 = "SELECT * FROM Users";
$resultL = $con->query($sql2);
$controlloLogin = true;//VARIABILE PER IL CONTROLLO

if ($resultL->num_rows > 0)
	{
		//Controllo
		while($row = $resultL->fetch_assoc())
		{
			//SE L'USERNAME è CORRETTO E SULLA STESSA RIGA TROVA LA PASSWORD CORRETTA
			//FA IL LOGIN
			if ($username === $row["Username"] && $password === $row["Password"])
			{
				$controlloLogin = true;
				
         		$response['id']=$row["ID"];
         		$response['username']=$row["Username"];
         		$response['password']=$row["Password"];
         		$response['email']=$row["Mail"];
         		$response['tipo']=$row["Tipo"];
				break;
			}
			else
			{
			$controlloLogin = false;

			}
		}
	}

  mysqli_close($con);

  echo json_encode($response); //stampa il json






?>
