<div class="superAdmForm">
    <div class="inputRow">
      <div class="formId inputCol">
        <span class="iconField"><i class="fas fa-user"></i></span>
        <input type="text" name="textId" readonly value="<?= $oneRow['id']??set_value('id') ?>">
      </div>
      <div class="formCity inputCol">
        <span class="iconField"><i class="fas fa-store"></i></span>
        <input type="text" id="name" name="name" placeholder="Nom" value="<?= $oneRow['name']??set_value('name') ?>">
        <p><?php echo form_error('name'); ?></p>
      </div>
      <div class="formPhone inputCol">
        <span class="iconField"><i class="fas fa-phone"></i></span>
        <input type="phone" id="phone" name="phone" placeholder="Téléphone" value="<?= $oneRow['phone']??set_value('phone') ?>">
        <p><?php echo form_error('phone'); ?></p>
      </div>
      <div class="formEmail inputCol">
        <span class="iconField"><i class="fas fa-at"></i></span>
        <input type="email" id="email" name="email" placeholder="Email" value="<?= $oneRow['email']??set_value('email') ?>">
        <p><?php echo form_error('email'); ?></p>
      </div>
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

    <input type="hidden" name="id" value="<?= $oneRow['id']??set_value('id') ?>" />

    <input type="submit" name="submit" value="<?= $labelBtn ?>" />
  </div>
