<script src="js/programare.js"></script>

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

echo "<table border='2' align='center'><tr><th>nume</th><th>prenume</th><th>nr_masina</th><th>model</th><th>tip_combustibil</th><th>Actune</th></tr>";
foreach ($data as $row) {
  // output data of each row
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
  <link rel="stylesheet" href="css/style.css">

  <form action="http://localhost/programari.php" method="post">
    <div style="display: flex; justify-content: center; margin-top: 24px;">
      <span id="nume"></span>
      <span id="model"></span>
      <input type="text" id="id_client" name="id_client" placeholder="Data Programarii" style="display: none">
      <input type="text" id="id_masina" name="id_masina" placeholder="Data Programarii" style="display: none">

      <input type="text" name="data_intrare" placeholder="Data Programarii" required>
      <input type="submit" value="Indtroduce programare">
    </div>

  </form>
</div>
