<?php
  class Parkcar extends CI_Model{
    
    public function getParkcarId($id = FALSE, $id_agency){

      $this->db->select("p.id, p.id_car, p.nbKm, p.archived, p.id_color, p.id_agency, co.color, m.model, b.brand, c.nbDoors, c.carBoot, c.gearBox, c.nbPlaces, c.price, co.color, m.model, b.brand, ca.category, a.name");
      $this->db->from("parkcar p");
      $this->db->join("car c", "c.id = p.id_car");
      $this->db->join("modelcar m", "m.id = c.id_modelCar");
      $this->db->join("brandcar b", "b.id = c.id_brandCar");
      $this->db->join("categorycar ca", "ca.id = c.id_categoryCar");
      $this->db->join("color co", "co.id = p.id_color");
      $this->db->join("agency a", "a.id = p.id_agency");
      $this->db->where(array("p.id_agency" => $id_agency));
      if ($id === FALSE){
        return $this->db->get()->result_array();
      }
      else
      {
        $this->db->where(array("p.id" => $id));
        return $this->db->get()->row_array();
      }
    }

    public function manageParkcar(){
      $data = array(
        'id_car' => $this->input->post('car'),
        'id_color' => $this->input->post('color'),
        'id_agency' => $this->input->post('id_agency'),
        'nbKm' => $this->input->post('nbkm'),
        'archived' => 'false'
      );
  
      if ($this->input->post('id') <> NULL){
        return $this->db->update('parkcar', $data, array('id' => $this->input->post('id')));
      }
      else
      {
        return $this->db->insert('parkcar', $data);
      }
    }
  
    public function deleteParkcar($id){
      if ($this->ctrlDeleteParkcar($id)){
        $this->db->delete("parkcar", array("id" => $id));
        return true;
      }
        else
      {
        return false;
      }
    }
  
    // delete is possible if user is not the only one for an agency
    public function ctrlDeleteParkcar($id){
      // $query = "SELECT COUNT(*) total FROM user WHERE id_agency = ( SELECT id_agency FROM user WHERE id = " . $id . ")";
      // $result = $this->db->query($query)->row()->total;
  
      // if ($result > 1){
      //   return true;
      // }
      // else
      // {
      //   return false;
      // }
      return true;
    }

    public function getParkcarCriteria(){
      $id_agency = $this->session->id_agency;
      $id_category = $this->session->id_category;
      $nbPlaces = $this->session->nbPlaces;
      $endDate = $this->session->endDate;
      $startDate = $this->session->startDate;

      // var_dump($this->session);

      // $this->db->select("p.id, p.id_car, p.nbKm, p.archived, p.id_color, p.id_agency, c.pathImg, co.color, m.model, b.brand");
      // $this->db->from("parkcar p");
      // $this->db->join("car c", "c.id = p.id_car");
      // $this->db->join("modelcar m", "m.id = c.id_modelCar");
      // $this->db->join("brandcar b", "b.id = c.id_brandCar");
      // $this->db->join("color co", "co.id = p.id_color");
      // $this->db->where("p.id_agency", $id_agency);
      // if (!empty($this->input->post("id_category"))){
      //   $this->db->where(array("c.id_categoryCar" => $id_category));
      // }
      // if (!empty($this->input->post("nbplaces"))){
      //   $this->db->where(array("c.nbPlaces" => $nbPlaces));
      // }
      // $this->db->where_not_in("p.id", "(select id_parkcar from booking where id_stateBooking <> 3 and (date(startDate) < " . $endDate . "and date(startEnd) > ". $startDate . "))");
      // return $this->db->get()->result_array();

      $query = "select p.id, p.id_car, p.nbKm, p.archived, p.id_color, p.id_agency, c.pathImg, co.color, m.model, b.brand, c.nbPlaces, c.nbDoors, c.price, c.carBoot, c.gearBox 
      from parkcar p
      join car c on c.id = p.id_car
      join modelcar m on m.id = c.id_modelCar
      join brandcar b on b.id = c.id_brandCar
      join color co on co.id = p.id_color
      where
      p.id_agency = ". $id_agency . " and 
      p.id not in
      (select id_parkcar from booking 
      where id_stateBooking <> 3 and
      (date(startDate) < '". $endDate . "' and date(startEnd) > '" . $startDate . "'))";
      if (!empty($id_category)){
        $query = $query . " and c.id_categoryCar = ". $id_category;
      }
      if (!empty($nbPlaces)){
        $query = $query . " and c.id_nbPlaces = ". $nbPlaces;
      }
      return $this->db->query($query)->result_array($query);
 }
  
}