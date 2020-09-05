<?php

  class Profile_model extends CI_Model{
    //INSERTION OF DATA CODE START

    //Profile TABLE CODE START
    function insert_profile($data){
      $this->db->insert("userprofile",$data);
    }
    //profile TABLE CODE END

    //VIEW PROFILE CODE start
    public function getProfileDataByUserID($user_id = null){
      if($user_id){
        $sql = "SELECT * FROM userprofile WHERE user_id = ?";
        $query = $this->db->query($sql, array($user_id));

        $result = $query->result_array();

        return $result;
    }
    //VIEW PROFILE CODE END
  }
}
?>
