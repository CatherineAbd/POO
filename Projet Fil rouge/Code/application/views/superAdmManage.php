<div class="admCont">
  <?php
      echo validation_errors();
      if (isset($oneUser['id']) || !empty(set_value('id)'))) {
        // $labelBtn = "<i class='fas fa-pencil-alt'></i>";
        $labelBtn = "Modification";
        $pathSubmit = 'main/manageOneUser/' . $oneUser['id']??set_value('id');
    }
    else
    {
      // $labelBtn = "<i class='fas fa-plus-square'></i>";
      $labelBtn = "Création";
      $pathSubmit = 'main/manageOneUser';
    }
      echo form_open($pathSubmit);
  ?>
  <div class="superAdmForm">
    <div class="inputRow">
        <div class="formLastname inputCol">
          <span class="iconField"><i class="far fa-user"></i></span>
          <input type="text" id="lastname" name="lastname" placeholder="nom" value="<?= $oneUser['lastname']??set_value('lastname') ?>">
        </div>
        <div class="formFirstname inputCol">
          <span class="iconField"><i class="far fa-user"></i></span>
          <input type="text" id="firstname" name="firstname" placeholder="prénom" value="<?= $oneUser['firstname']??set_value('firstname') ?>">
        </div>
    </div>
    <div class="inputRow">
        <div class="formPasswd inputCol">
          <span class="iconField"><i class="fas fa-key"></i></span>
          <input type="text" id="password1" name="password1" placeholder="mot de passe" value="<?= $oneUser['password']??set_value('password1') ?>">
        </div>
        <div class="formPasswd inputCol">
          <span class="iconField"><i class="fas fa-key"></i></span>
          <input type="text" id="password2" name="password2" placeholder="conf. mot de passe" value="<?= $oneUser['password']??set_value('password2') ?>">
        </div>
    </div>
    <div class="inputRow">
      <div class="formAgency">
        <span class="iconField"><i class="fas fa-store"></i></span>
        <select name="agency" id="agency">
        <?php
            foreach($tabAgency as $agency){
            ?>
              <option value="<?= $agency['id'] ?>" <?= (isset($oneUser)?($agency["id"] == ($oneUser["id_agency"]) || (set_value("agency")) ? "selected" : "") : "") ?>><?= $agency['name'] ?></option>
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
              <option value="<?= $roleuser['id'] ?>" <?= (isset($oneUser)?(($roleuser["id"] == ($oneUser["id_roleUser"]) || (set_value('roleuser'))) ? "selected" : "") : "") ?>><?= $roleuser['role'] ?></option>
            <?php
            }
            ?>
        </select>
      </div>
    </div>
    <!-- hidden fied for update's key -->
    <input type="hidden" name="id" value="<?= $oneUser['id']??set_value('id') ?>" />

    <input type="submit" name="submit" value="<?= $labelBtn ?>" />

  </div>
</div>

