<?php
  class Category extends CI_Model{
    public function getCategory($id = FALSE){
      if ($id === FALSE){
        $query = $this->db->get('categorycar');
        return $query->result_array();
      }
      else
      {
        $query = $this->db->get_where('categorycar', array('id' => $id));
        return $query->row_array();
      }
    }

  }
?>