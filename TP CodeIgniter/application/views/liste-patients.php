<h1><?= $title ?></h1>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Date anniversaire</th>
      <th>N° tél</th>
      <th>Email</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($patients as $patient){
    ?>
      <tr>
        <td><?= $patient['lastname']?></td>
        <td><?= $patient['firstname']?></td>
        <td><?= $patient['birthdate']?></td>
        <td><?= $patient['phone']?></td>
        <td><?= $patient['mail']?></td>
        <td><a href="">Effacer</a></td>
        <td><a href="">Modifier</a></td>
      </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<a href="<?= base_url('/index.php/patients_ctrl/createPatient')?>">Créer un nouveau patient</a>