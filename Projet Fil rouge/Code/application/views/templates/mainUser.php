<div class="tableConfig" id="tableUser">
    <a href="<?= site_url('main/manageOneUser') ?>" class="superBtn"><i class="fas fa-plus-square"></i></a>
    <table class="table table-dark table-hover col-10">
      <thead>
        <tr>
          <th class="col-2">Nom</th>
          <th class="col-2">Prénom</th>
          <th class="col-2">Agence</th>
          <th class="col-2">Rôle utilisateur</th>
          <th class="col-2">Mot de passe</th>
          <th class="col-1"></th>
          <th class="col-1"></th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($tabUser as $oneUser){ 
      ?>
        <tr>
          <td><?= $oneUser['lastname']?></td>
          <td><?= $oneUser['firstname']?></td>
          <td>
            <select name="agency" id="agency">
              <?php
              foreach($tabAgency as $agency){
              ?>
                <option value="<?= $agency['id'] ?>" <?= ($agency["id"] == $oneUser["id_agency"]) ? "selected" : "" ?>><?= $agency['name'] ?></option>
              <?php
              }
              ?>
            </select>
          </td>
          <td><?= $oneUser['role'] ?></td>
          <td><?= $oneUser['password'] ?></td>
          <td>
            <a href="<?= site_url('main/manageOneUser/') . $oneUser['id'] ?>" class="superBtn"><i class="fas fa-pencil-alt"></i></a>
          </td>

          <th>
            <a href="<?= site_url('main/deleteOneUser/') . $oneUser['id'] ?>" onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');" class="superBtn"><i class="fas fa-trash-alt"></i></a>
          </th>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>
  </div>

