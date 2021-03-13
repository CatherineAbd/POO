<?php
  class StateBooking extends CI_Model{
    public function getStateBooking($id = FALSE){
      if ($id === FALSE){
        $query = $this->db->get('statebooking');
        return $query->result_array();
      }
      else
      {
        $query = $this->db->get_where('statebooking', array('id' => $id));
        return $query->row_array();
      }
    }

  }
?>