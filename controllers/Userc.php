<?php

class Userc extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') != true ){
      redirect(base_url(), '');
    }
  }

  public function index(){
    $this->load->view('user/includes/user_header');
    $this->load->view('user/includes/user_serviceBar');
    $this->load->view('user/user_home');
    $this->load->view('user/includes/user_footer');
    $this->load->view('user/includes/user_end');
  }

  //Create Profile CODE START
  public function createprofile(){
    $this->load->view('createprofile');
    if($this->session->userdata('logged_in') != true ){
      redirect(base_url(), '');
    }
  }

  //CREATE GIG CODE START
  function creategig(){
    $this->load->view('user/includes/user_header');
    $this->load->view('user/includes/user_serviceBar');
    $this->load->view('user/gig/user_create');
    $this->load->view('user/includes/user_footer');
    $this->load->view('user/includes/user_end');
  }
  //CREATE GIG CODE END

  //VIEW GIG CODE START
  function viewgig(){
    $this->load->view('user/includes/user_header');
    $this->load->view('user/includes/user_serviceBar');
    $this->load->view('user/gig/user_view');
    $this->load->view('user/includes/user_footer');
    $this->load->view('user/includes/user_end');
  }
  //VIEW GIG CODE END

  //Update Gig CODE START
  function updategig(){
    $this->load->view('user/includes/user_header');
    $this->load->view('user/includes/user_serviceBar');
    $this->load->view('user/gig/user_update');
    $this->load->view('user/includes/user_footer');
    $this->load->view('user/includes/user_end');
  }
  //Update Gig CODE END

  //CHAT CODE START
  function Chat(){
    $this->load->view('user/includes/user_header');
    $this->load->view('user/includes/user_serviceBar');
    $this->load->view('user/userChat');
    $this->load->view('user/includes/user_footer');
    $this->load->view('user/includes/user_end');
  }
  //CHAT CODE END

  //VIEW ANY PAGE FUNCTION CODE START
	public function view($page = 'createprofile'){
		if(!$this->$page)
		{
			echo "asdasdas";
			show_404();
		}

    if($page == 'createprofile'){
      $this->loggedIn();
    }
    else{
      $this->notLoggedIn();
    }
		$this->load->view('home/'.$page, $data);
	}
  //VIEW ANY PAGE FUNCTION CODE END

  //DO UPLOAD FUNCTION CODE START




  //DO UPLOAD FUNCTION CODE END


}
?>
