<?php
  require_once "controllers/ctrl_index.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercice 5 PDO</title>
</head>
<body>
  <?php
    if (isset($_POST["btnSubmit"])){
      foreach(clientStartArray($clientsObj, $_POST["letter"]) as $client){
        ?>

    <p>Nom : <?= $client["lastName"] ?></p>
    <p>Prénom : <?= $client["firstName"] ?></p>

  <?php }
  } else { ?>
    <form action="" method="post">
      <label for="letter">Rechercher des noms dont la 1ère lettre est : </label><input type="text" id="letter" name="letter" maxlength="1">
      <button type="submit" id="btnSubmit" name="btnSubmit">Rechercher</button>
    </form>

  <?php
  }
  ?>

</body>
</html>