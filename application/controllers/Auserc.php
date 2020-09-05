<?php

  class Auserc extends CI_Controller {

    function __construct(){
      parent::__construct();
      $this->load->model('Auser_model');
      //prevent user if not logged in into the system
      if($this->session->userdata('logged_in') != true ){
        redirect(base_url(), '');
      }
      //prevent buyer to access the gig pages
      if($this->session->userdata('user_type') == 'user'){
        redirect(base_url() . "bprofilec/view_profile");
      }
    }

    function update_user(){
      $data['status']   = $this->input->post('status');
      $user_id = $this->input->post('user_id');
      $this->Auser_model->update_user($data, $user_id);
      redirect(base_url(). 'users');
    }
    
    function delete_user(){
      $user_id = $this->input->post('user_id');
      $this->Auser_model->delete_user($user_id);
      redirect(base_url(). 'users');
    }

  }

?>
