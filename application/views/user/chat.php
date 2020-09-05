
<style media="screen">
  /* NAVBARS STYLE */
  .padding10{
    padding-top: 10px;
  }
  .main-section{
    border: 1px solid grey;
  }
  .left-sidebar{
    background-color: #e4e4e4;
    padding: 0px;
  }
  .searchbox{
    width: 100%;
    padding: 15px 10px;
    border-bottom: 1px solid lightgrey;
  }
  .search-icon,.search-icon:hover{
    background-color: #6A6C75;
    border:1px solid #fff;
    color:#fff;
    box-shadow: none !important;
  }
  .form-control:focus{
    border:1px solid #fff;
  }
  .chat-left-img,.chat-left-detail{
    float: left;
  }
  .left-chat{
    overflow-y:scroll;
  }
  .left-chat ul{
    overflow: hidden;
    padding: 0px;
  }
  .left-chat ul li{
    list-style: none;
    width:100%;
    float: left;
    margin:10px 0px 8px 15px;
  }
  .chat-left-img img{
    width:50px;
    height:50px;
    border-radius: 50%;
    text-align: left;
    float:fixed;
    border:3px solid #6B6F79;
  }
  .chat-left-detail{
    margin-left: 10px;
  }
  .chat-left-detail p{
    margin: 0px;
    color: black;
    padding:7px 0px 0px;
  }
  .chat-left-detail span{
    color: green;
  }
  .chat-left-detail span i{
    color:#86BB71;
    font-size: 10px;
  }
  .chat-left-detail .orange{
    color:#E38968;
  }
  .right-sidebar{
    border-left: 1px solid lightgrey;
  }
  .right-header{
    border-bottom: 1px solid lightgrey;
    margin:0px;
    padding: 0px;
  }
  .right-header-img img{
    width:50px;
    height:50px;
    float: left;
    border-radius: 50%;
    border:3px solid grey;
    margin-right: 10px;
  }
  .right-header{
    padding-top:5px;
    padding-left: 20px;
    height:70px;
    background-color: #e4e4e4;
    }
  .right-header-detail h4{
    margin: 0px;
    color: black;
    padding-top: 10px;
  }
  .right-header-detail span{
    color:black;
    font-size: 14px;
  }
  .rightside-left-chat,.rightside-right-chat{
    float:left;
    width:80%;
    position: relative;
    font-size: 14px;
  }
  .rightside-right-chat{
    float:right;
    margin-right:35px;
  }
  .right-header-contentChat{
    overflow-y: scroll;
    background-color: #FFFFFF;
    position: relative;
  }
  .right-header-contentChat ul li{
    list-style: none;
    margin-top:20px;
  }
  .right-header-contentChat .rightside-left-chat p,.right-header-contentChat .rightside-right-chat p{
    background-color: #86BB71;
    padding: 5px;
    border-radius: 3px;
    color:#fff;
  }
  .right-header-contentChat .rightside-right-chat p{
    background-color: #94C2ED;
  }
  .right-chat-textbox{
    padding: 5px;
    width: 100%;
    background-color: white;
    border-top: 2px solid lightgrey;
  }

  @media only screen and (max-width:320px){
    .main-section{
      display: none;
    }
  }
</style>

<script type="text/javascript">
$(document).ready(function () {
  setInterval(showMessages,  2000);
  function showMessages(){
    $.ajax({
      type:'POST',
      url:'<?php echo base_url('chatc/view_messages/'. $recipient_id); ?>',
      async: false,
      success:function(response){
          $('#messages').html(response);
      }
    });
  }
  showMessages();

    // Handler for .ready() called.
    $('div').animate({
        scrollTop: $('#what').get(0).scrollHeight
    }, 10);
});
// show message
  $(document).ready(function () {

  });
</script>
<div class="container-fluid border amain-section">
  <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
      <div class="input-group searchbox">
        <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
        <div class="input-group-btn">
          <button class="btn btn-default search-icon" type="submit"><i class="fas fa-search"></i></button>
        </div>
      </div>
      <div class="left-chat">
        <ul>
          <?php
          $messagesql = 'SELECT sender_id FROM messages WHERE recipient_id =' . $this->session->userdata('user_id') . ' GROUP BY sender_id';
          $messagedata = $this->db->query($messagesql)->result_array();
          if($messagedata){
            foreach($messagedata as $row){
                $row['sender_id'];
                $upsql = 'SELECT p.picture, u.username FROM userprofile as p, users as u WHERE u.user_id =' . $row['sender_id'] . ' AND p.user_id=' . $row['sender_id'];
                $updata = $this->db->query($upsql)->result_array();
                if($updata){
                  foreach($updata as $row1){
                      $picture      = $row1['picture'];
                      $username     = $row1['username'];
          ?>
          <li>
            <div class="chat-left-img">
              <a href="<?php echo base_url('chatc/chat/'.$row['sender_id']); ?>"><img src="<?php echo base_url().$picture; ?>"></a>
            </div>
            <div class="chat-left-detail">
              <p><b><?php echo anchor("chatc/chat/{$row['sender_id']}", $username, ['class'=>'text-success']); ?></b></p>
              <!-- <span><i class="fa fa-circle orange" aria-hidden="true"></i> offline</span>  -->
            </div>
          </li>
        <?php  } } } }  ?>
        </ul>
      </div>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
      <div class="row">
        <?php
        $messagesql = 'SELECT p.picture, u.username FROM userprofile as p, users as u WHERE u.user_id =' . $recipient_id . ' AND p.user_id=' . $recipient_id;
        $messagedata = $this->db->query($messagesql)->result_array();
        if($messagedata){
          foreach($messagedata as $row){
              $picture      = $row['picture'];
              $username     = $row['username'];
        ?>
        <div class="col-md-12 right-header">
          <div class="right-header-img">
            <img src="<?php echo base_url().$picture; ?>">
          </div>
          <div class="right-header-detail">
            <h4><?php echo $username; ?></h4>
          </div>
        </div>
      <?php } }?>
      </div>
      <div class="row" id="what">
        <div class="col-md-12 right-header-contentChat">
          <ul id="messages">
          </ul>
        </div>
      </div>
      <form class="" action="<?php echo base_url(); ?>chatc/sendMessage" method="post">
        <div class="row">
          <input type="hidden" name="recipient_id" value="<?php echo $recipient_id; ?>">
          <div class="col-md-10 right-chat-textbox">
            <textarea name="message1" type="text" class="form-control" placeholder="Type your message ..."></textarea>
          </div>
          <div class="col-md-2 right-chat-textbox">
            <a href="#"><button type="submit" class="btn btn-success">Send</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
      var height = $(window).height();
      $('.left-chat').css('height', (height - 186) + 'px');
      $('.right-header-contentChat').css('height', (height - 260) + 'px');
    });
</script>
