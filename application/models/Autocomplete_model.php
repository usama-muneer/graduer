<?php

  class Autocomplete_model extends CI_Model{

    function fetch_data($query){
      $this->db->like('service_name', $query);
      $query = $this->db->get('services');
      if($query->num_rows() > 0){
        foreach($query->result_array() as $row){
          $output[] = array(
            'name'     =>  $row['service_name']
          );
        }
        echo json_encode($output);
      }
    }

  }
?>
