<?php
// Recovering of criteria in the session
// if (isset($this->session->criteria)){
  $id_agency = $this->session->id_agency;
  $id_category = $this->session->id_category;
  $startDate = $this->session->startDate;
  $endDate = $this->session->endDate;
  $maxPrice = $this->session->maxPrice;
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

    <?php
      if (isset($startDate)){
    ?>
        <span class="iconField"><i class="fas fa-calendar-alt"></i></span>
        <span class="carFindShowOneCrit"><?= isset($startDate)? strftime("%d/%m/%Y", strtotime($startDate)) : ''?></span>
    <?php
      }
    ?>
    
    <?php
      if (isset($endDate)){
        ?>
        <span class="iconField"><i class="fas fa-calendar-alt"></i></span>
        <span class="carFindShowOneCrit"><?= isset($endDate)? strftime("%d/%m/%Y", strtotime($endDate)) : ''?></span>
    <?php
      }
    ?>

    <?php
      if ($maxPrice <> 0){
    ?>
        <span class="carFindShowOneCrit"><?= isset($maxPrice)? $maxPrice : ''?></span>
        <span class="iconField"><i class="fas fa-euro-sign"></i></span>
    <?php
      }
    ?>

  </div>
  
  <!-- form for modify criteria -->
  <!-- The names of fields MUST BE the same as in the form in main.php -->
  <?= form_open("main/searchCar") ?>
  <div class="carFindCriteria row row-cols-4 align-items-start">
      <div class="col-2">
        <span class="iconField"><i class="fas fa-store"></i></span>
        <select name="id_agency" id="id_agency" required>
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
      </div>
      <div class="col-2">
        <span class="iconField"><i class="fas fa-calendar-alt"></i></span>
        <input type="date" id="startDate" name="startDate" placeholder="date début" value="<?= isset($startDate)?$startDate:''?>" required>
        <p><?php echo form_error('startDate'); ?></p>
      </div>
      
      <div class="col-2">
        <span class="iconField"><i class="fas fa-calendar-alt"></i></span>
        <input type="date" id="endDate" name="endDate" placeholder="date fin"value="<?= isset($endDate)?$endDate:''?>" required>
        <p><?php echo form_error('endDate'); ?></p>
      </div>
      
      <div class="col-2">
        <span class="iconField"><i class="fas fa-euro-sign"></i></span>
        <input type="number" id="price" name="price" placeholder="prix max" value="<?= isset($endDate)?$endDate:''?>">
        <p><?php echo form_error('endDate'); ?></p>
      </div>
      
      <div class="col">
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
      </div>
      <div class="row">
        <div class="col">
          <input type="submit" name="submit" value="Valider les critères" class="btnSubmit" />
      </div>
    </div>
    </form>
  </div>

    <!-- display of searched cars -->
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 carFindCars g-4 flex-wrap d-flex justify-content-center">
        <?php
          foreach ($tabCars as $oneCar){
        ?>
            <div class="col d-flex cardFlip">
              <div class="cardCar card rounded border-dark">
                <div class="cardFront">
                  <div class="card-header">
                    <?= img(array("src" => "assets/img/cars/" . $oneCar["pathImg"], "class" => "carFindImg")); ?>
                    <h5 class="card-title"> <?= $oneCar["model"] . " " . $oneCar["brand"]?></h2>
                  </div>
                  <div class="card-footer text-center">
                    <a href="<?= site_url('main/createBooking/') . $oneCar["id"] . "/" . $oneCar["id_agency"] ?> " class="btnCard">Réserver</a>
                  </div>
                </div>
                <div class="cardBack">
                  <div class="card-body flex-row">
                        <p> Couleur : <?= $oneCar["color"] ?> </p>
                        <p> nb de places : <?= $oneCar["nbPlaces"] ?> </p>
                        <p> nb de portes : <?= $oneCar["nbDoors"] ?> </p>
                        <p> vol coffre : <?= $oneCar["carBoot"] ?> </p>
                        <p> boîte : <?= $oneCar["gearBox"] ?> </p>
                        <p> prix : <?= $oneCar["price"] ?> </p>
                        <p> nbKm : <?= $oneCar["nbKm"] ?> </p>
                        <p> idParkcar : <?= $oneCar["id"] ?> </p>
                  </div>
                  <div class="card-footer text-center">
                    <a href="<?= site_url('main/createBooking/') . $oneCar["id"] . "/" . $oneCar["id_agency"] ?> " class="btnCard">Réserver</a>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
      </div>
      <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-circle-up"></i></button>
</div>

<script>
// ---------------------------
  // Button top on scroll
  // ---------------------------
  //Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
