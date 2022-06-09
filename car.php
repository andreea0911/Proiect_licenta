<link rel="stylesheet" href="css/style.css">

<?php

$user= 'root';
$pass='';
$db='licenta_db';

$con= new mysqli ('localhost', $user, $pass, $db) or die("Conectare nereusita");
session_start();

$username= $_POST['username'];
$sql = "SELECT c.id_client, c.nume,c.prenume,m.nr_masina, m.model, m.tip_combustibil, m.id_masina
        FROM client c
        JOIN masina m
        ON c.id_client=m.id_client
        WHERE c.nume= ? OR c.prenume= ?";
$stmt = $con->prepare($sql);
$stmt->bind_param('ss', $_POST['username'],  $_POST['username']);
$stmt->execute();
$result = $stmt->get_result();
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo "<table border='2' align='center'><tr><th>nume</th><th>prenume</th><th>nr_masina</th><th>model</th><th>tip_combustibil</th><th>Actiune</th></tr>";
foreach ($data as $row) {

    echo "<tr><td>".$row["nume"]."</td><td>".$row["prenume"]." </td><td>".$row["nr_masina"]."</td><td>".$row["model"]."</td><td>".$row["tip_combustibil"]."</td>
    <td><button class='programare' id=".$row["id_client"]."_".$row["id_masina"]."_".$row["nume"]."_".$row["prenume"]
    ."_".$row["nr_masina"]."_".$row["model"].
    ">Adauga programare</button></td>
    </tr>";
}
  echo "</table>";

$con->close();

?>

<div id="programare-form">

  <div id="programare">
    <div style="display: flex; justify-content: center; margin-top: 24px;">
      <span id="nume"></span>
      <span id="model"></span>
      <input type="text" id="id_client" name="id_client" placeholder="Data Programarii" style="display: none">
      <input type="text" id="id_masina" name="id_masina" placeholder="Data Programarii" style="display: none">

      <input id="data_intrare" type="text" name="data_intrare" placeholder="Data Programarii" required>
      <button id="add_programare" type="button">Introduce programare</button>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="js/programare.js"></script>
