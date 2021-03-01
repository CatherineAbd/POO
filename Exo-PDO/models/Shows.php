<?php

class Shows extends Database{

  public function getAllShows(){
    $query = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') newDate, TIME_FORMAT(startTime, '%H:%i') newTime FROM shows";
    $getAllShowsQuery = $this->db->query($query);

    return $getAllShowsQuery->fetchAll();
  }
}