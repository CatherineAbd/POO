<?php
  class Parkcar extends CI_Model{
    
    public function getParkcarId($id = FALSE, $id_agency){

      // $query = "SELECT p.id, p.id_car, p.nbKm, p.archived, p.id_color, co.color, m.model, b.brand FROM parkcar p " .
      // "JOIN car c ON c.id = p.id_car ".
      // "JOIN modelcar m ON m.id = c.id_modelCar ".
      // "JOIN brandcar b ON b.id = c.id_brandCar ".
      // "JOIN color co ON co.id = p.id_color " .
      //  "WHERE p.id_agency = " . $id_agency;
      // if ($id === FALSE){
      //   return $this->db->query($query)->result_array();
      // }
      // else
      // {
      //   $query = $query . " AND p.id = " . $id;
      //   return $this->db->query($query)->row_array();
      // }
      $this->db->select("p.id, p.id_car, p.nbKm, p.archived, p.id_color, co.color, m.model, b.brand");
      $this->db->from("parkcar p");
      $this->db->join("car c", "c.id = p.id_car");
      $this->db->join("modelcar m", "m.id = c.id_modelCar");
      $this->db->join("brandcar b", "b.id = c.id_brandCar");
      $this->db->join("color co", "co.id = p.id_color");
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
  
  }