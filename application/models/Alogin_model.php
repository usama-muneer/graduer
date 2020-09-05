<?php

  /**
   *
   */
  class Alogin_model extends CI_Model{
    //constructure code start
    function __construct(){
      parent::__construct();
    }//constructure code end
    //admin login code start
    function adminlogin($username, $password){
      $query = "SELECT * from admin where email = '". $username ."' OR username = '". $username ."' AND password='".$password."'";
      $sql = $this->db->query($query)->result_array();
      if($sql){
        return $sql;
      }
      else{
        return false;
      }
    }//admin login code end

  }


?>
