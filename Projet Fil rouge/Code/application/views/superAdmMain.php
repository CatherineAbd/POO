<div class="admCont"
  <h2>Bonjour <?= $user['lastname']?> </h2>

  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Agence</th>
        <th>Rôle utilisateur</th>
        <th>Mot de passe</th>
        <th></th>
        <th></th>
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
          <a href="<?= site_url('main/deleteOneUser/') . $oneUser['id'] ?>" class="superBtn"><i class="fas fa-trash-alt"></i></a>
        </th>
      </tr>
    <?php
      }
    ?>
    </tbody>
  </table>
  <a href="<?= site_url('main/manageOneUser') ?>" class="superBtn">+</a>
  <!-- <a href="" class="superBtn" onclick="superAddFormUser()"><i class="far fa-plus-square"></a> -->
  <!-- <i class="far fa-plus-square"> -->
</div>
