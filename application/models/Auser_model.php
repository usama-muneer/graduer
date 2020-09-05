<?php
  class Auser_model extends CI_Model
  {

    function __construct(){
      parent::__construct();
    }
    // fetch freelancer data code start
    function view_users(){
      $this->db->where('type', 'user');
      //$this->db->where('status', 'Active');
      $this->db->order_by('username');
      $data = $this->db->get('users');
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }// fetch freelancer data code end
    //update freelancer code start
    function update_user($data, $user_id){
      $this->db->where('user_id', $user_id);
      $this->db->update('users', $data);
    }//update freelancer code start
    
    //delete user code start
    function delete_user($user_id = null){
      if($user_id){
        $this->db->where('user_id',$user_id);
        if($this->db->delete('userschools')){
            $this->db->where('user_id',$user_id);
            if($this->db->delete('userprofile')){
                $this->db->where('user_id',$user_id);
                $this->db->delete('users');
            }
        }
        elseif($this->db->delete('userprofile')){
            $this->db->where('user_id',$user_id);
            $this->db->delete('users');
        }
        else{
            $this->db->where('user_id',$user_id);
            $this->db->delete('users');
        }
      }
    }//selete user code start
  }
?>
