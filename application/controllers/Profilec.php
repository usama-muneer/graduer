<?php

  class Profilec extends CI_Controller{

    public function __construct(){
      parent::__construct();

      //prevent user if not logged in into the system
      if($this->session->userdata('logged_in') != true ){
        redirect(base_url(), '');
      }

      //prevent freelancer to access the buyer profile pages
      if($this->session->userdata('user_type') == 'user'){
        redirect(base_url() . "bprofilec/view_profile");
      }
    }


    public function create_profile(){
      $this->load->view('user/profile/user_create');
    }

    //View Profile CODE START
    function view_profile(){
      $this->load->view('user/includes/user_VPheader');
      $this->load->view('user/includes/user_serviceBar');
      $this->load->view('user/profile/user_view');
      $this->load->view('user/includes/user_footer');
      $this->load->view('user/includes/user_end');
    }
    //View Profile CODE END

    //View Profile CODE START
    function view_fellows(){
      echo 'hllo world';
    }
    //View Profile CODE END

    //Update Profile CODE START
    function edit_profile(){
      $this->load->view('user/includes/user_VPheader');
      $this->load->view('user/includes/user_serviceBar');
      $this->load->view('user/profile/user_update');
      $this->load->view('user/includes/user_footer');
      $this->load->view('user/includes/user_end');
    }
    //Update Profile CODE END

    //VIEW EARNINGS CODE START
    function view_earnings(){
      $this->load->view('user/includes/user_VPheader');
      $this->load->view('user/includes/user_serviceBar');
      $this->load->view('user/va_earnings');
      $this->load->view('user/includes/user_footer');
      $this->load->view('user/includes/user_end');
    }
    //VIEW EARNINGS CODE END

    //VIEW ALL GIG CODE START
    function va_gig($id = null){
      if($id){
        $sql = "SELECT * FROM servicecategories WHERE serviceCategory_id=". $id;
        $data = $this->db->query($sql)->result_array();
        if($data){
          foreach ($data as $row) {
            $arr['serviceCategory_id'] = $row['serviceCategory_id'];
          }
        }
        $this->load->view('user/includes/user_VPheader');
        $this->load->view('user/includes/user_serviceBar');
        $this->load->view('user/va_gig', $arr);
        $this->load->view('user/includes/user_footer');
        $this->load->view('user/includes/user_end');
      }
      else {
        $arr['serviceCategory_id'] = null;
        $this->load->view('buyer/includes/buyer_VPheader');
        $this->load->view('buyer//includes/buyer_serviceBar');
        $this->load->view('buyer/va_gig', $arr);
        $this->load->view('buyer/includes/buyer_footer');
        $this->load->view('buyer/includes/buyer_end');
      }
    }
    //VIEW ALL GIG CODE START

    //create profile code start
    //DO UPLOAD FUNCTION CODE START
    function do_upload(){
      $file_name = $_FILES['pic']['name'];
  		$file_temp = $_FILES['pic']['tmp_name'];
  		$upload_folder = "images/";
  		if(is_uploaded_file($file_name)){
  		$movefile = move_uploaded_file( $file_temp, $upload_folder . $file_name);
  		//$url = base_url()."images/".$_FILES['pic']['name'];
  		//if(is_uploaded_file($file_name)){
  			//echo "asdads";
  			//move_uploaded_file($_FILES['pic']['tmp_name'], $url);
  		}
  	  $image = basename($file_name);
  	  $image=str_replace(' ','|',$image);
  	  $type = explode(".",$image);
  	  $type = $type[count($type)-1];
  	  if (in_array($type,array('jpg','jpeg','png','gif'))){
  	    $tmppath=$upload_folder.uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
  	    if(is_uploaded_file($file_temp)){
  	      move_uploaded_file($file_temp,$tmppath);
  	      return $tmppath; // returns the url of uploaded image.
  	    }
  	  }
   	}
    //DO UPLOAD FUNCTION CODE END

    public function createuserprofile(){
      //profile create code start
      $quali = $this->input->post('degreetitle') . $this->input->post('passingyear');
      $data ['description'] = $this->input->post('description');
  		$data ['country'] = $this->input->post('country');
  		$data ['gender'] = $this->input->post('gender');
  		$data ['qualification'] = $quali;
  		$data ['picture']= $this->do_upload();
  		$data ['user_id'] = $this->session->userdata('user_id');
      $this->load->model('profile_model');
      $this->profile_model->insert_profile($data);
  	  redirect(base_url() . 'profilec/view_profile', 'refresh');// Redirect to Success page
      //profile create code end
    }
    //create profile code end

    //edit profile code START
    function edituserprofile(){
      //profile create code start

      $data ['description'] = $this->input->post('description');
  		$data ['qualification'] = $this->input->post('degreetitle');
    	$data ['user_id'] = $this->session->userdata('user_id');
        if($data){
          $this->db->where('user_id', $this->session->userdata('user_id'));
          $this->db->update('userprofile', $data);
        }
  	  redirect(base_url() . 'profilec/view_profile', 'refresh');// Redirect to Success page
    }
    //edit profile code end

    //edit profile code START
    function updatepic(){
      //profile create code start
      $data['picture'] = $this->do_upload();
      if($data){
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('userprofile', $data);
      }
  	  redirect(base_url() . 'profilec/view_profile', 'refresh');// Redirect to Success page
    }
    //edit profile code end

    //LOGOUT FUNCTION CODE START
    public function logout(){
      $this->session->sess_destroy();
      redirect(base_url() . "");
    }
    //LOGOUT FUNCTION CODE END

    //PAGE SETTINGS CODE START
    function settings(){
      $this->load->view('user/includes/user_VPheader');
      $this->load->view('user/includes/user_serviceBar');
      $this->load->view('user/profile/settings');
      $this->load->view('user/includes/user_footer');
      $this->load->view('user/includes/user_end');
    }
    //PAGE SETTINGS CODE END

    //CHANGE PASSWORD CODE START
    function changepassword(){
    		$this->form_validation->set_rules("currentpassword", "Password", "trim|required|min_length[8]");
    		$this->form_validation->set_rules("newpassword", "Password", "trim|required|min_length[8]");
    		$this->form_validation->set_rules("newpasswordconfirm", "Password Confirmation", "trim|required|matches[newpasswordconfirm]");

        $this->form_validation->set_message('check_currpassword', "The {field} is incorrect.");
        if($this->form_validation->run() == true){
          //make salt Password
          $this->load->model('user_model');
          $salt = $this->user_model->salt();
          $newpassword = $this->user_model->makePassword($this->input->post("newpassword"),$salt);

          //load all data into array
    			$data = array(
    				"password" => $newpassword,
            "salt"     => $salt
    			);
          $this->db->where('user_id', $this->session->userdata('user_id'));
          $this->db->update('users', $data);
          echo '<p class="text-success">Password Successfully Updates</p>';
          redirect(base_url(). "profilec/settings");
        }
        else{
          echo '<p class="text-danger">Incorrect Password</p>';
        }
    }
    //CHANGE PASSWORD CODE END

    function check_currpassword(){
      $this->load->model('user_model');
      $user_id = $this->session->userdata('user_id');
      $currentpassword = $this->input->post('currentpassword');
      $data = $this->user_model->check_currpassword($user_id, $currentpassword);
      if($data){
        return true;
      }
      else{
        return false;
      }
    }

    function deactivate_profile(){
      $user_id        = $this->session->userdata('user_id');
      $data['status'] = 'Deactivated';
      //Deactivate Account Status
      $this->db->where('user_id', $user_id);
      $this->db->update('users', $data);
      $this->logout();
    }

  }

?>
