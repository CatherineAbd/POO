<header class="row mainHeader">
  <?php
  if (isset($this->session->custEmail)){ 
  ?>
    <div class="col-5 mainHeaderLogo">
  <?php
  }
  else
  {
  ?>
    <div class="col-10 mainHeaderLogo">
  <?php    
  }
  ?>
    <?= img(array("src" => "assets/img/logo2.png", "class" => "mainHeaderLogoImg")); ?>
    <span class="mainHeaderTitle">LOCAAUTO</span>
  </div>
    <?php
      if (isset($this->session->custEmail)){
    ?>
        <p class="col-5 mainHeaderInfosCust">
          Bonjour <?= $this->session->custLastname . " " . $this->session->custFirstname ?>
        </p>
        <div class="col-1 mainHeaderBtnCreateProfil">
          <a href="<?= site_url('main/custManageProfil') ?> " title="Gestion profil"><i class="fas fa-2x fa-user-edit headerBtnCnx"></i></a>
        </div>
        <div class="col-1 mainHeaderBtnCnx">
          <a href="<?= site_url('main/unCnx') ?>" title="Déconnexion"><i class="fas fa-2x fa-user-times headerBtnUnCnx"></i></a>
        </div>
      <?php
      }
      elseif (!isset($this->session->userLastname)) {
      ?>
        <div class="col-1 mainHeaderBtnCreateProfil">
          <a href="<?= site_url('main/custManageProfil') ?> " title="Gestion profil"><i class="fas fa-2x fa-user-edit headerBtnCnx"></i></a>
        </div>
        </div>
        <div class="col-1 mainHeaderBtnCnx">
          <!-- <a href="#" title="Connexion" data-toggle="modal" data-target="#HeaderCnxModal"><i class="fas fa-2x fa-user-check headerBtnCnx"></i></a> -->
          <a href="<?= site_url('main/cnxCust') ?> " title="Connexion"><i class="fas fa-2x fa-user-check headerBtnCnx"></i></a>
        </div>
      <?php
      }
      ?>
  </div>
</header>

<div class="container-fluid mainCont">
  <div class="mainSearch">
      <?= form_open("main/searchCar") ?>
      <div class="formSearch">
        <div class="row inputRow mb-3">
          <div class="col-4">
          <span class="iconField"><i class="fas fa-store"></i></span>
          <select name="id_agency" id="id_agency">
          <?php
              foreach($tabAgency as $agency){
                if ($agency["id"]<> 1){
              ?>
                  <option value="<?= $agency['id'] ?>"><?= $agency["name"] ?></option>
              <?php
                }
              }
              ?>
          </select>
          </div>
          <div class="col-8">
            <span class="iconField"><i class="fas fa-truck"></i></span>
            <select name="id_category" id="id_category">
              <option value="" disabled selected>Sélectionnez une catégorie</option>
              <?php
              foreach($tabCategory as $category){
                ?>
                <option value="<?= $category['id'] ?>"><?= $category["category"] ?></option>
                <?php
              }
              ?>
          </select>
        </div>
      </div>
      <div class="row inputRow mb-3">
        <div class="col-6">
          <span class="iconField"><i class="fas fa-calendar-alt"></i></span>
          <input type="date" id="startDate" name="startDate" placeholder="date début" required>
        </div>
        <div class="col-6">
          <span class="iconField"><i class="fas fa-calendar-alt"></i></span>
          <input type="date" id="endDate" name="endDate" placeholder="date fin" required>
        </div>
      </div>
      <div class="row inputRow mb-3">
        <div class="col-6">
          <span class="iconField"><i class="fas fa-ruler-combined"></i></span>
          <input type="number" id="carboot" name="carboot" placeholder="vol du coffre">
        </div>
        <div class="col-6">
          <span class="iconField"><i class="fas fa-users"></i></span>
          <input type="number" id="nbplaces" name="nbplaces" placeholder="nb de places">
        </div>
      </div>
      
      <div class="row inputRow mb-3">
        <div class="col text-center">
          <input type="submit" name="submit" value="Rechercher" class="btnSubmit" />
        </div>
      </div>

      </div>

      </form>
  </div>
</div>
