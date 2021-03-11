<?php
  require_once "controllers/ctrl_index.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Création table locaauto.car</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Carte</th>
        <th>Numéro de carte</th>
      </tr>
    </thead>
    <tbody>
        <?php
          foreach($tabCars as $oneCar){
            ?>
          <tr>
            <td><?= $oneCar["anne"] ?></td>
            <td><?= $oneCar["titre"] ?></td>
            <td><?= $oneCar["km"] ?></td>
            <td><?= $oneCar["place"] ?></td>
            <td><?= $oneCar["energie"] ?></td>
            <td><?= $oneCar["boite"] ?></td>
          </tr>

        <?php } ?>

    </tbody>
  </table>
</body>
</html>