<?php
class Booking extends CI_Model{
  
  public function getBooking($id = FALSE){
    // $this->db->select("a.id, a.name, a.phone, a.email, a.address, a.zipcode, a.id_city, c.nameCity, a.archived");
    // $this->db->from("agency a");
    // $this->db->join("city c", "a.id_city = c.id");
    // return $this->db->get()->result_array();
      if ($id === FALSE){
        $query = $this->db->get('booking');
        return $query->result_array();
      }
      else
      {
        $query = $this->db->get_where('booking', array('id' => $id));
        return $query->row_array();
      }
    }
}