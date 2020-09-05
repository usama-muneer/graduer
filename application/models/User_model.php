<?php

  class User_model extends CI_Model
  {
    //INSERTION OF DATA CODE START

    //USERS TABLE CODE START
    function insert_user($data){
      $this->db->insert("users",$data);
    }
    //USERS TABLE CODE

    //INSERTION CODE END

    //=============================//

      //FETCH DATA FROM TABLES CODE START
      function getUsers(){
        $query = $this->db->query('select * from users');
        //equal to (select * from users)
        return $query->result();
      }
      //FETCH DATA FROM TABLES CODE END


      //SIMPLE LOGIN FUNCTION WITH ANY SALT AND MAKE PASSWORD CODE START
      function user_login($username, $password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('users');

        //this query is = select * from users where username=$username and password=$password;

        if($query->num_rows() > 0){
          return true;
        }
        else{
          return false;
        }
      }
      //SIMPLE LOGIN FUNCTION WITH ANY SALT AND MAKE PASSWORD CODE END


      //VALIDATE USERNAME CODE START
      public function validate_username(){
        $username = $this->input->post('u_usernamelogin');

        $sql = "SELECT * FROM users WHERE username = ?";

        $query = $this->db->query($sql, array($username));

        return ($query->num_rows() == 1) ? true: false;
      }
      //VALIDATE USERNAME CODE END


      //salt FUNCTION CODE END
      public function salt(){
        return password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
      }
      //salt FUNCTION CODE END


      //makePassword ENCODING FUNCTION CODE START
      public function makePassword($password = null, $salt = null){
        if($password && $salt){
          return hash('sha256', $password.$salt);
        }
      }
      //makePassword FUNCTION CODE END

      //FETCH USER data by user_id CODE START
      public function fetchDataByUserID($user_id = null){
        if($user_id){
          $sql = "SELECT * FROM users WHERE user_id = ?";
          $query = $this->db->query($sql, array($user_id));

          $result = $query->row_array();

          return $result;
        }
      }
      //FETCH USER data by user_id CODE END

      //FETCH USER data by username CODE START
      public function fetchDataByUsername($username = null){
        if($username){
          $sql = "SELECT user_id, salt FROM users WHERE username = ?";
          $query = $this->db->query($sql, array($username));

          $result = $query->row_array();

          return ($query->num_rows() == 1) ? $result: false;
          return $result;
        }
      }
      //FETCH USER data by username CODE END

      //LOGIN FUNCTION CODE START
      public function login($username, $password){
        $userData = $this->fetchDataByUsername($username);

        if($userData){
          $password = $this->makePassword($password, $userData['salt']);

          $sql = "SELECT * FROM users WHERE username = ?  AND password = ? AND status = 1";
          $query = $this->db->query($sql, array($username, $password));
          $result = $query->row_array();

          return ($query->num_rows() == 1) ? $result['user_id']: false;
        }
        else{
          return false;
        }
      }
      //LOGIN FUNCTION CODE SEND

      //LOGIN FUNCTION CODE START
      public function check_currpassword($user_id, $currentpassword){

        $userData = $this->fetchDataByUserID($user_id);
        $username = $userData['username'];

        if($userData){
          $password = $this->makePassword($currentpassword, $userData['salt']);

          $sql = "SELECT * FROM users WHERE username = ?  AND password = ?";
          $query = $this->db->query($sql, array($username, $password));
          $result = $query->row_array();

          return ($query->num_rows() == 1) ? $result['username']: false;
        }
        else{
          return false;
        }
      }
      //LOGIN FUNCTION CODE SEND
      
      //send verification email to user's email id
    function sendEmail($to_email)
    {
        $from_email = 'noreply.confirm@graduer.com'; //change this to yours
        $subject = 'Verify Your Email Address';
        $message = strip_tags("Dear User, <br /> <br /> Please click on the below activation link to verify your email address. <br /> <br /> https://www.graduer.com/Registerc/verify/" . md5($to_email) . " <br /><br /><br /> Thanks <br /> Graduer Team");
        
        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.graduer.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'class@2021'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->load->library('email');
        
        //send mail
        
        $this->email->from($from_email, 'Graduer');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
    
    //update user school code start
    function update_school($data){
      $this->db->replace('userschools', $data);
    }
    //update user school code end
    
    //activate user account
    function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('users', $data);
    }
    
    function verifyUserEmail($key){
        $this->db->where('md5(email)', $key);
      $data = $this->db->get('users')->result_array();
    }
    
    // Change password email
    function changePasswordSendEmail($to_email)
    {
        $from_email = 'noreply.confirm@graduer.com'; //change this to yours
        $subject = 'Reset your account Password';
        $message = strip_tags("Dear User,<br /><br />Please click on the below link to reset your password. <br /> <br /> https://www.graduer.com/change_password/" . md5($to_email) . " <br /> <br /> <br /> Thanks <br /> Graduer Team");
        
        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.graduer.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'class@2021'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->load->library('email');
        
        //send mail
        
        $this->email->from($from_email, 'Graduer');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
    
    // Change password email
    function successfullyPasswordChangedSendEmail($to_email)
    {
        $from_email = 'noreply.confirm@graduer.com'; //change this to yours
        $subject = 'Password Reset Successfully';
        $message = strip_tags("Dear User,<br /><br />" .  " Your login details has been updated successfully." .  "<br /> <br /> <br /> Thanks <br /> Graduer Team");
        
        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.graduer.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'class@2021'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->load->library('email');
        
        //send mail
        
        $this->email->from($from_email, 'Graduer');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
  }
 ?>
