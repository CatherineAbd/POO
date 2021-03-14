<!-- $data :
tabAgency, tabRoleUser, tabCity, tabCustomer, tabUser -->

<div class="admCont"
  <h2>Bonjour <?= $user['lastname']?> </h2>

  <!-- list display -->
  <div class="superSelectTablesDiv">
    <p>Table à gérer</p>
    <select name="selectTables" id="selectTables" class="superSelectTables" onclick="superAdmSelectTable()">
      <option value="" disabled selected>Sélectionnez une table</option>
      <option value="user" id="selectuser">user</option>
      <option value="roleuser" id="selectroleuser">roleUser</option>
      <option value="city" id="selectcity">city</option>
      <option value="agency" id="selectagency">agency</option>
      <option value="customer" id="selectcustomer">customer</option>
    </select>
  </div>
  <p id="superAdmError"><?= $msgError??"" ?></p>
  <?php
    $this->load->view("templates/mainUser.php");
    $this->load->view("templates/mainRoleUser.php");
    $this->load->view("templates/mainCity.php");
    $this->load->view("templates/mainAgency.php");
    $this->load->view("templates/mainCustomer.php");
  ?>