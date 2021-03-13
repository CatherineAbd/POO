<header class="mainHeader">
  <div class="mainHeaderLogo">
    <?= img(array("src" => "assets/img/logo2.png", "class" => "mainHeaderLogoImg")); ?>
    <span class="mainHeaderTitle">LOCAAUTO</span>
  </div>
    <?php
      if (isset($this->session->custEmail)){
    ?>
        <p class="mainHeaderInfosCust">
          Bonjour <?= $this->session->custLastname . " " . $this->session->custFirstname ?>
        </p>
        <div class="mainHeaderBtnCreateProfil">
          <a href="<?= site_url('main/custManageProfil') ?> " title="Gestion profil"><i class="fas fa-2x fa-user-edit headerBtnCnx"></i></a>
        </div>
        <div class="mainHeaderBtnCnx">
          <a href="<?= site_url('main/unCnx') ?>" title="Déconnexion"><i class="fas fa-2x fa-user-times headerBtnUnCnx"></i></a>
        </div>
      <?php
      }
      else
      {
      ?>
        <div class="mainHeaderBtnCreateProfil">
          <a href="<?= site_url('main/custManageProfil') ?> " title="Gestion profil"><i class="fas fa-2x fa-user-edit headerBtnCnx"></i></a>
        </div>
        </div>
        <div class="mainHeaderBtnCnx">
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
        <div class="inputRow">
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
        <div class="inputRow">
          <span class="iconField"><i class="fas fa-calendar-alt"></i></span>
          <input type="date" id="startDate" name="startDate" placeholder="date début" required>
          <span class="iconField"><i class="fas fa-calendar-alt"></i></span>
          <input type="date" id="endDate" name="endDate" placeholder="date fin" required>
        </div>
        <div class="inputRow">
          <span class="iconField"><i class="fas fa-ruler-combined"></i></span>
          <input type="number" id="carboot" name="carboot" placeholder="vol du coffre">
          <span class="iconField"><i class="fas fa-users"></i></span>
          <input type="number" id="nbplaces" name="nbplaces" placeholder="nb de places">
        </div>

        <div class="inputRow">
          <input type="submit" name="submit" value="Rechercher" class="btnSubmit" />
        </div>

      </div>

      </form>
  </div>
</div>
