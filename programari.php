<?php
$user= 'root';
$pass='';
$db='licenta_db';

$con= new mysqli ('localhost', $user, $pass, $db) or die("Conectare nereusita");
session_start();


if($_POST['entity'] === 'get-programare') {
  $sql = "SELECT c.nume, c.prenume, m.model, m.nr_masina, p.data_intrare
          FROM client c
          JOIN programari p
          ON c.id_client = p.id_client
          JOIN masina m
          ON m.id_masina = p.id_masina";
  $stmt = $con->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($data);
} else {
  $sql = "INSERT INTO programari(id_client, id_masina, data_intrare) VALUES (?, ?, ?)";
  $stmt = $con->prepare($sql);
  $stmt-> bind_param('sss', $_POST['id_client'],  $_POST['id_masina'], $_POST['data_intrare']);
  $stmt->execute();

}
$con->close();

?>
