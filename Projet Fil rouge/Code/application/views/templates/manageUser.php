<div class="superAdmForm">
    <div class="inputRow">
        <div class="formLastname inputCol">
          <span class="iconField"><i class="far fa-user"></i></span>
          <input type="text" id="lastname" name="lastname" placeholder="nom" value="<?= $oneRow['lastname']??set_value('lastname') ?>">
        </div>
        <div class="formFirstname inputCol">
          <span class="iconField"><i class="far fa-user"></i></span>
          <input type="text" id="firstname" name="firstname" placeholder="prénom" value="<?= $oneRow['firstname']??set_value('firstname') ?>">
        </div>
    </div>
    <div class="inputRow">
        <div class="formPasswd inputCol">
          <span class="iconField"><i class="fas fa-key"></i></span>
          <input type="text" id="password1" name="password1" placeholder="mot de passe" value="<?= $oneRow['password']??set_value('password1') ?>">
        </div>
        <div class="formPasswd inputCol">
          <span class="iconField"><i class="fas fa-key"></i></span>
          <input type="text" id="password2" name="password2" placeholder="conf. mot de passe" value="<?= $oneRow['password']??set_value('password2') ?>">
        </div>
    </div>
    <div class="inputRow">
      <div class="formAgency">
        <span class="iconField"><i class="fas fa-store"></i></span>
        <select name="agency" id="agency">
        <?php
            foreach($tabAgency as $agency){
            ?>
              <option value="<?= $agency['id'] ?>" <?= (isset($oneRow)?($agency["id"] == ($oneRow["id_agency"]) || (set_value("agency")) ? "selected" : "") : "") ?>><?= $agency["name"] ?></option>
            <?php
            }
            ?>
        </select>
      </div>
    </div>
    <div class="inputRow">
      <div class="formRoleUser">
        <span class="iconField"><i class="fas fa-user-cog"></i></span>
        <select name="roleuser" id="roleuser">
        <?php
            foreach($tabRoleUser as $roleuser){
            ?>
              <option value="<?= $roleuser['id'] ?>" <?= (isset($oneRow)?(($roleuser["id"] == ($oneRow["id_roleUser"]) || (set_value('roleuser'))) ? "selected" : "") : "") ?>><?= $roleuser["role"] ?></option>
            <?php
            }
            ?>
        </select>
      </div>
    </div>
    <!-- hidden fied for update's key -->
    <input type="hidden" name="id" value="<?= $oneRow['id']??set_value('id') ?>" />

    <input type="submit" name="submit" value="<?= $labelBtn ?>" />
  </div>
