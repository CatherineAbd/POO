<header class="mainHeader">
  <div class="mainHeaderLogo">
    <?= img(array("src" => "assets/img/logo.png", "class" => "mainHeaderLogoImg")); ?>
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
          <a href="#" title="Connexion" data-toggle="modal" data-target="#HeaderCnxModal"><i class="fas fa-2x fa-user-check headerBtnCnx"></i></a>
          <!-- <a href="<?= site_url('main/cnxCust') ?> " title="Connexion" data-toggle="modal" data-target="#HeaderCnxModal"><i class="fas fa-2x fa-user-check headerBtnCnx"></i></a> -->
        </div>
      <?php
      }
      ?>
  </div>

</header>

<div class="container-fluid mainCont">
  <div class="mainSearch">
      <?= form_open("main/searchCar") ?>
      <div class="formAgency">
        <span class="iconField"><i class="fas fa-store"></i></span>
        <select name="id_agency" id="id_agency">
        <?php
            foreach($tabAgency as $agency){
            ?>
              <option value="<?= $agency['id'] ?>"><?= $agency["name"] ?></option>
            <?php
            }
            ?>
        </select>
        <span class="iconField"><i class="fas fa-store"></i></span>
        <select name="id_category" id="id_category">
        <?php
            foreach($tabCategory as $category){
            ?>
              <option value="<?= $category['id'] ?>"><?= $category["category"] ?></option>
            <?php
            }
            ?>
        </select>
      </div>

      </form>
  </div>
</div>
