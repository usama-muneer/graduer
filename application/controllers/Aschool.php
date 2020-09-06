<?php

  class Aschool extends CI_Controller {

    function __construct(){
      parent::__construct();
      $this->load->model('Aschool_model');
      //prevent user if not logged in into the system
      if($this->session->userdata('logged_in') != true ){
        redirect(base_url(), '');
      }
    }

    function insert_school(){
      $data['country'] = $this->input->post('country');
      $data['state'] = $this->input->post('state');
      $data['city'] = $this->input->post('city');
      $data['school_name'] = $this->input->post('school_name');
      $this->Aschool_model->insert_school($data);
      redirect(base_url(). 'schools');
    }

    function insert_schoolCountry(){
      $data['country_name'] = $this->input->post('country_name');
      $this->Aschool_model->insert_schoolcountry($data);
      redirect(base_url(). 'schools');
    }

    function insert_state(){
      $data['country_name'] = $this->input->post('country_name');
      $data['state_name'] = $this->input->post('state_name');
      $this->Aschool_model->insert_state($data);
      redirect(base_url(). 'schools');
    }

    function insert_city(){
      $data['country_name'] = $this->input->post('country_name');
      $data['state_name'] = $this->input->post('state_name');
      $data['city_name'] = $this->input->post('city_name');
      $this->Aschool_model->insert_city($data);
      redirect(base_url(). 'schools');
    }

    function update_school(){
      $data['school_id'] = $this->input->post('school_id');
      $data['country'] = $this->input->post('country');
      $data['state'] = $this->input->post('state');
      $data['city'] = $this->input->post('city');
      $data['user_id'] = $this->input->post('user_id');
      $data['school_name'] = $this->input->post('school_name');
      $this->Aschool_model->update_school($data);
      redirect(base_url(). 'schools');
    }

    function delete_school(){
      $school_id = $this->input->post('school_id');
      $this->Aschool_model->delete_school($school_id);
      redirect(base_url(). 'schools');
    }

    //Dynamically region name load in create buyer request page  code start
      function ajaxGetStateName(){
        if($this->input->post('country_name')){
          $country_name = $this->input->post('country_name');
          $sql = "SELECT DISTINCT * FROM states WHERE country_name ='" . $country_name . "'";
          $data = $this->db->query($sql)->result_array();
          if($data){
          echo '<option value="">Select Region</option>';
           foreach($data as $row){
              echo '<option value="'.$row['state_name'].'">'.$row['state_name'].'</option>';
           }
          }
          else{
              echo '<option value="">No region found.</option>';
          }
        }

      }
  //Dynamically region name load in create buyer request page  code start

  //Dynamically city name load in create buyer request page  code start
      function ajaxGetCityName(){
        if($this->input->post('state_name')){
          $state_name = $this->input->post('state_name');
          $sql = "SELECT DISTINCT * FROM cities WHERE state_name ='" . $state_name . "'";
          $data = $this->db->query($sql)->result_array();
          if($data){
          echo '<option value="">Select City</option>';
           foreach($data as $row){
              echo '<option value="'.$row['city_name'].'">'.$row['city_name'].'</option>';
           }
          }
          else{
              echo '<option value="">No city found.</option>';
          }
        }
      }
  //Dynamically city name load in create buyer request page  code start

  //Dynamically school name load in create buyer request page  code start
      function ajaxGetSchoolName(){
        if($this->input->post('state_name')){
          $state = $this->input->post('state_name');
          $country = $this->input->post('country_name');
          $city = $this->input->post('city_name');
          $sql = "SELECT DISTINCT * FROM schools WHERE country ='" . $country . "' AND state ='" . $state . "' AND city ='" . $city . "'";
          $data = $this->db->query($sql)->result_array();
          if($data){
          echo '<option value="">Select School</option>';
           foreach($data as $row){
              echo '<option value="'.$row['school_name'].'">'.$row['school_name'].'</option>';
           }
          }
          else{
              echo '<option value="">No school found.</option>';
          }
        }
      }
  //Dynamically school name load in create buyer request page  code start

  }

?>
