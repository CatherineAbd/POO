<header class="row mainHeader sticky-top">
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
    <span class="mainHeaderBrand">LOCAAUTO</span>
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
        <div class="col-1 mainHeaderBtnCnx">
          <!-- <a href="#" title="Connexion" data-toggle="modal" data-target="#HeaderCnxModal"><i class="fas fa-2x fa-user-check headerBtnCnx"></i></a> -->
          <a href="<?= site_url('main/cnxCust') ?> " title="Connexion"><i class="fas fa-2x fa-user-check headerBtnCnx"></i></a>
        </div>
      <?php
      }
      ?>
</header>
<div class="container-fluid mainCont">

<div class="row justify-content-end align-items-start mt-5">
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
          <span class="iconField"><i class="fas fa-euro-sign"></i></span>
          <input type="number" id="price" name="price" placeholder="Prix max">
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
  <div class="row">
      <div id="mainCarousel" class="carousel slide col-4 align-self-end mb-5" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
          <?= img(array("src" => "assets/img/cars/DAIHATSU TERIOS.jpg", "class" => "mainCarouselImg d-block w-100")); ?>
          </div>
          <div class="carousel-item">
          <?= img(array("src" => "assets/img/cars/HYUNDAI I20.jpg", "class" => "mainCarouselImg d-block w-100")); ?>
          </div>
          <div class="carousel-item">
          <?= img(array("src" => "assets/img/cars/CITROEN JUMPY.jpg", "class" => "mainCarouselImg d-block w-100")); ?>
          </div>
        </div>
        <!-- <a class="carousel-control-prev" role="button" href="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon SectionBannerIcon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </a>
        <a class="carousel-control-next" role="button" href="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon SectionBannerIcon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </a> -->
    </div>
    </div>
</div>
</div>
