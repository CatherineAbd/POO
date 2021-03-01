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
    <!-- Ex4 N'afficher que les clients possédant une carte de fidélité. -->
    <h1 class="titleShowTypes">Clients avec carte de fidélité</h1>
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

</body>
</html>