<?php
class User extends CI_Model{
  public function __construct(){

  }

  public function getUser($lastname = FALSE, $password = FALSE){
    $this->db->select("*");
    $this->db->from("user");
    $this->db->join("roleuser", "id_roleuser = roleuser.id");
    if ($lastname === FALSE || $password === FALSE){
      return $this->db->get()->result_array();
    }
    else
    {
      $this->db->where(array("lastname" => $lastname, "password" => $password));
      return $this->db->get()->row_array();
    }
  }
}