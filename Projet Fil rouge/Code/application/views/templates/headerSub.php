<header class="mainHeader">
  <div class="mainHeaderLogo">
    <?= img(array("src" => "assets/img/logo2.png", "class" => "mainHeaderLogoImg")); ?>
    <span class="mainHeaderTitle">LOCAAUTO</span>
  </div>
  <div class="mainHeaderTitle">
    <p><?= $title ?></p>
  </div>

  <div class="mainHeaderBtnUnCnx">
    <?php
      if (isset($this->session->userLastname)){
      echo "<a href='" . site_url('main/unCnx') . "'>Déconnexion</a>";
      }
    ?>
  </div>
  <div class="mainHeaderHome">
    <a href="<?= site_url('main/index') ?>" class="">
      <i class="fas fa-2x fa-home"></i>
    </a>
  </div>
</header>
