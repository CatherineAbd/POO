<?php

class Clients extends Database{

  public function getAllClients(){
    $query = "SELECT *, DATE_FORMAT(birthDate, '%d/%m/%Y') as newBirthDate FROM clients";
    $getAllClientsQuery = $this->db->query($query);
    // ou
    // $getAllClientsQuery = Parent::$db->query($query);
    // ou
    // $getAllClientsQuery = Database::$db->query($query);
    return $getAllClientsQuery->fetchAll();
  }

  public function getTwentyFirstClients(){
    $query = "SELECT *, DATE_FORMAT(birthDate, '%d/%m/%Y') as newBirthDate FROM clients LIMIT 20";
    return $this->db->query($query)->fetchAll();
  }

  public function getClientWithLoyaltyCard(){
    $query = "SELECT clt.firstName firstname, clt.lastName lastname, clt.cardNumber cardNumber FROM clients clt 
    JOIN cards c ON (clt.cardNumber = c.cardNumber)
    JOIN cardtypes ct ON (ct.id = c.cardTypesId)
    WHERE ct.type = 'Fidélité'";
    return $this->db->query($query)->fetchAll();
  }

  public function getClientStartM(){
    $query = "SELECT *, DATE_FORMAT(birthDate, '%d/%m/%Y') newBirthDate FROM clients
    WHERE lastName like 'M%'
    ORDER BY lastName, firstName";
    return $this->db->query($query)->fetchAll();
  }

  public function getClientStart(string $letter){
    $query = "SELECT *, DATE_FORMAT(birthDate, '%d/%m/%Y') newBirthDate FROM clients
    WHERE lastName like '?%'
    ORDER BY lastName, firstName";
    $result = $this->db->prepare($query);
    $result->execute(array($letter));
    return $result->fetchAll();
    // return $this->db->query($query)->fetchAll();
  }

  public function getClientWithOrNoLoyaltyCard(){
    $query = "SELECT *, DATE_FORMAT(birthDate, '%d/%m/%Y') newBirthDate, IF((SELECT cardNumber FROM cards c
    INNER JOIN cardtypes ct ON (c.cardTypesId = ct.id)
    WHERE `type` = 'Fidélité' AND c.cardNumber = clt.cardNumber ), 'Oui', 'Non') `Carte fidélité` FROM clients clt";

    return $this->db->query($query)->fetchAll();
  }
}

?>