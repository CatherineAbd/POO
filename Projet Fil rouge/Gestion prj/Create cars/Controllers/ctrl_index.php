<?php
  require_once "myConfig.php";
  require_once "./Models/Database.php";
  require_once "./Models/Car.php";

  require_once "./tableaucars.php";

  $carObj = new Car;
  foreach ($tabCars as $oneCar){
    $carObj->insertCar($oneCar);
  }

?>