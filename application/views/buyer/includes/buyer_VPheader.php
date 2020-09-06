<?php
	//fetch profile DATA
	$user_id = $this->session->userdata('buyer_id');
	$sql1 = 'select * from userprofile where user_id =' . $user_id ;
	$data = $this->db->query($sql1)->result_array();
	if($data){
		foreach($data as $row):
		  $id = $row['user_id'];
		  $country = $row['country'];
		  $gender = $row['gender'];
		  $description = $row['description'];
			$date = $row['join_date'];
		  $qualification = $row['qualification'];
		  $picture = base_url('images/thumbnail/').$row['picture'];
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
	<title><?php $title; ?></title>
	<!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css.map">
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
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
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
			// call functions
			setInterval(showMessagesNotifi,  2000);
			setInterval(chk_unread_msg, 2000);
			setInterval(bchk_unread_notification,  2000);
			setInterval(showNotificationb, 2000);

			function showNotificationb(){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>notificationc/ajaxShowNotificationb',
					async: false,
					success:function(response){
							$('.notifi').html(response);
					}
				});
			}
			showNotificationb();

			//show notification
			function bchk_unread_notification(){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>notificationc/bchk_unread_notification',
					async: false,
					success:function(response){
							$('#chk-unread-notification').html(response);
					}
				});
			}

			//show message notification
			function showMessagesNotifi(){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>notificationc/ajaxShowMessagesNotificationb',
					async: false,
					success:function(response){
							$('#dropdown-menu-n').html(response);
					}
				});
			}

			function chk_unread_msg(){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url(); ?>notificationc/bchk_unread_msg',
					async: false,
					success:function(response){
							$('#chk-unread-msg').html(response);
					}
				});
			}
			showMessagesNotifi();
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

  <a class="navbar-brand text-warning" href="#"><b>Graduer</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <!-- NAVBAR TOP HEADER CODE START -->
 <div class="collapse navbar-collapse" id="navbarSupportedContent">


    <!-- NAVBAR LEFT LINKS CODE START -->
    <ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>profile">Home</a>
			</li>

			<!-- NAVBAR MESSAGE CODE START -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="<?php echo base_url(); ?>Profilec/chat" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-comments"></i>
					<span id="chk-unread-msg"></span>
				</a>

        <ul class="dropdown-menu" id="dropdown-menu-n">

        </ul>
      </li>
      <!-- NAVBAR MESSAGE CODE RNF -->


      <!-- NAVBAR PROFILE CODE START -->
      <li class="nav-item dropdown">
				<img src="<?php echo $picture; ?>" id="img-top" style="max-width:50px;" class="rounded-circle nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" title="Profile" alt="profile" >
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo base_url(); ?>profile"><?php echo $username; ?></a>
          <!--<a class="dropdown-item" href="#">My Profile</a>-->
          <!-- a class="dropdown-item" href="<?php echo base_url(); ?>BProfilec/settings">Settings</a -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url(); ?>BProfilec/logout">Logout</a>
        </div>
      </li>
      <!-- NAVBAR PROFILE CODE END -->
    </ul>
    <!-- NAVBAR LEFT LINKS CODE END -->
 	</div>

</nav>
<!-- NAVBAR CODE END -->
<script type="text/javascript">
	$(document).ready(function(){
		var sample_data = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			prefetch: '<?php echo base_url(); ?>bprofilec/fetch',
			remote:{
				url: '<?php echo base_url(); ?>bprofilec/fetch/%QUERY',
				whildcard: '%QUERY'
			}
		});

		$('#prefetch .typeahead').typeahead(null, {
			name: 'sample_data',
			display: 'name',
			source: sample_data,
			templates:{
				suggestion:Handlebars.compile('<div class="row"><div class="col-md-12" style="padding-right:5px;padding-left:5px;">{{name}}</div></div>');
			}
		});
	});
</script>
