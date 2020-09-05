<?php

class Autocompletec extends CI_Controller{

    function __construct(){
      parent::__construct();

      if($this->session->userdata('logged_in') != true){
        redirect(base_url(), '');
      }
    }

  function index(){
      $this->load->view('buyer/includes/buyer_VPheader');
      $this->load->view('buyer/includes/buyer_serviceBar');
      $this->load->view('buyer/includes/buyer_footer');
      $this->load->view('buyer/includes/buyer_end');
  }

  function fetch(){
    $this->load->model('autocomplete_model');
    echo $this->autocomplete_model->fetch_data($this->uri->segment(3));
  }
}

?>
