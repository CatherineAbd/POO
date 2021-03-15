<!-- variables passées par $data : $title -->

<header class="row mainHeader sticky-top">
  <div class="col-5 mainHeaderLogo">
    <?= img(array("src" => "assets/img/logo2.png", "class" => "mainHeaderLogoImg")); ?>
    <span class="mainHeaderBrand">LOCAAUTO</span>
  </div>
  <div class="col-5 mainHeaderTitle">
    <p><?= $title ?></p>
  </div>

  <div class="col-1 mainHeaderBtnUnCnx">
    <?php
    if (isset($this->session->custEmail)){
    ?>
        <a href="<?= site_url('main/unCnx') ?>" title="Déconnexion"><i class="fas fa-2x fa-user-times headerBtnUnCnx"></i></a>
    <?php
    }
    ?>
  </div>
  <div class="col-1 mainHeaderHome">
    <a href="<?= site_url('main/index') ?>" class="">
      <i class="fas fa-2x fa-home"></i>
    </a>
  </div>
</header>
