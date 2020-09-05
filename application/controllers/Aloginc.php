<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aloginc extends CI_Controller {
  //constructure code start
  public function __construct(){
    parent::__construct();
    //lOAD MODEL AND LIBRARY
    $this->load->library('form_validation');
    $this->load->model('Alogin_model');
    //BUYER AND FREELANCER WILL NOT ALLOWED TO VISIT THIS PAGE
    if($this->session->userdata('user_type') == 'user'){
      redirect(base_url() . "profile");
    }
  }
  //constructure code end
  //admin login page code start
  function admin_login(){
    $row['title'] = "Admin Login | QWP";
    $this->load->view('admin/includes/adminlogin_header', $row);
    $this->load->view('admin/admin_login');
    $this->load->view('admin/includes/admin_bodyend');
  }
  //admin login page code end

  //admin login function code start
  function login(){
    //set validation rules
    $this->form_validation->set_rules("admin_name", "Username", "trim|required|min_length[5]|max_length[20]");
    $this->form_validation->set_rules("admin_password", "Password", "trim|required|min_length[8]");
    //VALIDATE USER INPUT DATA
    if($this->form_validation->run() == TRUE){
      $username = $this->input->post('admin_name');
      $password = $this->input->post('admin_password');
      $logindata = $this->Alogin_model->adminlogin($username, $password);
      if($logindata){
        foreach ($logindata as $data_row) {
          $session_data = array(
            'username'  => $data_row['username'],
            'email'     => $data_row['email'],
            'user_type' => $data_row['user_type'],
            'logged_in' => true
          );
        }
        $this->session->set_userdata($session_data);
        redirect(base_url(). 'dashboard');
      }
      else{
        redirect(base_url(). 'admin_login');
      }
    }
    else{
      redirect(base_url(). 'admin_login');
    }
  }
  //admin login function code end
}
?>
