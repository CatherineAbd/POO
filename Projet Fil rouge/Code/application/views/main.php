<header class="mainHeader">
  <div class="mainHeaderLogo">
    <?= img(array("src" => "assets/img/logo.png", "class" => "mainHeaderLogoImg")); ?>
    <span class="mainHeaderTitle">LOCAAUTO</span>
  </div>
    <?php
      if (isset($this->session->userLastname)){
    ?>
        <div class="mainHeaderBtnCnx">
          <a href="<?= site_url('main/unCnx') ?>" title="Déconnexion"><i class="fas fa-2x fa-user-times headerBtnUnCnx"></i></a>
        </div>
      <?php
      }
      else
      {
      ?>
        <div class="mainHeaderBtnCreateProfil">
          <a href="<?= site_url('main/unCnx') ?> " title="Connexion"><i class="fas fa-2x fa-user-edit headerBtnCnx"></i></a>
        </div>
        </div>
        <div class="mainHeaderBtnCnx">
          <a href="<?= site_url('main/unCnx') ?> " title="Connexion"><i class="fas fa-2x fa-user-check headerBtnCnx"></i></a>
        </div>
      <?php
      }
      ?>
  </div>

</header>

<div class="container-fluid mainCont">
  <div class="mainSearch">
  </div>
  <div class="mainCnx">
  </div>
</div>
