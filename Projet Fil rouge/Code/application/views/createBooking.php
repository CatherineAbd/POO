<div class="container-fluid createBookingCont">
  <div class="createBookingInfo">
    <p>Marque : <?= $oneRow["brand"] ?></p>
    <p>Modèle : <?= $oneRow["model"] ?></p>
    <p>Nombre de portes : <?= $oneRow["nbDoors"] ?></p>
    <p>Nombre de places : <?= $oneRow["nbPlaces"] ?></p>
    <p>Boîte de vitesse : <?= $oneRow["gearBox"] ?></p>
    <p>volume du coffre : <?= $oneRow["carBoot"] ?></p>
    <p>Catégorie : <?= $oneRow["category"] ?></p>
    <p>Agence : <?= $oneRow["name"] ?></p>
    <p>Prix par jour : <?= $oneRow["price"] ?></p>
  </div>
  <div class="createBookingCriteria">
    <?php
      $startDate = new DateTime($this->session->startDate);
      $endDate = new DateTime($this->session->endDate);
      $interval = $startDate->diff($endDate);
      $costRent = $interval->days * $oneRow['price'];
    ?>
    <p>Date de début de location : <?= $startDate->format("d/m/Y") ?></p>
    <p>Date de début de location : <?= $endDate->format("d/m/Y") ?></p>
  </div>
  <div class="createBookingPrice">
  <p>Prix pour <?= $interval->days ?> jours : <?= $costRent ?> </p>
  <p>Acompte de <?= $interval->days * $oneRow['price'] * 0.05 ?>  à payer maintenant </p>
  </div>

  <!-- Hidden form for pass values to create the booking -->
  <?php
    // if the customer isn't connected
    if (!isset($this->session->custEmail)){
      $pathSubmit = "main/cnxCust";
      $msgConfirm = "Vous devez créer un compte ou vous connectez avant de réserver. Continuer ?";
    }
    else
    {
      $pathSubmit = "main/manageOneBooking";
      $msgConfirm = "Voulez-vous effectuer cette réservation ? Le paiement de l'acompte se fait à partir de là";
    }
    echo form_open($pathSubmit);
    ?>
    <input type="text" name="startDate" value="<?= $this->session->startDate ?>" />
    <input type="text" name="startEnd" value="<?= $this->session->endDate ?>" />
    <input type="text" name="price" value="<?= $costRent ?>" />
    <input type="text" name="nbKm" value="0" />
    <input type="text" name="id_customer" value="<?= $this->session->custId ?>" />
    <input type="text" name="agRecovering" value="<?= $oneRow["id_agency"] ?>" />
    <input type="text" name="id_parkcar" value="<?= $oneRow["id"] ?>" />
    <div class="createBookingBtnDiv">
      
      <input type="submit" name="submit" value="Créer la réservation" class="btnSubmit" onclick="return confirm('<?= $msgConfirm ?>')"/>

      <!-- <a href="main/manageOneBooking" class="createBookingBtn" onclick="return confirm('Voulez-vous effectuer cette réservation ? Le paiement de l\'acompte se fait à partir de là')">Créer la réservation</a> -->
      <a href="<?= site_url('main/searchCar') ?>" class="createBookingReturnBtn">Retourner à la liste</a>
    </div>
  </form>

</div>
