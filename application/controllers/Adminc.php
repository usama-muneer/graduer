<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminc extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Aschool_model');
    $this->load->model('Adashboard_model');
    $this->load->model('Auser_model');
    if($this->session->userdata('logged_in') != true){
      redirect(base_url() . "");
    }
    if($this->session->userdata('user_type') == 'user'){
      redirect(base_url() . "profile");
    }
  }

  //dashboard start
  function index(){
    $user_data = $this->Adashboard_model->getAllUsers();
    if($user_data){
      foreach ($user_data as $user_row) {
        $data['tusers'] = $user_row['total_users'];
      }
    }
    $row['title'] = "Admin Dashboard | Graduer";
    $this->load->view('admin/includes/admin_header', $row);
    $this->load->view('admin/includes/admin_sidebar');
    $this->load->view('admin/includes/admin_navbar');
    $this->load->view('admin/admin_dashboard', $data);
    $this->load->view('admin/includes/admin_bodyend');
  }//dashboard end

  function schools(){
    $school_data['data'] = $this->Aschool_model->view_schools()->result_array();
    $row['title'] = "Schools | Graduer";
    $this->load->view('admin/includes/admin_header', $row);
    $this->load->view('admin/includes/admin_sidebar');
    $this->load->view('admin/includes/admin_navbar');
    $this->load->view('admin/view_schools.php', $school_data);
    $this->load->view('admin/includes/admin_bodyend');
    $this->load->view('admin/includes/admin_modals');
  }

  function users(){
    $data['user_data'] = $this->Auser_model->view_users()->result_array();
    if($data){
      $row['title'] = "Users | Graduer";
      $this->load->view('admin/includes/admin_header', $row);
      $this->load->view('admin/includes/admin_sidebar');
      $this->load->view('admin/includes/admin_navbar');
      $this->load->view('admin/users/view_users', $data);
      $this->load->view('admin/includes/admin_bodyend');
      $this->load->view('admin/includes/admin_modals');
    }
    else{
      $row['title'] = "Buyers | Graduer";
      $this->load->view('admin/includes/admin_header', $row);
      $this->load->view('admin/includes/admin_sidebar');
      $this->load->view('admin/includes/admin_navbar');
      $this->load->view('admin/users/view_buyers');
      $this->load->view('admin/includes/admin_bodyend');
      $this->load->view('admin/includes/admin_modals');
    }
  }

  function logout(){
    $this->session->sess_destroy();
    redirect(base_url(). "");
  }
}
?>
