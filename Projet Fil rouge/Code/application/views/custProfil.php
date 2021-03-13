<!-- $data :
$crBooking, $oneRow, $tabCity -->
<div class="container-fluid custCont">
  <div class="custBody">
    <?php
      if (isset($oneRow["id"]) || !empty(set_value("id)"))) {
        // $labelBtn = "<i class='fas fa-pencil-alt'></i>";
        // $data["labelBtn"] = "Modification";
        $labelBtn = "Modification";
        $pathSubmit = "main/manageOneCustomer/" . $crBooking . "/" . $oneRow["id"]??set_value("id");
      }
      else
      {
        // $data["labelBtn"] = "Création";
        $labelBtn = "Création";
        $pathSubmit = "main/manageOneCustomer/" . $crBooking;
      }
      echo form_open($pathSubmit);
    ?>
      <div class="inputRow">
          <div class="formLastname inputCol">
            <span class="iconField"><i class="far fa-user"></i></span>
            <input type="text" id="lastname" name="lastname" placeholder="nom" value="<?= $oneRow['lastname']??set_value('lastname') ?>">
            <p><?php echo form_error('lastname'); ?></p>
          </div>
          <div class="formFirstname inputCol">
            <span class="iconField"><i class="far fa-user"></i></span>
            <input type="text" id="firstname" name="firstname" placeholder="prénom" value="<?= $oneRow['firstname']??set_value('firstname') ?>">
            <p><?php echo form_error('firstname'); ?></p>
          </div>
          <div class="formBirthdate inputCol">
            <span class="iconField"><i class="fas fa-birthday-cake"></i></span>
            <input type="date" id="birthdate" name="birthdate" placeholder="date anniversaire" value="<?= $oneRow['birthdate']??set_value('birthdate') ?>">
            <p><?php echo form_error('birthdate'); ?></p>
          </div>
      </div>
      <div class="inputRow">
        <div class="formEmail inputCol">
            <span class="iconField"><i class="fas fa-at"></i></span>
            <input type="email" id="email" name="email" placeholder="Email" value="<?= $oneRow['email']??set_value('email') ?>">
            <p><?php echo form_error('email'); ?></p>
        </div>
        <div class="formPhone inputCol">
          <span class="iconField"><i class="fas fa-phone"></i></span>
          <input type="phone" id="phone" name="phone" placeholder="Téléphone" value="<?= $oneRow['phone']??set_value('phone') ?>">
          <p><?php echo form_error('phone'); ?></p>
        </div>
      </div>
      <div class="inputRow">
        <div class="formAddress inputCol">
          <span class="iconField"><i class="fas fa-address-book"></i></span>
          <input type="address" id="address" name="address" placeholder="Adresse" value="<?= $oneRow['address']??set_value('address') ?>">
          <p><?php echo form_error('address'); ?></p>
        </div>
        <div class="formZipcode inputCol">
          <span class="iconField"><i class="fas fa-address-book"></i></span>
          <input type="zipcode" id="zipcode" name="zipcode" placeholder="CP" value="<?= $oneRow['zipcode']??set_value('zipcode') ?>">
          <p><?php echo form_error('zipcode'); ?></p>
        </div>
        <div class="formCity inputCol">
          <span class="iconField"><i class="fas fa-city"></i></span>
          <select name="city" id="city">
          <?php
              foreach($tabCity as $city){
                ?>
                <option value="<?= $city['id'] ?>" <?= (isset($oneRow) ? ($city["id"] == ($oneRow["id_city"]) || (set_value("city")) ? "selected" : "") : "") ?>><?= $city["nameCity"] ?></option>
              <?php
              }
              ?>
          </select>
        </div>
      </div>
      <div class="inputRow">
          <div class="formPasswd inputCol">
            <span class="iconField"><i class="fas fa-key"></i></span>
            <input type="text" id="password1" name="password1" placeholder="mot de passe" value="<?= $oneRow['password']??set_value('password1') ?>">
            <p><?php echo form_error('password1'); ?></p>
          </div>
          <div class="formPasswd inputCol">
            <span class="iconField"><i class="fas fa-key"></i></span>
            <input type="text" id="password2" name="password2" placeholder="conf. mot de passe" value="<?= $oneRow['password']??set_value('password2') ?>">
            <p><?php echo form_error('password2'); ?></p>
          </div>
      </div>

      <input type="hidden" name="id" value="<?= $oneRow['id']??set_value('id') ?>" />

      <input type="submit" name="submit" value="<?= $labelBtn ?>" class="btnSubmit" />

    </form>

    <div class="">
      <a href="<?= site_url('main') ?>" class="custManageBtnMain">Retour</a>
    </div>

  </div>

</div>