<?php

$user= 'root';
$pass='';
$db='licenta_bd';

$db= new mysqli ('localhost', $user, $pass, $db) or die("Conectare nereusita");

echo "ok";
?>
