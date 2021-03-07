<h2>Bonjour <?= $user['lastname']?> </h2>

<div class="admCont">
<?php
  foreach($tabUser as $oneUser){ 
?>
    <?= form_open(); ?>
      <label for="lastname">Nom</label><input type="text" name="lastname" value="<?= $oneUser['lastname']??set_value('lastname') ?>">
      <label for="firstname">Prénom</label><input type="text" name="firstname" value="<?= $oneUser['firstname']??set_value('firstname') ?>">
      <label for="password">Mot de passe</label><input type="text" name="password" value="<?= $oneUser['password']??set_value('password') ?>">
      <select name="roleuser" id="roleuser">
        <?php
        foreach($tabRoleUser as $role){
        ?>
          <option value="<?= $role['id'] ?>" <?= ($role["id"] == $oneUser["id_roleUser"]) ? "selected" : "" ?>><?= $role['role'] ?></option>
        <?php
        }
        ?>
      </select>
      <select name="agency" id="agency">
        <?php
        foreach($tabAgency as $agency){
        ?>
          <option value="<?= $agency['id'] ?>" <?= ($agency["id"] == $oneUser["id_agency"]) ? "selected" : "" ?>><?= $agency['name'] ?></option>
        <?php
        }
        ?>
      </select>
      <a href="" class="superBtn"><i class="fas fa-pencil-alt"></i></a>
      <a href="" class="superBtn"><i class="fas fa-trash-alt"></i></a>
    </form>
    <?php
  }
  ?>
  <a href="" class="superBtn" onclick="superAddFormUser()"><i class="far fa-plus-square"></a>
  <!-- <i class="far fa-plus-square"> -->
</div>