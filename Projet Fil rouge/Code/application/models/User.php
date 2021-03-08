<?php
class User extends CI_Model{
  public function __construct(){

  }

  public function getUser($lastname = FALSE, $password = FALSE){
    $this->db->select("u.id, u.lastname, u.firstname, u.password, u.id_roleUser, u.id_agency, r.role");
    $this->db->from("user u");
    $this->db->join("roleuser r", "id_roleuser = r.id");
    if ($lastname === FALSE || $password === FALSE){
      return $this->db->get()->result_array();
    }
    else
    {
      $this->db->where(array("lastname" => $lastname, "password" => $password));
      return $this->db->get()->row_array();
    }
  }
  
  public function getUserId($id = NULL){
    $this->db->select("u.id, u.lastname, u.firstname, u.password, u.id_roleUser, u.id_agency, r.role");
    $this->db->from("user u");
    $this->db->join("roleuser r", "id_roleuser = r.id");
    if ($id === FALSE){
      return $this->db->get()->result_array();
    }
    else
    {
      $this->db->where(array("u.id" => $id));
      return $this->db->get()->row_array();
    }
    
  }

  public function manageUser(){
    $data = array(
      'lastname' => $this->input->post('lastname'),
      'firstname' => $this->input->post('firstname'),
      'password' => $this->input->post('password1'),
      'id_agency' => $this->input->post('agency'),
      'id_roleuser' => $this->input->post('roleuser')
    );

    if ($this->input->post('id') <> NULL){
      return $this->db->update('user', $data, array('id' => $this->input->post('id')));
    }
    else
    {
      return $this->db->insert('user', $data);
    }
  }
}