
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
	<link href="<?php echo base_url(); ?>assets/css/profile_style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/creategig_style.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/js/creategig.js"></script>
	<!-- FAVICON -->
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/qwpnotextwhite.png" type="image/gif" size="16x16">
</head>

<body>
<!-- NAVBAR CODE START -->
<nav class="navbar navbar-expand-lg navbar-light bg-white" id="nav1">

  <a class="navbar-brand" href="#">QuickWorkPro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- NAVBAR TOP HEADER CODE START -->
 <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- NAVBAR TOP SEARCH FORM CODE START -->
    <form class="form-inline mr-2 mr-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success mr-2 mr-sm-0" type="submit">Search</button>
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
          <a class="dropdown-item" href="#">Orders</a>
          <a class="dropdown-item" href="#">Client Requests</a>
          <a class="dropdown-item" href="#">Earnings</a>
          <a class="dropdown-item" href="#">Analytics</a>
        </div>
      </li>
      <!-- NAVBAR SELLING CODE END -->

      <!-- NAVBAR GIG CODE START -->
      <li class="nav-item">
        <a class="nav-link" href="#">Gigs</i></a>
      </li>
      <!-- NAVBAR GIG CODE END -->

      <!-- NAVBAR MESSAGE CODE START -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-comments"></i>
        </a>

        <ul class="dropdown-menu" id="dropdown-menu-n">

          <li class="head text-light bg-dark">
            <div class="row">
              <div class="col-lg-12 col-sm-12 col-12">
                <span>Messages (3)</span>
                <a href="" class="float-right text-light">Mark all as read</a>
              </div>
          </li>

          <li class="notification-box">
            <div class="row">
              <div class="col-lg-3 col-sm-3 col-3 text-center">
                <img src="img/face.png" class="w-75 rounded-circle">
              </div>
              <div class="col-lg-8 col-sm-8 col-8">
                <strong class="text-info">David John</strong>
                <div class="notification-body">Lorem ipsum dolor sit amet, consectetur</div>
                <small class="text-warning">27.11.2015, 15:00</small>
              </div>
            </div>
          </li>

          <li class="notification-box bg-gray">
            <div class="row">
              <div class="col-lg-3 col-sm-3 col-3 text-center">
                <img src="img/face.png" class="w-75 rounded-circle">
              </div>
              <div class="col-lg-8 col-sm-8 col-8">
                <strong class="text-info">David John</strong>
                <div class="notification-body">Lorem ipsum dolor sit amet, consectetur</div>
                <small class="text-warning">27.11.2015, 15:00</small>
              </div>
            </div>
          </li>

          <li class="notification-box">
            <div class="row">
              <div class="col-lg-3 col-sm-3 col-3 text-center">
                <img src="img/face.png" class="w-75 rounded-circle">
              </div>
              <div class="col-lg-8 col-sm-8 col-8">
                <strong class="text-info">David John</strong>
                <div class="notification-body">Lorem ipsum dolor sit amet, consectetur</div>
                <small class="text-warning">27.11.2015, 15:00</small>
              </div>
            </div>
          </li>

          <li class="footer bg-dark text-center">
            <a href="" class="text-light">View All</a>
          </li>

        </ul>
      </li>
      <!-- NAVBAR MESSAGE CODE RNF -->

      <!-- NAVBAR Notifications CODE START -->
      <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
          </a>

          <ul class="dropdown-menu" id="dropdown-menu-n">

            <li class="head text-light bg-dark">
              <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                  <span>Notifications (3)</span>
                  <a href="" class="float-right text-light">Mark all as read</a>
                </div>
            </li>

            <li class="notification-box">
              <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 text-center">
                  <img src="img/face.png" class="w-75 rounded-circle">
                </div>
                <div class="col-lg-8 col-sm-8 col-8">
                  <strong class="text-info">David John</strong>
                  <div class="notification-body">Lorem ipsum dolor sit amet, consectetur</div>
                  <small class="text-warning">27.11.2015, 15:00</small>
                </div>
              </div>
            </li>

            <li class="notification-box bg-gray">
              <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 text-center">
                  <img src="img/face.png" class="w-75 rounded-circle">
                </div>
                <div class="col-lg-8 col-sm-8 col-8">
                  <strong class="text-info">David John</strong>
                  <div class="notification-body">Lorem ipsum dolor sit amet, consectetur</div>
                  <small class="text-warning">27.11.2015, 15:00</small>
                </div>
              </div>
            </li>

            <li class="notification-box">
              <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 text-center">
                  <img src="img/face.png" class="w-75 rounded-circle">
                </div>
                <div class="col-lg-8 col-sm-8 col-8">
                  <strong class="text-info">David John</strong>
                  <div class="notification-body">Lorem ipsum dolor sit amet, consectetur</div>
                  <small class="text-warning">27.11.2015, 15:00</small>
                </div>
              </div>
            </li>

            <li class="footer bg-dark text-center">
              <a href="" class="text-light">View All</a>
            </li>

          </ul>
        </li>
      <!-- NAVBAR Notifications CODE END -->

      <!-- NAVBAR Dashboard CODE START -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Dashboard"><i class="fas fa-chart-bar"></i></a>
      </li>
      <!-- NAVBAR Dashboard CODE END -->

      <!-- NAVBAR PROFILE CODE START -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="fas fa-user-circle"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#"><?php echo $this->session->userdata('user_id'); ?></a>
          <a class="dropdown-item" href="#">My Profile</a>
          <a class="dropdown-item" href="#">Support Center</a>
          <a class="dropdown-item" href="#">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url(); ?>loginc/logout">Logout</a>
        </div>
      </li>
      <!-- NAVBAR PROFILE CODE END -->

    </ul>
    <!-- NAVBAR LEFT LINKS CODE END -->

 </div>

</nav>
<!-- NAVBAR CODE END -->
