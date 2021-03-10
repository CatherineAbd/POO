<?php var_dump($tabParkcar);
  var_dump($this->session->idAgency) ?>
<div class="tableConfig" id="tableParkcar">
    <table class="table table-dark table-hover col-10">
      <thead>
        <tr>
          <th class="col-2">Id</th>
          <th class="col-2">Voiture</th>
          <th class="col-2">Couleur</th>
          <th class="col-2">nb km</th>
          <th class="col-1"></th>
          <th class="col-1"></th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($tabParkcar as $oneTabRow){ 
      ?>
        <tr>
          <td><?= $oneTabRow['id']?></td>
          <td><?= $oneTabRow['car']?></td>
          <td><?= $oneTabRow['color']?></td>
          <td><?= $oneTabRow['nbKm']?></td>
          <td>
            <a href="<?= site_url('main/manageOneParkcar/') . $oneTabRow['id'] ?>" class="superBtn"><i class="fas fa-pencil-alt"></i></a>
          </td>

          <th>
            <a href="<?= site_url('main/deleteOneParkcar/') . $oneTabRow['id'] ?>" onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');"class="superBtn"><i class="fas fa-trash-alt"></i></a>
          </th>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>
    <a href="<?= site_url('main/manageOneParkcar') ?>" class="superBtn">+</a>
</div>
