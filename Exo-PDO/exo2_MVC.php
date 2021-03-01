<?php
  require_once "controllers/ctrl_index.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercice 2 PDO</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Artiste</th>
        <th>Date</th>
        <th>Type</th>
        <th>Genre</th>
        <th>Genre 2</th>
        <th>Durée</th>
        <th>Heure</th>
      </tr>
    </thead>
    <tbody>
        <?php
          foreach($showsArray as $show){
            ?>
          <tr>
            <td><?= $show["id"] ?></td>
            <td><?= $show["title"] ?></td>
            <td><?= $show["performer"] ?></td>
            <td><?= $show["date"] ?></td>
            <td><?= $show["showTypesId"] ?></td>
            <td><?= $show["firstGenresId"] ?></td>
            <td><?= $show["secondGenreId"] ?></td>
            <td><?= $show["duration"] ?></td>
            <td><?= $show["startTime"] ?></td>
          </tr>

        <?php } ?>

    </tbody>
  </table>
</body>
</html>