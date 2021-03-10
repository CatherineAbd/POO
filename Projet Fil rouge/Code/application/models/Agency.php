<?php

class Agency extends CI_Model{
  public function __construct(){

  }

  public function getAgency(){
    $this->db->select("a.id, a.name, a.phone, a.email, a.address, a.zipcode, a.id_city, c.nameCity, a.archived");
    $this->db->from("agency a");
    $this->db->join("city c", "a.id_city = c.id");
    return $this->db->get()->result_array();
  }

  public function getAgencyId($id = FALSE){
    $this->db->select("a.id, a.name, a.phone, a.email, a.address, a.zipcode, a.id_city, c.nameCity, a.archived");
    $this->db->from("agency a");
    $this->db->join("city c", "a.id_city = c.id");

    if ($id === FALSE){
      return $this->db->get()->result_array();
    }
    else
    {
      $this->db->where(array("a.id" => $id));
      return $this->db->get()->row_array();
    }
  }

  public function manageAgency(){
    $data = array(
      'name' => $this->input->post('name'),
      'phone' => $this->input->post('phone'),
      'email' => $this->input->post('email'),
      'address' => $this->input->post('address'),
      'zipcode' => $this->input->post('zipcode'),
      'id_city' => $this->input->post('city'),
      'archived' => "FALSE"
    );

    if ($this->input->post('id') <> NULL){
      return $this->db->update('agency', $data, array('id' => $this->input->post('id')));
    }
    else
    {
      return $this->db->insert('agency', $data);
    }
  }

  public function deleteAgency($id){
    if ($this->ctrlDeleteAgency($id)){
      $this->db->delete("agency", array("id" => $id));
      return true;
    }
      else
    {
      return false;
    }
  }

  // delete is possible if no cars in park's agency
  public function ctrlDeleteAgency($id){
    $this->db->select("a.id");
    $this->db->from("agency a");
    $this->db->join("parkcar p", "p.id_agency = a.id");
    $this->db->where(array("a.id" => $id));
    if ($this->db->get()->row_array()){
      return false;
    }
    else
    {
      return true;
    }
  }
}