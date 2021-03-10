<?php
  class Parkcar extends CI_Model{
    public function getParkcarId($id = FALSE, $id_agency){

      // select p.id, p.nbKm, p.archived, co.color, m.model, b.brand from parkcar p
      // join car c on p.id_car = c.id
      // join modelcar m on m.id = c.id_modelCar
      // join brandcar b on b.id = c.id_brandCar
      // join color co on co.id = p.id_color
      // where p.id_agency = 2;
      $query = "p.id, p.nbKm, p.archived, co.color, m.model, b.brand from parkcar p " .
      "join car c on p.id_car = c.id ".
      "join modelcar m on m.id = c.id_modelCar ".
      "join brandcar b on b.id = c.id_brandCar ".
      "join color co on co.id = p.id_color ".
      "where p.id_agency = " . $id_agency;
      $result = $this->db->query($query)->result_array();
      // $this->db->select("p.id, p.nbKm, p.archived, co.color, m.model, b.brand");
      // $this->db->from("parkcar p");
      // $this->db->join("car c", "c.id = p.id_car");
      // $this->db->join("modelcar m", "m.id = c.id_modelCar");
      // $this->db->join("brandcar b", "b.id = c.id_brandCar");
      // $this->db->join("color co", "co.id = p.id_color");
      // $this->db->where(array("p.id_agency" => $id_agency));
      // if ($id === FALSE){
      //   return $this->db->get()->result_array();
      // }
      // else
      // {
      //   $this->db->where(array("p.id" => $id));
      //   return $this->db->get()->row_array();
      // }
    }
  }