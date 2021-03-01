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
    <!-- Ex6 Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure. -->

    <h1 class="titleShowTypes">Spectacles</h1>
    <div class="shows">
    <?php
      $answer = $bdd->query("SELECT title, performer, `date`, startTime FROM shows ORDER BY title");
      while ($row = $answer->fetch()){ ?>
      <p><strong>Spectacle</strong> : <?= $row["title"]?> <strong>artiste</strong> : <?= $row["performer"] ?> <strong>date</strong> : <?= $row["date"] ?> <strong>heure</strong> : <?= $row["startTime"]?> </p>
      <?php } ?>
    </div>

</body>
</html>