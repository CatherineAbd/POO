<div class="admCont">
  <?php
    switch ($table) {
      case "user" : $meth = "manageOneUser";
        break;
    }
    if (isset($oneRow["id"]) || !empty(set_value("id)"))) {
      // $labelBtn = "<i class='fas fa-pencil-alt'></i>";
      $data["labelBtn"] = "Modification";
      $pathSubmit = "main/" . $meth . "/" . $oneRow["id"]??set_value("id");
    }
    else
    {
      $data["labelBtn"]  = "Création";
      $pathSubmit = "main/" . $meth;
    }
    echo form_open($pathSubmit);

    if ($table == "parkcar"){
      $this->load->view("templates/manageParkCar.php", $data);
    }
  ?>

  <!-- <?php
  if ($table == "roleUser"){
    $this->load->view("templates/manageRoleUser.php", $data);
  }
  ?> -->


  <div class="">
    <a href="<?= site_url('main/adm') ?>" class="superAdmManageBtnMain">Retour</a>
  </div>

</div>

f