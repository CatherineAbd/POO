<div class="superAdmForm">
    <div class="inputRow">
      <div class="formId inputCol">
        <span class="iconField"><i class="far fa-user"></i></span>
        <input type="text" name="textId" readonly value="<?= $oneRow['id']??set_value('id') ?>">
      </div>
      <div class="formCar">
        <span class="iconField"><i class="fas fa-car"></i></span>
        <select name="car" id="car">
        <?php
            foreach($tabCar as $car){
            ?>
              <option value="<?= $car['id'] ?>" <?= (isset($oneRow) ? ($car["id"] == ($oneRow["id_car"]) || (set_value("car")) ? "selected" : "") : "") ?>><?= $car["id"] . " " . $car["brand"] . " " . $car["model"] ?></option>
            <?php
            }
            ?>
        </select>
      </div>
    </div>
    <div class="inputRow">
      <div class="formColor">
        <span class="iconField"><i class="fas fa-palette"></i></span>
        <select name="color" id="color">
        <?php
            foreach($tabColor as $color){
            ?>
              <option value="<?= $color['id'] ?>" <?= (isset($oneRow)?($color["id"] == ($oneRow["id_color"]) || (set_value("color")) ? "selected" : "") : "") ?>><?= $color["color"] ?></option>
            <?php
            }
            ?>
        </select>
      </div>
      <div class="formNbkm inputCol">
          <span class="iconField"><i class="fas fa-route"></i></span>
          <input type="number" id="nbkm" name="nbkm" placeholder="nb de km" value="<?= $oneRow['nbKm']??set_value('nbkm') ?>">
          <p><?php echo form_error('nbkm'); ?></p>
      </div>
    </div>

    <!-- hidden fied for update's key -->
    <input type="hidden" name="id" value="<?= $oneRow['id']??set_value('id') ?>" />
    <input type="hidden" name="id_agency" value="<?= $idAgency ?>" />

    <input type="submit" name="submit" value="<?= $labelBtn ?>" />
  </div>
