<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Graduer<?php //echo $title ?></title>
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
	<link href="<?php echo base_url(); ?>assets/css/index_style.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>assets/css/signup_style.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>assets/css/login_style.css" rel="stylesheet">
	<!--EXTERNAL JAVASCRIPT
	<script type="text/javascript" src="<?php echo base_url; ?>assets/js/login.js"></script>
	-->
	<!-- FAVICON -->

  <!-- logo
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/qwpnotextwhite.png" type="image/gif" size="16x16">

	-->
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
<body  class="home-login-body">

<!-- Navigation -->
<nav class="navbar border navbar-expand-md navbar-light sticky">
<div class="container-fluid">
	<a class="navbar-brand" href="#">
		<b class="text-warning">Graduer</b>
		<!-- <img src="<?php echo base_url(); ?>assets/img/qwplogorecwhite_edt.png"> -->
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
	<span class="navbar-toggler-icon"></span>
	</button>
	<!-- <form class="form-inline mr-2 mr-lg-0 " method="get" action="<?php echo base_url(); ?>homec/show_gigs">
	 <div class="input-group mb-3" id="prefetch" >
		 <input name="search_service" type="text" class="form-control input-group" list="search_data" id="search_box" placeholder="Search Services" aria-label="Search Services" aria-describedby="basic-addon2">
		 <datalist id="search_data">
		</datalist>
		 <div class="input-group-append">
			 <button class="btn btn-warning mr-2 mr-sm-0" type="submit">Search</button>
		 </div>
	 </div>
 </form>  -->
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<!-- <li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>howitworks">How It Works?</a>
			</li> -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>" >Home</a>
			</li>

		</ul>
	</div>
</div>
</nav>
