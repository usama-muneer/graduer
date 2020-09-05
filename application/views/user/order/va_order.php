<style media="screen">
.img-va-order{
  display: inline-block;
  position: relative;
  width: 30px;
  height: 30px;
  overflow: hidden;
  border-radius: 50%;
}
</style>
<br>
<div class="container">
  <h2>Orders</h2>

<div class="d-flex flex-row-reverse">
</div>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Active Orders</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Completed Orders</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Cancelled Orders</a>
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <!--  ACTIVE ORDERS CODE START  -->
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="container">
      <div class="row">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col" >#</th>
              <th scope="col">Buyer</th>
              <th scope="col">Start Date</th>
              <th scope="col">End Date</th>
              <th scope="col">Budget</th>
              <th scope="col">Order Status</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $user_id = $this->session->userdata('user_id');
              $sql = 'SELECT * FROM orders WHERE order_status IN ("Active", "Delivered") AND freelancer_id ='. $user_id ;
              $data = $this->db->query($sql)->result_array();
              if($data){
                  $val = 1;
                  foreach($data as $row){
                    $order_id          = $row['order_id'];
                    $freelancer_id     = $row['freelancer_id'];
                    $buyer_id     = $row['buyer_id'];
                    $order_duration    = $row['order_duration'];
                    $order_price       = $row['order_price'];
                    $start_date        = $row['start_date'];
                    $complete_date     = $row['complete_date'];
                    $order_status      = $row['order_status'];
                    $sql = 'SELECT users.username, userprofile.picture, orders.complete_date
                    FROM userprofile, users, orders
                    WHERE userprofile.user_id='. $buyer_id . ' AND users.user_id='. $buyer_id . ' AND orders.order_id =' . $order_id ;
                    $data = $this->db->query($sql)->result_array();
                    if($data){
                      foreach($data as $row){
                        $picture = $row['picture'];
              ?>
              <tr>
                <th scope="row" class="text-center"><?php echo $val ?></th>
                <td >
                  <?php echo '<img src="'.base_url().$row['picture'].'" alt="'. $buyer_id .'" class="img-va-order text-center" />'; echo "<br/>"; echo '<small>' . $row['username'] . '</small>'; ?>
                </td>
                <td>
                  <input type="hidden" name="complete_date" id="staticDDate" value="<?php echo $row['complete_date']; ?>" />
                  <div class="">
                  <p><?php echo $start_date; ?></p>
                  </div>
                </td>
                <td><?php echo $complete_date; ?></td>
                <td>$<?php echo $order_price; ?></td>
                <td><?php echo $order_status; ?></td>
                <td class="text-center">
                  <?php
                    if($order_status == 'Active')
                      echo anchor("orderc/vactiveorder/{$order_id}", 'View', ['class'=>'btn btn-success']);
                    if($order_status == 'Delivered')
                      echo anchor("orderc/vdeliveredorder/{$order_id}", 'View', ['class'=>'btn btn-success']);
                  ?>
              </td>
                  <?php
                      }
                    }
                  $val = $val + 1;
                    }
                  }
                  else{
                    ?>
                <td colspan="4"> <?php echo "<h5>No Data found</h5>"; } ?> </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--  ACTIVE ORDERS CODE END  -->

  <!--  COMPLETED ORDERS CODE START  -->
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col" >#</th>
          <th scope="col">Buyer</th>
          <th scope="col">Start Date</th>
          <th scope="col">End Date</th>
          <th scope="col">Budget</th>
          <th scope="col">Order Status</th>
          <th scope="col">Action</th>
          <!--  <th scope="col" class="text-center">Action</th>  -->
        </tr>
      </thead>
      <tbody>
        <?php
          $user_id = $this->session->userdata('user_id');
          $sql = 'SELECT * FROM orders WHERE order_status = "Completed" AND freelancer_id ='. $user_id ;
          $data = $this->db->query($sql)->result_array();
          if($data){
              $val = 1;
              foreach($data as $row){
                $order_id          = $row['order_id'];
                $freelancer_id     = $row['freelancer_id'];
                $buyer_id          = $row['buyer_id'];
                $order_duration    = $row['order_duration'];
                $order_price       = $row['order_price'];
                $start_date        = $row['start_date'];
                $complete_date     = $row['approve_date'];
                $order_status      = $row['order_status'];
                $sql = 'SELECT users.username, userprofile.picture, orders.complete_date
                FROM userprofile, users, orders
                WHERE userprofile.user_id='. $buyer_id . ' AND users.user_id='. $buyer_id . ' AND orders.order_id =' . $order_id ;
                $data = $this->db->query($sql)->result_array();
                if($data){
                  foreach($data as $row){
                    $picture = $row['picture'];
          ?>
          <tr>
            <th scope="row" class="text-center"><?php echo $val ?></th>
            <td >
              <?php echo '<img src="'.base_url().$row['picture'].'" alt="'. $freelancer_id .'" class="img-va-order text-center" />'; echo "<br/>"; echo '<small>' . $row['username'] . '</small>'; ?>
            </td>

            <td>

              <input type="hidden" name="complete_date" id="staticDDate" value="<?php echo $row['complete_date']; ?>" />
              <div class="">
              <p><?php echo $start_date; ?></p>
              </div>
            </td>
            <td><?php echo $complete_date; ?></td>
            <td>$<?php echo $order_price; ?></td>
            <td><?php echo $order_status; ?></td>
            <td class="text-center"><?php echo anchor("orderc/vcompletedorder/{$order_id}", 'View', ['class'=>'btn btn-success']); ?></td>
              <?php
                  }
                }
              $val = $val + 1;
                }
              }
              else{
                ?>
            <td colspan="4"> <?php echo "<h5>No Data found</h5>"; } ?> </td>
          </tr>
      </tbody>
    </table>
  </div>
  <!--  COMPLETED ORDERS CODE END  -->

  <!--  CANCELLED ORDERS CODE START  -->
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col" >#</th>
          <th scope="col">Buyer</th>
          <th scope="col">Start Date</th>
          <th scope="col">End Date</th>
          <th scope="col">Budget</th>
          <th scope="col">Order Status</th>
          <!--  <th scope="col" class="text-center">Action</th>   -->
        </tr>
      </thead>
      <tbody>
        <?php
          $user_id = $this->session->userdata('user_id');
          $sql = 'SELECT * FROM orders WHERE order_status IN ("Cancelled") AND freelancer_id ='. $user_id ;
          $data = $this->db->query($sql)->result_array();
          if($data){
              $val = 1;
              foreach($data as $row){
                $order_id          = $row['order_id'];
                $freelancer_id     = $row['freelancer_id'];
                $order_duration    = $row['order_duration'];
                $order_price       = $row['order_price'];
                $start_date        = $row['start_date'];
                $complete_date     = $row['complete_date'];
                $order_status      = $row['order_status'];
                $sql = 'SELECT users.username, userprofile.picture, orders.complete_date
                FROM userprofile, users, orders
                WHERE userprofile.user_id='. $buyer_id . ' AND users.user_id='. $buyer_id . ' AND orders.order_id =' . $order_id ;
                $data = $this->db->query($sql)->result_array();
                if($data){
                  foreach($data as $row){
                    $picture = $row['picture'];
          ?>
          <tr>
            <th scope="row" class="text-center"><?php echo $val ?></th>
            <td >
              <?php echo '<img src="'.base_url().$row['picture'].'" alt="'. $freelancer_id .'" class="img-va-order text-center" />'; echo "<br/>"; echo '<small>' . $row['username'] . '</small>'; ?>
            </td>

            <td>

              <input type="hidden" name="complete_date" id="staticDDate" value="<?php echo $row['complete_date']; ?>" />
              <div class="">
              <p><?php echo $start_date; ?></p>
              </div>
            </td>
            <td><?php echo $complete_date; ?></td>
            <td>$<?php echo $order_price; ?></td>
            <td><?php echo $order_status; ?></td>
            <!--
            <td class="text-center"><?php// echo anchor("borderc/vieworder/{$order_id}", 'View', ['class'=>'btn btn-success']); ?></td>
            -->
              <?php
                  }
                }
              $val = $val + 1;
                }
              }
              else{
                ?>
            <td colspan="4"> <?php echo "<h5>No Data found</h5>"; } ?> </td>
          </tr>
      </tbody>
    </table>
  </div>
  <!--  CANCELLED ORDERS CODE END  -->
</div>
</div>

<br><br><br><br><br><br>
<script>
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
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s";

    // If the count down is over, write some text
    if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("demo").innerHTML = "YOUR ORDER IS LATE";
    }
}, 1000);

</script>
