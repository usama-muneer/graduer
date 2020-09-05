<?php
  class Aschool_model extends CI_Model
  {

    function __construct(){
      parent::__construct();
    }
    //insert school code start
    function insert_school($data){
      $this->db->insert('schools',$data);
    }//insert school code end
    
    //insert city code start
    function insert_schoolcountry($data){
      $this->db->insert('schoolCountries',$data);
    }//insert city code end

    //insert state code start
    function insert_state($data){
      $this->db->insert('states',$data);
    }//insert state code end

    //insert city code start
    function insert_city($data){
      $this->db->insert('cities',$data);
    }//insert city code end

    // fetch schools data code start
    function view_schools(){
      $this->db->order_by('school_id');
      $data = $this->db->get('schools');
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }// fetch service categories data code end

    //insert userschool code start
    function insert_userschool($data){
      $this->db->insert('userschools',$data);
    }//insert userschool code end
    
    //delete user school code start
    function delete_userschool($school_id = null){
      if($school_id){
        $this->db->where('school_id',$school_id);
        $this->db->delete('userschools');
      }
    }//selete user school code start

    //update service categories code start
    function update_school($data){
      $this->db->replace('userschools', $data);
    }//update school code start


    //update school code start
    function delete_school($school_id = null){
      if($school_id){
        $this->db->where('school_id',$school_id);
        $this->db->delete('schools');
      }
    }//update school code start
    //fetch school school id code start
    function getschoolName($school_id = null){
      if($school_id){
        $this->db->where('school_id', $school_id);
        $data = $this->db->get('schools')->result_array();
        $serviceschool_name = "";
        if($data){
          foreach ($data as $row) {
            $serviceschool_name = $row['school_name'];
          }
          return $serviceschool_name;
        }
        else{
          return false;
        }
      }
    }// fetch service using service school id code end

    function getUserDataBySchool($school_id){
      $query = "SELECT * FROM schools WHERE school_id = '" . $school_id . "'";
      $data = $this->db->query($query)->result_array();
      if($data){
        foreach ($data as $row) {
          $query1 = "SELECT * FROM userschools WHERE school_name = '" . $row['school_name'] . "' AND city = '" . $row['city'] . "' AND state = '" . $row['state'] . "' AND country = '" . $row['country'] . "'";
          $school_data = $this->db->query($query1)->result_array();
          if($school_data){
            return $school_data;
          }
          else{
            return false;
          }
        }
      }
      else{
        return false;
      }
    }
  }
?>
