<div class="admCont">
  <?php
    switch ($table) {
      case "user" : $meth = "manageOneUser";
        break;
      case "roleUser" : $meth = "manageOneRoleUser";
        break;
      case "city" : $meth = "manageOneCity";
        break;
      case "agency" : $meth = "manageOneAgency";
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

    if ($table == "user"){
      $this->load->view("templates/manageUser.php", $data);
    }
  ?>

  <?php
  if ($table == "roleUser"){
    $this->load->view("templates/manageRoleUser.php", $data);
  }
  ?>

  <?php
  if ($table == "city"){
    $this->load->view("templates/manageCity.php", $data);
  }
  ?>

  <?php
  if ($table == "agency"){
    $this->load->view("templates/manageAgency.php", $data);
  }
  ?>

  <div class="">
    <a href="<?= site_url('main/adm') ?>" class="superAdmManageBtnMain">Retour</a>
  </div>

</div>

