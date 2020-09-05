<?php 
    if($this->session->flashdata('success')){
        echo '<p class="jumbotrone">' . $this->session->flashdata('success') . '</p>';
    }
    if($this->session->flashdata('error')){
        echo '<p class="jumbotrone">' . $this->session->flashdata('error') . '</p>';
    }
    
?>
<!--- Image Slider CODE START -->
<div id="slides" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
  	<li data-target="#slides" data-slide-to="0" class="active"></li>
  	<li data-target="#slides" data-slide-to="1"></li>
  	<li data-target="#slides" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner text-center">
  	<div class="carousel-item active">
  		<img src="<?php echo base_url(); ?>assets/img/fl2.jpg">
  		<div class="carousel-caption">
  		  <h1 class="display-2">Graduer</h1>
  		  <h4></h4>
      </div>
    </div>
    <div class="carousel-item">
  	  <img src="<?php echo base_url(); ?>assets/img/fl4.jpg">
  	  <div class="carousel-caption">
        <h1 class="display-2">Graduer</h1>
  		  <h4></h4>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>assets/img/fl3.jpg">
      <div class="carousel-caption">
        <h1 class="display-2">Graduer</h1>
       <h4></h4>
      </div>
    </div>
  </div>
</div>
<!--- Image Slider CODE END -->


<!-- Modal Join Buyer CODE START -->
<div class="modal hide fade" id="modaljoinbuyer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
      		<h4 class="modal-title text-center" id="exampleModalLongTitle">Join Graduer as Buyer</h4>
	      	<div class="col-12 user-img">
					<img src="<?php echo base_url(); ?>assets/img/face.png" class="rounded-circle">
			</div>
        	<hr>
      <form class="col-12" method="post" action="<?php echo base_url();?>registerc/bForm_validation">

				<div class="form-group">
					<input type="text" name="b_usernamejoin" class="form-control" placeholder="Choose a Username" value="<?php echo set_value('b_usernamejoin'); ?>" required>
          <span class="text-danger"><?php echo form_error("b_usernamejoin"); ?></span>
        </div>
				<div class="form-group">
					<input type="Email" name="b_emailjoin" class="form-control" placeholder="Enter your Email" value="<?php echo set_value('b_emailjoin'); ?>" required>

				</div>
				<div class="form-group">
					<input type="password" name="b_passwordjoin" class="form-control" placeholder="Choose a Password" value="<?php echo set_value('b_passwordjoin'); ?>" required>

				</div>
				<div class="form-group">
					<input type="password" name="b_confirmpasswordjoin" class="form-control" placeholder="Reenter the Password" value="<?php echo set_value('b_confirmpasswordjoin'); ?>" required>
				</div>
				<button type="submit" name="btn_b_join" class="btns btn btn-default form-control"><i class="fas fa-user-plus"></i> Sign Up</button>
			</form>
		<br>
		  <div class="col-12 forgot">
				By joining, you agree to QWP's <a href="#">Terms of Service</a>
				<br />
				<a href="<?php echo base_url(); ?>login">Already a User? Sign In</a>
			</div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Join Buyer CODE END -->
