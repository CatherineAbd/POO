<div class="admCont">
  <?php
    echo validation_errors();
    switch ($table) {
      case "user" : $meth = "manageOneUser";
        break;
      case "roleUser" : $meth = "manageOneRoleUser";
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

</div>

