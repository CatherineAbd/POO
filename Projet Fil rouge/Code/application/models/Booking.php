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

    public function getBookingCust($EmailCust = FALSE){
      $this->db->select("b.id, b.id_parkcar, b.id_customer, b.startDate, b.startEnd, b.price, b.typeBooking, b.nbKm, b.archived, a.name nameAg, b.id_stateBooking, s.state, b.id_agRecovering, a2.name nameAgRecov, c.lastname, c.email, co.color, m.model, br.brand");
      $this->db->from("booking b");
      $this->db->join("parkcar p", "p.id = b.id_parkcar");
      $this->db->join("color co", "co.id = p.id_color");
      $this->db->join("car ca", "ca.id = p.id_car");
      $this->db->join("modelcar m", "m.id = ca.id_modelCar");
      $this->db->join("brandcar br", "br.id = ca.id_brandCar");
      $this->db->join("agency a", "a.id = p.id_agency");
      $this->db->join("agency a2", "a2.id = b.id_agRecovering");
      $this->db->join("customer c", "c.id = b.id_customer");
      $this->db->join("statebooking s", "s.id = b.id_stateBooking");
      $this->db->where(array("c.email" => $EmailCust));
      return $this->db->get()->result_array();
    }
  
  
    public function getBookingId($id = FALSE, $id_agency){

      $this->db->select("b.id, b.id_parkcar, b.id_customer, b.startDate, b.startEnd, b.price, b.typeBooking, b.nbKm, b.archived, a.name nameAg, b.id_stateBooking, s.state, b.id_agRecovering, a2.name nameAgRecov, c.lastname, c.email, co.color, m.model, br.brand");
      $this->db->from("booking b");
      $this->db->join("parkcar p", "p.id = b.id_parkcar");
      $this->db->join("color co", "co.id = p.id_color");
      $this->db->join("car ca", "ca.id = p.id_car");
      $this->db->join("modelcar m", "m.id = ca.id_modelCar");
      $this->db->join("brandcar br", "br.id = ca.id_brandCar");
      $this->db->join("agency a", "a.id = p.id_agency");
      $this->db->join("agency a2", "a2.id = b.id_agRecovering");
      $this->db->join("customer c", "c.id = b.id_customer");
      $this->db->join("statebooking s", "s.id = b.id_stateBooking");
      $this->db->where(array("p.id_agency" => $id_agency));
      if ($id === FALSE){
        return $this->db->get()->result_array();
      }
      else
      {
        $this->db->where(array("b.id" => $id));
        return $this->db->get()->row_array();
      }
    }

  public function manageBooking(){

    $nbKm = 0;
    $id_stateBooking = 0;

    if (!empty($this->input->post('id_stateBooking'))){
      $id_stateBooking = $this->input->post('id_stateBooking');
     }
     else
     {
       $id_stateBooking = 1;
     }

    //  nbKm is recovered only if the car is returned
     if ($id_stateBooking== 3) {
       $nbKm = $this->input->post('nbKm');
     }

    $data = array(
      'startDate' => $this->input->post('startDate'),
      'startEnd' => $this->input->post('startEnd'),
      'price' => $this->input->post('price'),
      'typeBooking' => 'Forfait jour',
      'id_agRecovering' => $this->input->post('agRecovering'),
      'nbKm' => $nbKm,
      'archived' => "FALSE",
      'id_stateBooking' => $id_stateBooking,
      'id_customer' => $this->input->post('id_customer'),
      'id_parkcar' => $this->input->post('id_parkcar')
    );

    if ($this->input->post('id') <> NULL){
      return $this->db->update('booking', $data, array('id' => $this->input->post('id')));
    }
    else
    {
      return $this->db->insert('booking', $data);
    }

  }
}