<?php

class Loginc extends CI_Controller{

    public function __construct(){
      parent::__construct();
      //load form_validation library
  		$this->load->library('form_validation');
      //load model
      $this->load->model('user_model');

      if($this->session->userdata('logged_in') == true){
        if($this->session->userdata('user_type') == 'buyer'){
          redirect(base_url() . "brequestc/va_gig");
        }
        elseif($this->session->userdata('user_type') == 'freelancer'){
          redirect(base_url() . "profilec/view_profile");
        }
      }
      }

    public function login_page(){
      $this->load->view('home/includes/home_lheader');
      $this->load->view('home/home_login');
      $this->load->view('home/includes/home_footer');
      $this->load->view('home/includes/home_model');
      $this->load->view('home/includes/home_loginModelError');
      $this->load->view('home/includes/home_end');
    }

    //Login Function CODE START
    public function login(){
  		//set validation rules
  		$this->form_validation->set_rules("u_usernamelogin", "Username", "trim|required|min_length[5]|max_length[12]");
  		$this->form_validation->set_rules("u_passwordlogin", "Password", "trim|required|min_length[8]");
      //set error message if username is not valid
      $errorMsg = $this->form_validation->set_message('validate_username', 'The {field} does not exists');
      //VALIDATE USER INPUT DATA
      if($this->form_validation->run() == TRUE){
        $username = $this->input->post('u_usernamelogin');
        $password = $this->input->post('u_passwordlogin');
  			$login = $this->user_model->login($username, $password);
        if($login){
          //fetch user data to check buyer or freelancer DATA
        	$sql = 'select * from users where user_id =' . $login ;
        	$data = $this->db->query($sql)->result_array();
        	if($data){
        		foreach($data as $row){
              $user_type   = $row['type'];
              $user_status = $row['status'];
              if($user_status == 'Deactivated'){
                $msg['error'] = '<p class="text-danger"><b>Your Account is Deactivated</b></p>';
                $this->load->view('home/includes/home_lheader');
                $this->load->view('home/home_login', $msg);
                $this->load->view('home/includes/home_footer');
                $this->load->view('home/includes/home_model');
                $this->load->view('home/includes/home_end');
              }
              elseif($user_status == 'active' or $user_status = 'Active'){
                //set buyer session data code start
                if($user_type == 'user'){
                  $sessionData = array(
                    'buyer_id'   => $login,
                    'user_type' => $row['type'],
                    'logged_in' => true
                  );
                  $this->session->set_userdata($sessionData);
                  $user_id = $login;
                    redirect(base_url() . "create_profile");
                }
              //SET BUYER session data code END

              }
        	  }
          }
          else{
            $this->login_page();
          }
  		  }
        else{
          $this->login_page();
        }
      }
      else{
        $this->login_page();
      }
    }
    //LOGIN FUNCTION CODE END

    //Enter code not running start
    public function enter(){
      if($this->session->userdata('username') != ''){
        echo '<h1>  Welcome - '.$this->session_userdata('username').'</h1>';
        //echo '<label><a href="'. base_url() .'auth/logout">Logout</a></label>';
      }
      else{
        redirect(base_url() . "");
      }
    }
    //Enter code not runnng end
}

 ?>
