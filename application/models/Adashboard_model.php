<?php
  class Adashboard_model extends CI_Model
  {

    function __construct(){
      parent::__construct();
    }

    function getAllUsers(){
      $sql = "SELECT count(*) as total_users FROM users";
      $data = $this->db->query($sql)->result_array();
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }

    function getAllGigs(){
      $sql = "SELECT count(*) as total_gigs FROM gigs";
      $data = $this->db->query($sql)->result_array();
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }

    function getAllRequests(){
      $sql = "SELECT count(*) as total_requests FROM buyerrequest WHERE brequest_status='active'";
      $data = $this->db->query($sql)->result_array();
      if ($data){
        return $data;
      }
      else{
        return false;
      }
    }

    function getAllOrders(){
      $sql = "SELECT count(*) AS total_orders FROM orders WHERE order_status='active'";
      $data = $this->db->query($sql)->result_array();
      if($data){
        return $data;
      }
      else {
        return false;
      }
    }

    function getAllCategories(){
      $sql = "SELECT count(*) AS total_categories FROM servicecategories";
      $data = $this->db->query($sql)->result_array();
      if($data){
        return $data;
      }
      else {
        return false;
      }
    }

    function getAllServices(){
      $sql = "SELECT count(*) AS total_services FROM services";
      $data = $this->db->query($sql)->result_array();
      if($data){
        return $data;
      }
      else {
        return false;
      }
    }

    function getAllFreelancers(){
      $sql = "SELECT count(*) as total_freelancers FROM users WHERE type = 'freelancer'";
      $data = $this->db->query($sql)->result_array();
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }

    function getAllBuyers(){
      $sql = "SELECT count(*) as total_buyers FROM users WHERE type = 'buyer'";
      $data = $this->db->query($sql)->result_array();
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }

  }


?>
