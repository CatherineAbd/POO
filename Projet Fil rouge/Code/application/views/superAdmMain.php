<div class="admCont"
  <h2>Bonjour <?= $user['lastname']?> </h2>

  <!-- list display -->
  <div class="superSelectTablesDiv">
    <p>Table à gérer</p>
    <select name="selectTables" id="selectTables" class="superSelectTables" onclick="superAdmSelectTable()">
      <option value="" disabled selected>Sélectionnez une table</option>
      <option value="user" id="selectuser">user</option>
      <option value="roleuser" id="selectroleuser">roleUser</option>
    </select>
  </div>
  <p id="superAdmError"><?= $msgError??"" ?></p>
  <?php
    $this->load->view("templates/mainUser.php");
    $this->load->view("templates/mainRoleUser.php");
  ?>

  <!-- <a href="" class="superBtn" onclick="superAddFormUser()"><i class="far fa-plus-square"></a> -->
  <!-- <i class="far fa-plus-square"> -->
</div>
