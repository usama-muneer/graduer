<?php
	//fetch profile DATA
	$user_id = $this->session->userdata('user_id');
	$sql1 = 'select * from userprofile where user_id =' . $user_id ;
	$data = $this->db->query($sql1)->result_array();
	if($data){
		foreach($data as $row):
		  $id = $row['user_id'];
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
			$join_since = date('Y',strtotime($date));
		  endforeach;
		  }
	else{
		$not = "No data found.";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home | QWP</title>
	<!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- JQUERY JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- POPPER JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<!-- BOOTSTRAP JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- FONT AWESOME JS -->
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<!-- EXTERNAL STYLESHEET -->
	<link href="<?php echo base_url(); ?>assets/css/home_style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/footer_style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/viewprofile_style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/creategig_style.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/js/creategig.js"></script>
	<!-- FAVICON -->
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/qwpnotextwhite.png" type="image/gif" size="16x16">
	<style media="screen">
	#img-top{
		display: inline-block;
		position: relative;
		width: 50px;
		height: 50px;
		overflow: hidden;
		border-radius: 50%;
	}
	</style>

	<script type="text/javascript">
	$(document).ready(function(){

			setInterval(showMessages,  2000);
			setInterval(chk_unread_msg,  2000);
			setInterval(fchk_unread_notification,  2000);
			setInterval(showNotificationf, 2000);

			function showNotificationf(){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>notificationc/ajaxShowNotificationf',
					async: false,
					success:function(response){
							$('.notifi').html(response);
					}
				});
			}
			showNotificationf();

			function fchk_unread_notification(){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>notificationc/fchk_unread_notification',
					async: false,
					success:function(response){
							$('#chk-unread-notification').html(response);
					}
				});
			}

			function showMessages(){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>notificationc/ajaxShowMessagesNotificationf',
					async: false,
					success:function(response){
							$('#dropdown-menu-n').html(response);
					}
				});
			}
			showMessages();

			function chk_unread_msg(){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>notificationc/fchk_unread_msg',
					async: false,
					success:function(response){
							$('#chk-unread-msg').html(response);
					}
				});
			}

	});
	</script>
	<script type="text/javascript">

		$(document).ready(function(){
		  $('#search_box').on('keyup',function(){
		      var search_data = $(this).val();
		      if(search_data){
		          $.ajax({
		            type:'POST',
		            url:'<?php echo base_url(); ?>searchingc/liveSearch',
		            data:{searchval : search_data},
		            success:function(html){
									$('#search_data').html(html);
		            }
		          });
		      }
		      else{
		          $('#search_data').html('<option>No data found</option>');
		      }
		  });
		});
	</script>
	<style media="screen">
		#prefetch{
			width: 500px;
			padding-left: 30px;
		}
	</style>
</head>
<body>
<!-- NAVBAR CODE START -->
<nav class="navbar navbar-expand-lg navbar-light bg-white" id="nav1">
  <a class="navbar-brand" href="#"><b>QuickWorkPro</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- NAVBAR TOP HEADER CODE START -->
	<form class="form-inline mr-2 mr-lg-0 " method="get" action="<?php echo base_url(); ?>searchingc/showgig">
 	 <div class="input-group mb-3" id="prefetch" >
 		 <input name="search_service" type="text" class="form-control" list="search_data" id="search_box" placeholder="Search Services" aria-label="Search Services" aria-describedby="basic-addon2">
		 <datalist id="search_data">
		</datalist>
		 <div class="input-group-append">
 			 <button class="btn btn-success mr-2 mr-sm-0" type="submit">Search</button>
 		 </div>
 	 </div>
 	 <!--
 	 <div class="" id="prefetch">
 		 <input class="form-control mr-sm-2 typeahead" type="text" name="search_box" placeholder="Search" aria-label="Search">
 	 </div>
 	 <button class="btn btn-outline-success mr-2 mr-sm-0" type="submit">Search</button>
  -->
    </form>
    <!-- NAVBAR TOP SEARCH FORM CODE END -->

    <!-- NAVBAR LEFT LINKS CODE START -->
    <ul class="navbar-nav ml-auto">

      <!-- NAVBAR SELLING CODE START -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Selling
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>orderc/va_orders">Orders</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>requestsendc/va_brequest">Buyer Requests</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>profilec/view_earnings">Earnings</a>
        </div>
      </li>
      <!-- NAVBAR SELLING CODE END -->

      <!-- NAVBAR GIG CODE START -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>userc/viewgig">Gigs</i></a>
      </li>
      <!-- NAVBAR GIG CODE END -->

      <!-- NAVBAR MESSAGE CODE START -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-comments"></i>
					<span id="chk-unread-msg"></span>
        </a>
        <ul class="dropdown-menu" id="dropdown-menu-n">

        </ul>
      </li>
      <!-- NAVBAR MESSAGE CODE RNF -->

      <!-- NAVBAR Notifications CODE START -->
      <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-bell"></i>
						<span id="chk-unread-notification"></span>
          </a>

					<ul class="dropdown-menu notifi" id="dropdown-menu-n">

          </ul>
      </li>
      <!-- NAVBAR Notifications CODE END -->

      <!-- NAVBAR Dashboard CODE START -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboardc/dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard"><i class="fas fa-chart-bar"></i></a>
      </li>
      <!-- NAVBAR Dashboard CODE END -->

      <!-- NAVBAR PROFILE CODE START -->
      <li class="nav-item dropdown">
				<img src="<?php echo $picture; ?>" id="img-top" style="max-width:50px;" class="rounded-circle nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" title="Profile" alt="profile" >
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo base_url(); ?>profilec/view_profile"><?php echo $username; ?></a>
          <!--<a class="dropdown-item" href="#">My Profile</a>-->
          <a class="dropdown-item" href="#">Support Center</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>profilec/settings">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url(); ?>profilec/logout">Logout</a>
        </div>
      </li>
      <!-- NAVBAR PROFILE CODE END -->

    </ul>
    <!-- NAVBAR LEFT LINKS CODE END -->

 </div>

</nav>
<!-- NAVBAR CODE END -->
