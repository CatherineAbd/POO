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
    <h2 class="titleClients">Clients</h2>
    <div class="clients">
    <?php 
      while ($row = $answer->fetch()){ ?>
      <p>Nom client : <?= $row["firstName"] . " " . $row["lastName"] ?> </p>
    <?php } ?>
    </div>

    <!-- Ex2 Afficher tous les types de spectacles possibles. -->
    <h2 class="titleShowTypes">Types de spectacles</h2>
    <div class="showTypes">
    <?php
      $answer = $bdd->query("SELECT * FROM showTypes");
      while ($row = $answer->fetch()){ ?>
        <p>Type spectacle : <?= $row["type"] ?> </p>
      <?php } ?>
    </div>

    <!-- Ex3 Afficher les 20 premiers clients. -->
    <h2 class="titleShowTypes">20 premiers clients</h2>
    <div class="firstTwentyClts">
    <?php
      $answer = $bdd->query("SELECT * FROM clients ORDER BY lastName LIMIT 20");
      while ($row = $answer->fetch()){ ?>
      <p>Nom client : <?= $row["firstName"] . " " . $row["lastName"] ?> </p>
      <?php } ?>
    </div>

    <!-- Ex4 N'afficher que les clients possédant une carte de fidélité. -->
    <h2 class="titleShowTypes">Clients avec carte de fidélité</h2>
    <div class="loyaltyCard">
    <?php
      $answer = $bdd->query("SELECT clt.firstName firstname, clt.lastName lastname, clt.cardNumber cardNumber FROM clients clt 
                             JOIN cards c ON (clt.cardNumber = c.cardNumber)
                             JOIN cardtypes ct ON (ct.id = c.cardTypesId)
                             WHERE ct.type = 'Fidélité'");
      while ($row = $answer->fetch()){ ?>
      <p>Nom client : <?= $row["firstname"] . " " . $row["lastname"]. " carte n° " . $row["cardNumber"] ?> </p>
      <?php } ?>
    </div>

    <!-- Ex 5 Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
    Les afficher comme ceci :

    Nom : Nom du client

    Prénom : Prénom du client

    Trier les noms par ordre alphabétique. -->
    <h2 class="titleShowTypes">Clients dont le nom commence par M</h2>
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

    <!-- Ex6 Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure. -->

    <h2 class="titleShowTypes">Spectacles</h2>
    <div class="shows">
    <?php
      $answer = $bdd->query("SELECT title, performer, `date`, startTime FROM shows ORDER BY title");
      while ($row = $answer->fetch()){ ?>
      <p><strong>Spectacle</strong> : <?= $row["title"]?> <strong>artiste</strong> : <?= $row["performer"] ?> <strong>date</strong> : <?= $row["date"] ?> <strong>heure</strong> : <?= $row["startTime"]?> </p>
      <?php } ?>
    </div>

    <!-- Ex7 Afficher tous les clients comme ceci :

    Nom : Nom de famille du client

    Prénom : Prénom du client

    Date de naissance : Date de naissance du client

    Carte de fidélité : Oui (Si le client en possède une) ou Non (s'il n'en possède pas)

    Numéro de carte : Numéro de la carte fidélité du client s'il en possède une. -->

</body>
</html>