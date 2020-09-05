<?php

class Userc extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('gig_model');
    $this->load->model('Aservice_model');
    if($this->session->userdata('logged_in') != true){
      redirect(base_url(), '');
    }
    if($this->session->userdata('user_type') == 'buyer'){
      redirect(base_url() . "bprofilec/view_profile");
    }
  }

  public function index(){
    $this->load->view('user/includes/user_CPheader');
    $this->load->view('user/includes/user_serviceBar');
    $this->load->view('user/user_home');
    $this->load->view('user/includes/user_footer');
    $this->load->view('user/includes/user_end');
  }

  public function graphics_design(){
    $this->load->view('user/includes/user_VPheader');
    $this->load->view('user/includes/user_serviceBar');
    $this->load->view('user/graphics_design');
    $this->load->view('user/includes/user_footer');
    $this->load->view('user/includes/user_end');
  }


  //CREATE GIG CODE START
  function creategig(){
    $this->load->view('user/includes/user_VPheader');
    $this->load->view('user/includes/user_serviceBar');
    $this->load->view('user/gig/creategig');
    $this->load->view('user/includes/user_footer');
    $this->load->view('user/includes/user_end');
  }
  //CREATE GIG CODE END

  //VIEW GIG CODE START
  function viewgig(){
    $user_id          = $this->session->userdata('user_id');
    $sql              = 'gig_status= "Active" AND user_id ='. $user_id ;
    $data['gig_data'] = $this->db->get_where('gigs', $sql)->result_array();
    if($data){
      $this->load->view('user/includes/user_VPheader');
      $this->load->view('user/includes/user_serviceBar');
      $this->load->view('user/gig/viewgig', $data);
      $this->load->view('user/includes/user_footer');
      $this->load->view('user/includes/user_end');
    }
  }
  //VIEW GIG CODE END

  //VIEW GIG CODE START
  function va_gig($service_id){
    if($service_id){
      $this->load->model('Aservice_model');
      $this->load->model('Gig_model');
      $service_name = $this->Aservice_model->getServiceNameByServiceId($service_id);
      $g_data       = $this->Gig_model->getGigDataByServiceName($service_name);
      if($g_data){
        $gig_data['gig_data'] = $g_data;
        $this->load->view('user/includes/user_VPheader');
        $this->load->view('user/includes/user_serviceBar');
        $this->load->view('user/va_gig', $gig_data);
        $this->load->view('user/includes/user_footer');
        $this->load->view('user/includes/user_end');
      }
      else{
        $service['service_name'] = $service_name;
        $this->load->view('user/includes/user_VPheader');
        $this->load->view('user/includes/user_serviceBar');
        $this->load->view('user/va_gig', $service);
        $this->load->view('user/includes/user_footer');
        $this->load->view('user/includes/user_end');
      }
    }
  }
  //VIEW GIG CODE END

  function view_services($serviceCategory_id = null){
    if($serviceCategory_id){
      //$serviceCategory_id = rawurldecod($serviceCategory_id);
      $this->load->model('Aservice_model');
      $service_data['service_data'] = $this->Aservice_model->getServiceDataByServiceCategoryId($serviceCategory_id);
      $this->load->view('user/includes/user_VPheader');
      $this->load->view('user/includes/user_serviceBar');
      $this->load->view('user/view_services', $service_data);
      $this->load->view('user/includes/user_footer');
      $this->load->view('user/includes/user_end');
    }
  }

  //Update Gig CODE START
  function editgig($id = null){
    $row['gig_id'] = $id;
      if($row['gig_id']){
      $user_id = $this->session->userdata('user_id');
      $sql = 'SELECT * FROM gigs WHERE gig_status= "Active" AND gig_id ='. $row['gig_id'];
      $gigdata = $this->db->query($sql)->result_array();
      if($gigdata){
        foreach($gigdata as $data1){
          $row['serviceCategory_name'] = $data1 ['serviceCategory_name'];
          $row['service_name']         = $data1 ['service_name'];
          $row['gig_title']            = $data1 ['gig_title'];
          $row['gig_description']      = $data1 ['gig_description'];
          $row['gig_package_desc']     = $data1 ['gig_package_desc'];
          $row['gig_price']            = $data1 ['gig_price'];
          $row['gig_duration']         = $data1 ['gig_duration'];
          $row['gig_picture']          = $data1 ['gig_picture'];
        }
      }
    }
    $this->load->view('user/includes/user_VPheader');
    $this->load->view('user/includes/user_serviceBar');
    $this->load->view('user/gig/editgig', $row);
    $this->load->view('user/includes/user_footer');
    $this->load->view('user/includes/user_end');
  }
  //Update Gig CODE END

  //CHAT CODE START
  function Chat(){
    $this->load->view('user/includes/user_VPheader');
    $this->load->view('user/includes/user_serviceBar');
    $this->load->view('user/user_chat');
    $this->load->view('user/includes/user_footer');
    $this->load->view('user/includes/user_end');
  }
  //CHAT CODE END

  //VIEW ANY PAGE FUNCTION CODE START
  /*
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
  */
  //VIEW ANY PAGE FUNCTION CODE END


}
?>
