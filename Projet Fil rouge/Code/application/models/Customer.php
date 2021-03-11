<?php
class Customer extends CI_Model{
  public function __construct(){

  }

  public function getCustomer($email = FALSE, $password = FALSE){
    $this->db->select("*");
    $this->db->from("customer c");
    // $this->db->join("roleuser r", "id_roleuser = r.id");
    // $this->db->join("agency a", "a.id = u.id_agency");
    if ($email === FALSE || $password === FALSE){
      return $this->db->get()->result_array();
    }
    else
    {
      $this->db->where(array("email" => $email, "password" => $password));
      return $this->db->get()->row_array();
    }
  }
  
  public function getCustomerId($id = FALSE){
    $this->db->select("*");
    $this->db->from("customer c");
    // $this->db->join("roleuser r", "id_roleuser = r.id");
    if ($id === FALSE){
      return $this->db->get()->result_array();
    }
    else
    {
      $this->db->where(array("id" => $id));
      return $this->db->get()->row_array();
    }
  }

  public function getCustomerEmail($email = FALSE){
    $this->db->select("*");
    $this->db->from("customer c");
    // $this->db->join("roleuser r", "id_roleuser = r.id");
    if ($email === FALSE){
      return $this->db->get()->result_array();
    }
    else
    {
      $this->db->where(array("email" => $email));
      return $this->db->get()->row_array();
    }
  }

  public function manageCustomer(){
    $data = array(
      'lastname' => $this->input->post('lastname'),
      'firstname' => $this->input->post('firstname'),
      'password' => $this->input->post('password1'),
      'birthdate' => $this->input->post('birthdate'),
      'phone' => $this->input->post('phone'),
      'email' => $this->input->post('email'),
      'address' => $this->input->post('address'),
      'zipcode' => $this->input->post('zipcode'),
      'depositOk' => 'FALSE',
      'archived' => 'FALSE',
      'id_city' => $this->input->post('city')
    );

    $this->session->custEmail = $this->input->post('email');
    $this->session->custLastname = $this->input->post('lastname');
    $this->session->custFirstname = $this->input->post('firstname');

    if ($this->input->post('id') <> NULL){
      return $this->db->update('customer', $data, array('id' => $this->input->post('id')));
    }
    else
    {
      return $this->db->insert('customer', $data);
    }
  }

  public function deleteCustomer($id){
    if ($this->ctrlDeleteCustomer($id)){
      $this->db->delete("customer", array("id" => $id));
      return true;
    }
      else
    {
      return false;
    }
  }

  // delete is possible if user is not the only one for an agency
  public function ctrlDeleteCustomer($id){
    // $query = "SELECT COUNT(*) total FROM user WHERE id_agency = ( SELECT id_agency FROM user WHERE id = " . $id . ")";
    // $result = $this->db->query($query)->row()->total;

    // if ($result > 1){
      return true;
    // }
    // else
    // {
    //   return false;
    // }
  }
}