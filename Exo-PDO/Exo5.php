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

    <!-- Ex 5 Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
    Les afficher comme ceci :

    Nom : Nom du client

    Prénom : Prénom du client

    Trier les noms par ordre alphabétique. -->
    <h1 class="titleShowTypes">Clients dont le nom commence par M</h1>
    <div class="nameBeginM">
    <?php
      $answer = $bdd->query("SELECT * FROM clients
                             WHERE lastName like 'M%'
                             ORDER BY lastName, firstName");
      while ($row = $answer->fetch()){ ?>
      <p>Nom : <?= $row["lastName"] ?> </p>
      <p>Prénom : <?= $row["firstName"] ?> </p>
      <?php } ?>
    </div>

</body>
</html>