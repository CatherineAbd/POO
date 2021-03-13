<div class="superAdmForm">
    <div class="inputRow">
      <div class="formId inputCol">
        <label class="manageBookingLabel">Identifiant réservation</label>
        <input type="text" name="textId" readonly class="manageBookingInputRO" value="<?= $oneRow['id']??set_value('id') ?>">
      </div>
      <div class="formLastname inputCol">
        <label class="manageBookingLabel">Nom client</label>
        <input type="text" name="lastname" readonly class="manageBookingInputRO" value="<?= $oneRow['lastname']??set_value('lastname') ?>">
      </div>
      <div class="formEmail inputCol">
        <label class="manageBookingLabel">Email client</label>
        <input type="text" name="email" readonly class="manageBookingInputRO" value="<?= $oneRow['email']??set_value('email') ?>">
      </div>
      <div class="formCar inputCol">
        <label class="manageBookingLabel">Voiture</label>
        <input type="text" name="car" readonly class="manageBookingInputRO" value="<?= isset($oneRow['brand'])? ($oneRow['brand'] . " " . $oneRow['model'] . " " . $oneRow['color']) : set_value('car') ?>">
      </div>
      <div class="formParkcar inputCol">
        <label class="manageBookingLabel">Id voiture parc</label>
        <input type="text" name="id_parkcar" readonly class="manageBookingInputRO" value="<?= $oneRow['id_parkcar']??set_value('id_parkcar') ?>">
      </div>
      <div class="formStartDate inputCol">
        <label class="manageBookingLabel">Date début location</label>
        <input type="date" name="startDate" readonly class="manageBookingInputRO" value="<?= isset($oneRow['startDate']) ? strftime("%Y-%m-%d", strtotime($oneRow['startDate'])) : set_value('startDate') ?>">
      </div>
      <div class="formEndDate inputCol">
        <label class="manageBookingLabel">Date fin location</label>
        <input type="date" name="startEnd" readonly class="manageBookingInputRO" value="<?= isset($oneRow['startEnd']) ? strftime("%Y-%m-%d", strtotime($oneRow['startEnd'])) : set_value('startEnd') ?>">
      </div>
      <div class="formAgRecover inputCol">
        <label class="manageBookingLabel">Nom agence de retour</label>
        <input type="text" name="agRecovering" readonly class="manageBookingInputRO" value="<?= $oneRow['nameAgRecov']??set_value('agRecovering') ?>">
      </div>
      <div class="formPrice inputCol">
        <label class="manageBookingLabel">Prix total</label>
        <input type="number" name="price" readonly class="manageBookingInputRO" value="<?= $oneRow['price']??set_value('price') ?>">
      </div>
      <div class="formNbKm inputCol">
        <label class="manageBookingLabel">Nb de km effectué</label>
        <input type="number" name="nbKm" value="<?= $oneRow['nbKm']??set_value('nbKm') ?>">
      </div>
      <div class="formTypeBooking inputCol">
        <label class="manageBookingLabel">Type de forfait</label>
        <input type="text" name="typeBooking" readonly class="manageBookingInputRO" value="<?= $oneRow['typeBooking']??set_value('typeBooking') ?>">
      </div>
      <div class="formState inputCol">
        <label class="manageBookingLabel" id="stateBooking">Etat de la réservation</label>
        <select name="id_stateBooking" id="stateBooking">
        <?php
            foreach($tabStateBooking as $state){
            ?>
              <option value="<?= $state['id'] ?>" <?= (isset($oneRow)?($state["id"] == ($oneRow["id_stateBooking"]) || (set_value("id_stateBooking")) ? "selected" : "") : "") ?>><?= $state["state"] ?></option>
            <?php
            }
            ?>
        </select>
      </div>
      <div class="formArchived inputCol">
        <label class="manageBookingLabel">Archivé</label>
        <input type="text" name="archived" readonly class="manageBookingInputRO" class="manageBookingInputRO" value="<?= $oneRow['archived']??set_value('archived') ?>">
      </div>
    </div>

    <!-- hidden fied for update's key -->
    <input type="hidden" name="id" value="<?= $oneRow['id']??set_value('id') ?>" />
    <input type="hidden" name="id_agency" value="<?= $idAgency ?>" />
    <input type="hidden" name="id_customer" value="<?= $oneRow['id_customer']??set_value('id_customer') ?>" />
    <input type="hidden" name="id_agRecovering" value="<?= $oneRow['id_agRecovering']??set_value('id_customer') ?>" />

    <input type="submit" name="submit" value="<?= $labelBtn ?>" />
  </div>
