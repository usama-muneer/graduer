<?php


  class My_Controller extends CI_Controller {

    public function __construct(){
      parent::__construct();
      $this->load->library('session');
    }

    public function loggedIn(){
      if($this->session->userdata('logged_in') == true ){
        redirect(base_url() . "userc/createprofile");
      }
    }

    public function notLoggedIn(){
      if($this->session->userdata('logged_in') != true ){
        header('location: ../');
      }
    }

  }

?>
