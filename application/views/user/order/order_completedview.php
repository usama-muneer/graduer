<?php
if($order_id){
  $sql = 'SELECT * FROM orders WHERE order_id ='. $order_id ;
  $orderdata = $this->db->query($sql)->result_array();
  if($orderdata){
    foreach($orderdata as $row){
      $order_price      = $row['order_price'];
      $order_duration   = $row['order_duration'];
      $order_status     = $row['order_status'];
      $start_date       = $row['start_date'];
      $complete_date    = $row['approve_date'];
      $gig_id           = $row['gig_id'];
      $buyer_id         = $row['buyer_id'];
      $freelancer_id    = $row['freelancer_id'];
    }
  }
}
?>


<style media="screen">
.padding20 {
  padding-top: 20px;
}
.padding10 {
  padding-top: 10px;
}

.formheading{
font-weight: bold;
}
.countdown p {
font-size: 40px;
}
.fa-file{
font-size: 50px;
}
input[type=file]{
padding:10px;}
}

.img-va-brequest{
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
  overflow: hidden;
  border-radius: 50%;
}
.head-status{
  height: 60px;
  background-color: green;
  padding-top: 10px;
  color: white;
}
</style>
<div class="head-status">
  <h2 class="text-center"><i class="fas fa-check"></i> Your Order is <?php echo $order_status; ?> </h2>
</div>
<!-- ORDER START -->
    <div class="padding10">
      <div class="container border round bg-light">

        <div class="row padding10 bg">
          <div class="col-sm-10">
            <h3>Order #QWPB<?php echo $buyer_id  ?>F<?php echo $freelancer_id;  ?>G<?php echo $gig_id;  ?>O<?php echo $order_id; ?></h3>
          </div>
          <div class="col-sm-2">
            <h3>$<?php echo $order_price; ?></h3>
          </div>
        </div><hr/>
        <!--  SHOW GIG TITLE CODE START   -->
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label formheading">Gig</label>
          <div class="col-sm-10">
            <?php
            $sql = 'SELECT * FROM gigs WHERE gig_id ='. $gig_id ;
            $gigdata = $this->db->query($sql)->result_array();
            if($gigdata){
              foreach ($gigdata as $data) {
            ?>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $data['gig_title']; ?>">
            <?php
                }
              }
            ?>
          </div>
        </div>
        <!--  SHOW GIG TITLE CODE END  -->

        <!--  SHOW FREELANCER NAME TITLE CODE START  -->
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label formheading">Seller</label>
          <div class="col-sm-10">
            <?php
            $sql = 'SELECT * FROM users WHERE user_id ='. $freelancer_id ;
            $userdata = $this->db->query($sql)->result_array();
            if($userdata){
              foreach ($userdata as $data) {
            ?>
            <a href="#"><input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $data['username']; ?>"></a>

          <?php
              }
            }
          ?>
          </div>
        </div>
        <!--  SHOW FREELANCER NAME TITLE CODE END  -->

        <!--  SHOW START DATE TITLE CODE START  -->
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label formheading">Start Date</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $start_date; ?>">
          </div>
        </div>
        <!--  SHOW START DATE TITLE CODE END  -->

        <!--  SHOW COMPLETION DATE TITLE CODE START  -->
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label formheading">Complete Date</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticDDate" value="<?php echo $complete_date; ?>">
          </div>
        </div>
        <!--  SHOW COMPLETION DATE TITLE CODE END  -->
      </div>
    </div>
    <!-- ORDER END -->

    <!-- REQUIREMENTS START -->
    <div class="padding10">
      <div class="container padding10 border rounded bg-light">
        <h4>Order Requirements</h4><hr/>
        <?php
        $sql = 'SELECT * FROM orderrequirements WHERE order_id ='. $order_id;
        $userdata = $this->db->query($sql)->result_array();
        if($userdata){
          foreach ($userdata as $data) {
        ?>
        <div class="form-group">
          <p><?php echo $data['requirements']; ?></p>
        </div>
        <hr/>
        <div class="form-group">
          <label for="exampleFormControlFile1" class="formheading">2. Related Files</label><br/>
          <div class="col-sm-2 text-center">
          <a href="<?php echo base_url().$data['upload']; ?>" download=""><i class="fas fa-file"></i><br/></a>
          <small><?php echo base_url().$data['upload']; ?></small><br/>
        </div>
      </div>
        <?php
            }
          }
        ?>
      </div>
    </div>
    <!-- REQUIREMENTS END -->

    <!-- DELIVER ORDER START -->
    <div class="padding10">
      <div class="container padding10 border rounded bg-white">
        <hr>
        <?php
        $sql = 'SELECT * FROM deliverorder WHERE order_id ='. $order_id;
        $userdata = $this->db->query($sql)->result_array();
        if($userdata){
          $val = 1;
          foreach ($userdata as $data) {
        ?>
        <h3 class="text-center padding10 bg-gray" style="height:60px;"> Delivery <?php echo $val; ?> </h3>
        <hr>
        <div class="form-group">
          <label class="formheading">Delivery Description</label>
          <p><?php echo $data['description']; ?></p>
        </div> <hr/>

        <div class="form-group">
          <label for="exampleFormControlFile1" class="formheading float-left">Delivered Files</label><br/><br>
          <div class="col-sm-2" align="left">
            <a href="<?php echo base_url().$data['attach_file']; ?>" download="" style="padding-left:100px;"><i class="fas fa-file"></i><br/></a>
            <small><?php echo base_url().$data['attach_file']; ?></small><br/>
          </div>
        <small class="float-right"><?php echo $data['delivery_time']; ?></small>
      </div><br>
      <hr>
        <?php
        $val = $val+1;
            }
          }
        ?>
        <hr>
      </div>
    </div>
    <!-- DELIVER ORDER END -->
    <!-- CHAT FREELANCER FORM START -->
    <div class="padding10">
      <div class="container padding10 border rounded bg-light">
        <h2 align="center"><a href="<?php echo base_url('bchatc/chat/'.$freelancer_id); ?>" class="btn btn-success" align="center">Contact Buyer</a></h2>
        <br><br>
      </div>
    </div>
    <!-- CHAT FREELANCER FORM END -->
    <br><br><br><br><br><br>
<script>
// Set the date we're counting down to
var duedate = document.getElementById('staticDDate').value;
var countDownDate = new Date(duedate).getTime();

// Update the count down every 1 second
var countdownfunction = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = "Delivered";

    // If the count down is over, write some text
    if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("demo").innerHTML = "YOUR ORDER IS LATE";
    }
}, 1000);

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#blah')
      .attr('src', e.target.result);
      };
    reader.readAsDataURL(input.files[0]);
      }
    }

var maxLength = 2500;
$('textarea').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength-length;
  $('#deliveryDescription').text(length);
});

</script>
