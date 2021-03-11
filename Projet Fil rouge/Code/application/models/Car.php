<?php
  class Car extends CI_Model{
    
    public function getCar(){
      $this->db->select("c.id, c.carBoot, c.nbPlaces, c.gearBox, c.nbDoors, c.price, c.pathImg, m.model, b.brand, c.id_categoryCar, c.archived");
      $this->db->from("car c");
      $this->db->join("modelcar m", "m.id = c.id_modelcar");
      $this->db->join("brandcar b", "b.id = c.id_brandcar");
      return $this->db->get()->result_array();
    }
  }

?>
