<?php
require "dbConnect.php";
session_start();
$response= array();
$db= new dbConnect();

if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		 if (empty($_POST["username"]))
			{
			$response['message']= "Missing username";
			}
		if (empty($_POST["password"]))
			{
			$response['message']= "Missing Password";
			}
	}


$username = $_POST["username"];//Username login
$password = $_POST["password"];//Password login

//STRINGA PER PRENDERE I DATI DAL DATABASE
$sql = "SELECT * FROM Users";

//CONNESSIONE CON MSQLI PROCEDURALE AL DATABASE
$conn = $db->connect();

//ESEGUO LA QUERY E IL RISULTATO VA NELLA VARIABILE RESULT
$result = $conn->query($sql);

$controlloLogin = true;//VARIABILE PER IL CONTROLLO

if ($result->num_rows > 0)
	{
		//Controllo
		while($row = $result->fetch_assoc())
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
//AGGIUNGERE QUI CONTROLLO AL LOGIN PER IL REINDERIZZAMENTO ALLA PAGINA DI LOGIN
if ($controlloLogin == true){
	$response['error']= false;
	$response['message']= "Logged";
}
else {
	$response['error']= true;
	$response['message']= "Error login";
}

echo json_encode($response);
$conn->close();



?>
