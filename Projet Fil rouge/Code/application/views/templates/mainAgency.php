<div class="tableConfig" id="tableAgency">
    <table class="table table-dark table-hover col-10">
      <thead>
        <tr>
          <th class="col-2">Id</th>
          <th class="col-2">Nom</th>
          <th class="col-2">Téléphone</th>
          <th class="col-2">Email</th>
          <th class="col-2">Adresse</th>
          <th class="col-2">Code postal</th>
          <th class="col-2">Ville</th>
          <th class="col-2">Archivé (o/n)</th>
          <th class="col-1"></th>
          <th class="col-1"></th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($tabAgency as $oneTabRow){ 
      ?>
        <tr>
          <td><?= $oneTabRow['id']?></td>
          <td><?= $oneTabRow['name']?></td>
          <td><?= $oneTabRow['phone']?></td>
          <td><?= $oneTabRow['email']?></td>
          <td><?= $oneTabRow['address']?></td>
          <td><?= $oneTabRow['zipcode']?></td>
          <td><?= $oneTabRow['nameCity']?></td>
          <td><?= $oneTabRow['archived'] == TRUE ? 'Oui' : 'Non' ?></td>
          <td>
            <a href="<?= site_url('main/manageOneAgency/') . $oneTabRow['id'] ?>" class="superBtn"><i class="fas fa-pencil-alt"></i></a>
          </td>

          <th>
            <a href="<?= site_url('main/deleteOneAgency/') . $oneTabRow['id'] ?>" onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');"class="superBtn"><i class="fas fa-trash-alt"></i></a>
          </th>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>
    <a href="<?= site_url('main/manageOneAgency') ?>" class="superBtn">+</a>
</div>
