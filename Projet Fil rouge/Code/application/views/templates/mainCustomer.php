<div class="tableConfig" id="tableCustomer">
    <table class="table table-dark table-hover col-10">
      <thead>
        <tr>
          <th class="col-1">Id</th>
          <th class="col-2">Nom</th>
          <th class="col-2">Prénom</th>
          <th class="col-2">Mot de passe</th>
          <th class="col-1">Date naissance</th>
          <th class="col-2">Tél</th>
          <th class="col-2">Email</th>
          <th class="col-2">Adresse</th>
          <th class="col-1">Code postal</th>
          <th class="col-1">Archivé</th>
          <th class="col-1">Ville</th>
          <th class="col-1"></th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($tabCustomer as $oneTabRow){ 
      ?>
        <tr>
          <td><?= $oneTabRow['id']?></td>
          <td><?= $oneTabRow['lastname']?></td>
          <td><?= $oneTabRow['firstname']?></td>
          <td><?= $oneTabRow['password']?></td>
          <td><?= $oneTabRow['birthdate']?></td>
          <td><?= $oneTabRow['phone']?></td>
          <td><?= $oneTabRow['email']?></td>
          <td><?= $oneTabRow['address']?></td>
          <td><?= $oneTabRow['zipcode']?></td>
          <td><?= $oneTabRow['archived'] == TRUE ? 'Oui' : 'Non' ?></td>
          <td><?= $oneTabRow['nameCity']?></td>

          <th>
            <a href="<?= site_url('main/deleteOneCustomer/') . $oneTabRow['id'] ?>" onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');"class="superBtn"><i class="fas fa-trash-alt"></i></a>
          </th>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>
</div>
