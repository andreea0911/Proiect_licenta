<?php

$user= 'root';
$pass='';
$db='licenta_db';

$con= new mysqli ('localhost', $user, $pass, $db) or die("Conectare nereusita");
session_start();

$sql = "SELECT nume, pret FROM servicii";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);

$con->close();

?>
