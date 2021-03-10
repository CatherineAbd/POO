<div class="admCont"
  <h2>Bonjour <?= $user['lastname']?> </h2>

  <!-- list display -->
  <div class="superSelectTablesDiv">
    <p>Table à gérer</p>
    <select name="selectTables" id="selectTables" class="superSelectTables" onclick="employAdmSelectTable()">
      <option value="" disabled selected>Sélectionnez une table</option>
      <option value="parkcar" id="selectparkcar">parkcar</option>
      <option value="booking" id="selectbooking">booking</option>
    </select>
  </div>
  <p id="superAdmError"><?= $msgError??"" ?></p>
  <?php
    $this->load->view("templates/mainParkCar.php");
    $this->load->view("templates/mainBooking.php");
  ?>