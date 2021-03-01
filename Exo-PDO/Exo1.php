<?php
  require "controllers/controller.php";
  $bdd = bddConnect();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="assets/css/style.css">

  <title>Exos PDO</title>
</head>
<body>
  <?php
    $answer = $bdd->query("SELECT * FROM clients");?>

    <!-- Ex1 Afficher tous les clients. -->
    <h1 class="titleClients">Clients</h1>
    <div class="clients">
    <?php 
      while ($row = $answer->fetch()){ ?>
      <p>Nom client : <?= $row["firstName"] . " " . $row["lastName"] ?> </p>
    <?php } ?>
    </div>


</body>
</html>