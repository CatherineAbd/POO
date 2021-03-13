<?php
// Recovering of criteria in the session
// if (isset($this->session->criteria)){
  $id_agency = $this->session->id_agency;
  $id_category = $this->session->id_category;
  $startDate = $this->session->startDate;
  $endDate = $this->session->endDate;
  // }
?>

<div class="container-fluid carFindCont">
  <!-- Display of criteria -->
  <div class="carFindShowCrit">
    <p class="">Vos critères :</p>
    <?php
    if (isset($id_agency)){
      echo '<span class="iconField"><i class="fas fa-store"></i></span>';
      foreach($tabAgency as $agency){
        if ($id_agency == $agency["id"]){
          ?>
          <span class="carFindShowOneCrit"><?= $agency["name"] ?></span>
    <?php
        }
      }
    }
    ?>
    <?php
    if (isset($id_category)){
      echo '<span class="iconField"><i class="fas fa-truck"></i></span>';
      foreach($tabCategory as $category){
          if ($id_category == $category["id"]){
    ?>
            <span class="carFindShowOneCrit"><?= $category["category"] ?></span>
    <?php
          }
        }
      }
    ?>
    <span class="iconField"><i class="fas fa-calendar-alt"></i></span>
    <span class="carFindShowOneCrit"><?= isset($startDate)? strftime("%d/%m/%Y", strtotime($startDate)) : ''?></span>
    
    <span class="iconField"><i class="fas fa-calendar-alt"></i></span>
    <span class="carFindShowOneCrit"><?= isset($endDate)? strftime("%d/%m/%Y", strtotime($endDate)) : ''?></span>

  </div>
  
  <!-- form for modify criteria -->
  <div class="carFindCriteria">
    <?= form_open("main/searchCar") ?>
      <span class="iconField"><i class="fas fa-store"></i></span>
      <select name="id_agency" id="id_agency">
      <option value="" disabled selected>Sélectionnez une agence</option>
      <?php
          foreach($tabAgency as $agency){
            if ($agency["id"]<> 1){
          ?>
              <option value="<?= $agency['id'] ?>"<?= (isset($id_agency)?($agency["id"] == ($id_agency) ? "selected" : "") : "") ?>><?= $agency["name"] ?></option>
          <?php
            }
          }
          ?>
      </select>
      <span class="iconField"><i class="fas fa-truck"></i></span>
      <select name="id_category" id="id_category">
      <option value="" disabled selected>Sélectionnez une catégorie</option>
      <?php
          foreach($tabCategory as $category){
          ?>
          <option value="<?= $category['id'] ?>"<?= (isset($id_category)?($category["id"] == ($id_category) ? "selected" : "") : "") ?>><?= $category["category"] ?></option>
          <?php
          }
          ?>
      </select>
      <span class="iconField"><i class="fas fa-calendar-alt"></i></span>
      <input type="date" id="startDate" name="startDate" placeholder="date début" value="<?= isset($startDate)?$startDate:''?>" required>
      <span class="iconField"><i class="fas fa-calendar-alt"></i></span>
      <input type="date" id="endDate" name="endDate" placeholder="date fin"value="<?= isset($endDate)?$endDate:''?>" required>
      <input type="submit" name="submit" value="Valider les critères" class="btnSubmit" />
    </form>
  </div>

    <!-- display of searched cars -->
      <div class="row carFindCars g-4">
        <?php
          foreach ($tabCars as $oneCar){
        ?>
            <div class="col d-flex">
              <div class="cardCar card rounded border-dark">
                <div class="card-header">
                  <?= img(array("src" => "assets/img/cars/" . $oneCar["pathImg"], "class" => "carFindImg")); ?>
                  <h5 class="card-title"> <?= $oneCar["model"] . " " . $oneCar["brand"]?></h2>
                </div>
                <div class="card-body"> Voiture</div>
                <div class="card-footer"> <a href="<?= site_url('main/createBooking/') . $oneCar["id"] . "/" . $oneCar["id_agency"] ?> " class="btnCard">Réserver</a></div>
              </div>
            </div>
          <?php
          }
          ?>
      </div>
</div>