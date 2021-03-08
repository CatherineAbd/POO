<header class="mainHeader">
  <div class="mainHeaderLogo">
    <?= img(array("src" => "assets/img/logo.png", "class" => "mainHeaderLogoImg")); ?>
  </div>
  <div class="mainHeaderBtnUnCnx">
    <?php
      if (isset($this->session->userLastname)){
      echo "<a href='" . site_url('main/unCnx') . "'>Déconnexion</a>";
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
