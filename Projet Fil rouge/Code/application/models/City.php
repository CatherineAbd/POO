<?php
  class City extends CI_Model{
    public function getCity($id = FALSE){
      if ($id === FALSE){
        $query = $this->db->get('city');
        return $query->result_array();
      }
      else
      {
        $query = $this->db->get_where('city', array('id' => $id));
        return $query->row_array();
      }
    }

    public function manageCity(){
      $data = array(
        'nameCity' => $this->input->post('city')
      );
  
      if ($this->input->post('id') <> NULL){
        return $this->db->update('city', $data, array('id' => $this->input->post('id')));
      }
      else
      {
        return $this->db->insert('city', $data);
      }
    }

    public function deleteCity($id){
      if ($this->ctrlDeleteCity($id)){
        $this->db->delete("city", array("id" => $id));
        return true;
      }
        else
      {
        return false;
      }
    }
  
    // delete is possible if city is not used in agency and customer
    public function ctrlDeleteCity($id){
      
      $query = "SELECT c.id FROM city c JOIN agency a ON id_city = c.id WHERE a.archived = FALSE AND c.id =" . $id .
              " UNION SELECT c.id FROM city c JOIN customer cs ON cs.id_city = c.id WHERE cs.archived = FALSE AND c.id =" . $id;
      
      if (isset($this->db->query($query)->row()->id)){
        return false;
      }
      else
      {
        return true;
      }
    }
  
  
  }
?>