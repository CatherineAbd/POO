<?php
  require_once "myConfig.php";
  require_once "./models/Database.php";
  require_once "./models/Clients.php";
  require_once "./models/Shows.php";

  $clientsObj = new Clients;
  $clientsArray = $clientsObj->getAllClients();

  $showsObj = new Shows;
  $showsArray = $showsObj->getAllShows();

  $twentyFirstClientsArray = $clientsObj->getTwentyFirstClients();

  $clientsWithLoyaltyCardArray = $clientsObj->getClientWithLoyaltyCard();

  $clientsStartMArray = $clientsObj->getClientStartM();

  $clientsWithOrNoLoyaltyCardArray = $clientsObj->getClientWithOrNoLoyaltyCard();

  function clientStartArray($clientObj, $letter){
    return $clientObj->getClientStart($letter);
  }
?>