<?php

class Registerc extends CI_Controller{

  //__construct CODE START
  function __construct(){
    parent::__construct();
    $this->load->helper(array('form','url'));
    $this->load->library(array('session', 'form_validation', 'email'));
    $this->load->database();
    $this->load->model('user_model');
    if($this->session->userdata('logged_in') == true){
      if($this->session->userdata('user_type') == 'user'){
        redirect(base_url() . "profile");
      }
    }
  }
  //__construct CODE END

  //SIGNUP PAGE LOAD WITH ERROR CODE START
  public function signup(){
    $this->load->view('home/includes/home_header');
    $this->load->view('home/home_signup');
    $this->load->view('home/includes/home_footer');
    $this->load->view('home/includes/home_model');
    $this->load->view('home/includes/home_modelError');
    $this->load->view('home/includes/home_end');
  }
  //SIGNUP PAGE LOAD WITH ERROR CODE END

      public function verified(){
        $this->load->view('home/includes/home_header');
        $this->load->view('home/verified');
        $this->load->view('home/includes/home_footer');
        $this->load->view('home/includes/home_model');
        $this->load->view('home/includes/home_modelError');
        $this->load->view('home/includes/home_end');
      }

  public function regex_check($str)
  {
      if (preg_match("/^(?:'[A-Za-z](([\._\-][A-Za-z0-9])|[A-Za-z0-9])*[a-z0-9_]*')$/", $str))
      {
          $this->form_validation->set_message('regex_check', 'The %s field is not valid!');
          return FALSE;
      }
      else
      {
          return TRUE;
      }
  }

	//FREELANCER FORM VALIDATION CODE START
	function form_validation(){

		//load form_validation library
		$this->load->library('form_validation');

		//set validation rules
		$this->form_validation->set_rules("f_usernamejoin", "Username", "trim|required|regex_match[/^[A-Za-z0-9]+$/]|min_length[5]|max_length[20]|is_unique[users.username]");
		$this->form_validation->set_rules("f_emailjoin", "Email", "trim|required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("f_passwordjoin", "Password", "trim|required|min_length[8]");
		$this->form_validation->set_rules("f_confirmpasswordjoin", "Password Confirmation", "trim|required|matches[f_passwordjoin]");

    //error message if email and username already exist in database
    $errorMsg = $this->form_validation->set_message('is_unique', 'The {field} already exist');

		if($this->form_validation->run() == TRUE){
      //load model and pass data to model insert function using $data array

      //make salt Password
      $salt = $this->user_model->salt();
      $password = $this->user_model->makePassword($this->input->post("f_passwordjoin"),$salt);

			//load all data into array
			$data = array(
        "username" => $this->input->post("f_usernamejoin"),
				"email"    => $this->input->post("f_emailjoin"),
				"password" => $password,
        "salt"     => $salt,
				"type"     => "user",
        "status"   => "Active"
			);

			//pass data to model insert function
			$this->user_model->insert_user($data);

			// send email
            if ($this->user_model->sendEmail($this->input->post("f_emailjoin")))
            {
                // successfully sent mail
                $success = 'registered';
                redirect(base_url() . "homec/signup/". $success);
            }
      $success = 'registered';
      redirect(base_url() . "homec/signup/". $success);
		}
		else
		{
      $this->signup();
		}
	}
	//FREELANCER FORM VALIDATION CODE END


	//USER INSERTED FUNCTION CODE START
	public function user_inserted(){
    redirect(base_url() . "login");
	}
	//USER INSERTED FUNCTION CODE END

	function verify($hash=NULL){
	    $flag = $this->user_model->verifyEmailID($hash);
        if ($flag == 1){
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Your Email Address is successfully verified!</div>');
            redirect(base_url(), '');
        }
        else{
            $this->session->set_flashdata('error', '<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address! Please email us.</div>');
            redirect(base_url(), '');
        }
    }
}

?>
