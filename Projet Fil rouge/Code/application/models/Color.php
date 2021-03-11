<?php
  class Color extends CI_Model{
    public function getColor($id = FALSE){
      if ($id === FALSE){
        $query = $this->db->get('color');
        return $query->result_array();
      }
      else
      {
        $query = $this->db->get_where('color', array('id' => $id));
        return $query->row_array();
      }
    }

  }
?>