<?php
	//fetch profile DATA
	$user_id = $this->session->userdata('user_id');
	$sql1 = 'select * from userprofile where user_id =' . $user_id ;
	$data = $this->db->query($sql1)->result_array();
	if($data){
		foreach($data as $row):
		  $user_id = $row['user_id'];
		  $country = $row['country'];
		  $gender = $row['gender'];
		  $description = $row['description'];
		  $qualification = $row['qualification'];
		  $picture = base_url().$row['picture'];
		  endforeach;
		  }
	else{
		$not = "No data found.";
	}
	// fetch user data
	$sql2 = 'select * from users where user_id =' . $user_id ;
	$data2 = $this->db->query($sql2)->result_array();
	if($data2){
		foreach($data2 as $row):
		  $username = $row['username'];
		  $email = $row['email'];
			$date = $row['join_date'];
			$user_type = $row['type'];
			$join_since = date('Y',strtotime($date));
		  endforeach;
		  }
	else{
		$not = "No data found.";
	}
	//FETCH COUNTRY INFO
	$sql3 = 'select * from countries where country_code =' . "'" . $country . "'" ;
	$data3 = $this->db->query($sql3)->result_array();
	if($data3){
		foreach($data3 as $row):
		  $country_name = $row['country_name'];
		  endforeach;
		  }
	else{
		$not = "No data found.";
	}
  //FETCH ALL ACTIVE ORDER DATA INFO
	$sql4 = 'select count(order_id) as torder from orders where order_status = "Active" AND freelancer_id=' . $user_id;
	$data4 = $this->db->query($sql4)->result_array();
	if($data4){
		foreach($data4 as $row):
		  $orders = $row['torder'];
		  endforeach;
		  }
	else{
		$not = "No data found.";
	}
  //FETCH ALL Active GIGS ORDER DATA INFO
	$sql5 = 'select count(gig_id) as tgig from gigs where gig_status = "Active" AND user_id=' . $user_id;
	$data5 = $this->db->query($sql5)->result_array();
	if($data5){
		foreach($data5 as $row):
		  $gigs = $row['tgig'];
		  endforeach;
		  }
	else{
		$not = "No data found.";
	}
  //FETCH ALL Active GIGS ORDER DATA INFO
	$sql6 = 'select sum(earn_amount) as tearning from earnings where freelancer_id=' . $user_id;
	$data6 = $this->db->query($sql6)->result_array();
	if($data6){
		foreach($data6 as $row):
		  $earnings = $row['tearning'];
		endforeach;
	}
  else {
    $earnings = "$ 0";
  }
?>

<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

<!-- PAGE CONTENT START -->
<!-- PROFILE MAIN SECTION START -->
  <div class="container main-section pt-20">
    <div class="row">
      <div class="col-lg-3 col-sm-12 col-12 text-center detail-part">
        <div class="row image-part m-0">
          <div class="col-lg-12 col-sm-12 col-12 user-img">
            <div class="">
              <img src="<?php echo $picture; ?>" class="border rounded-circle">
            </div>
          </div>
          <div class="col-lg-12 col-sm-12 col-12 user-name">
            <h2><?php echo $username; ?></h2>
            <p><?php echo $user_type; ?></p>
          </div>
          <div class="col-lg-12 col-sm-12 col-12 information-button">
            <a href="<?php echo base_url(); ?>profilec/view_profile" class="btn btn-success w-75">View</a>
          </div>
          <div class="col-lg-12 col-sm-12 col-12 user-detail text-left p-2">
            <p>Gender: <span><?php echo $gender; ?></span></p>
            <p>From: <span><?php echo $country_name; ?></span></p>
            <p>Member Since: <span><?php echo $join_since; ?></span></p>
      </div>
    </div>
  </div>
<!-- PROFILE MAIN SECTION END -->

<!-- PROFILE DETAIL SECTION START -->
      <div class="col-lg-9 detail-part">
        <div class="container border rounded padding10">
          <h3>Dashboard</h3> <hr/>

          <div>
            <div class="row mb-3">

                <div class="col-xl-4 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-success">
                            <div class="rotate">
                                <i class="fas fa-box-open fa-3x"></i>
                            </div>
                            <h6 class="text-uppercase padding10">Active Orders</h6>
                            <h1 class="display-4"><?php echo $orders; ?></h1>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 py-2">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body bg-warning">
                            <div class="rotate">
                                <i class="fas fa-chalkboard-teacher fa-3x"></i>
                            </div>
                            <h6 class="text-uppercase padding10">Active Gigs</h6>
                            <h1 class="display-4"><?php echo $gigs; ?></h1>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 py-2">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fas fa-money-check-alt fa-3x"></i>
                            </div>
                            <h6 class="text-uppercase padding10">Total Earnings</h6>
                            <h1 class="display-4">$ <?php echo $earnings; ?></h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br><br>
        <hr>
        <h3>My Orders</h3> <hr/>
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
  </div>
</div>
  <!-- PROFILE DETAIL SECTION END -->
</div>
</div>

<style media="screen">
.img-va-order{
  display: inline-block;
  position: relative;
  width: 30px;
  height: 30px;
  overflow: hidden;
  border-radius: 50%;
}
/* PROFILE STYLE */
body{
  background-color:#eeeeee !important;
}
</style>
<br><br><br>
