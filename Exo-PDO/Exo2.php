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

<!-- Ex2 Afficher tous les types de spectacles possibles. -->
  <?php
    $answer = $bdd->query("SELECT * FROM shows");?>
    <h1 class="titleShowTypes">Types de spectacles</h1>
    <div class="showTypes">
    <?php
      $answer = $bdd->query("SELECT * FROM showTypes");
      while ($row = $answer->fetch()){ ?>
        <p>Type spectacle : <?= $row["type"] ?> </p>
      <?php } ?>
    </div>

</body>
</html>