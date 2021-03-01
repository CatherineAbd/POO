<?php
  require_once "controllers/ctrl_index.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercice 6 PDO</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Titre</th>
        <th>Artiste</th>
        <th>Date du spectacle</th>
        <th>Heure du spectacle</th>
      </tr>
    </thead>
    <tbody>
        <?php
          foreach($showsArray as $show){
            ?>
          <tr>
            <td><?= $show["title"] ?></td>
            <td><?= $show["performer"] ?></td>
            <td><?= $show["newDate"] ?></td>
            <td><?= $show["newTime"] ?></td>
          </tr>

        <?php } ?>

    </tbody>
  </table>
</body>
</html>