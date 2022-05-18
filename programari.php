<?php
$user= 'root';
$pass='';
$db='licenta_db';

$con= new mysqli ('localhost', $user, $pass, $db) or die("Conectare nereusita");
session_start();


$sql = "INSERT INTO programari(id_client, id_masina, data_intrare) VALUES (?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt-> bind_param('sss', $_POST['id_client'],  $_POST['id_masina'], $_POST['data_intrare']);
$stmt->execute();

$con->close();

?>
