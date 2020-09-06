<?php

  class Notificationc extends CI_Controller {

    function __construct(){
      parent::__construct();
      $this->load->library('form_validation');
    }

    function chat_notification(){

    }

    //CHECK FREELANCER NOTIFICATION USING AJAX CODE START
    function fchk_unread_notification(){
      $total_msg = 0;
      $messagesql = 'SELECT count(user_id) as tnotification FROM notifications WHERE user_id = ' . $this->session->userdata('user_id') . ' AND status="unread"' ;
      $messagedata = $this->db->query($messagesql)->result_array();
      if($messagedata){
        foreach($messagedata as $row){
          $total_msg = $row['tnotification'];
        }
      }
      if($total_msg > 0)
      echo '<span class="badge" style="color:pink;font-size:18px;margin-left:-10px;">*</span>';
    }
    //CHECK FREELANCER NOTIFICATION USING AJAX CODE END

    //SHOW FREELANCER Notificationc THROUGH AJAX CODE START
    function ajaxShowNotificationf(){
      $data = "";
      $sql = 'SELECT count(user_id) as tnotification FROM notifications WHERE user_id = ' . $this->session->userdata('user_id') .' AND status = "unread"' ;
      $bdata = $this->db->query($sql)->result_array();
      if($bdata){
        foreach($bdata as $row){
          $data .= '<li class="head text-light bg-dark">
                      <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                          <span>Unread Notifications (' . $row['tnotification'] . ')</span>
                        </div>
                    </li>';
        }
      }

      $notifisql = 'SELECT * FROM notifications WHERE user_id = ' . $this->session->userdata('user_id') . ' AND status = "unread" ORDER BY time desc LIMIT 5' ;
      $notifidata = $this->db->query($notifisql)->result_array();
      if($notifidata){
        foreach($notifidata as $row1){
          $notification_details 		= $row1['notification_details'];
          $time		                  = $row1['time'];
          $status                   = $row1['status'];
            if($row1['order_id']){
              $data .= '<li class="notification-box">
                          <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                              <div class="notification-body"><b><a style="color:black;" href="'. base_url('orderc/va_orders/') .'">'. $notification_details .'</a></b></div>
                              <small class="text-warning">'. $time .'</small>
                            </div>
                          </div>
                        </li>';
            }
            elseif($row1['brequest_id']){
              $data .= '<li class="notification-box">
                          <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                              <div class="notification-body"><b><a style="color:black;" href="'. base_url('requestsendc/va_brequest/') .'">'. $notification_details .'</a></b></div>
                              <small class="text-warning">'. $time .'</small>
                            </div>
                          </div>
                        </li>';
            }
            elseif($row1['freelancer_id']){
              $data .= '<li class="notification-box">
                          <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                              <div class="notification-body"><b><a style="color:black;" href="'. base_url('dashboardc/dashboard') .'">'. $notification_details .'</a></b></div>
                              <small class="text-warning">'. $time .'</small>
                            </div>
                          </div>
                        </li>';
            }
            elseif($row1['gig_id'] > 0){
              $data .= '<li class="notification-box">
                          <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                              <div class="notification-body"><b><a style="color:black;" href="'. base_url('gigc/viewigig/'. $row1['gig_id']) .'">'. $notification_details .'</a></b></div>
                              <small class="text-warning">'. $time .'</small>
                            </div>
                          </div>
                        </li>';
            }
            else{
              $data .= '<li class="notification-box">
                          <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                              <div class="notification-body"><b><a style="color:black;" href="'. base_url('gigc/viewigig/'. $row1['gig_id']) .'">'. $notification_details .'</a></b></div>
                              <small class="text-warning">'. $time .'</small>
                            </div>
                          </div>
                        </li>';
            }

        }
      }
      $data .= '<li class="footer bg-dark text-center">
                  <a href="" class="text-light">View All</a>
                </li>';
      echo $data;
    }
    //SHOW FREELANCER Notificationc THROUGH AJAX CODE END

    //SHOW FREELANCER Notificationc THROUGH AJAX CODE START
    function ajaxShowNotificationb(){
      $data = "";
      $sql = 'SELECT count(user_id) as tnotification FROM notifications WHERE user_id = ' . $this->session->userdata('buyer_id') .' AND status = "unread"' ;
      $bdata = $this->db->query($sql)->result_array();
      if($bdata){
        foreach($bdata as $row){
          $data .= '<li class="head text-light bg-dark">
                      <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                          <span>Unread Notifications (' . $row['tnotification'] . ')</span>
                        </div>
                    </li>';
        }
      }

      $notifisql = 'SELECT * FROM notifications WHERE user_id = ' . $this->session->userdata('buyer_id') . ' AND status = "unread" ORDER BY time desc LIMIT 5' ;
      $notifidata = $this->db->query($notifisql)->result_array();
      if($notifidata){
        foreach($notifidata as $row1){
          $notification_details 		= $row1['notification_details'];
          $time		                  = $row1['time'];
          $status                   = $row1['status'];
            if($row1['order_id']){
              $data .= '<li class="notification-box">
                          <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                              <div class="notification-body"><b><a style="color:black;" href="'. base_url('borderc/va_orders/') .'">'. $notification_details .'</a></b></div>
                              <small class="text-warning">'. $time .'</small>
                            </div>
                          </div>
                        </li>';
            }
            elseif($row1['brequest_id']){
              $data .= '<li class="notification-box">
                          <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                              <div class="notification-body"><b><a style="color:black;" href="'. base_url('brequestc/viewirequest/' . $row1['brequest_id']) .'">'. $notification_details .'</a></b></div>
                              <small class="text-warning">'. $time .'</small>
                            </div>
                          </div>
                        </li>';
            }
            else{
              $data .= '<li class="notification-box">
                          <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                              <div class="notification-body"><b><a style="color:black;" href="'. base_url('brequestc/view_brequest/') .'">'. $notification_details .'</a></b></div>
                              <small class="text-warning">'. $time .'</small>
                            </div>
                          </div>
                        </li>';
            }

        }
      }
      $data .= '<li class="footer bg-dark text-center">
                  <a href="" class="text-light">View All</a>
                </li>';
      echo $data;
    }
    //SHOW FREELANCER Notificationc THROUGH AJAX CODE END

    //CHECK BUYER NOTIFICATION USING AJAX CODE START
    function bchk_unread_notification(){
      $total_msg = 0;
      $messagesql = 'SELECT count(user_id) as tnotification FROM notifications WHERE user_id = ' . $this->session->userdata('buyer_id') . ' AND status="unread"' ;
      $messagedata = $this->db->query($messagesql)->result_array();
      if($messagedata){
        foreach($messagedata as $row){
          $total_msg = $row['tnotification'];
        }
      }
      if($total_msg > 0)
      echo '<span class="badge" style="color:pink;font-size:18px;margin-left:-10px;">*</span>';
    }
    //CHECK BUYER NOTIFICATION USING AJAX CODE END

    //CHECK BUYER MESSAGE NOTIFICATION USING AJAX CODE START
    function bchk_unread_msg(){
      $total_msg = 0;
      $messagesql = 'SELECT count(sender_id) as tmessage FROM messages WHERE recipient_id = ' . $this->session->userdata('buyer_id') . ' AND status="unread" GROUP BY status' ;
      $messagedata = $this->db->query($messagesql)->result_array();
      if($messagedata){
        foreach($messagedata as $row){
          $total_msg = $row['tmessage'];
        }
      }
      if($total_msg > 0)
      echo '<span class="badge" style="color:pink;font-size:18px;margin-left:-10px;">*</span>';
    }
    //CHECK BUYER MESSAGE NOTIFICATION USING AJAX CODE END

    //CHECK FREELANCER MESSAGE NOTIFICATION USING AJAX CODE START
    function fchk_unread_msg(){
      $total_msg = 0;
      $messagesql = 'SELECT count(sender_id) as tmessage FROM messages WHERE recipient_id = ' . $this->session->userdata('user_id') . ' AND status="unread" GROUP BY status' ;
      $messagedata = $this->db->query($messagesql)->result_array();
      if($messagedata){
        foreach($messagedata as $row){
          $total_msg = $row['tmessage'];
        }
      }
      if($total_msg > 0)
      echo '<span class="badge" style="color:pink;font-size:18px;margin-left:-10px;">*</span>';
    }
    //CHECK FREELANCER MESSAGE NOTIFICATION USING AJAX CODE END

    //SHOW BUYER MESSAGES NOTIFICATION THROUGH AJAX CODE START
    function ajaxShowMessagesNotificationb(){
      $data = "";
      $sql = 'SELECT count(sender_id) as tmessage FROM messages WHERE recipient_id = ' . $this->session->userdata('buyer_id') .' AND status = "unread"' ;
      $bdata = $this->db->query($sql)->result_array();
      if($bdata){
        foreach($bdata as $row){
          $data .= '<li class="head text-light bg-dark">
                      <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                          <span>Unread Messages '. $row['tmessage'] .'</span>
                      	</div>
          						</div>
                    </li>';
        }
      }
      $messagesql = 'SELECT max(date) as ldate, sender_id, status, count(message) as tmessage FROM messages WHERE recipient_id = ' . $this->session->userdata('buyer_id') . ' GROUP BY sender_id, status ORDER BY date desc LIMIT 4' ;
      $messagedata = $this->db->query($messagesql)->result_array();
      if($messagedata){
        foreach($messagedata as $row){
          $tmessage 		= $row['tmessage'];
          $sender_id		= $row['sender_id'];
          $ldate				= $row['ldate'];
          $status       = $row['status'];
          $upsql = 'SELECT p.picture, u.username FROM userprofile as p, users as u WHERE u.user_id =' . $sender_id . ' AND p.user_id=' . $sender_id;
          $updata = $this->db->query($upsql)->result_array();
          if($updata){
            foreach($updata as $row1){
              $thismessage      = "You have recieved " . $tmessage . " messages " . $status;
              $ppicture			= $row1['picture'];
              $uusername     = $row1['username'];
              if($status == "read"){
                $data .= '<li class="notification-box bg-light">
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-3 text-center">
                                <img src="'. base_url('images/thumbnail/').$ppicture . '" class="w-75 rounded-circle">
                              </div>
                              <div class="col-lg-8 col-sm-8 col-8">
                                <a href="'. base_url('Chatc/chat/'. $sender_id) .'"><strong class="text-info">' .$uusername .'</strong></a>
                                <div class="notification-body"><a href="'. base_url('Chatc/chat/'. $sender_id) .'" style="color:black">' .$thismessage .'</a> </div>
                                <small class="text-warning">'. $ldate .'</small>
                              </div>
                            </div>
                          </li>';
              }
              elseif($status == "unread"){
                $data .= '<li class="notification-box">
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-3 text-center">
                                <img src="'. base_url('images/thumbnail/').$ppicture . '" class="w-75 rounded-circle">
                              </div>
                              <div class="col-lg-8 col-sm-8 col-8">
                                <a href="'. base_url('Chatc/chat/'. $sender_id) .'"><strong class="text-info">' .$uusername .'</strong></a>
                                <div class="notification-body"><a href="'. base_url('Chatc/chat/'. $sender_id) .'" style="color:black"><b>You have ' .$tmessage .' unread Messages. Click here to view...</b></a> </div>
                                <small class="text-warning">'. $ldate .'</small>
                              </div>
                            </div>
                          </li>';
              }
            }
          }
        }
      }
      $data .= '<li class="footer bg-dark text-center">
                  <a href="" class="text-light"></a>
                </li>';
      echo $data;
    }
    //SHOW BUYER MESSAGES Notificationc THROUGH AJAX CODE END

    //SHOW FREELANCER MESSAGES Notificationc THROUGH AJAX CODE START
    function ajaxShowMessagesNotificationf(){
      $data = "";
      $sql = 'SELECT count(sender_id) as tmessage FROM messages WHERE recipient_id = ' . $this->session->userdata('user_id') .' AND status = "unread"' ;
      $bdata = $this->db->query($sql)->result_array();
      if($bdata){
        foreach($bdata as $row){
          $data .= '<li class="head text-light bg-dark">
                      <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                          <span>Unread Messages '. $row['tmessage'] .'</span>
                      	</div>
          						</div>
                    </li>';
        }
      }
      $messagesql = 'SELECT max(date) as ldate, status, sender_id, count(message) as tmessage FROM messages WHERE recipient_id = ' . $this->session->userdata('user_id') . ' GROUP BY sender_id, status ORDER BY date desc LIMIT 4' ;
      $messagedata = $this->db->query($messagesql)->result_array();
      if($messagedata){
        foreach($messagedata as $row){
          $tmessage 		= $row['tmessage'];
          $sender_id		= $row['sender_id'];
          $ldate					= $row['ldate'];
          $status       = $row['status'];
          $upsql = 'SELECT p.picture, u.username FROM userprofile as p, users as u WHERE u.user_id =' . $sender_id . ' AND p.user_id=' . $sender_id;
          $updata = $this->db->query($upsql)->result_array();
          if($updata){
            foreach($updata as $row1){
              $thismessage      = "You have recieved " . $tmessage . " messages ";
              $ppicture			= $row1['picture'];
              $uusername     = $row1['username'];
              if($status == "unread"){
                $data .= '<li class="notification-box">
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-3 text-center">
                                <img src="'. base_url('images/thumbnail/').$ppicture . '" class="w-75 rounded-circle">
                              </div>
                              <div class="col-lg-8 col-sm-8 col-8">
                                <a href="'. base_url('Chatc/chat/'. $sender_id) .'"><strong class="text-info">' .$uusername .'</strong></a>
                                <div class="notification-body"><a href="'. base_url('Chatc/chat/'. $sender_id) .'" style="color:black"><b>You have ' .$tmessage .' unread Messages. Click here to view...</b></a> </div>
                                <small class="text-warning">'. $ldate .'</small>
                              </div>
                            </div>
                          </li>';
              }
              elseif($status == "read"){
                $data .= '<li class="notification-box bg-light">
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-3 text-center">
                                <img src="'. base_url('images/thumbnail/').$ppicture . '" class="w-75 rounded-circle">
                              </div>
                              <div class="col-lg-8 col-sm-8 col-8">
                                <a href="'. base_url('chatc/chat/'. $sender_id) .'"><strong class="text-info">' .$uusername .'</strong></a>
                                <div class="notification-body bg-light"><a href="'. base_url('chatc/chat/'. $sender_id) .'" style="color:black">' .$thismessage .'</a> </div>
                                <small class="text-warning">'. $ldate .'</small>
                              </div>
                            </div>
                          </li>';
              }
            }
          }
        }
      }
      $data .= '<li class="footer bg-dark text-center">
                  <a href="" class="text-light">View All</a>
                </li>';
      echo $data;
    }
    //SHOW FREELANCER MESSAGES Notificationc THROUGH AJAX CODE END






  }

?>
