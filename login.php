<?php

$user= 'root';
$pass='';
$db='licenta_db';

$con= new mysqli ('localhost', $user, $pass, $db) or die("Conectare nereusita");


session_start();

if ( !isset($_POST['username'], $_POST['password']) ) {
	
	exit('Please fill both the username and password fields!');
}


$sql="SELECT id, password FROM login WHERE username = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param('s', $_POST['username']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$password=$row['password'];
if ($_POST['password'] == $password) {
  	echo "Success";
} else {
		echo 'User sau parola incorecta!';
	}

	$stmt->close();
?>
