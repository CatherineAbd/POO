
<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Date de naissance</th>
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
        <?php
          $pathPatient = '/index.php/patients_ctrl/deletePatient/' . $patient['id'];
        ?>
        <!-- <td><a href="<?= base_url($pathPatient)?>" class="btnDelete">Effacer</a></td> -->
        <td><a href="" class="btnDelete" id="<?= $patient['id'] ?>"">Effacer</a></td>
        <?php
          // $pathPatient = 'index.php/manageP/' . $patient['id'];
          $pathPatient = 'index.php/patients_ctrl/managePatient/' . $patient['id'];
          // $pathPatient = '/index.php/patients_ctrl/showOnePatient/' . $patient['lastname'] . '/' . $patient['phone'];
          // $pathPatient = '/profil/' . $patient['lastname'];
        ?>
        <td><a href="<?= base_url($pathPatient)?>">Modifier</a></td>
      </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<a href="<?= base_url('/index.php/manageP')?>">Créer un nouveau patient</a>
<!-- <a href="<?= base_url('/index.php/patients_ctrl/createPatient')?>">Créer un nouveau patient</a> -->